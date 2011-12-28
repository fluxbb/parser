<?php // File: $bbcd_source.php Rev:20110403_2100
// Contains master default: $config, $syntaxes, $smilies and $bbcd arrays.
// This file is not used during runtime. It is used to compile the actual runtime
// cache file: cache_parser_data.php whenever the parser options need to be reset
// or initialized. These are the "factory default" settings. This file is designed
// to be hand edited.

// Global parser options (These should eventually be migrated to the config db table?)
$config = array(
	'textile'		=> TRUE,		// Allow simple textile phrase extensions.
	'quote_links'	=> TRUE,		// Make quote citation a link back to source post.
	'quote_imgs'	=> FALSE,		// Allow IMG tags withing QUOTEs flag.
	'valid_imgs'	=> TRUE,		// Validate images and clip size during pre-parsing.
	'click_imgs'	=> TRUE,		// Wrap IMG tags in a url link to the original image.
	'max_size'		=> 100000,		// Maximum remote filesize for posting IMG links.
	'max_width'		=> 800,			// Max width of visual media objects in pixels.
	'max_height'	=> 600,			// Max height of visual media objects in pixels.
	'def_width'		=> 240,			// Default width of visual media objects in pixels.
	'def_height'	=> 180,			// Default height of visual media objects in pixels.
	'smiley_size'   => 100,			// Percent size adjust for display of smilies.
	'syntax_style'	=> 'shCoreDefault.css'
); // End $config array.

// $syntaxes: Array of Javascript CODE syntax highlighter scripts. Each member is an
// array of script names which need to be loaded for this syntax highlighting to work.
// Only one copy of any script is loaded and they are loaded in the order listed.
$syntaxes = array(
	'regex'			=> array('DynamicRegexHighlighter.js'),
	'regex_x'		=> array('DynamicRegexHighlighter.js'),
	'applescript'	=> array('shCore.js', 'shBrushAppleScript.js'),
	'as3'			=> array('shCore.js', 'shBrushAS3.js'),
	'bash'			=> array('shCore.js', 'shBrushBash.js'),
	'coldfusion'	=> array('shCore.js', 'shBrushColdFusion.js'),
	'c'				=> array('shCore.js', 'shBrushCpp.js'),
	'cpp'			=> array('shCore.js', 'shBrushCpp.js'),
	'csharp'		=> array('shCore.js', 'shBrushCSharp.js'),
	'css'			=> array('shCore.js', 'shBrushCss.js'),
	'delphi'		=> array('shCore.js', 'shBrushDelphi.js'),
	'diff'			=> array('shCore.js', 'shBrushDiff.js'),
	'erlang'		=> array('shCore.js', 'shBrushErlang.js'),
	'groovy'		=> array('shCore.js', 'shBrushGroovy.js'),
	'java'			=> array('shCore.js', 'shBrushJava.js'),
	'javafx'		=> array('shCore.js', 'shBrushJavaFX.js'),
	'js'			=> array('shCore.js', 'shBrushJScript.js'),
	'jscript'		=> array('shCore.js', 'shBrushJScript.js'),
	'perl'			=> array('shCore.js', 'shBrushPerl.js'),
	'php'			=> array('shCore.js', 'shBrushPhp.js'),
	'plain'			=> array('shCore.js', 'shBrushPlain.js'),
	'powershell'	=> array('shCore.js', 'shBrushPowerShell.js'),
	'python'		=> array('shCore.js', 'shBrushPython.js'),
	'ruby'			=> array('shCore.js', 'shBrushRuby.js'),
	'sass'			=> array('shCore.js', 'shBrushSass.js'),
	'scala'			=> array('shCore.js', 'shBrushScala.js'),
	'sql'			=> array('shCore.js', 'shBrushSql.js'),
	'vb'			=> array('shCore.js', 'shBrushVb.js'),
	'xml'			=> array('shCore.js', 'shBrushXml.js'),
); // End $syntaxes array.

