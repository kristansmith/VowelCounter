<?php

class VowelCounter {
	
	protected $string;
	protected $totalLength;
	protected $isLong = false;
	protected $vowelsList = "aeiou";
	protected $numVowels = 0;
	protected $chunkArray = [];

	public function __construct($string) {

		$this->string = $string;
		$this->totalLength = strlen($this->string);
		if ($this->totalLength > 2000) {
			$this->isLong = true;
		}
	}


	public function countVowels() {

		if ($this->isLong) {

			$this->chunkArray = str_split($this->string, 200);
			foreach ($this->chunkArray as $chunk) {

				$this->_vowelCheck($chunk);
			}
		} else {

			$this->_vowelCheck($this->string);
		}

		echo "TOTAL LETTERS : " . $this->totalLength . "<br>";
		echo "TOTAL VOWELS : " . $this->numVowels . "<br>";

		$percentage = ($this->numVowels / $this->totalLength) * 100;
		$percentage = round($percentage, 2);
		echo "PERCENTAGE OF TEXT WHICH IS VOWELS : " . $percentage . "%";


	}


	protected function _vowelCheck($string) {

		$chunkLength = strlen($string);
		for ($i = 0; $i < $chunkLength; $i++) {

			if (stristr($this->vowelsList, $string[$i])) $this->numVowels++;
		}
	}

}



// HERE IS THE TEST TO COUNT THE VOWELS

$testString = <<<HEREDOC
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> 

  <title>PHP: strrpos - Manual </title>

 <link rel="shortcut icon" href="http://de1.php.net/favicon.ico">
 <link rel="search" type="application/opensearchdescription+xml" href="http://php.net/phpnetimprovedsearch.src" title="Add PHP.net search">
 <link rel="alternate" type="application/atom+xml" href="http://de1.php.net/releases/feed.php" title="PHP Release feed">
 <link rel="alternate" type="application/atom+xml" href="http://de1.php.net/feed.atom" title="PHP: Hypertext Preprocessor">

 <link rel="canonical" href="http://php.net//manual/en/function.strrpos.php">
 <link rel="shorturl" href="http://php.net/strrpos">

 <link rel="contents" href="http://de1.php.net/manual/en/index.php">
 <link rel="index" href="http://de1.php.net/manual/en/ref.strings.php">
 <link rel="prev" href="http://de1.php.net/manual/en/function.strripos.php">
 <link rel="next" href="http://de1.php.net/manual/en/function.strspn.php">

 <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,400italic,600italic|Source+Code+Pro&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="http://de1.php.net/cached.php?t=1388811617&amp;f=styles/theme-base.css" media="screen">
<link rel="stylesheet" type="text/css" href="http://de1.php.net/cached.php?t=1389324093&amp;f=styles/theme-medium.css" media="screen">

 <!--[if lte IE 7]>
 <link rel="stylesheet" type="text/css" href="http://de1.php.net/styles/workarounds.ie7.css" media="screen" />
 <![endif]-->

 <!--[if lte IE 9]>
 <link rel="stylesheet" type="text/css" href="http://de1.php.net/styles/workarounds.ie9.css" media="screen" />
 <![endif]-->

 <!--[if IE]>
 <script type="text/javascript" src="http://de1.php.net/js/ext/html5.js"></script>
 <![endif]-->

 <base href="http://de1.php.net/manual/en/function.strrpos.php">

</head>
<body class="docs ">

<nav id="head-nav" class="navbar navbar-fixed-top">
  <div class="navbar-inner clearfix">
    <a href="/" class="brand"><img src="/images/logo.php" width="48" height="24" alt="php"></a>
    <div id="mainmenu-toggle-overlay"></div>
    <input type="checkbox" id="mainmenu-toggle" />
    <ul class="nav">
      <li class=""><a href="/downloads">Downloads</a></li>
      <li class="active"><a href="/docs.php">Documentation</a></li>
      <li class=""><a href="/get-involved" >Get Involved</a></li>
      <li class=""><a href="/support">Help</a></li>
    </ul>
    <form class="navbar-search" id="topsearch" action="/search.php">
      <input type="hidden" name="show" value="quickref">
      <input type="search" name="pattern" class="search-query" placeholder="Search" accesskey="s">
    </form>
  </div>
  <div id="flash-message"></div>
</nav>
<div class="headsup"><a href='/index.php#id2014-02-06-1'>PHP 5.4.25 Released!</a></div>
<nav id="trick"><div><dl>
<dt><a href='/manual/en/getting-started.php'>Getting Started</a></dt>
	<dd><a href='/manual/en/introduction.php'>Introduction</a></dd>
	<dd><a href='/manual/en/tutorial.php'>A simple tutorial</a></dd>
<dt><a href='/manual/en/langref.php'>Language Reference</a></dt>
	<dd><a href='/manual/en/language.basic-syntax.php'>Basic syntax</a></dd>
	<dd><a href='/manual/en/language.types.php'>Types</a></dd>
	<dd><a href='/manual/en/language.variables.php'>Variables</a></dd>
	<dd><a href='/manual/en/language.constants.php'>Constants</a></dd>
	<dd><a href='/manual/en/language.expressions.php'>Expressions</a></dd>
	<dd><a href='/manual/en/language.operators.php'>Operators</a></dd>
	<dd><a href='/manual/en/language.control-structures.php'>Control Structures</a></dd>
	<dd><a href='/manual/en/language.functions.php'>Functions</a></dd>
	<dd><a href='/manual/en/language.oop5.php'>Classes and Objects</a></dd>
	<dd><a href='/manual/en/language.namespaces.php'>Namespaces</a></dd>
	<dd><a href='/manual/en/language.exceptions.php'>Exceptions</a></dd>
	<dd><a href='/manual/en/language.generators.php'>Generators</a></dd>
	<dd><a href='/manual/en/language.references.php'>References Explained</a></dd>
	<dd><a href='/manual/en/reserved.variables.php'>Predefined Variables</a></dd>
	<dd><a href='/manual/en/reserved.exceptions.php'>Predefined Exceptions</a></dd>
	<dd><a href='/manual/en/reserved.interfaces.php'>Predefined Interfaces and Classes</a></dd>
	<dd><a href='/manual/en/context.php'>Context options and parameters</a></dd>
	<dd><a href='/manual/en/wrappers.php'>Supported Protocols and Wrappers</a></dd>
</dl>
<dl>
<dt><a href='/manual/en/security.php'>Security</a></dt>
	<dd><a href='/manual/en/security.intro.php'>Introduction</a></dd>
	<dd><a href='/manual/en/security.general.php'>General considerations</a></dd>
	<dd><a href='/manual/en/security.cgi-bin.php'>Installed as CGI binary</a></dd>
	<dd><a href='/manual/en/security.apache.php'>Installed as an Apache module</a></dd>
	<dd><a href='/manual/en/security.filesystem.php'>Filesystem Security</a></dd>
	<dd><a href='/manual/en/security.database.php'>Database Security</a></dd>
	<dd><a href='/manual/en/security.errors.php'>Error Reporting</a></dd>
	<dd><a href='/manual/en/security.globals.php'>Using Register Globals</a></dd>
	<dd><a href='/manual/en/security.variables.php'>User Submitted Data</a></dd>
	<dd><a href='/manual/en/security.magicquotes.php'>Magic Quotes</a></dd>
	<dd><a href='/manual/en/security.hiding.php'>Hiding PHP</a></dd>
	<dd><a href='/manual/en/security.current.php'>Keeping Current</a></dd>
<dt><a href='/manual/en/features.php'>Features</a></dt>
	<dd><a href='/manual/en/features.http-auth.php'>HTTP authentication with PHP</a></dd>
	<dd><a href='/manual/en/features.cookies.php'>Cookies</a></dd>
	<dd><a href='/manual/en/features.sessions.php'>Sessions</a></dd>
	<dd><a href='/manual/en/features.xforms.php'>Dealing with XForms</a></dd>
	<dd><a href='/manual/en/features.file-upload.php'>Handling file uploads</a></dd>
	<dd><a href='/manual/en/features.remote-files.php'>Using remote files</a></dd>
	<dd><a href='/manual/en/features.connection-handling.php'>Connection handling</a></dd>
	<dd><a href='/manual/en/features.persistent-connections.php'>Persistent Database Connections</a></dd>
	<dd><a href='/manual/en/features.safe-mode.php'>Safe Mode</a></dd>
	<dd><a href='/manual/en/features.commandline.php'>Command line usage</a></dd>
	<dd><a href='/manual/en/features.gc.php'>Garbage Collection</a></dd>
	<dd><a href='/manual/en/features.dtrace.php'>DTrace Dynamic Tracing</a></dd>
</dl>
<dl>
<dt><a href='/manual/en/funcref.php'>Function Reference</a></dt>
	<dd><a href='/manual/en/refs.basic.php.php'>Affecting PHP's Behaviour</a></dd>
	<dd><a href='/manual/en/refs.utilspec.audio.php'>Audio Formats Manipulation</a></dd>
	<dd><a href='/manual/en/refs.remote.auth.php'>Authentication Services</a></dd>
	<dd><a href='/manual/en/refs.utilspec.cmdline.php'>Command Line Specific Extensions</a></dd>
	<dd><a href='/manual/en/refs.compression.php'>Compression and Archive Extensions</a></dd>
	<dd><a href='/manual/en/refs.creditcard.php'>Credit Card Processing</a></dd>
	<dd><a href='/manual/en/refs.crypto.php'>Cryptography Extensions</a></dd>
	<dd><a href='/manual/en/refs.database.php'>Database Extensions</a></dd>
	<dd><a href='/manual/en/refs.calendar.php'>Date and Time Related Extensions</a></dd>
	<dd><a href='/manual/en/refs.fileprocess.file.php'>File System Related Extensions</a></dd>
	<dd><a href='/manual/en/refs.international.php'>Human Language and Character Encoding Support</a></dd>
	<dd><a href='/manual/en/refs.utilspec.image.php'>Image Processing and Generation</a></dd>
	<dd><a href='/manual/en/refs.remote.mail.php'>Mail Related Extensions</a></dd>
	<dd><a href='/manual/en/refs.math.php'>Mathematical Extensions</a></dd>
	<dd><a href='/manual/en/refs.utilspec.nontext.php'>Non-Text MIME Output</a></dd>
	<dd><a href='/manual/en/refs.fileprocess.process.php'>Process Control Extensions</a></dd>
	<dd><a href='/manual/en/refs.basic.other.php'>Other Basic Extensions</a></dd>
	<dd><a href='/manual/en/refs.remote.other.php'>Other Services</a></dd>
	<dd><a href='/manual/en/refs.search.php'>Search Engine Extensions</a></dd>
	<dd><a href='/manual/en/refs.utilspec.server.php'>Server Specific Extensions</a></dd>
	<dd><a href='/manual/en/refs.basic.session.php'>Session Extensions</a></dd>
	<dd><a href='/manual/en/refs.basic.text.php'>Text Processing</a></dd>
	<dd><a href='/manual/en/refs.basic.vartype.php'>Variable and Type Related Extensions</a></dd>
	<dd><a href='/manual/en/refs.webservice.php'>Web Services</a></dd>
	<dd><a href='/manual/en/refs.utilspec.windows.php'>Windows Only Extensions</a></dd>
	<dd><a href='/manual/en/refs.xml.php'>XML Manipulation</a></dd>
</dl>
<dl>
<dt>Keyboard Shortcuts</dt><dt>?</dt>
<dd>This help</dd>
<dt>j</dt>
<dd>Next menu item</dd>
<dt>k</dt>
<dd>Previous menu item</dd>
<dt>g p</dt>
<dd>Previous man page</dd>
<dt>g n</dt>
<dd>Next man page</dd>
<dt>G</dt>
<dd>Scroll to bottom</dd>
<dt>g g</dt>
<dd>Scroll to top</dd>
<dt>g h</dt>
<dd>Goto homepage</dd>
<dt>g s</dt>
<dd>Goto search<br>(current page)</dd>
<dt>/</dt>
<dd>Focus search box</dd>
</dl></div></nav>
<div id="goto">
    <div class="search">
         <div class="text"></div>
         <div class="results"><ul></ul></div>
   </div>
</div>

  <div id="breadcrumbs">
          <div class="prev">
        <a href="function.strripos.php">
          &laquo; strripos        </a>
      </div>
              <div class="next">
        <a href="function.strspn.php">
          strspn &raquo;
        </a>
      </div>
        <ul class="breadcrumbs-container">
            <li><a href='index.php'>PHP Manual</a></li>      <li><a href='funcref.php'>Function Reference</a></li>      <li><a href='refs.basic.text.php'>Text Processing</a></li>      <li><a href='book.strings.php'>Strings</a></li>      <li><a href='ref.strings.php'>String Functions</a></li>    </ul>
  </div>




