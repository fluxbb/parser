<?php // parser.php Rev:20110413_1700
/*---

	Copyright (C) 2008-2011 FluxBB.org
	New 2011 parser code copyright (C) 2011 Jeff Roberson (jmrware.com).
	based on code copyright (C) 2002-2005 Rickard Andersson
	License: http://www.gnu.org/licenses/gpl.html GPL version 2 or higher

---*/

// Make sure no one attempts to run this script "directly"
if (!defined('PUN'))
	exit;

define('PUN_PARSER', '11-Feb-2011 13:33');

// globals. we share one array: $pd
if (file_exists (PUN_ROOT.'cache/cache_parser_data.php')) { // If file already exists
	require_once(PUN_ROOT.'cache/cache_parser_data.php');
} else { // It needs to be re-generated.
	require_once(PUN_ROOT.'include/bbcd_source.php');
	require_once(PUN_ROOT.'include/bbcd_compile.php');
}
// !!!! AVOIDING PCRE STACK OVERFLOWS WHICH SEG-FAULT CRASH APACHE/PHP !!!!
// By default, PHP sets up pcre.recursion_limit way too high (100000). According
// to PCRE documentation, a sensible value for this parameter is the stacksize
// of the PCRE executable, divided by 500. The Apache executable for Windows is
// built with a 256KB stack, but most *nix installations set a stack size of 8MB.
// We need to set the PCRE pcre.recursion_limit to the stacksize / 500. If this
// precaution is not done, then an overly large subject text will cause the
// executable to stack-overflow, and seg-fault crash with no warning. Taking the
// following precaution, prevents this severe error and allows the program to
// gracefully recover and display an appropriate error message.
if (isset($_ENV['OS']) && $_ENV['OS'] === "Windows_NT") { // Are we: Win NT, 2K, XP, Vista or 7)?
	ini_set("pcre.recursion_limit", "524");		// 256KB / 500 = 524
} else {										// Otherwise assume we are on a *nix box.
	ini_set("pcre.recursion_limit", "16777");	// 8MB / 500 = 16777
}




//
// Parse post or signature message text.
//
function parse_bbcode(&$text, $hide_smilies = 0) {
	global $pun_config, $pun_user, $pd;

	if ($pun_config['o_censoring'] === '1') {
		$text = censor_words($text);
	}
	// Convert [&<>] characters to HTML entities (but preserve [""''] quotes).
	$text = htmlspecialchars($text, ENT_NOQUOTES);

	// Parse BBCode if globally enabled.
	if ($pun_config['p_message_bbcode']) {
		$text = preg_replace_callback($pd['re_bbcode'], '_parse_bbcode_callback', $text);
	}
	// Set $smile_on flag depending on global flags and whether or not this is a signature.
	if ($pd['in_signature']) {
		$smile_on = ($pun_config['o_smilies_sig'] && $pun_user['show_smilies'] && !$hide_smilies) ? 1 : 0;
	} else {
		$smile_on = ($pun_config['o_smilies'] && $pun_user['show_smilies'] && !$hide_smilies) ? 1 : 0;
	}
	// Split text into hidden and non-hidden chunks. Process the non-hidden content chunks.
	$parts = explode("\1", $text); // Hidden chunks pre-marked like so: "\1\2<code.../code>\1"
	for ($i = 0, $len = count($parts); $i < $len; ++$i) { // Loop through hidden and non-hidden text chunks.
		$part =& $parts[$i];									// Use shortcut alias
		if (empty($part)) continue;								// Skip empty string chunks.
		if ($part[0] !== "\2") { // If not hidden, process this normal text content.
			if ($smile_on) { // If smileys enebled, do em all in one whack.
				$part = preg_replace_callback($pd['re_smilies'], '_do_smilies_callback', $part);
			}
			// Deal with newlines, tabs and multiple spaces
			$part = str_replace(
				array("\n",		"\t",				'  ',		'  '),
				array('<br />', '&#160; &#160; ',	'&#160; ',	' &#160;'), $part);
		} else $part = substr($part, 1); // For hidden chunks, strip \2 marker byte.
	}
	$text = implode("", $parts); // Put hidden and non-hidden chunks back together.

	// Add paragraph tag around post, but make sure there are no empty paragraphs
	$text = str_replace('<p><br />', '<p>', $text);
	$text = str_replace('<p></p>', '', '<p>'. $text .'</p>');
	return $text;
}
//
// Helper preg_replace_callback function for smilies processing.
//
function _do_smilies_callback($matches) {
	global $pd;
	return $pd['smilies'][$matches[0]]['html'];
}
//
// Parse message text
//
function parse_message($text, $hide_smilies) {
	global $pd, $pun_config, $pun_user;
	$pd['in_signature'] = FALSE;
	// Disable images via the $bbcd['in_post'] flag if globally disabled.
	if ($pun_config['p_message_img_tag'] !== '1' || $pun_user['show_img'] !== '1')
		if (isset($pd['bbcd']['img'])) $pd['bbcd']['img']['in_post'] = FALSE;
	return parse_bbcode($text, $hide_smilies);
}
//
// Parse signature text
//
function parse_signature($text) {
	global $pd, $pun_config, $pun_user;
	$pd['in_signature'] = TRUE;
	// Disable images via the $bbcd['in_sig'] flag if globally disabled.
	if ($pun_config['p_sig_img_tag'] !== '1' || $pun_user['show_img_sig'] !== '1')
		if (isset($pd['bbcd']['img'])) $pd['bbcd']['img']['in_sig'] = FALSE;
	return parse_bbcode($text);
}