// Array of smileys. These files are located in the img/smilies folder).
$smilies = array(
	':)' 			=> array('file'	=> 'smile.png'),
	'=)' 			=> array('file'	=> 'smile.png'),
	':|' 			=> array('file'	=> 'neutral.png'),
	'=|' 			=> array('file'	=> 'neutral.png'),
	':(' 			=> array('file'	=> 'sad.png'),
	'=(' 			=> array('file'	=> 'sad.png'),
	':D' 			=> array('file'	=> 'big_smile.png'),
	'=D' 			=> array('file'	=> 'big_smile.png'),
	':o' 			=> array('file'	=> 'yikes.png'),
	':O' 			=> array('file'	=> 'yikes.png'),
	';)' 			=> array('file'	=> 'wink.png'),
	':/' 			=> array('file'	=> 'hmm.png'),
	':P' 			=> array('file'	=> 'tongue.png'),
	':p' 			=> array('file'	=> 'tongue.png'),
	':lol:' 		=> array('file'	=> 'lol.png'),
	':mad:' 		=> array('file'	=> 'mad.png'),
	':rolleyes:'	=> array('file'	=> 'roll.png'),
	':cool:' 		=> array('file'	=> 'cool.png')
); // End $smilies array.

/*
FluxBB 1.4.3 Old parser tags:
array('quote', 'code', 'b', 'i', 'u', 's', 'ins', 'del', 'em', 'color', 'colour', 'url', 'email', 'img', 'list', '*', 'h')
array('quote', 'code', 'b', 'i', 'u',
*/
$bbcd = array( // Array of recognised BBCode tag structures (arrays).
	'b' => array(
		'html_name'				=> 'strong'
	),
	'code' => array(
		'html_name'				=> 'pre',
		'tag_type'				=> 'hidden',
		'html_type'				=> 'block',
		'handlers'				=> array(
			'applescript'				=> array(
				'format'		=> '</p><div class="codebox"><h4>Code: AppleScript</h4>
										<pre class="brush: applescript;">%c_str%</pre></div><p>'
			),
			'as3'				=> array(
				'format'		=> '</p><div class="codebox"><h4>Code: AS3</h4>
										<pre class="brush: as3;">%c_str%</pre></div><p>'
			),
			'bash'				=> array(
				'format'		=> '</p><div class="codebox"><h4>Code: bash</h4>
										<pre class="brush: bash;">%c_str%</pre></div><p>'
			),
			'c'					=> array(
				'format'		=> '</p><div class="codebox"><h4>Code: "C"</h4>
										<pre class="brush: c;">%c_str%</pre></div><p>'
			),
			'coldfusion'				=> array(
				'format'		=> '</p><div class="codebox"><h4>Code: ColdFusion</h4>
										<pre class="brush: coldfusion;">%c_str%</pre></div><p>'
			),
			'cpp'				=> array(
				'format'		=> '</p><div class="codebox"><h4>Code: "C++"</h4>
										<pre class="brush: cpp;">%c_str%</pre></div><p>'
			),
			'csharp'				=> array(
				'format'		=> '</p><div class="codebox"><h4>Code: C#</h4>
										<pre class="brush: csharp;">%c_str%</pre></div><p>'
			),
			'css'				=> array(
				'format'		=> '</p><div class="codebox"><h4>Code: CSS</h4>
										<pre class="brush: css;">%c_str%</pre></div><p>'
			),
			'delphi'				=> array(
				'format'		=> '</p><div class="codebox"><h4>Code: Delphi</h4>
										<pre class="brush: delphi;">%c_str%</pre></div><p>'
			),
			'diff'				=> array(
				'format'		=> '</p><div class="codebox"><h4>Code: Diff/Patch</h4>
										<pre class="brush: diff;">%c_str%</pre></div><p>'
			),
			'erlang'				=> array(
				'format'		=> '</p><div class="codebox"><h4>Code: Erlang</h4>
										<pre class="brush: erlang;">%c_str%</pre></div><p>'
			),
			'groovy'				=> array(
				'format'		=> '</p><div class="codebox"><h4>Code: Groovy</h4>
										<pre class="brush: groovy;">%c_str%</pre></div><p>'
			),
			'java'				=> array(
				'format'		=> '</p><div class="codebox"><h4>Code: Java</h4>
										<pre class="brush: java;">%c_str%</pre></div><p>'
			),
			'javafx'				=> array(
				'format'		=> '</p><div class="codebox"><h4>Code: JavaFX</h4>
										<pre class="brush: javafx;">%c_str%</pre></div><p>'
			),
			'jscript'				=> array(
				'format'		=> '</p><div class="codebox"><h4>Code: JScript</h4>
										<pre class="brush: jscript;">%c_str%</pre></div><p>'
			),
			'js'				=> array(
				'format'		=> '</p><div class="codebox"><h4>Code: Javascript</h4>
										<pre class="brush: js;">%c_str%</pre></div><p>'
			),
			'perl'				=> array(
				'format'		=> '</p><div class="codebox"><h4>Code: Perl</h4>
										<pre class="brush: perl;">%c_str%</pre></div><p>'
			),
			'php'				=> array(
				'format'		=> '</p><div class="codebox"><h4>Code: PHP</h4>
										<pre class="brush: php;">%c_str%</pre></div><p>'
			),
			'plain'				=> array(
				'format'		=> '</p><div class="codebox"><h4>Code: Plain</h4>
										<pre class="brush: plain;">%c_str%</pre></div><p>'
			),
			'powershell'				=> array(
				'format'		=> '</p><div class="codebox"><h4>Code: PowerShell</h3><pre class="brush: powershell;">%c_str%</pre></div><p>'
			),
			'python'				=> array(
				'format'		=> '</p><div class="codebox"><h4>Code: Python</h4>
										<pre class="brush: python;">%c_str%</pre></div><p>'
			),
			'ruby'				=> array(
				'format'		=> '</p><div class="codebox"><h4>Code: Ruby</h4>
										<pre class="brush: ruby;">%c_str%</pre></div><p>'
			),
			'sass'				=> array(
				'format'		=> '</p><div class="codebox"><h4>Code: Sass</h4>
										<pre class="brush: sass;">%c_str%</pre></div><p>'
			),
			'scala'				=> array(
				'format'		=> '</p><div class="codebox"><h4>Code: Scala</h4>
										<pre class="brush: scala;">%c_str%</pre></div><p>'
			),
			'sql'				=> array(
				'format'		=> '</p><div class="codebox"><h4>Code: SQL</h4>
										<pre class="brush: sql;">%c_str%</pre></div><p>'
			),
			'vb'				=> array(
				'format'		=> '</p><div class="codebox"><h4>Code: Visual Basic</h4>
										<pre class="brush: vb;">%c_str%</pre></div><p>'
			),
			'xml'				=> array(
				'format'		=> '</p><div class="codebox"><h4>Code: XML</h4>
										<pre class="brush: xml;">%c_str%</pre></div><p>'
			),
			'regex'				=> array(
				'format'		=> '</p><div class="codebox"><h4>Code: Regex (PCRE)</h4>
										<pre class="regex">%c_str%</pre></div><p>'
			),
			'regex_x'				=> array(
				'format'		=> '</p><div class="codebox"><h4>Code: Regex (PCREx)</h4>
										<pre class="regex_x">%c_str%</pre></div><p>'
			),
			'ATTRIB'			=> array(
				'format'		=> '
					</p>
					<div class="codebox">
						<h4>Code: "%a_str%"</h4>
						<pre>%c_str%</pre>
					</div>
					<p>'
			),
			'NO_ATTRIB'			=> array(
				'format'		=> '
					</p>
					<div class="codebox">
						<pre>%c_str%</pre>
					</div>
					<p>'
			)
		)
	),
	'color' => array(
		'html_name'				=> 'span',
		'nest_type'				=> 'err',
		'handlers'				=> array(
			'ATTRIB'			=> array(
				'a_type'		=> 'color',
				'format'		=> '<span style="color: %a_str%;">%c_str%</span>'
			)
		)
	),
	'colour' => array(
		'html_name'				=> 'span',
		'nest_type'				=> 'err',
		'handlers'				=> array(
			'ATTRIB'			=> array(
				'a_type'		=> 'color',
				'format'		=> '<span style="color: %a_str%;">%c_str%</span>'
			)
		)
	),
	'del' => array(
		'html_name'				=> 'del'
	),
	'email' => array(
		'html_name'				=> 'a',
		'nest_type'				=> 'err',
		'tags_excluded'			=> array('email' => TRUE, 'url' => TRUE),
		'handlers'				=> array(
			'ATTRIB'			=> array(
				'a_type'		=> 'email',
				'c_type'		=> 'text',
				'format'		=> '<a href="mailto:%a_str%" rel="nofollow">%c_str%</a>'
			),
			'NO_ATTRIB'			=> array(
				'a_type'		=> 'none',
				'c_type'		=> 'email',
				'format'		=> '<a href="mailto:%c_str%" rel="nofollow">%c_str%</a>'
			)
		)
	),
	'em' => array(
		'html_name'				=> 'em'
	),
	'h' => array(
		'html_name'				=> 'h5',
		'handlers'				=> array(
			'NO_ATTRIB'			=> array(
				'format'		=> '</p><h5>%c_str%</h5><p>'
			)
		)
	),
	'img' => array(
		'html_name'				=> 'img',
		'tag_type'				=> 'atomic',
		'tags_allowed'			=> array('img' => TRUE),
		'handlers'				=> array(
			'ATTRIB'			=> array(
				'a_type'		=> 'width_height',
				'c_type'		=> 'url',
				'format'		=> '<img src="%c_str%" alt="%a_str%" title="%a_str%" width="%w_str%" height="%h_str%" />'
			),
			'NO_ATTRIB'			=> array(
				'a_type'		=> 'none',
				'c_type'		=> 'url',
				'format'		=> '<img src="%c_str%" alt="%c_str%" />'
			)
		)
	),
	'ins' => array(
		'html_name'				=> 'ins'
	),
	'i' => array(
		'html_name'				=> 'em'
	),


	'table' => array(
		'html_name'				=> 'table',
		'html_type'				=> 'block',
		'handlers'		=> array(
			'NO_ATTRIB'			=> array('format' => '</p><table>%c_str%</table><p>' )
		),
		'tags_only'				=> true,
		'tags_allowed'			=> array(
			'tr'				=>	TRUE,
			'err'				=>	TRUE,
		)
	),
	'tr' => array(
		'html_name'				=> 'tr',
		'html_type'				=> 'block',
		'parents'				=> array('table' => TRUE),
		'handlers'		=> array(
			'NO_ATTRIB'			=> array('format' => '<tr>%c_str%</tr>' )
		),
		'tags_only'				=> true,
		'tags_allowed'			=> array(
			'th'				=>	TRUE,
			'td'				=>	TRUE,
			'err'				=>	TRUE,
		)
	),
	'th' => array(
		'html_name'				=> 'th',
		'html_type'				=> 'block',
		'parents'				=> array('tr' => TRUE),
		'handlers'		=> array(
			'NO_ATTRIB'			=> array('format' => '<th><p>%c_str%</p></th>' )
		),
	),
	'td' => array(
		'html_name'				=> 'td',
		'html_type'				=> 'block',
		'parents'				=> array('tr' => TRUE),
		'handlers'		=> array(
			'NO_ATTRIB'			=> array('format' => '<td><p>%c_str%</p></td>' )
		),
	),


	'list' => array(
		'html_name'				=> 'ul',
		'html_type'				=> 'block',
		'handlers'		=> array(
			'1'					=> array('format' => '</p><ol class="decimal">%c_str%</ol><p>'),
			'a'					=> array('format' => '</p><ol class="alpha">%c_str%</ol><p>'),
			'*'					=> array('format' => '</p><ul>%c_str%</ul><p>'),
			'NO_ATTRIB'			=> array('format' => '</p><ul>%c_str%</ul><p>' )
		),
		'tags_only'				=> true,
		'tags_allowed'			=> array(
			'list'				=>	TRUE,
			'*'					=>	TRUE)
	),
	'*' => array(
		'html_name'				=> 'li',
		'html_type'				=> 'block',
		'parents'				=> array('list' => TRUE),
		'handlers'		=> array(
			'NO_ATTRIB'			=> array('format' => '<li><p>%c_str%</p></li>' )
		)
	),
	'quote' => array(
		'html_name'				=> 'blockquote',
		'html_type'				=> 'block',
		'tag_type'				=> 'zombie',
		'nest_type'				=> 'clip',
//		'depth_max'				=> 3,
		'handlers'				=> array(
			'ATTRIB'			=> array(
				'format'		=> '
				</p>
				<div class="quotebox">
					<cite>%a_str%</cite>
					<blockquote>
						<div>
							<p>%c_str%</p>
						</div>
					</blockquote>
				</div>
				<p>'
			),
			'NO_ATTRIB'			=> array(
				'format'		=> '
				</p>
				<div class="quotebox">
					<blockquote>
						<div>
							<p>%c_str%</p>
						</div>
					</blockquote>
				</div>
				<p>'
			),
		),
	),
	'sub' => array(
		'html_name'				=> 'sub'
	),
	'sup' => array(
		'html_name'				=> 'sup'
	),
	's' => array(
		'html_name'				=> 'span',
		'handlers'				=> array(
			'NO_ATTRIB'			=> array(
				'format'		=> '<span class="bbs">%c_str%</span>'
			)
		)
	),
	'tt' => array(
		'html_name'				=> 'tt',
		'tag_type'				=> 'hidden',
		'handlers'	=> array( // count == 1
			'NO_ATTRIB'	=> array( // count == 3
				'a_type'	=> 'none',
				'c_type'	=> 'text',
				'format'	=> '<tt>%c_str%</tt>'
			)
		),


	),
	'url' => array(
		'html_name'				=> 'a',
//		'nest_type'				=> 'err',
		'tags_excluded'			=> array('email' => TRUE, 'url' => TRUE),
		'handlers'				=> array(
			'ATTRIB'			=> array(
				'a_type'		=> 'url',
				'c_type'		=> 'text',
				'format'		=> '<a href="%a_str%" rel="nofollow">%c_str%</a>'
			),
			'NO_ATTRIB'			=> array(
				'a_type'		=> 'none',
				'c_type'		=> 'url',
				'format'		=> '<a href="%c_str%" rel="nofollow">%c_str%</a>'
			)
		)
	),
	'u' => array(
		'html_name'				=> 'span',
		'handlers'				=> array(
			'NO_ATTRIB'			=> array(
				'format'		=> '<span class="bbu">%c_str%</span>'
			)
		)
	),

	// New Tags.


	'vimeo' => array(
	/* Supplied in one of four acceptable formats:  (Note: smallest good youtube dimensions: 260x225)
		1. 12397369
		2. http://www.vimeo.com/12397369
		3. <iframe src="http://player.vimeo.com/video/12397369" width="400" height="265" frameborder="0"></iframe><p><a href="http://vimeo.com/12397369">Blender test 01 - Ocean - step 09</a> from <a href="http://vimeo.com/user738479">ridgerunner</a> on <a href="http://vimeo.com">Vimeo</a>.</p>
		4. <object width="400" height="265"><param name="allowfullscreen" value="true" /><param name="allowscriptaccess" value="always" /><param name="movie" value="http://vimeo.com/moogaloop.swf?clip_id=12397369&amp;server=vimeo.com&amp;show_title=1&amp;show_byline=1&amp;show_portrait=1&amp;color=00ADEF&amp;fullscreen=1&amp;autoplay=0&amp;loop=0" /><embed src="http://vimeo.com/moogaloop.swf?clip_id=12397369&amp;server=vimeo.com&amp;show_title=1&amp;show_byline=1&amp;show_portrait=1&amp;color=00ADEF&amp;fullscreen=1&amp;autoplay=0&amp;loop=0" type="application/x-shockwave-flash" allowfullscreen="true" allowscriptaccess="always" width="400" height="265"></embed></object><p><a href="http://vimeo.com/12397369">Blender test 01 - Ocean - step 09</a> from <a href="http://vimeo.com/user738479">ridgerunner</a> on <a href="http://vimeo.com">Vimeo</a>.</p>
	*/
		'in_post'				=> TRUE,
		'in_sig'				=> FALSE,
		'html_name'				=> 'object',
		'tags_allowed'			=> array(),
		'handlers'				=> array(
			'ATTRIB'			=> array(
				'a_type'		=> 'width_height',
				'c_type'		=> 'text',
				'c_regex'		=> '%(?:^|\bvimeo.com/(?:moogaloop.swf?clip_id=)?)(\d{7,10})\b%S',
				'format'		=> '
					<object type="application/x-shockwave-flash" width="%w_str%" height="%h_str%" data="http://vimeo.com/moogaloop.swf?clip_id=%c_str%&amp;server=vimeo.com&amp;show_title=0&amp;show_byline=0&amp;show_portrait=0&amp;color=00ADEF&amp;fullscreen=1">
						<param name="allowscriptaccess" value="always" />
						<param name="movie" value="http://vimeo.com/moogaloop.swf?clip_id=%c_str%&amp;server=vimeo.com&amp;show_title=0&amp;show_byline=0&amp;show_portrait=0&amp;color=00ADEF&amp;fullscreen=1" />
						<param name="allowFullScreen" value="true" />
					</object>'
			),
			'NO_ATTRIB'			=> array(
				'a_type'		=> 'width_height',
				'c_type'		=> 'width_height',
				'c_regex'		=> '%(?:^|\bvimeo.com/(?:moogaloop.swf?clip_id=)?)(\d{7,10})\b%S',
				'format'		=> '
					<object type="application/x-shockwave-flash" width="%w_str%" height="%h_str%" data="http://vimeo.com/moogaloop.swf?clip_id=%c_str%&amp;server=vimeo.com&amp;show_title=0&amp;show_byline=0&amp;show_portrait=0&amp;color=00ADEF&amp;fullscreen=1">
						<param name="allowscriptaccess" value="always" />
						<param name="movie" value="http://vimeo.com/moogaloop.swf?clip_id=%c_str%&amp;server=vimeo.com&amp;show_title=0&amp;show_byline=0&amp;show_portrait=0&amp;color=00ADEF&amp;fullscreen=1" />
						<param name="allowFullScreen" value="true" />
					</object>'
			)
		)
	),


//    'v' => array(
//        'html_name' => 'var'
//    ),


	'youtube' => array(
	/* Supplied in one of three acceptable formats:  (Note: smallest good youtube dimensions: 260x225)
		1. XWlhKllqnAk
		2. http://www.youtube.com/watch?v=XWlhKllqnAk
		3. <object width="480" height="385"><param name="movie" value="http://www.youtube.com/v/XWlhKllqnAk?fs=1&amp;hl=en_US&amp;rel=0"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><embed src="http://www.youtube.com/v/XWlhKllqnAk?fs=1&amp;hl=en_US&amp;rel=0" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" width="480" height="385"></embed></object>
		SIZING:
		With wxh set to 480x385 and no borders, the object uses 480x385 and the image takes 480x360.
		With wxh set to 480x385 and borders, the object uses 480x385 and the image takes 460x340.
		  Border width = 10px. Controller height = 25.
	*/
		'in_post'				=> TRUE,
		'in_sig'				=> FALSE,
		'html_name'				=> 'object',
		'tags_allowed'			=> array(),
		'x_padding'				=> 20,
		'y_padding'				=> 45,
		'handlers'				=> array(
			'ATTRIB'			=> array(
				'a_type'		=> 'width_height',
				'c_type'		=> 'text',
				'c_regex'		=> '%(?:^|\bv[=/])(\w{10,12})\b%S',
				'format'		=> '
					<object type="application/x-shockwave-flash" width="%w_str%" height="%h_str%"
						data="http://www.youtube.com/v/%c_str%&amp;hl=en_US&amp;fs=1&amp;border=1&amp;rel=0">
						<param name="movie" value="http://www.youtube.com/v/%c_str%&amp;hl=en_US&amp;fs=1&amp;border=1" />
						<param name="allowFullScreen" value="true" />
					</object>'
			),
			'NO_ATTRIB'			=> array(
				'a_type'		=> 'width_height',
				'c_type'		=> 'width_height',
				'c_regex'		=> '%(?:^|\bv[=/])(\w{10,12})\b%S',
				'format'		=> '
					<object type="application/x-shockwave-flash" width="%w_str%" height="%h_str%"
						data="http://www.youtube.com/v/%c_str%&amp;hl=en_US&amp;fs=1&amp;border=1&amp;rel=0">
						<param name="movie" value="http://www.youtube.com/v/%c_str%&amp;hl=en_US&amp;fs=1&amp;border=1" />
						<param name="allowFullScreen" value="true" />
					</object>'
			)
		)
	),







	// System Tags. DO NOT DISABLE
	'err' => array(
		'html_name'				=> 'span',
		'tag_type'				=> 'hidden',
		'html_type'				=> 'inline',
		'handlers'				=> array(
			'ATTRIB'			=> array(
				'format'		=>
					'<span class="err" title="%a_str%">%c_str%</span>'
			),
			'NO_ATTRIB'			=> array(
				'format'		=>
					'<span class="err">%c_str%</span>'
			)
		)
	),
	'dbug' => array(
		'html_name'				=> 'div',
		'html_type'				=> 'block',
		'handlers'				=> array(
			'ATTRIB'			=> array(
				'format'		=>
					'</p><p class="debug" title="%a_str%">%c_str%</p><p>'
			)
		)
	),
	'_ROOT_' => array(
		'in_post'				=> FALSE,
		'in_sig'				=> FALSE,
		'html_name'				=> 'div',
		'tag_type'				=> 'normal',
		'html_type'				=> 'block',
		'depth_max'				=> 1,
		'handlers'				=> array( // Default handler for erroneously defined tag.
			'NO_ATTRIB'			=> array(
				'a_type'		=> 'text',
				'c_type'		=> 'text',
				'format'		=> "\1\2<span class=\"err\" title=\"_ROOT_\">%c_str%</span>\1",
			)
		)
	)
) // End $bbcd array.
?>