<div id="layout">

    <aside class='layout-menu'>
        
        <ul class='parent-menu-list'>
                        <li>
                <a href="ref.strings.php">String Functions</a>
                
                                    <ul class='child-menu-list'>
                        
                                                <li class="">
                            <a href="function.addcslashes.php" title="addcslashes">addcslashes</a>
                        </li>
                                                <li class="">
                            <a href="function.addslashes.php" title="addslashes">addslashes</a>
                        </li>
                                                <li class="">
                            <a href="function.bin2hex.php" title="bin2hex">bin2hex</a>
                        </li>
                                                <li class="">
                            <a href="function.chop.php" title="chop">chop</a>
                        </li>
                                                <li class="">
                            <a href="function.chr.php" title="chr">chr</a>
                        </li>
                                                <li class="">
                            <a href="function.chunk-split.php" title="chunk_&#8203;split">chunk_&#8203;split</a>
                        </li>
                                                <li class="">
                            <a href="function.convert-cyr-string.php" title="convert_&#8203;cyr_&#8203;string">convert_&#8203;cyr_&#8203;string</a>
                        </li>
                                                <li class="">
                            <a href="function.convert-uudecode.php" title="convert_&#8203;uudecode">convert_&#8203;uudecode</a>
                        </li>
                                                <li class="">
                            <a href="function.convert-uuencode.php" title="convert_&#8203;uuencode">convert_&#8203;uuencode</a>
                        </li>
                                                <li class="">
                            <a href="function.count-chars.php" title="count_&#8203;chars">count_&#8203;chars</a>
                        </li>
                                                <li class="">
                            <a href="function.crc32.php" title="crc32">crc32</a>
                        </li>
                                                <li class="">
                            <a href="function.crypt.php" title="crypt">crypt</a>
                        </li>
                                                <li class="">
                            <a href="function.echo.php" title="echo">echo</a>
                        </li>
                                                <li class="">
                            <a href="function.explode.php" title="explode">explode</a>
                        </li>
                                                <li class="">
                            <a href="function.fprintf.php" title="fprintf">fprintf</a>
                        </li>
                                                <li class="">
                            <a href="function.get-html-translation-table.php" title="get_&#8203;html_&#8203;translation_&#8203;table">get_&#8203;html_&#8203;translation_&#8203;table</a>
                        </li>
                                                <li class="">
                            <a href="function.hebrev.php" title="hebrev">hebrev</a>
                        </li>
                                                <li class="">
                            <a href="function.hebrevc.php" title="hebrevc">hebrevc</a>
                        </li>
                                                <li class="">
                            <a href="function.hex2bin.php" title="hex2bin">hex2bin</a>
                        </li>
                                                <li class="">
                            <a href="function.html-entity-decode.php" title="html_&#8203;entity_&#8203;decode">html_&#8203;entity_&#8203;decode</a>
                        </li>
                                                <li class="">
                            <a href="function.htmlentities.php" title="htmlentities">htmlentities</a>
                        </li>
                                                <li class="">
                            <a href="function.htmlspecialchars-decode.php" title="htmlspecialchars_&#8203;decode">htmlspecialchars_&#8203;decode</a>
                        </li>
                                                <li class="">
                            <a href="function.htmlspecialchars.php" title="htmlspecialchars">htmlspecialchars</a>
                        </li>
                                                <li class="">
                            <a href="function.implode.php" title="implode">implode</a>
                        </li>
                                                <li class="">
                            <a href="function.join.php" title="join">join</a>
                        </li>
                                                <li class="">
                            <a href="function.lcfirst.php" title="lcfirst">lcfirst</a>
                        </li>
                                                <li class="">
                            <a href="function.levenshtein.php" title="levenshtein">levenshtein</a>
                        </li>
                                                <li class="">
                            <a href="function.localeconv.php" title="localeconv">localeconv</a>
                        </li>
                                                <li class="">
                            <a href="function.ltrim.php" title="ltrim">ltrim</a>
                        </li>
                                                <li class="">
                            <a href="function.md5-file.php" title="md5_&#8203;file">md5_&#8203;file</a>
                        </li>
                                                <li class="">
                            <a href="function.md5.php" title="md5">md5</a>
                        </li>
                                                <li class="">
                            <a href="function.metaphone.php" title="metaphone">metaphone</a>
                        </li>
                                                <li class="">
                            <a href="function.money-format.php" title="money_&#8203;format">money_&#8203;format</a>
                        </li>
                                                <li class="">
                            <a href="function.nl-langinfo.php" title="nl_&#8203;langinfo">nl_&#8203;langinfo</a>
                        </li>
                                                <li class="">
                            <a href="function.nl2br.php" title="nl2br">nl2br</a>
                        </li>
                                                <li class="">
                            <a href="function.number-format.php" title="number_&#8203;format">number_&#8203;format</a>
                        </li>
                                                <li class="">
                            <a href="function.ord.php" title="ord">ord</a>
                        </li>
                                                <li class="">
                            <a href="function.parse-str.php" title="parse_&#8203;str">parse_&#8203;str</a>
                        </li>
                                                <li class="">
                            <a href="function.print.php" title="print">print</a>
                        </li>
                                                <li class="">
                            <a href="function.printf.php" title="printf">printf</a>
                        </li>
                                                <li class="">
                            <a href="function.quoted-printable-decode.php" title="quoted_&#8203;printable_&#8203;decode">quoted_&#8203;printable_&#8203;decode</a>
                        </li>
                                                <li class="">
                            <a href="function.quoted-printable-encode.php" title="quoted_&#8203;printable_&#8203;encode">quoted_&#8203;printable_&#8203;encode</a>
                        </li>
                                                <li class="">
                            <a href="function.quotemeta.php" title="quotemeta">quotemeta</a>
                        </li>
                                                <li class="">
                            <a href="function.rtrim.php" title="rtrim">rtrim</a>
                        </li>
                                                <li class="">
                            <a href="function.setlocale.php" title="setlocale">setlocale</a>
                        </li>
                                                <li class="">
                            <a href="function.sha1-file.php" title="sha1_&#8203;file">sha1_&#8203;file</a>
                        </li>
                                                <li class="">
                            <a href="function.sha1.php" title="sha1">sha1</a>
                        </li>
                                                <li class="">
                            <a href="function.similar-text.php" title="similar_&#8203;text">similar_&#8203;text</a>
                        </li>
                                                <li class="">
                            <a href="function.soundex.php" title="soundex">soundex</a>
                        </li>
                                                <li class="">
                            <a href="function.sprintf.php" title="sprintf">sprintf</a>
                        </li>
                                                <li class="">
                            <a href="function.sscanf.php" title="sscanf">sscanf</a>
                        </li>
                                                <li class="">
                            <a href="function.str-getcsv.php" title="str_&#8203;getcsv">str_&#8203;getcsv</a>
                        </li>
                                                <li class="">
                            <a href="function.str-ireplace.php" title="str_&#8203;ireplace">str_&#8203;ireplace</a>
                        </li>
                                                <li class="">
                            <a href="function.str-pad.php" title="str_&#8203;pad">str_&#8203;pad</a>
                        </li>
                                                <li class="">
                            <a href="function.str-repeat.php" title="str_&#8203;repeat">str_&#8203;repeat</a>
                        </li>
                                                <li class="">
                            <a href="function.str-replace.php" title="str_&#8203;replace">str_&#8203;replace</a>
                        </li>
                                                <li class="">
                            <a href="function.str-rot13.php" title="str_&#8203;rot13">str_&#8203;rot13</a>
                        </li>
                                                <li class="">
                            <a href="function.str-shuffle.php" title="str_&#8203;shuffle">str_&#8203;shuffle</a>
                        </li>
                                                <li class="">
                            <a href="function.str-split.php" title="str_&#8203;split">str_&#8203;split</a>
                        </li>
                                                <li class="">
                            <a href="function.str-word-count.php" title="str_&#8203;word_&#8203;count">str_&#8203;word_&#8203;count</a>
                        </li>
                                                <li class="">
                            <a href="function.strcasecmp.php" title="strcasecmp">strcasecmp</a>
                        </li>
                                                <li class="">
                            <a href="function.strchr.php" title="strchr">strchr</a>
                        </li>
                                                <li class="">
                            <a href="function.strcmp.php" title="strcmp">strcmp</a>
                        </li>
                                                <li class="">
                            <a href="function.strcoll.php" title="strcoll">strcoll</a>
                        </li>
                                                <li class="">
                            <a href="function.strcspn.php" title="strcspn">strcspn</a>
                        </li>
                                                <li class="">
                            <a href="function.strip-tags.php" title="strip_&#8203;tags">strip_&#8203;tags</a>
                        </li>
                                                <li class="">
                            <a href="function.stripcslashes.php" title="stripcslashes">stripcslashes</a>
                        </li>
                                                <li class="">
                            <a href="function.stripos.php" title="stripos">stripos</a>
                        </li>
                                                <li class="">
                            <a href="function.stripslashes.php" title="stripslashes">stripslashes</a>
                        </li>
                                                <li class="">
                            <a href="function.stristr.php" title="stristr">stristr</a>
                        </li>
                                                <li class="">
                            <a href="function.strlen.php" title="strlen">strlen</a>
                        </li>
                                                <li class="">
                            <a href="function.strnatcasecmp.php" title="strnatcasecmp">strnatcasecmp</a>
                        </li>
                                                <li class="">
                            <a href="function.strnatcmp.php" title="strnatcmp">strnatcmp</a>
                        </li>
                                                <li class="">
                            <a href="function.strncasecmp.php" title="strncasecmp">strncasecmp</a>
                        </li>
                                                <li class="">
                            <a href="function.strncmp.php" title="strncmp">strncmp</a>
                        </li>
                                                <li class="">
                            <a href="function.strpbrk.php" title="strpbrk">strpbrk</a>
                        </li>
                                                <li class="">
                            <a href="function.strpos.php" title="strpos">strpos</a>
                        </li>
                                                <li class="">
                            <a href="function.strrchr.php" title="strrchr">strrchr</a>
                        </li>
                                                <li class="">
                            <a href="function.strrev.php" title="strrev">strrev</a>
                        </li>
                                                <li class="">
                            <a href="function.strripos.php" title="strripos">strripos</a>
                        </li>
                                                <li class="current">
                            <a href="function.strrpos.php" title="strrpos">strrpos</a>
                        </li>
                                                <li class="">
                            <a href="function.strspn.php" title="strspn">strspn</a>
                        </li>
                                                <li class="">
                            <a href="function.strstr.php" title="strstr">strstr</a>
                        </li>
                                                <li class="">
                            <a href="function.strtok.php" title="strtok">strtok</a>
                        </li>
                                                <li class="">
                            <a href="function.strtolower.php" title="strtolower">strtolower</a>
                        </li>
                                                <li class="">
                            <a href="function.strtoupper.php" title="strtoupper">strtoupper</a>
                        </li>
                                                <li class="">
                            <a href="function.strtr.php" title="strtr">strtr</a>
                        </li>
                                                <li class="">
                            <a href="function.substr-compare.php" title="substr_&#8203;compare">substr_&#8203;compare</a>
                        </li>
                                                <li class="">
                            <a href="function.substr-count.php" title="substr_&#8203;count">substr_&#8203;count</a>
                        </li>
                                                <li class="">
                            <a href="function.substr-replace.php" title="substr_&#8203;replace">substr_&#8203;replace</a>
                        </li>
                                                <li class="">
                            <a href="function.substr.php" title="substr">substr</a>
                        </li>
                                                <li class="">
                            <a href="function.trim.php" title="trim">trim</a>
                        </li>
                                                <li class="">
                            <a href="function.ucfirst.php" title="ucfirst">ucfirst</a>
                        </li>
                                                <li class="">
                            <a href="function.ucwords.php" title="ucwords">ucwords</a>
                        </li>
                                                <li class="">
                            <a href="function.vfprintf.php" title="vfprintf">vfprintf</a>
                        </li>
                                                <li class="">
                            <a href="function.vprintf.php" title="vprintf">vprintf</a>
                        </li>
                                                <li class="">
                            <a href="function.vsprintf.php" title="vsprintf">vsprintf</a>
                        </li>
                                                <li class="">
                            <a href="function.wordwrap.php" title="wordwrap">wordwrap</a>
                        </li>
                                                
                    </ul>
                                
            </li>
                    </ul>
    </aside>

<section id="layout-content">
  <div class="page-tools">
    <div class="change-language">
      <form action="/manual/change.php" method="get" id="changelang" name="changelang">
        <fieldset>
          <label for="changelang-langs">Change language:</label>
          <select onchange="document.changelang.submit()" name="page" id="changelang-langs">
            <option value='en/function.strrpos.php' selected="selected">English</option>
            <option value='pt_BR/function.strrpos.php'>Brazilian Portuguese</option>
            <option value='zh/function.strrpos.php'>Chinese (Simplified)</option>
            <option value='fr/function.strrpos.php'>French</option>
            <option value='de/function.strrpos.php'>German</option>
            <option value='it/function.strrpos.php'>Italian</option>
            <option value='ja/function.strrpos.php'>Japanese</option>
            <option value='ro/function.strrpos.php'>Romanian</option>
            <option value='ru/function.strrpos.php'>Russian</option>
            <option value='es/function.strrpos.php'>Spanish</option>
            <option value='tr/function.strrpos.php'>Turkish</option>
            <option value="help-translate.php">Other</option>
          </select>
        </fieldset>
      </form>
    </div>
    <div class="edit-bug">
      <a href="https://edit.php.net/?project=PHP&amp;perm=en/function.strrpos.php">Edit</a>
      <a href="https://bugs.php.net/report.php?bug_type=Documentation+problem&amp;manpage=function.strrpos">Report a Bug</a>
    </div>
  </div><div id="function.strrpos" class="refentry">
 <div class="refnamediv">
  <h1 class="refname">strrpos</h1>
  <p class="verinfo">(PHP 4, PHP 5)</p><p class="refpurpose"><span class="refname">strrpos</span> &mdash; <span class="dc-title">Find the position of the last occurrence of a substring in a string</span></p>

 </div>
 
 <div class="refsect1 description" id="refsect1-function.strrpos-description">
  <h3 class="title">Description</h3>
  <div class="methodsynopsis dc-description">
   <span class="type">int</span> <span class="methodname"><strong>strrpos</strong></span>
    ( <span class="methodparam"><span class="type">string</span> <code class="parameter">haystack</code></span>
   , <span class="methodparam"><span class="type">string</span> <code class="parameter">needle</code></span>
   [, <span class="methodparam"><span class="type">int</span> <code class="parameter">offset</code><span class="initializer"> = 0</span></span>
  ] )</div>

  <p class="para rdfs-comment">
   Find the numeric position of the last occurrence of
   <em><code class="parameter">needle</code></em> in the <em><code class="parameter">haystack</code></em> string.
  </p>
 </div>


 <div class="refsect1 parameters" id="refsect1-function.strrpos-parameters">
  <h3 class="title">Parameters</h3>
  <p class="para">
   <dl>

    
     <dt>
<em><code class="parameter">haystack</code></em></dt>

     <dd>

      <p class="para">
       The string to search in.
      </p>
     </dd>

    
    
     <dt>
<em><code class="parameter">needle</code></em></dt>

     <dd>

      <p class="para">
       If <em><code class="parameter">needle</code></em> is not a string, it is converted
       to an integer and applied as the ordinal value of a character.
      </p>
     </dd>

    
    
     <dt>
<em><code class="parameter">offset</code></em></dt>

     <dd>

      <p class="para">
       If specified, search will start this number of characters counted from the
       beginning of the string. If the value is negative, search will instead start
       from that many characters from the end of the string, searching backwards.
      </p>
     </dd>

    
   </dl>

  </p>
 </div>


 <div class="refsect1 returnvalues" id="refsect1-function.strrpos-returnvalues">
  <h3 class="title">Return Values</h3>
  <p class="para">
   Returns the position where the needle exists relative to the beginnning of
   the <em><code class="parameter">haystack</code></em> string (independent of search direction
   or offset).
   Also note that string positions start at 0, and not 1.
  </p>
  <p class="para">
   Returns <strong><code>FALSE</code></strong> if the needle was not found.
  </p>
  <div class="warning"><strong class="warning">Warning</strong><p class="simpara">This function may
return Boolean <strong><code>FALSE</code></strong>, but may also return a non-Boolean value which
evaluates to <strong><code>FALSE</code></strong>. Please read the section on <a href="language.types.boolean.php" class="link">Booleans</a> for more
information. Use <a href="language.operators.comparison.php" class="link">the ===
operator</a> for testing the return value of this
function.</p></div>
 </div>

 
 <div class="refsect1 changelog" id="refsect1-function.strrpos-changelog">
  <h3 class="title">Changelog</h3>
  <p class="para">
   <table class="doctable informaltable">
    
     <thead>
      <tr>
       <th>Version</th>
       <th>Description</th>
      </tr>

     </thead>

     <tbody class="tbody">
      <tr>
       <td>5.0.0</td>
       <td>
        The <em><code class="parameter">needle</code></em> may now be a string of more than one
        character.
       </td>
      </tr>

      <tr>
       <td>5.0.0</td>
       <td>
        The <em><code class="parameter">offset</code></em> parameter was introduced.
       </td>
      </tr>

     </tbody>
    
   </table>

  </p>
 </div>

 
 <div class="refsect1 examples" id="refsect1-function.strrpos-examples">
  <h3 class="title">Examples</h3>
  <p class="para">
   <div class="example" id="example-4912">
    <p><strong>Example #1 Checking if a needle is in the haystack</strong></p>
    <div class="example-contents"><p>
     It is easy to mistake the return values for &quot;character found at
     position 0&quot; and &quot;character not found&quot;.  Here&#039;s how to detect
     the difference:
    </p></div>
    <div class="example-contents">
<div class="phpcode"><code><span style="color: #000000">
<span style="color: #0000BB">&lt;?php<br /><br />pos&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #0000BB">strrpos</span><span style="color: #007700">(</span><span style="color: #0000BB">mystring</span><span style="color: #007700">,&nbsp;</span><span style="color: #DD0000">"b"</span><span style="color: #007700">);<br />if&nbsp;(</span><span style="color: #0000BB">pos&nbsp;</span><span style="color: #007700">===&nbsp;</span><span style="color: #0000BB">false</span><span style="color: #007700">)&nbsp;{&nbsp;</span><span style="color: #FF8000">//&nbsp;note:&nbsp;three&nbsp;equal&nbsp;signs<br />&nbsp;&nbsp;&nbsp;&nbsp;//&nbsp;not&nbsp;found...<br /></span><span style="color: #007700">}<br /><br /></span><span style="color: #0000BB">?&gt;</span>
</span>
</code></div>
    </div>

   </div>
  </p>
  <p class="para">
   <div class="example" id="example-4913">
    <p><strong>Example #2 Searching with offsets</strong></p>
    <div class="example-contents">
<div class="phpcode"><code><span style="color: #000000">
<span style="color: #0000BB">&lt;?php<br />foo&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #DD0000">"0123456789a123456789b123456789c"</span><span style="color: #007700">;<br /><br /></span><span style="color: #0000BB">var_dump</span><span style="color: #007700">(</span><span style="color: #0000BB">strrpos</span><span style="color: #007700">(</span><span style="color: #0000BB">foo</span><span style="color: #007700">,&nbsp;</span><span style="color: #DD0000">'7'</span><span style="color: #007700">,&nbsp;-</span><span style="color: #0000BB">5</span><span style="color: #007700">));&nbsp;&nbsp;</span><span style="color: #FF8000">//&nbsp;Starts&nbsp;looking&nbsp;backwards&nbsp;five&nbsp;positions<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;//&nbsp;from&nbsp;the&nbsp;end.&nbsp;Result:&nbsp;int(17)<br /><br /></span><span style="color: #0000BB">var_dump</span><span style="color: #007700">(</span><span style="color: #0000BB">strrpos</span><span style="color: #007700">(</span><span style="color: #0000BB">foo</span><span style="color: #007700">,&nbsp;</span><span style="color: #DD0000">'7'</span><span style="color: #007700">,&nbsp;</span><span style="color: #0000BB">20</span><span style="color: #007700">));&nbsp;&nbsp;</span><span style="color: #FF8000">//&nbsp;Starts&nbsp;searching&nbsp;20&nbsp;positions&nbsp;into&nbsp;the<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;//&nbsp;string.&nbsp;Result:&nbsp;int(27)<br /><br /></span><span style="color: #0000BB">var_dump</span><span style="color: #007700">(</span><span style="color: #0000BB">strrpos</span><span style="color: #007700">(</span><span style="color: #0000BB">foo</span><span style="color: #007700">,&nbsp;</span><span style="color: #DD0000">'7'</span><span style="color: #007700">,&nbsp;</span><span style="color: #0000BB">28</span><span style="color: #007700">));&nbsp;&nbsp;</span><span style="color: #FF8000">//&nbsp;Result:&nbsp;bool(false)<br /></span><span style="color: #0000BB">?&gt;</span>
</span>
</code></div>
    </div>

   </div>
  </p>
 </div>


 <div class="refsect1 seealso" id="refsect1-function.strrpos-seealso">
  <h3 class="title">See Also</h3>
  <p class="para">
   <ul class="simplelist">
    <li class="member"><span class="function"><a href="function.strpos.php" class="function" rel="rdfs-seeAlso">strpos()</a> - Find the position of the first occurrence of a substring in a string</span></li>
    <li class="member"><span class="function"><a href="function.stripos.php" class="function" rel="rdfs-seeAlso">stripos()</a> - Find the position of the first occurrence of a case-insensitive substring in a string</span></li>
    <li class="member"><span class="function"><a href="function.strripos.php" class="function" rel="rdfs-seeAlso">strripos()</a> - Find the position of the last occurrence of a case-insensitive substring in a string</span></li>
    <li class="member"><span class="function"><a href="function.strrchr.php" class="function" rel="rdfs-seeAlso">strrchr()</a> - Find the last occurrence of a character in a string</span></li>
    <li class="member"><span class="function"><a href="function.substr.php" class="function" rel="rdfs-seeAlso">substr()</a> - Return part of a string</span></li>
   </ul>
  </p>
 </div>


</div>
<section id="usernotes">
 <div class="head">
  <span class="action"><a href="/manual/add-note.php?sect=function.strrpos&amp;redirect=http://de1.php.net/manual/en/function.strrpos.php"><img src='/images/notes-add@2x.png' alt='add a note' width='12' height='12' /> <small>add a note</small></a></span>
  <h3 class="title">User Contributed Notes <span class="count">28 notes</span></h3>
 </div><div id="allnotes">
  <div class="note" id="109282">  <div class="votes">
    <div id="Vu109282">
    <a href="/manual/vote-note.php?id=109282&amp;page=function.strrpos&amp;vote=up" title="Vote up!" class="usernotes-voteu">up</a>
    </div>
    <div id="Vd109282">
    <a href="/manual/vote-note.php?id=109282&amp;page=function.strrpos&amp;vote=down" title="Vote down!" class="usernotes-voted">down</a>
    </div>
    <div class="tally" id="V109282" title="100% like this...">
    4
    </div>
  </div>
  <a href="#109282" class="name">
  <strong class="user"><em>arlaud pierre</em></strong></a><a class="genanchor" href="#109282"> &para;</a><div class="date" title="2012-07-02 01:51"><strong>1 year ago</strong></div>
  <div class="text" id="Hcom109282">
<div class="phpcode"><code><span class="html">
This seems to behave like the exact equivalent to the PHP 5 offset parameter for a PHP 4 version.<br />
<br />
<span class="default">&lt;?php<br />
&nbsp;</span><span class="keyword">function </span><span class="default">strrpos_handmade</span><span class="keyword">(</span><span class="default">haystack</span><span class="keyword">, </span><span class="default">needle</span><span class="keyword">, </span><span class="default">offset </span><span class="keyword">= </span><span class="default">0</span><span class="keyword">){<br />
<br />
&nbsp; if(</span><span class="default">offset </span><span class="keyword">=== </span><span class="default">0</span><span class="keyword">) return </span><span class="default">strrpos</span><span class="keyword">(</span><span class="default">haystack</span><span class="keyword">, </span><span class="default">needle</span><span class="keyword">);<br />
&nbsp; <br />
&nbsp; </span><span class="default">length </span><span class="keyword">= </span><span class="default">strlen</span><span class="keyword">(</span><span class="default">haystack</span><span class="keyword">);<br />
&nbsp; </span><span class="default">size </span><span class="keyword">= </span><span class="default">strlen</span><span class="keyword">(</span><span class="default">needle</span><span class="keyword">);<br />
<br />
&nbsp; if(</span><span class="default">offset </span><span class="keyword">&lt; </span><span class="default">0</span><span class="keyword">) {<br />
&nbsp;&nbsp;&nbsp; </span><span class="default">virtual_cut </span><span class="keyword">= </span><span class="default">length</span><span class="keyword">+</span><span class="default">offset</span><span class="keyword">;<br />
&nbsp;&nbsp;&nbsp; </span><span class="default">haystack </span><span class="keyword">= </span><span class="default">substr</span><span class="keyword">(</span><span class="default">haystack</span><span class="keyword">, </span><span class="default">0</span><span class="keyword">, </span><span class="default">virtual_cut</span><span class="keyword">+</span><span class="default">size</span><span class="keyword">);<br />
&nbsp;&nbsp;&nbsp; </span><span class="default">ret </span><span class="keyword">= </span><span class="default">strrpos</span><span class="keyword">(</span><span class="default">haystack</span><span class="keyword">, </span><span class="default">needle</span><span class="keyword">);<br />
&nbsp;&nbsp;&nbsp; return </span><span class="default">ret </span><span class="keyword">&gt; </span><span class="default">virtual_cut </span><span class="keyword">? </span><span class="default">false </span><span class="keyword">: </span><span class="default">ret</span><span class="keyword">;<br />
&nbsp; } else {<br />
&nbsp;&nbsp;&nbsp; </span><span class="default">haystack </span><span class="keyword">= </span><span class="default">substr</span><span class="keyword">(</span><span class="default">haystack</span><span class="keyword">, </span><span class="default">offset</span><span class="keyword">);<br />
&nbsp;&nbsp;&nbsp; </span><span class="default">ret </span><span class="keyword">= </span><span class="default">strrpos</span><span class="keyword">(</span><span class="default">haystack</span><span class="keyword">, </span><span class="default">needle</span><span class="keyword">);<br />
&nbsp;&nbsp;&nbsp; return </span><span class="default">ret </span><span class="keyword">=== </span><span class="default">false </span><span class="keyword">? </span><span class="default">ret </span><span class="keyword">: </span><span class="default">ret</span><span class="keyword">+</span><span class="default">offset</span><span class="keyword">;<br />
&nbsp; }<br />
<br />
}<br />
</span><span class="default">?&gt;</span>
</span>
</code></div>
  </div>
 </div>
  <div class="note" id="76447">  <div class="votes">
    <div id="Vu76447">
    <a href="/manual/vote-note.php?id=76447&amp;page=function.strrpos&amp;vote=up" title="Vote up!" class="usernotes-voteu">up</a>
    </div>
    <div id="Vd76447">
    <a href="/manual/vote-note.php?id=76447&amp;page=function.strrpos&amp;vote=down" title="Vote down!" class="usernotes-voted">down</a>
    </div>
    <div class="tally" id="V76447" title="83% like this...">
    4
    </div>
  </div>
  <a href="#76447" class="name">
  <strong class="user"><em>brian at enchanter dot net</em></strong></a><a class="genanchor" href="#76447"> &para;</a><div class="date" title="2007-07-16 07:47"><strong>6 years ago</strong></div>
  <div class="text" id="Hcom76447">
<div class="phpcode"><code><span class="html">
The documentation for 'offset' is misleading.<br />
<br />
It says, "offset may be specified to begin searching an arbitrary number of characters into the string. Negative values will stop searching at an arbitrary point prior to the end of the string."<br />
<br />
This is confusing if you think of strrpos as starting at the end of the string and working backwards.<br />
<br />
A better way to think of offset is:<br />
<br />
- If offset is positive, then strrpos only operates on the part of the string from offset to the end. This will usually have the same results as not specifying an offset, unless the only occurences of needle are before offset (in which case specifying the offset won't find the needle).<br />
<br />
- If offset is negative, then strrpos only operates on that many characters at the end of the string. If the needle is farther away from the end of the string, it won't be found.<br />
<br />
If, for example, you want to find the last space in a string before the 50th character, you'll need to do something like this:<br />
<br />
strrpos(text, " ", -(strlen(text) - 50));<br />
<br />
If instead you used strrpos(text, " ", 50), then you would find the last space between the 50th character and the end of the string, which may not have been what you were intending.</span>
</code></div>
  </div>
 </div>
  <div class="note" id="70925">  <div class="votes">
    <div id="Vu70925">
    <a href="/manual/vote-note.php?id=70925&amp;page=function.strrpos&amp;vote=up" title="Vote up!" class="usernotes-voteu">up</a>
    </div>
    <div id="Vd70925">
    <a href="/manual/vote-note.php?id=70925&amp;page=function.strrpos&amp;vote=down" title="Vote down!" class="usernotes-voted">down</a>
    </div>
    <div class="tally" id="V70925" title="80% like this...">
    3
    </div>
  </div>
  <a href="#70925" class="name">
  <strong class="user"><em>dmitry dot polushkin at gmail dot com</em></strong></a><a class="genanchor" href="#70925"> &para;</a><div class="date" title="2006-11-03 10:05"><strong>7 years ago</strong></div>
  <div class="text" id="Hcom70925">
<div class="phpcode"><code><span class="html">
Returns the filename's string extension, else if no extension found returns false.<br />
Example: filename_extension('some_file.mp3'); // mp3<br />
Faster than the pathinfo() analogue in two times.<br />
<span class="default">&lt;?php<br />
</span><span class="keyword">function </span><span class="default">filename_extension</span><span class="keyword">(</span><span class="default">filename</span><span class="keyword">) {<br />
&nbsp;&nbsp;&nbsp; </span><span class="default">pos </span><span class="keyword">= </span><span class="default">strrpos</span><span class="keyword">(</span><span class="default">filename</span><span class="keyword">, </span><span class="string">'.'</span><span class="keyword">);<br />
&nbsp;&nbsp;&nbsp; if(</span><span class="default">pos</span><span class="keyword">===</span><span class="default">false</span><span class="keyword">) {<br />
&nbsp;&nbsp; &nbsp; &nbsp;&nbsp; return </span><span class="default">false</span><span class="keyword">;<br />
&nbsp;&nbsp;&nbsp; } else {<br />
&nbsp;&nbsp; &nbsp; &nbsp;&nbsp; return </span><span class="default">substr</span><span class="keyword">(</span><span class="default">filename</span><span class="keyword">, </span><span class="default">pos</span><span class="keyword">+</span><span class="default">1</span><span class="keyword">);<br />
&nbsp;&nbsp;&nbsp; }<br />
}<br />
</span><span class="default">?&gt;</span>
</span>
</code></div>
  </div>
 </div>
  <div class="note" id="48886">  <div class="votes">
    <div id="Vu48886">
    <a href="/manual/vote-note.php?id=48886&amp;page=function.strrpos&amp;vote=up" title="Vote up!" class="usernotes-voteu">up</a>
    </div>
    <div id="Vd48886">
    <a href="/manual/vote-note.php?id=48886&amp;page=function.strrpos&amp;vote=down" title="Vote down!" class="usernotes-voted">down</a>
    </div>
    <div class="tally" id="V48886" title="80% like this...">
    3
    </div>
  </div>
  <a href="#48886" class="name">
  <strong class="user"><em>escii at hotmail dot com ( Brendan )</em></strong></a><a class="genanchor" href="#48886"> &para;</a><div class="date" title="2005-01-10 07:12"><strong>9 years ago</strong></div>
  <div class="text" id="Hcom48886">
<div class="phpcode"><code><span class="html">
I was immediatley pissed when i found the behaviour of strrpos ( shouldnt it be called charrpos ?) the way it is, so i made my own implement to search for strings.<br />
<br />
<span class="default">&lt;?<br />
</span><span class="keyword">function </span><span class="default">proper_strrpos</span><span class="keyword">(</span><span class="default">haystack</span><span class="keyword">,</span><span class="default">needle</span><span class="keyword">){<br />
&nbsp;&nbsp; &nbsp; &nbsp;&nbsp; while(</span><span class="default">ret </span><span class="keyword">= </span><span class="default">strrpos</span><span class="keyword">(</span><span class="default">haystack</span><span class="keyword">,</span><span class="default">needle</span><span class="keyword">))<br />
&nbsp;&nbsp; &nbsp; &nbsp;&nbsp; {&nbsp; &nbsp; &nbsp;&nbsp; <br />
&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; if(</span><span class="default">strncmp</span><span class="keyword">(</span><span class="default">substr</span><span class="keyword">(</span><span class="default">haystack</span><span class="keyword">,</span><span class="default">ret</span><span class="keyword">,</span><span class="default">strlen</span><span class="keyword">(</span><span class="default">needle</span><span class="keyword">)),<br />
&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; </span><span class="default">needle</span><span class="keyword">,</span><span class="default">strlen</span><span class="keyword">(</span><span class="default">needle</span><span class="keyword">)) == </span><span class="default">0 </span><span class="keyword">)<br />
&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; return </span><span class="default">ret</span><span class="keyword">;<br />
&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; </span><span class="default">haystack </span><span class="keyword">= </span><span class="default">substr</span><span class="keyword">(</span><span class="default">haystack</span><span class="keyword">,</span><span class="default">0</span><span class="keyword">,</span><span class="default">ret </span><span class="keyword">-</span><span class="default">1 </span><span class="keyword">);<br />
&nbsp;&nbsp; &nbsp; &nbsp;&nbsp; }<br />
&nbsp;&nbsp; &nbsp; &nbsp;&nbsp; return </span><span class="default">ret</span><span class="keyword">;<br />
}<br />
</span><span class="default">?&gt;</span>
</span>
</code></div>
  </div>
 </div>
  <div class="note" id="78499">  <div class="votes">
    <div id="Vu78499">
    <a href="/manual/vote-note.php?id=78499&amp;page=function.strrpos&amp;vote=up" title="Vote up!" class="usernotes-voteu">up</a>
    </div>
    <div id="Vd78499">
    <a href="/manual/vote-note.php?id=78499&amp;page=function.strrpos&amp;vote=down" title="Vote down!" class="usernotes-voted">down</a>
    </div>
    <div class="tally" id="V78499" title="71% like this...">
    3
    </div>
  </div>
  <a href="#78499" class="name">
  <strong class="user"><em>Daniel Brinca</em></strong></a><a class="genanchor" href="#78499"> &para;</a><div class="date" title="2007-10-15 05:41"><strong>6 years ago</strong></div>
  <div class="text" id="Hcom78499">
<div class="phpcode"><code><span class="html">
Here is a simple function to find the position of the next occurrence of needle in haystack, but searching backwards&nbsp; (lastIndexOf type function):<br />
<br />
//search backwards for needle in haystack, and return its position<br />
function rstrpos (haystack, needle, offset){<br />
&nbsp;&nbsp;&nbsp; size = strlen (haystack);<br />
&nbsp;&nbsp;&nbsp; pos = strpos (strrev(haystack), needle, size - offset);<br />
&nbsp;&nbsp;&nbsp; <br />
&nbsp;&nbsp;&nbsp; if (pos === false)<br />
&nbsp;&nbsp; &nbsp; &nbsp;&nbsp; return false;<br />
&nbsp;&nbsp;&nbsp; <br />
&nbsp;&nbsp;&nbsp; return size - pos;<br />
}<br />
<br />
Note: supports full strings as needle</span>
</code></div>
  </div>
 </div>
  <div class="note" id="67559">  <div class="votes">
    <div id="Vu67559">
    <a href="/manual/vote-note.php?id=67559&amp;page=function.strrpos&amp;vote=up" title="Vote up!" class="usernotes-voteu">up</a>
    </div>
    <div id="Vd67559">
    <a href="/manual/vote-note.php?id=67559&amp;page=function.strrpos&amp;vote=down" title="Vote down!" class="usernotes-voted">down</a>
    </div>
    <div class="tally" id="V67559" title="100% like this...">
    2
    </div>
  </div>
  <a href="#67559" class="name">
  <strong class="user"><em>kavih7 at yahoo dot com</em></strong></a><a class="genanchor" href="#67559"> &para;</a><div class="date" title="2006-06-08 12:53"><strong>7 years ago</strong></div>
  <div class="text" id="Hcom67559">
<div class="phpcode"><code><span class="html">
<span class="default">&lt;?php
<br />
</span><span class="comment">###################################################
<br />
#
<br />
# DESCRIPTION:
<br />
# This function returns the last occurance of a string,
<br />
# rather than the last occurance of a single character like
<br />
# strrpos does. It also supports an offset from where to
<br />
# start the searching in the haystack string.
<br />
#
<br />
# ARGS:
<br />
# haystack (required) -- the string to search upon
<br />
# needle (required) -- the string you are looking for
<br />
# offset (optional) -- the offset to start from
<br />
#
<br />
# RETURN VALS:
<br />
# returns integer on success
<br />
# returns false on failure to find the string at all
<br />
#
<br />
###################################################
<br />

<br />
</span><span class="keyword">function </span><span class="default">strrpos_string</span><span class="keyword">(</span><span class="default">haystack</span><span class="keyword">, </span><span class="default">needle</span><span class="keyword">, </span><span class="default">offset </span><span class="keyword">= </span><span class="default">0</span><span class="keyword">)
<br />
{
<br />
&nbsp;&nbsp;&nbsp; if(</span><span class="default">trim</span><span class="keyword">(</span><span class="default">haystack</span><span class="keyword">) != </span><span class="string">"" </span><span class="keyword">&amp;&amp; </span><span class="default">trim</span><span class="keyword">(</span><span class="default">needle</span><span class="keyword">) != </span><span class="string">"" </span><span class="keyword">&amp;&amp; </span><span class="default">offset </span><span class="keyword">&lt;= </span><span class="default">strlen</span><span class="keyword">(</span><span class="default">haystack</span><span class="keyword">))
<br />
&nbsp;&nbsp;&nbsp; {
<br />
&nbsp;&nbsp; &nbsp; &nbsp;&nbsp; </span><span class="default">last_pos </span><span class="keyword">= </span><span class="default">offset</span><span class="keyword">;
<br />
&nbsp;&nbsp; &nbsp; &nbsp;&nbsp; </span><span class="default">found </span><span class="keyword">= </span><span class="default">false</span><span class="keyword">;
<br />
&nbsp;&nbsp; &nbsp; &nbsp;&nbsp; while((</span><span class="default">curr_pos </span><span class="keyword">= </span><span class="default">strpos</span><span class="keyword">(</span><span class="default">haystack</span><span class="keyword">, </span><span class="default">needle</span><span class="keyword">, </span><span class="default">last_pos</span><span class="keyword">)) !== </span><span class="default">false</span><span class="keyword">)
<br />
&nbsp;&nbsp; &nbsp; &nbsp;&nbsp; {
<br />
&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; </span><span class="default">found </span><span class="keyword">= </span><span class="default">true</span><span class="keyword">;
<br />
&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; </span><span class="default">last_pos </span><span class="keyword">= </span><span class="default">curr_pos </span><span class="keyword">+ </span><span class="default">1</span><span class="keyword">;
<br />
&nbsp;&nbsp; &nbsp; &nbsp;&nbsp; }
<br />
&nbsp;&nbsp; &nbsp; &nbsp;&nbsp; if(</span><span class="default">found</span><span class="keyword">)
<br />
&nbsp;&nbsp; &nbsp; &nbsp;&nbsp; {
<br />
&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; return </span><span class="default">last_pos </span><span class="keyword">- </span><span class="default">1</span><span class="keyword">;
<br />
&nbsp;&nbsp; &nbsp; &nbsp;&nbsp; }
<br />
&nbsp;&nbsp; &nbsp; &nbsp;&nbsp; else
<br />
&nbsp;&nbsp; &nbsp; &nbsp;&nbsp; {
<br />
&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; return </span><span class="default">false</span><span class="keyword">;
<br />
&nbsp;&nbsp; &nbsp; &nbsp;&nbsp; }
<br />
&nbsp;&nbsp;&nbsp; }
<br />
&nbsp;&nbsp;&nbsp; else 
<br />
&nbsp;&nbsp;&nbsp; {
<br />
&nbsp;&nbsp; &nbsp; &nbsp;&nbsp; return </span><span class="default">false</span><span class="keyword">;
<br />
&nbsp;&nbsp;&nbsp; }
<br />
}
<br />
</span><span class="default">?&gt;</span>
</span>
</code></div>
  </div>
 </div>
  <div class="note" id="27634">  <div class="votes">
    <div id="Vu27634">
    <a href="/manual/vote-note.php?id=27634&amp;page=function.strrpos&amp;vote=up" title="Vote up!" class="usernotes-voteu">up</a>
    </div>
    <div id="Vd27634">
    <a href="/manual/vote-note.php?id=27634&amp;page=function.strrpos&amp;vote=down" title="Vote down!" class="usernotes-voted">down</a>
    </div>
    <div class="tally" id="V27634" title="100% like this...">
    2
    </div>
  </div>
  <a href="#27634" class="name">
  <strong class="user"><em>su.noseelg@naes, only backwards</em></strong></a><a class="genanchor" href="#27634"> &para;</a><div class="date" title="2002-12-13 10:39"><strong>11 years ago</strong></div>
  <div class="text" id="Hcom27634">
<div class="phpcode"><code><span class="html">
Maybe I'm the only one who's bothered by it, but it really bugs me when the last line in a paragraph is a single word. Here's an example to explain what I don't like:
<br />

<br />
The quick brown fox jumps over the lazy
<br />
dog.
<br />

<br />
So that's why I wrote this function. In any paragraph that contains more than 1 space (i.e., more than two words), it will replace the last space with '&amp;nbsp;'.
<br />

<br />
<span class="default">&lt;?php
<br />
</span><span class="keyword">function </span><span class="default">no_orphans</span><span class="keyword">(</span><span class="default">TheParagraph</span><span class="keyword">) {
<br />
&nbsp;&nbsp;&nbsp; if (</span><span class="default">substr_count</span><span class="keyword">(</span><span class="default">TheParagraph</span><span class="keyword">,</span><span class="string">" "</span><span class="keyword">) &gt; </span><span class="default">1</span><span class="keyword">) {
<br />
&nbsp;&nbsp;&nbsp; </span><span class="default">lastspace </span><span class="keyword">= </span><span class="default">strrpos</span><span class="keyword">(</span><span class="default">TheParagraph</span><span class="keyword">,</span><span class="string">" "</span><span class="keyword">);
<br />
&nbsp;&nbsp;&nbsp; </span><span class="default">TheParagraph </span><span class="keyword">= </span><span class="default">substr_replace</span><span class="keyword">(</span><span class="default">TheParagraph</span><span class="keyword">,</span><span class="string">"&amp;nbsp;"</span><span class="keyword">,</span><span class="default">lastspace</span><span class="keyword">,</span><span class="default">1</span><span class="keyword">);
<br />
&nbsp;&nbsp;&nbsp; }
<br />
return </span><span class="default">TheParagraph</span><span class="keyword">;
<br />
}
<br />
</span><span class="default">?&gt;
<br />
</span>
<br />
So, it would change "The quick brown fox jumps over the lazy dog." to "The quick brown fox jumps over the lazy&amp;nbsp;dog." That way, the last two words will always stay together.</span>
</code></div>
  </div>
 </div>
  <div class="note" id="65569">  <div class="votes">
    <div id="Vu65569">
    <a href="/manual/vote-note.php?id=65569&amp;page=function.strrpos&amp;vote=up" title="Vote up!" class="usernotes-voteu">up</a>
    </div>
    <div id="Vd65569">
    <a href="/manual/vote-note.php?id=65569&amp;page=function.strrpos&amp;vote=down" title="Vote down!" class="usernotes-voted">down</a>
    </div>
    <div class="tally" id="V65569" title="100% like this...">
    1
    </div>
  </div>
  <a href="#65569" class="name">
  <strong class="user"><em>shimon at schoolportal dot co dot il</em></strong></a><a class="genanchor" href="#65569"> &para;</a><div class="date" title="2006-05-03 11:31"><strong>7 years ago</strong></div>
  <div class="text" id="Hcom65569">
<div class="phpcode"><code><span class="html">
In strrstr function in php 4 there is also no offset.<br />
<span class="default">&lt;?<br />
</span><span class="comment">// by Shimon Doodkin<br />
</span><span class="keyword">function </span><span class="default">chrrpos</span><span class="keyword">(</span><span class="default">haystack</span><span class="keyword">, </span><span class="default">needle</span><span class="keyword">, </span><span class="default">offset</span><span class="keyword">=</span><span class="default">false</span><span class="keyword">)<br />
{<br />
&nbsp;</span><span class="default">needle</span><span class="keyword">=</span><span class="default">needle</span><span class="keyword">[</span><span class="default">0</span><span class="keyword">];<br />
&nbsp;</span><span class="default">l</span><span class="keyword">=</span><span class="default">strlen</span><span class="keyword">(</span><span class="default">haystack</span><span class="keyword">);<br />
&nbsp;if(</span><span class="default">l</span><span class="keyword">==</span><span class="default">0</span><span class="keyword">)&nbsp; return </span><span class="default">false</span><span class="keyword">;<br />
&nbsp;if(</span><span class="default">offset</span><span class="keyword">===</span><span class="default">false</span><span class="keyword">)&nbsp; </span><span class="default">offset</span><span class="keyword">=</span><span class="default">l</span><span class="keyword">-</span><span class="default">1</span><span class="keyword">;<br />
&nbsp;else<br />
&nbsp;{<br />
&nbsp; if(</span><span class="default">offset</span><span class="keyword">&gt;</span><span class="default">l</span><span class="keyword">) </span><span class="default">offset</span><span class="keyword">=</span><span class="default">l</span><span class="keyword">-</span><span class="default">1</span><span class="keyword">;<br />
&nbsp; if(</span><span class="default">offset</span><span class="keyword">&lt;</span><span class="default">0</span><span class="keyword">) return </span><span class="default">false</span><span class="keyword">;<br />
&nbsp;}<br />
&nbsp;for(;</span><span class="default">offset</span><span class="keyword">&gt;</span><span class="default">0</span><span class="keyword">;</span><span class="default">offset</span><span class="keyword">--)<br />
&nbsp; if(</span><span class="default">haystack</span><span class="keyword">[</span><span class="default">offset</span><span class="keyword">]==</span><span class="default">needle</span><span class="keyword">)<br />
&nbsp;&nbsp; return </span><span class="default">offset</span><span class="keyword">;<br />
&nbsp;return </span><span class="default">false</span><span class="keyword">;<br />
}<br />
</span><span class="default">?&gt;</span>
</span>
</code></div>
  </div>
 </div>
  <div class="note" id="36548">  <div class="votes">
    <div id="Vu36548">
    <a href="/manual/vote-note.php?id=36548&amp;page=function.strrpos&amp;vote=up" title="Vote up!" class="usernotes-voteu">up</a>
    </div>
    <div id="Vd36548">
    <a href="/manual/vote-note.php?id=36548&amp;page=function.strrpos&amp;vote=down" title="Vote down!" class="usernotes-voted">down</a>
    </div>
    <div class="tally" id="V36548" title="100% like this...">
    1
    </div>
  </div>
  <a href="#36548" class="name">
  <strong class="user"><em>ZaraWebFX</em></strong></a><a class="genanchor" href="#36548"> &para;</a><div class="date" title="2003-10-14 11:06"><strong>10 years ago</strong></div>
  <div class="text" id="Hcom36548">
<div class="phpcode"><code><span class="html">
this could be, what derek mentioned:<br />
<br />
<span class="default">&lt;?<br />
</span><span class="keyword">function </span><span class="default">cut_last_occurence</span><span class="keyword">(</span><span class="default">string</span><span class="keyword">,</span><span class="default">cut_off</span><span class="keyword">) {<br />
&nbsp;&nbsp;&nbsp; return </span><span class="default">strrev</span><span class="keyword">(</span><span class="default">substr</span><span class="keyword">(</span><span class="default">strstr</span><span class="keyword">(</span><span class="default">strrev</span><span class="keyword">(</span><span class="default">string</span><span class="keyword">), </span><span class="default">strrev</span><span class="keyword">(</span><span class="default">cut_off</span><span class="keyword">)),</span><span class="default">strlen</span><span class="keyword">(</span><span class="default">cut_off</span><span class="keyword">)));<br />
}&nbsp; &nbsp; <br />
<br />
</span><span class="comment">//&nbsp; &nbsp; example: cut off the last occurence of "limit"<br />
&nbsp;&nbsp;&nbsp; </span><span class="default">str </span><span class="keyword">= </span><span class="string">"select delta_limit1, delta_limit2, delta_limit3 from table limit 1,7"</span><span class="keyword">;<br />
&nbsp;&nbsp;&nbsp; </span><span class="default">search </span><span class="keyword">= </span><span class="string">" limit"</span><span class="keyword">;<br />
&nbsp;&nbsp;&nbsp; echo </span><span class="default">str</span><span class="keyword">.</span><span class="string">"\n"</span><span class="keyword">;<br />
&nbsp;&nbsp;&nbsp; echo </span><span class="default">cut_last_occurence</span><span class="keyword">(</span><span class="default">str</span><span class="keyword">,</span><span class="string">"limit"</span><span class="keyword">);<br />
</span><span class="default">?&gt;</span>
</span>
</code></div>
  </div>
 </div>
  <div class="note" id="87769">  <div class="votes">
    <div id="Vu87769">
    <a href="/manual/vote-note.php?id=87769&amp;page=function.strrpos&amp;vote=up" title="Vote up!" class="usernotes-voteu">up</a>
    </div>
    <div id="Vd87769">
    <a href="/manual/vote-note.php?id=87769&amp;page=function.strrpos&amp;vote=down" title="Vote down!" class="usernotes-voted">down</a>
    </div>
    <div class="tally" id="V87769" title="50% like this...">
    0
    </div>
  </div>
  <a href="#87769" class="name">
  <strong class="user"><em>alexandre at NOSPAM dot pixeline dot be</em></strong></a><a class="genanchor" href="#87769"> &para;</a><div class="date" title="2008-12-20 08:35"><strong>5 years ago</strong></div>
  <div class="text" id="Hcom87769">
<div class="phpcode"><code><span class="html">
I needed to check if a variable that contains a generated folder name based on user input had a trailing slash.
<br />

<br />
This did the trick:
<br />

<br />
<span class="default">&lt;?php
<br />
&nbsp;&nbsp;&nbsp; </span><span class="comment">// Detect and remove a trailing slash
<br />
&nbsp;&nbsp;&nbsp; </span><span class="default">root_folder </span><span class="keyword">= ((</span><span class="default">strrpos</span><span class="keyword">(</span><span class="default">root_folder</span><span class="keyword">, </span><span class="string">'/'</span><span class="keyword">) + </span><span class="default">1</span><span class="keyword">) == </span><span class="default">strlen</span><span class="keyword">(</span><span class="default">root_folder</span><span class="keyword">)) ? </span><span class="default">substr</span><span class="keyword">(</span><span class="default">root_folder</span><span class="keyword">, </span><span class="default">0</span><span class="keyword">, - </span><span class="default">1</span><span class="keyword">) : </span><span class="default">root_folder</span><span class="keyword">;
<br />
</span><span class="default">?&gt;</span>
</span>
</code></div>
  </div>
 </div>
  <div class="note" id="80008">  <div class="votes">
    <div id="Vu80008">
    <a href="/manual/vote-note.php?id=80008&amp;page=function.strrpos&amp;vote=up" title="Vote up!" class="usernotes-voteu">up</a>
    </div>
    <div id="Vd80008">
    <a href="/manual/vote-note.php?id=80008&amp;page=function.strrpos&amp;vote=down" title="Vote down!" class="usernotes-voted">down</a>
    </div>
    <div class="tally" id="V80008" title="no votes...">
    0
    </div>
  </div>
  <a href="#80008" class="name">
  <strong class="user"><em>dixonmd at gmail dot com</em></strong></a><a class="genanchor" href="#80008"> &para;</a><div class="date" title="2007-12-24 02:42"><strong>6 years ago</strong></div>
  <div class="text" id="Hcom80008">
<div class="phpcode"><code><span class="html">
<span class="default">&lt;?php
<br />
&nbsp;&nbsp; &nbsp; &nbsp;&nbsp; pos </span><span class="keyword">= </span><span class="default">strlen</span><span class="keyword">(</span><span class="default">string haystack</span><span class="keyword">) - </span><span class="default">strpos </span><span class="keyword">(</span><span class="default">strrev</span><span class="keyword">(</span><span class="default">string haystack</span><span class="keyword">), </span><span class="default">strrev</span><span class="keyword">(</span><span class="default">string needle</span><span class="keyword">)) - </span><span class="default">strlen</span><span class="keyword">(</span><span class="default">string needle</span><span class="keyword">);
<br />
</span><span class="default">?&gt;
<br />
</span>
<br />
&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; If in the needle there is more than one character then in php 4 we can use the above statement for finding the position of last occurrence of a substring in a string instead of strrpos. Because in php 4 strrpos uses the first character of the substring.
<br />

<br />
eg : 
<br />
<span class="default">&lt;?php
<br />
&nbsp;&nbsp; &nbsp; &nbsp;&nbsp; haystack </span><span class="keyword">= </span><span class="string">"you you you you you"</span><span class="keyword">;
<br />
&nbsp;&nbsp; &nbsp; &nbsp;&nbsp; </span><span class="default">needle </span><span class="keyword">= </span><span class="string">"you"</span><span class="keyword">;
<br />
&nbsp;&nbsp; &nbsp; &nbsp;&nbsp; </span><span class="default">pos1 </span><span class="keyword">= </span><span class="default">strlen</span><span class="keyword">(</span><span class="default">haystack</span><span class="keyword">) - </span><span class="default">strpos </span><span class="keyword">(</span><span class="default">strrev</span><span class="keyword">(</span><span class="default">haystack</span><span class="keyword">), </span><span class="default">strrev</span><span class="keyword">(</span><span class="default">needle</span><span class="keyword">)) - </span><span class="default">strlen</span><span class="keyword">(</span><span class="default">needle</span><span class="keyword">);
<br />
&nbsp;&nbsp; &nbsp; &nbsp;&nbsp; echo </span><span class="default">pos1 </span><span class="keyword">. </span><span class="string">"&lt;br&gt;"</span><span class="keyword">;
<br />
&nbsp;&nbsp; &nbsp; &nbsp;&nbsp; </span><span class="default">pos2 strrpos</span><span class="keyword">(</span><span class="default">haystack</span><span class="keyword">, </span><span class="default">needle</span><span class="keyword">);
<br />
&nbsp;&nbsp; &nbsp; &nbsp;&nbsp; echo </span><span class="default">pos2 </span><span class="keyword">. </span><span class="string">"&lt;br&gt;"</span><span class="keyword">;
<br />
</span><span class="default">?&gt;</span>
</span>
</code></div>
  </div>
 </div>
  <div class="note" id="78001">  <div class="votes">
    <div id="Vu78001">
    <a href="/manual/vote-note.php?id=78001&amp;page=function.strrpos&amp;vote=up" title="Vote up!" class="usernotes-voteu">up</a>
    </div>
    <div id="Vd78001">
    <a href="/manual/vote-note.php?id=78001&amp;page=function.strrpos&amp;vote=down" title="Vote down!" class="usernotes-voted">down</a>
    </div>
    <div class="tally" id="V78001" title="no votes...">
    0
    </div>
  </div>
  <a href="#78001" class="name">
  <strong class="user"><em>pb at tdcspace dot dk</em></strong></a><a class="genanchor" href="#78001"> &para;</a><div class="date" title="2007-09-23 07:26"><strong>6 years ago</strong></div>
  <div class="text" id="Hcom78001">
<div class="phpcode"><code><span class="html">
what the hell are you all doing. Wanna find the *next* last from a specific position because strrpos is useless with the "offset" option, then....<br />
<br />
ex: find 'Z' in str from position p,&nbsp; backward...<br />
<br />
while(p &gt; -1 and str{p} &lt;&gt; 'Z') p--;<br />
<br />
Anyone will notice p = -1 means: *not found* and that you must ensure a valid start offset in p, that is &gt;=0 and &lt; string length. Doh</span>
</code></div>
  </div>
 </div>
  <div class="note" id="74454">  <div class="votes">
    <div id="Vu74454">
    <a href="/manual/vote-note.php?id=74454&amp;page=function.strrpos&amp;vote=up" title="Vote up!" class="usernotes-voteu">up</a>
    </div>
    <div id="Vd74454">
    <a href="/manual/vote-note.php?id=74454&amp;page=function.strrpos&amp;vote=down" title="Vote down!" class="usernotes-voted">down</a>
    </div>
    <div class="tally" id="V74454" title="50% like this...">
    0
    </div>
  </div>
  <a href="#74454" class="name">
  <strong class="user"><em>jafet at g dot m dot a dot i dot l dot com</em></strong></a><a class="genanchor" href="#74454"> &para;</a><div class="date" title="2007-04-12 01:57"><strong>6 years ago</strong></div>
  <div class="text" id="Hcom74454">
<div class="phpcode"><code><span class="html">
Full strpos() functionality, by yours truly.<br />
<br />
<span class="default">&lt;?php<br />
</span><span class="keyword">function </span><span class="default">conforming_strrpos</span><span class="keyword">(</span><span class="default">haystack</span><span class="keyword">, </span><span class="default">needle</span><span class="keyword">, </span><span class="default">offset </span><span class="keyword">= </span><span class="default">0</span><span class="keyword">)<br />
{<br />
&nbsp;&nbsp;&nbsp; </span><span class="comment"># Why does strpos() do this? Anyway...<br />
&nbsp;&nbsp;&nbsp; </span><span class="keyword">if(!</span><span class="default">is_string</span><span class="keyword">(</span><span class="default">needle</span><span class="keyword">)) </span><span class="default">needle </span><span class="keyword">= </span><span class="default">ord</span><span class="keyword">(</span><span class="default">intval</span><span class="keyword">(</span><span class="default">needle</span><span class="keyword">));<br />
&nbsp;&nbsp;&nbsp; </span><span class="default">haystack </span><span class="keyword">= </span><span class="default">strval</span><span class="keyword">(</span><span class="default">haystack</span><span class="keyword">);<br />
&nbsp;&nbsp;&nbsp; </span><span class="comment"># Parameters<br />
&nbsp;&nbsp;&nbsp; </span><span class="default">hlen </span><span class="keyword">= </span><span class="default">strlen</span><span class="keyword">(</span><span class="default">haystack</span><span class="keyword">);<br />
&nbsp;&nbsp;&nbsp; </span><span class="default">nlen </span><span class="keyword">= </span><span class="default">strlen</span><span class="keyword">(</span><span class="default">needle</span><span class="keyword">);<br />
&nbsp;&nbsp;&nbsp; </span><span class="comment"># Come on, this is a feature too<br />
&nbsp;&nbsp;&nbsp; </span><span class="keyword">if(</span><span class="default">nlen </span><span class="keyword">== </span><span class="default">0</span><span class="keyword">)<br />
&nbsp;&nbsp;&nbsp; {<br />
&nbsp;&nbsp; &nbsp; &nbsp;&nbsp; </span><span class="default">trigger_error</span><span class="keyword">(</span><span class="default">__FUNCTION__</span><span class="keyword">.</span><span class="string">'(): Empty delimiter.'</span><span class="keyword">, </span><span class="default">E_USER_WARNING</span><span class="keyword">);<br />
&nbsp;&nbsp; &nbsp; &nbsp;&nbsp; return </span><span class="default">false</span><span class="keyword">;<br />
&nbsp;&nbsp;&nbsp; }<br />
&nbsp;&nbsp;&nbsp; </span><span class="default">offset </span><span class="keyword">= </span><span class="default">intval</span><span class="keyword">(</span><span class="default">offset</span><span class="keyword">);<br />
&nbsp;&nbsp;&nbsp; </span><span class="default">hrev </span><span class="keyword">= </span><span class="default">strrev</span><span class="keyword">(</span><span class="default">haystack</span><span class="keyword">);<br />
&nbsp;&nbsp;&nbsp; </span><span class="default">nrev </span><span class="keyword">= </span><span class="default">strrev</span><span class="keyword">(</span><span class="default">needle</span><span class="keyword">);<br />
&nbsp;&nbsp;&nbsp; </span><span class="comment"># Search<br />
&nbsp;&nbsp;&nbsp; </span><span class="default">pos </span><span class="keyword">= </span><span class="default">strpos</span><span class="keyword">(</span><span class="default">hrev</span><span class="keyword">, </span><span class="default">nrev</span><span class="keyword">, </span><span class="default">offset</span><span class="keyword">);<br />
&nbsp;&nbsp;&nbsp; if(</span><span class="default">pos </span><span class="keyword">=== </span><span class="default">false</span><span class="keyword">) return </span><span class="default">false</span><span class="keyword">;<br />
&nbsp;&nbsp;&nbsp; else return </span><span class="default">hlen </span><span class="keyword">- </span><span class="default">nlen </span><span class="keyword">- </span><span class="default">pos</span><span class="keyword">;<br />
}<br />
</span><span class="default">?&gt;<br />
</span><br />
Note that offset is evaluated from the end of the string.<br />
<br />
Also note that conforming_strrpos() performs some five times slower than strpos(). Just a thought.</span>
</code></div>
  </div>
 </div>
  <div class="note" id="73666">  <div class="votes">
    <div id="Vu73666">
    <a href="/manual/vote-note.php?id=73666&amp;page=function.strrpos&amp;vote=up" title="Vote up!" class="usernotes-voteu">up</a>
    </div>
    <div id="Vd73666">
    <a href="/manual/vote-note.php?id=73666&amp;page=function.strrpos&amp;vote=down" title="Vote down!" class="usernotes-voted">down</a>
    </div>
    <div class="tally" id="V73666" title="no votes...">
    0
    </div>
  </div>
  <a href="#73666" class="name">
  <strong class="user"><em>mijsoot_at_gmail_dot_com</em></strong></a><a class="genanchor" href="#73666"> &para;</a><div class="date" title="2007-03-06 01:43"><strong>6 years ago</strong></div>
  <div class="text" id="Hcom73666">
<div class="phpcode"><code><span class="html">
To begin, i'm sorry for my English.<br />
So, I needed of one function which gives me the front last position of a character. <br />
Then I said myself that it should be better to make one which gives the "N" last position.<br />
<br />
return_context = "1173120681_0__0_0_Mijsoot_Thierry";<br />
<br />
// Here i need to find = "Mijsoot_Thierry"<br />
<br />
//echo return_context."&lt;br /&gt;";// -- DEBUG<br />
<br />
function findPos(haystack,needle,position){<br />
&nbsp;&nbsp;&nbsp; pos = strrpos(haystack, needle);<br />
&nbsp;&nbsp;&nbsp; if(position&gt;1){<br />
&nbsp;&nbsp; &nbsp; &nbsp;&nbsp; position --;<br />
&nbsp;&nbsp; &nbsp; &nbsp;&nbsp; haystack = substr(haystack, 0, pos);<br />
&nbsp;&nbsp; &nbsp; &nbsp;&nbsp; pos = findPos(haystack,needle,position);<br />
&nbsp;&nbsp;&nbsp; }else{<br />
&nbsp;&nbsp; &nbsp; &nbsp;&nbsp; // echo haystack."&lt;br /&gt;"; // -- DEBUG<br />
&nbsp;&nbsp; &nbsp; &nbsp;&nbsp; return pos;<br />
&nbsp;&nbsp;&nbsp; }<br />
&nbsp;&nbsp;&nbsp; return pos;<br />
}<br />
<br />
var_dump(findPos(return_context,"_",2)); // -- TEST</span>
</code></div>
  </div>
 </div>
  <div class="note" id="72682">  <div class="votes">
    <div id="Vu72682">
    <a href="/manual/vote-note.php?id=72682&amp;page=function.strrpos&amp;vote=up" title="Vote up!" class="usernotes-voteu">up</a>
    </div>
    <div id="Vd72682">
    <a href="/manual/vote-note.php?id=72682&amp;page=function.strrpos&amp;vote=down" title="Vote down!" class="usernotes-voted">down</a>
    </div>
    <div class="tally" id="V72682" title="50% like this...">
    0
    </div>
  </div>
  <a href="#72682" class="name">
  <strong class="user"><em>Christ Off</em></strong></a><a class="genanchor" href="#72682"> &para;</a><div class="date" title="2007-01-29 10:50"><strong>7 years ago</strong></div>
  <div class="text" id="Hcom72682">
<div class="phpcode"><code><span class="html">
Function to truncate a string<br />
Removing dot and comma<br />
Adding ... only if a is character found<br />
<br />
function TruncateString(phrase, longueurMax = 150) {<br />
&nbsp;&nbsp;&nbsp; phrase = substr(trim(phrase), 0, longueurMax);<br />
&nbsp;&nbsp;&nbsp; pos = strrpos(phrase, " ");<br />
&nbsp;&nbsp;&nbsp; phrase = substr(phrase, 0, pos);<br />
&nbsp;&nbsp;&nbsp; if ((substr(phrase,-1,1) == ",") or (substr(phrase,-1,1) == ".")) {<br />
&nbsp;&nbsp; &nbsp; &nbsp;&nbsp; phrase = substr(phrase,0,-1);<br />
&nbsp;&nbsp;&nbsp; }<br />
&nbsp;&nbsp;&nbsp; if (pos === false) {<br />
&nbsp;&nbsp; &nbsp; &nbsp;&nbsp; phrase = phrase;<br />
&nbsp;&nbsp;&nbsp; }<br />
&nbsp;&nbsp;&nbsp; else {<br />
&nbsp;&nbsp; &nbsp; &nbsp;&nbsp; phrase = phrase . "...";<br />
&nbsp;&nbsp;&nbsp; }<br />
return phrase;<br />
}</span>
</code></div>
  </div>
 </div>
  <div class="note" id="71882">  <div class="votes">
    <div id="Vu71882">
    <a href="/manual/vote-note.php?id=71882&amp;page=function.strrpos&amp;vote=up" title="Vote up!" class="usernotes-voteu">up</a>
    </div>
    <div id="Vd71882">
    <a href="/manual/vote-note.php?id=71882&amp;page=function.strrpos&amp;vote=down" title="Vote down!" class="usernotes-voted">down</a>
    </div>
    <div class="tally" id="V71882" title="no votes...">
    0
    </div>
  </div>
  <a href="#71882" class="name">
  <strong class="user"><em>php NO at SPAMMERS willfris SREMMAPS dot ON nl</em></strong></a><a class="genanchor" href="#71882"> &para;</a><div class="date" title="2006-12-20 06:48"><strong>7 years ago</strong></div>
  <div class="text" id="Hcom71882">
<div class="phpcode"><code><span class="html">
<span class="default">&lt;?php<br />
</span><span class="comment">/*******<br />
&nbsp;** Maybe the shortest code to find the last occurence of a string, even in php4<br />
&nbsp;*******/<br />
</span><span class="keyword">function </span><span class="default">stringrpos</span><span class="keyword">(</span><span class="default">haystack</span><span class="keyword">,</span><span class="default">needle</span><span class="keyword">,</span><span class="default">offset</span><span class="keyword">=</span><span class="default">NULL</span><span class="keyword">)<br />
{<br />
&nbsp;&nbsp;&nbsp; return </span><span class="default">strlen</span><span class="keyword">(</span><span class="default">haystack</span><span class="keyword">)<br />
&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; - </span><span class="default">strpos</span><span class="keyword">( </span><span class="default">strrev</span><span class="keyword">(</span><span class="default">haystack</span><span class="keyword">) , </span><span class="default">strrev</span><span class="keyword">(</span><span class="default">needle</span><span class="keyword">) , </span><span class="default">offset</span><span class="keyword">)<br />
&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; - </span><span class="default">strlen</span><span class="keyword">(</span><span class="default">needle</span><span class="keyword">);<br />
}<br />
</span><span class="comment">// @return&nbsp;&nbsp; -&gt;&nbsp;&nbsp; chopped up for readability.<br />
</span><span class="default">?&gt;</span>
</span>
</code></div>
  </div>
 </div>
  <div class="note" id="71401">  <div class="votes">
    <div id="Vu71401">
    <a href="/manual/vote-note.php?id=71401&amp;page=function.strrpos&amp;vote=up" title="Vote up!" class="usernotes-voteu">up</a>
    </div>
    <div id="Vd71401">
    <a href="/manual/vote-note.php?id=71401&amp;page=function.strrpos&amp;vote=down" title="Vote down!" class="usernotes-voted">down</a>
    </div>
    <div class="tally" id="V71401" title="no votes...">
    0
    </div>
  </div>
  <a href="#71401" class="name">
  <strong class="user"><em>purpleidea</em></strong></a><a class="genanchor" href="#71401"> &para;</a><div class="date" title="2006-11-27 12:07"><strong>7 years ago</strong></div>
  <div class="text" id="Hcom71401">
<div class="phpcode"><code><span class="html">
I was having some issues when I moved my code to run it on a different server.<br />
The earlier php version didn't support more than one character needles, so tada, bugs. It's in the docs, i'm just pointing it out in case you're scratching your head for a while.</span>
</code></div>
  </div>
 </div>
  <div class="note" id="56735">  <div class="votes">
    <div id="Vu56735">
    <a href="/manual/vote-note.php?id=56735&amp;page=function.strrpos&amp;vote=up" title="Vote up!" class="usernotes-voteu">up</a>
    </div>
    <div id="Vd56735">
    <a href="/manual/vote-note.php?id=56735&amp;page=function.strrpos&amp;vote=down" title="Vote down!" class="usernotes-voted">down</a>
    </div>
    <div class="tally" id="V56735" title="no votes...">
    0
    </div>
  </div>
  <a href="#56735" class="name">
  <strong class="user"><em>gordon at kanazawa-gu dot ac dot jp</em></strong></a><a class="genanchor" href="#56735"> &para;</a><div class="date" title="2005-09-13 09:56"><strong>8 years ago</strong></div>
  <div class="text" id="Hcom56735">
<div class="phpcode"><code><span class="html">
The "find-last-occurrence-of-a-string" functions suggested here do not allow for a starting offset, so here's one, tried and tested, that does:<br />
<br />
function my_strrpos(haystack, needle, offset=0) {<br />
&nbsp;&nbsp;&nbsp; // same as strrpos, except needle can be a string<br />
&nbsp;&nbsp;&nbsp; strrpos = false;<br />
&nbsp;&nbsp;&nbsp; if (is_string(haystack) &amp;&amp; is_string(needle) &amp;&amp; is_numeric(offset)) {<br />
&nbsp;&nbsp; &nbsp; &nbsp;&nbsp; strlen = strlen(haystack);<br />
&nbsp;&nbsp; &nbsp; &nbsp;&nbsp; strpos = strpos(strrev(substr(haystack, offset)), strrev(needle));<br />
&nbsp;&nbsp; &nbsp; &nbsp;&nbsp; if (is_numeric(strpos)) {<br />
&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; strrpos = strlen - strpos - strlen(needle);<br />
&nbsp;&nbsp; &nbsp; &nbsp;&nbsp; }<br />
&nbsp;&nbsp;&nbsp; }<br />
&nbsp;&nbsp;&nbsp; return strrpos;<br />
}</span>
</code></div>
  </div>
 </div>
  <div class="note" id="56069">  <div class="votes">
    <div id="Vu56069">
    <a href="/manual/vote-note.php?id=56069&amp;page=function.strrpos&amp;vote=up" title="Vote up!" class="usernotes-voteu">up</a>
    </div>
    <div id="Vd56069">
    <a href="/manual/vote-note.php?id=56069&amp;page=function.strrpos&amp;vote=down" title="Vote down!" class="usernotes-voted">down</a>
    </div>
    <div class="tally" id="V56069" title="50% like this...">
    0
    </div>
  </div>
  <a href="#56069" class="name">
  <strong class="user"><em>genetically altered mastermind at gmail</em></strong></a><a class="genanchor" href="#56069"> &para;</a><div class="date" title="2005-08-22 10:30"><strong>8 years ago</strong></div>
  <div class="text" id="Hcom56069">
<div class="phpcode"><code><span class="html">
Very handy to get a file extension:<br />
this-&gt;data['extension'] = substr(this-&gt;data['name'],strrpos(this-&gt;data['name'],'.')+1);</span>
</code></div>
  </div>
 </div>
  <div class="note" id="55670">  <div class="votes">
    <div id="Vu55670">
    <a href="/manual/vote-note.php?id=55670&amp;page=function.strrpos&amp;vote=up" title="Vote up!" class="usernotes-voteu">up</a>
    </div>
    <div id="Vd55670">
    <a href="/manual/vote-note.php?id=55670&amp;page=function.strrpos&amp;vote=down" title="Vote down!" class="usernotes-voted">down</a>
    </div>
    <div class="tally" id="V55670" title="no votes...">
    0
    </div>
  </div>
  <a href="#55670" class="name">
  <strong class="user"><em>fab</em></strong></a><a class="genanchor" href="#55670"> &para;</a><div class="date" title="2005-08-10 04:07"><strong>8 years ago</strong></div>
  <div class="text" id="Hcom55670">
<div class="phpcode"><code><span class="html">
RE: hao2lian<br />
<br />
There are a lot of alternative - and unfortunately buggy - implementations of strrpos() (or last_index_of as it was called) on this page. This one is a slight modifiaction of the one below, but it should world like a *real* strrpos(), because it returns false if there is no needle in the haystack.<br />
<br />
<span class="default">&lt;?php<br />
<br />
</span><span class="keyword">function </span><span class="default">my_strrpos</span><span class="keyword">(</span><span class="default">haystack</span><span class="keyword">, </span><span class="default">needle</span><span class="keyword">) {<br />
&nbsp;&nbsp; </span><span class="default">index </span><span class="keyword">= </span><span class="default">strpos</span><span class="keyword">(</span><span class="default">strrev</span><span class="keyword">(</span><span class="default">haystack</span><span class="keyword">), </span><span class="default">strrev</span><span class="keyword">(</span><span class="default">needle</span><span class="keyword">));<br />
&nbsp;&nbsp; if(</span><span class="default">index </span><span class="keyword">=== </span><span class="default">false</span><span class="keyword">) {<br />
&nbsp;&nbsp; &nbsp; &nbsp;&nbsp; return </span><span class="default">false</span><span class="keyword">;<br />
&nbsp;&nbsp; }<br />
&nbsp;&nbsp; </span><span class="default">index </span><span class="keyword">= </span><span class="default">strlen</span><span class="keyword">(</span><span class="default">haystack</span><span class="keyword">) - </span><span class="default">strlen</span><span class="keyword">(</span><span class="default">needle</span><span class="keyword">) - </span><span class="default">index</span><span class="keyword">;<br />
&nbsp;&nbsp; return </span><span class="default">index</span><span class="keyword">;<br />
}<br />
<br />
</span><span class="default">?&gt;</span>
</span>
</code></div>
  </div>
 </div>
  <div class="note" id="51636">  <div class="votes">
    <div id="Vu51636">
    <a href="/manual/vote-note.php?id=51636&amp;page=function.strrpos&amp;vote=up" title="Vote up!" class="usernotes-voteu">up</a>
    </div>
    <div id="Vd51636">
    <a href="/manual/vote-note.php?id=51636&amp;page=function.strrpos&amp;vote=down" title="Vote down!" class="usernotes-voted">down</a>
    </div>
    <div class="tally" id="V51636" title="no votes...">
    0
    </div>
  </div>
  <a href="#51636" class="name">
  <strong class="user"><em>jonas at jonasbjork dot net</em></strong></a><a class="genanchor" href="#51636"> &para;</a><div class="date" title="2005-04-06 01:25"><strong>8 years ago</strong></div>
  <div class="text" id="Hcom51636">
<div class="phpcode"><code><span class="html">
I needed to remove last directory from an path, and came up with this solution:<br />
<br />
<span class="default">&lt;?php<br />
<br />
&nbsp; path_dir </span><span class="keyword">= </span><span class="string">"/my/sweet/home/"</span><span class="keyword">;<br />
&nbsp; </span><span class="default">path_up </span><span class="keyword">= </span><span class="default">substr</span><span class="keyword">( </span><span class="default">path_dir</span><span class="keyword">, </span><span class="default">0</span><span class="keyword">, </span><span class="default">strrpos</span><span class="keyword">( </span><span class="default">path_dir</span><span class="keyword">, </span><span class="string">'/'</span><span class="keyword">, -</span><span class="default">2 </span><span class="keyword">) ).</span><span class="string">"/"</span><span class="keyword">;<br />
&nbsp; echo </span><span class="default">path_up</span><span class="keyword">;<br />
<br />
</span><span class="default">?&gt;<br />
</span><br />
Might be helpful for someone..</span>
</code></div>
  </div>
 </div>
  <div class="note" id="47482">  <div class="votes">
    <div id="Vu47482">
    <a href="/manual/vote-note.php?id=47482&amp;page=function.strrpos&amp;vote=up" title="Vote up!" class="usernotes-voteu">up</a>
    </div>
    <div id="Vd47482">
    <a href="/manual/vote-note.php?id=47482&amp;page=function.strrpos&amp;vote=down" title="Vote down!" class="usernotes-voted">down</a>
    </div>
    <div class="tally" id="V47482" title="no votes...">
    0
    </div>
  </div>
  <a href="#47482" class="name">
  <strong class="user"><em>griffioen at justdesign dot nl</em></strong></a><a class="genanchor" href="#47482"> &para;</a><div class="date" title="2004-11-17 10:57"><strong>9 years ago</strong></div>
  <div class="text" id="Hcom47482">
<div class="phpcode"><code><span class="html">
If you wish to look for the last occurrence of a STRING in a string (instead of a single character) and don't have mb_strrpos working, try this:<br />
<br />
&nbsp;&nbsp;&nbsp; function lastIndexOf(haystack, needle) {<br />
&nbsp;&nbsp; &nbsp; &nbsp;&nbsp; index&nbsp; &nbsp; &nbsp; &nbsp; = strpos(strrev(haystack), strrev(needle));<br />
&nbsp;&nbsp; &nbsp; &nbsp;&nbsp; index&nbsp; &nbsp; &nbsp; &nbsp; = strlen(haystack) - strlen(index) - index;<br />
&nbsp;&nbsp; &nbsp; &nbsp;&nbsp; return index;<br />
&nbsp;&nbsp;&nbsp; }</span>
</code></div>
  </div>
 </div>
  <div class="note" id="46342">  <div class="votes">
    <div id="Vu46342">
    <a href="/manual/vote-note.php?id=46342&amp;page=function.strrpos&amp;vote=up" title="Vote up!" class="usernotes-voteu">up</a>
    </div>
    <div id="Vd46342">
    <a href="/manual/vote-note.php?id=46342&amp;page=function.strrpos&amp;vote=down" title="Vote down!" class="usernotes-voted">down</a>
    </div>
    <div class="tally" id="V46342" title="50% like this...">
    0
    </div>
  </div>
  <a href="#46342" class="name">
  <strong class="user"><em>nexman at playoutloud dot net</em></strong></a><a class="genanchor" href="#46342"> &para;</a><div class="date" title="2004-10-07 09:22"><strong>9 years ago</strong></div>
  <div class="text" id="Hcom46342">
<div class="phpcode"><code><span class="html">
Function like the 5.0 version of strrpos for 4.x.<br />
This will return the *last* occurence of a string within a string.<br />
<br />
&nbsp;&nbsp;&nbsp; function strepos(haystack, needle, offset=0) {&nbsp; &nbsp; &nbsp; &nbsp; <br />
&nbsp;&nbsp; &nbsp; &nbsp;&nbsp; pos_rule = (offset&lt;0)?strlen(haystack)+(offset-1):offset;<br />
&nbsp;&nbsp; &nbsp; &nbsp;&nbsp; last_pos = false; first_run = true;<br />
&nbsp;&nbsp; &nbsp; &nbsp;&nbsp; do {<br />
&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; pos=strpos(haystack, needle, (intval(last_pos)+((first_run)?0:strlen(needle))));<br />
&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; if (pos!==false &amp;&amp; ((offset&lt;0 &amp;&amp; pos &lt;= pos_rule)||offset &gt;= 0)) {<br />
&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; last_pos = pos;<br />
&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; } else { break; }<br />
&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; first_run = false;<br />
&nbsp;&nbsp; &nbsp; &nbsp;&nbsp; } while (pos !== false);<br />
&nbsp;&nbsp; &nbsp; &nbsp;&nbsp; if (offset&gt;0 &amp;&amp; last_pos&lt;pos_rule) { last_pos = false; }<br />
&nbsp;&nbsp; &nbsp; &nbsp;&nbsp; return last_pos;<br />
&nbsp;&nbsp;&nbsp; }<br />
<br />
If my math is off, please feel free to correct.<br />
&nbsp; - A positive offset will be the minimum character index position of the first character allowed.<br />
&nbsp; - A negative offset will be subtracted from the total length and the position directly before will be the maximum index of the first character being searched.<br />
<br />
returns the character index ( 0+ ) of the last occurence of the needle. <br />
<br />
* boolean FALSE will return no matches within the haystack, or outside boundries specified by the offset.</span>
</code></div>
  </div>
 </div>
  <div class="note" id="42637">  <div class="votes">
    <div id="Vu42637">
    <a href="/manual/vote-note.php?id=42637&amp;page=function.strrpos&amp;vote=up" title="Vote up!" class="usernotes-voteu">up</a>
    </div>
    <div id="Vd42637">
    <a href="/manual/vote-note.php?id=42637&amp;page=function.strrpos&amp;vote=down" title="Vote down!" class="usernotes-voted">down</a>
    </div>
    <div class="tally" id="V42637" title="no votes...">
    0
    </div>
  </div>
  <a href="#42637" class="name">
  <strong class="user"><em>tsa at medicine dot wisc dot edu</em></strong></a><a class="genanchor" href="#42637"> &para;</a><div class="date" title="2004-05-24 05:17"><strong>9 years ago</strong></div>
  <div class="text" id="Hcom42637">
<div class="phpcode"><code><span class="html">
What the heck, I thought I'd throw another function in the mix.&nbsp; It's not pretty but the following function counts backwards from your starting point and tells you the last occurrance of a mixed char string:
<br />

<br />
<span class="default">&lt;?php
<br />
</span><span class="keyword">function </span><span class="default">strrposmixed </span><span class="keyword">(</span><span class="default">haystack</span><span class="keyword">, </span><span class="default">needle</span><span class="keyword">, </span><span class="default">start</span><span class="keyword">=</span><span class="default">0</span><span class="keyword">) {
<br />
&nbsp;&nbsp; </span><span class="comment">// init start as the end of the str if not set
<br />
&nbsp;&nbsp; </span><span class="keyword">if(</span><span class="default">start </span><span class="keyword">== </span><span class="default">0</span><span class="keyword">) {
<br />
&nbsp;&nbsp; &nbsp; &nbsp; </span><span class="default">start </span><span class="keyword">= </span><span class="default">strlen</span><span class="keyword">(</span><span class="default">haystack</span><span class="keyword">);
<br />
&nbsp;&nbsp; }
<br />
&nbsp;&nbsp; 
<br />
&nbsp;&nbsp; </span><span class="comment">// searches backward from start
<br />
&nbsp;&nbsp; </span><span class="default">currentStrPos</span><span class="keyword">=</span><span class="default">start</span><span class="keyword">;
<br />
&nbsp;&nbsp; </span><span class="default">lastFoundPos</span><span class="keyword">=</span><span class="default">false</span><span class="keyword">;
<br />
&nbsp;&nbsp; 
<br />
&nbsp;&nbsp; while(</span><span class="default">currentStrPos </span><span class="keyword">!= </span><span class="default">0</span><span class="keyword">) {
<br />
&nbsp;&nbsp; &nbsp; &nbsp; if(!(</span><span class="default">strpos</span><span class="keyword">(</span><span class="default">haystack</span><span class="keyword">,</span><span class="default">needle</span><span class="keyword">,</span><span class="default">currentStrPos</span><span class="keyword">) === </span><span class="default">false</span><span class="keyword">)) {
<br />
&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </span><span class="default">lastFoundPos</span><span class="keyword">=</span><span class="default">strpos</span><span class="keyword">(</span><span class="default">haystack</span><span class="keyword">,</span><span class="default">needle</span><span class="keyword">,</span><span class="default">currentStrPos</span><span class="keyword">);
<br />
&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; break;
<br />
&nbsp;&nbsp; &nbsp; &nbsp; }
<br />
&nbsp;&nbsp; &nbsp; &nbsp; </span><span class="default">currentStrPos</span><span class="keyword">--;
<br />
&nbsp;&nbsp; }
<br />
&nbsp;&nbsp; 
<br />
&nbsp;&nbsp; if(</span><span class="default">lastFoundPos </span><span class="keyword">=== </span><span class="default">false</span><span class="keyword">) {
<br />
&nbsp;&nbsp; &nbsp; &nbsp; return </span><span class="default">false</span><span class="keyword">;
<br />
&nbsp;&nbsp; } else {
<br />
&nbsp;&nbsp; &nbsp; &nbsp; return </span><span class="default">lastFoundPos</span><span class="keyword">;
<br />
&nbsp;&nbsp; }
<br />
}
<br />
</span><span class="default">?&gt;</span>
</span>
</code></div>
  </div>
 </div>
  <div class="note" id="35387">  <div class="votes">
    <div id="Vu35387">
    <a href="/manual/vote-note.php?id=35387&amp;page=function.strrpos&amp;vote=up" title="Vote up!" class="usernotes-voteu">up</a>
    </div>
    <div id="Vd35387">
    <a href="/manual/vote-note.php?id=35387&amp;page=function.strrpos&amp;vote=down" title="Vote down!" class="usernotes-voted">down</a>
    </div>
    <div class="tally" id="V35387" title="50% like this...">
    0
    </div>
  </div>
  <a href="#35387" class="name">
  <strong class="user"><em>lee at 5ss dot net</em></strong></a><a class="genanchor" href="#35387"> &para;</a><div class="date" title="2003-08-29 07:21"><strong>10 years ago</strong></div>
  <div class="text" id="Hcom35387">
<div class="phpcode"><code><span class="html">
I should have looked here first, but instead I wrote my own version of strrpos that supports searching for entire strings, rather than individual characters.&nbsp; This is a recursive function.&nbsp; I have not tested to see if it is more or less efficient than the others on the page.&nbsp; I hope this helps someone!
<br />

<br />
<span class="default">&lt;?php
<br />
</span><span class="comment">//Find last occurance of needle in haystack
<br />
</span><span class="keyword">function </span><span class="default">str_rpos</span><span class="keyword">(</span><span class="default">haystack</span><span class="keyword">, </span><span class="default">needle</span><span class="keyword">, </span><span class="default">start </span><span class="keyword">= </span><span class="default">0</span><span class="keyword">){
<br />
&nbsp;&nbsp;&nbsp; </span><span class="default">tempPos </span><span class="keyword">= </span><span class="default">strpos</span><span class="keyword">(</span><span class="default">haystack</span><span class="keyword">, </span><span class="default">needle</span><span class="keyword">, </span><span class="default">start</span><span class="keyword">);
<br />
&nbsp;&nbsp;&nbsp; if(</span><span class="default">tempPos </span><span class="keyword">=== </span><span class="default">false</span><span class="keyword">){
<br />
&nbsp;&nbsp; &nbsp; &nbsp;&nbsp; if(</span><span class="default">start </span><span class="keyword">== </span><span class="default">0</span><span class="keyword">){
<br />
&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; </span><span class="comment">//Needle not in string at all
<br />
&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; </span><span class="keyword">return </span><span class="default">false</span><span class="keyword">;
<br />
&nbsp;&nbsp; &nbsp; &nbsp;&nbsp; }else{
<br />
&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; </span><span class="comment">//No more occurances found
<br />
&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; </span><span class="keyword">return </span><span class="default">start </span><span class="keyword">- </span><span class="default">strlen</span><span class="keyword">(</span><span class="default">needle</span><span class="keyword">);
<br />
&nbsp;&nbsp; &nbsp; &nbsp;&nbsp; }
<br />
&nbsp;&nbsp;&nbsp; }else{
<br />
&nbsp;&nbsp; &nbsp; &nbsp;&nbsp; </span><span class="comment">//Find the next occurance
<br />
&nbsp;&nbsp; &nbsp; &nbsp;&nbsp; </span><span class="keyword">return </span><span class="default">str_rpos</span><span class="keyword">(</span><span class="default">haystack</span><span class="keyword">, </span><span class="default">needle</span><span class="keyword">, </span><span class="default">tempPos </span><span class="keyword">+ </span><span class="default">strlen</span><span class="keyword">(</span><span class="default">needle</span><span class="keyword">));
<br />
&nbsp;&nbsp;&nbsp; }
<br />
}
<br />
</span><span class="default">?&gt;</span>
</span>
</code></div>
  </div>
 </div>
  <div class="note" id="29495">  <div class="votes">
    <div id="Vu29495">
    <a href="/manual/vote-note.php?id=29495&amp;page=function.strrpos&amp;vote=up" title="Vote up!" class="usernotes-voteu">up</a>
    </div>
    <div id="Vd29495">
    <a href="/manual/vote-note.php?id=29495&amp;page=function.strrpos&amp;vote=down" title="Vote down!" class="usernotes-voted">down</a>
    </div>
    <div class="tally" id="V29495" title="50% like this...">
    0
    </div>
  </div>
  <a href="#29495" class="name">
  <strong class="user"><em>FIE</em></strong></a><a class="genanchor" href="#29495"> &para;</a><div class="date" title="2003-02-15 05:03"><strong>10 years ago</strong></div>
  <div class="text" id="Hcom29495">
<div class="phpcode"><code><span class="html">
refering to the comment and function about lastIndexOf()...
<br />
It seemed not to work for me the only reason I could find was the haystack was reversed and the string wasnt therefore it returnt the length of the haystack rather than the position of the last needle... i rewrote it as fallows:
<br />

<br />
<span class="default">&lt;?php
<br />
</span><span class="keyword">function </span><span class="default">strlpos</span><span class="keyword">(</span><span class="default">f_haystack</span><span class="keyword">,</span><span class="default">f_needle</span><span class="keyword">) {
<br />
&nbsp;&nbsp; &nbsp;&nbsp; </span><span class="default">rev_str </span><span class="keyword">= </span><span class="default">strrev</span><span class="keyword">(</span><span class="default">f_needle</span><span class="keyword">);
<br />
&nbsp;&nbsp; &nbsp;&nbsp; </span><span class="default">rev_hay </span><span class="keyword">= </span><span class="default">strrev</span><span class="keyword">(</span><span class="default">f_haystack</span><span class="keyword">);
<br />
&nbsp;&nbsp; &nbsp;&nbsp; </span><span class="default">hay_len </span><span class="keyword">= </span><span class="default">strlen</span><span class="keyword">(</span><span class="default">f_haystack</span><span class="keyword">);
<br />
&nbsp;&nbsp; &nbsp;&nbsp; </span><span class="default">ned_pos </span><span class="keyword">= </span><span class="default">strpos</span><span class="keyword">(</span><span class="default">rev_hay</span><span class="keyword">,</span><span class="default">rev_str</span><span class="keyword">);
<br />
&nbsp;&nbsp; &nbsp;&nbsp; </span><span class="default">result&nbsp; </span><span class="keyword">= </span><span class="default">hay_len </span><span class="keyword">- </span><span class="default">ned_pos </span><span class="keyword">- </span><span class="default">strlen</span><span class="keyword">(</span><span class="default">rev_str</span><span class="keyword">);
<br />
&nbsp;&nbsp; &nbsp;&nbsp; return </span><span class="default">result</span><span class="keyword">;
<br />
}
<br />
</span><span class="default">?&gt;
<br />
</span>
<br />
this one fallows the strpos syntax rather than java's lastIndexOf.
<br />
I'm not positive if it takes more resources assigning all of those variables in there but you can put it all in return if you want, i dont care if i crash my server ;).
<br />

<br />
~SILENT WIND OF DOOM WOOSH!</span>
</code></div>
  </div>
 </div>
  <div class="note" id="27750">  <div class="votes">
    <div id="Vu27750">
    <a href="/manual/vote-note.php?id=27750&amp;page=function.strrpos&amp;vote=up" title="Vote up!" class="usernotes-voteu">up</a>
    </div>
    <div id="Vd27750">
    <a href="/manual/vote-note.php?id=27750&amp;page=function.strrpos&amp;vote=down" title="Vote down!" class="usernotes-voted">down</a>
    </div>
    <div class="tally" id="V27750" title="50% like this...">
    0
    </div>
  </div>
  <a href="#27750" class="name">
  <strong class="user"><em>php dot net at insite-out dot com</em></strong></a><a class="genanchor" href="#27750"> &para;</a><div class="date" title="2002-12-17 11:47"><strong>11 years ago</strong></div>
  <div class="text" id="Hcom27750">
<div class="phpcode"><code><span class="html">
I was looking for the equivalent of Java's lastIndexOf(). I couldn't find it so I wrote this:
<br />

<br />
<span class="default">&lt;?php
<br />
</span><span class="comment">/*
<br />
Method to return the last occurrence of a substring within a 
<br />
string
<br />
*/
<br />
</span><span class="keyword">function </span><span class="default">last_index_of</span><span class="keyword">(</span><span class="default">sub_str</span><span class="keyword">,</span><span class="default">instr</span><span class="keyword">) {
<br />
&nbsp;&nbsp;&nbsp; if(</span><span class="default">strstr</span><span class="keyword">(</span><span class="default">instr</span><span class="keyword">,</span><span class="default">sub_str</span><span class="keyword">)!=</span><span class="string">""</span><span class="keyword">) {
<br />
&nbsp;&nbsp; &nbsp; &nbsp;&nbsp; return(</span><span class="default">strlen</span><span class="keyword">(</span><span class="default">instr</span><span class="keyword">)-</span><span class="default">strpos</span><span class="keyword">(</span><span class="default">strrev</span><span class="keyword">(</span><span class="default">instr</span><span class="keyword">),</span><span class="default">sub_str</span><span class="keyword">));
<br />
&nbsp;&nbsp;&nbsp; }
<br />
&nbsp;&nbsp;&nbsp; return(-</span><span class="default">1</span><span class="keyword">);
<br />
}
<br />
</span><span class="default">?&gt;
<br />
</span>
<br />
It returns the numerical index of the substring you're searching for, or -1 if the substring doesn't exist within the string.</span>
</code></div>
  </div>
 </div>
  <div class="note" id="92158">  <div class="votes">
    <div id="Vu92158">
    <a href="/manual/vote-note.php?id=92158&amp;page=function.strrpos&amp;vote=up" title="Vote up!" class="usernotes-voteu">up</a>
    </div>
    <div id="Vd92158">
    <a href="/manual/vote-note.php?id=92158&amp;page=function.strrpos&amp;vote=down" title="Vote down!" class="usernotes-voted">down</a>
    </div>
    <div class="tally" id="V92158" title="0% like this...">
    -1
    </div>
  </div>
  <a href="#92158" class="name">
  <strong class="user"><em>maxmike at gmail dot com</em></strong></a><a class="genanchor" href="#92158"> &para;</a><div class="date" title="2009-07-11 10:05"><strong>4 years ago</strong></div>
  <div class="text" id="Hcom92158">
<div class="phpcode"><code><span class="html">
I've got a simple method of performing a reverse strpos which may be of use.&nbsp; This version I have treats the offset very simply:<br />
Positive offsets search backwards from the supplied string index.<br />
Negative offsets search backwards from the position of the character that many characters from the end of the string.<br />
<br />
Here is an example of backwards stepping through instances of a string with this function:<br />
<br />
<span class="default">&lt;?php<br />
</span><span class="keyword">function </span><span class="default">backwardStrpos</span><span class="keyword">(</span><span class="default">haystack</span><span class="keyword">, </span><span class="default">needle</span><span class="keyword">, </span><span class="default">offset </span><span class="keyword">= </span><span class="default">0</span><span class="keyword">){<br />
&nbsp;&nbsp;&nbsp; </span><span class="default">length </span><span class="keyword">= </span><span class="default">strlen</span><span class="keyword">(</span><span class="default">haystack</span><span class="keyword">);<br />
&nbsp;&nbsp;&nbsp; </span><span class="default">offset </span><span class="keyword">= (</span><span class="default">offset </span><span class="keyword">&gt; </span><span class="default">0</span><span class="keyword">)?(</span><span class="default">length </span><span class="keyword">- </span><span class="default">offset</span><span class="keyword">):</span><span class="default">abs</span><span class="keyword">(</span><span class="default">offset</span><span class="keyword">);<br />
&nbsp;&nbsp;&nbsp; </span><span class="default">pos </span><span class="keyword">= </span><span class="default">strpos</span><span class="keyword">(</span><span class="default">strrev</span><span class="keyword">(</span><span class="default">haystack</span><span class="keyword">), </span><span class="default">strrev</span><span class="keyword">(</span><span class="default">needle</span><span class="keyword">), </span><span class="default">offset</span><span class="keyword">);<br />
&nbsp;&nbsp;&nbsp; return (</span><span class="default">pos </span><span class="keyword">=== </span><span class="default">false</span><span class="keyword">)?</span><span class="default">false</span><span class="keyword">:( </span><span class="default">length </span><span class="keyword">- </span><span class="default">pos </span><span class="keyword">- </span><span class="default">strlen</span><span class="keyword">(</span><span class="default">needle</span><span class="keyword">) );<br />
}<br />
<br />
</span><span class="default">pos </span><span class="keyword">= </span><span class="default">0</span><span class="keyword">;<br />
</span><span class="default">count </span><span class="keyword">= </span><span class="default">0</span><span class="keyword">;<br />
echo </span><span class="string">"Test1&lt;br/&gt;"</span><span class="keyword">;<br />
while((</span><span class="default">pos </span><span class="keyword">= </span><span class="default">backwardStrpos</span><span class="keyword">(</span><span class="string">"012340567890"</span><span class="keyword">, </span><span class="string">"0"</span><span class="keyword">, </span><span class="default">pos</span><span class="keyword">)) !== </span><span class="default">false</span><span class="keyword">){<br />
&nbsp;&nbsp; &nbsp; echo </span><span class="default">pos</span><span class="keyword">.</span><span class="string">"&lt;br/&gt;"</span><span class="keyword">;<br />
&nbsp;&nbsp;&nbsp; </span><span class="default">pos</span><span class="keyword">--;<br />
&nbsp;&nbsp;&nbsp; if(</span><span class="default">pos </span><span class="keyword">&lt; </span><span class="default">0</span><span class="keyword">){<br />
&nbsp;&nbsp; &nbsp; &nbsp;&nbsp; echo </span><span class="string">"Done&lt;br/&gt;"</span><span class="keyword">;break;<br />
&nbsp;&nbsp;&nbsp; }<br />
}<br />
echo </span><span class="string">"---===---&lt;br/&gt;\nTest2&lt;br/&gt;"</span><span class="keyword">;<br />
echo </span><span class="default">backwardStrpos</span><span class="keyword">(</span><span class="string">"12341234"</span><span class="keyword">, </span><span class="string">"1"</span><span class="keyword">, </span><span class="default">2</span><span class="keyword">).</span><span class="string">"&lt;br/&gt;"</span><span class="keyword">;<br />
echo </span><span class="default">backwardStrpos</span><span class="keyword">(</span><span class="string">"12341234"</span><span class="keyword">, </span><span class="string">"1"</span><span class="keyword">, -</span><span class="default">2</span><span class="keyword">);<br />
</span><span class="default">?&gt;<br />
</span><br />
Outputs:<br />
Test1<br />
11<br />
5<br />
0<br />
Done<br />
---===---<br />
Test2<br />
0<br />
4<br />
<br />
With Test2 the first line checks from the first 3 in "12341234" and runs backwards until it finds a 1 (at position 0)<br />
<br />
The second line checks from the second 2 in "12341234" and seeks towards the beginning for the first 1 it finds (at position 4).<br />
<br />
This function is useful for php4 and also useful if the offset parameter in the existing strrpos is equally confusing to you as it is for me.</span>
</code></div>
  </div>
 </div></div>

 <div class="foot"><a href="/manual/add-note.php?sect=function.strrpos&amp;redirect=http://de1.php.net/manual/en/function.strrpos.php"><img src='/images/notes-add@2x.png' alt='add a note' width='12' height='12' /> <small>add a note</small></a></div>
</section>    </section><!-- layout-content -->
    
  </div><!-- layout -->
         
  <footer>
    <div class="container footer-content">
      <div class="row-fluid">
      <ul class="footmenu">
        <li><a href="/copyright.php">Copyright &copy; 2001-2014 The PHP Group</a></li>
        <li><a href="/my.php">My PHP.net</a></li>
        <li><a href="/contact.php">Contact</a></li>
        <li><a href="/sites.php">Other PHP.net sites</a></li>
        <li><a href="/mirrors.php">Mirror sites</a></li>
        <li><a href="/privacy.php">Privacy policy</a></li>
      </ul>
      </div>
    </div>
  </footer>

    
 <!-- External and third party libraries. -->
 <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript" src="http://de1.php.net/cached.php?t=1387527612&amp;f=/js/ext/modernizr.js"></script>
<script type="text/javascript" src="http://de1.php.net/cached.php?t=1385000409&amp;f=/js/ext/hogan-2.0.0.min.js"></script>
<script type="text/javascript" src="http://de1.php.net/cached.php?t=1389722415&amp;f=/js/ext/typeahead.min.js"></script>
<script type="text/javascript" src="http://de1.php.net/cached.php?t=1388312428&amp;f=/js/ext/mousetrap.min.js"></script>
<script type="text/javascript" src="http://de1.php.net/cached.php?t=1388140826&amp;f=/js/search.js"></script>
<script type="text/javascript" src="http://de1.php.net/cached.php?t=1389324093&amp;f=/js/common.js"></script>

<a id="toTop" href="javascript:;"><span id="toTopHover"></span><img width="40" height="40" alt="To Top" src="/images/to-top@2x.png"></a>

</body>
</html>

HEREDOC;

$vowelCounter = new VowelCounter($testString);
$vowelCounter->countVowels();


?>
