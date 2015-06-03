<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;
?>
<?php

$today 		= strtotime(date("Y-m-d H:i:s"));
$blackbegin = strtotime("2014-11-28");
$blackend 	= strtotime("2014-12-02");
if($today > $blackbegin && $today < $blackend) : ?>
		
<?php endif;?>
	
<div style="font: 40px Tahoma, Helvetica, Arial, Sans-Serif;
 text-align: center;color: #222;
text-shadow: 0px 2px 3px #555;">Popups Plus</div>

<div>If you want to show a facebook popup box generate code from here.
<a style="display:block" href="https://developers.facebook.com/docs/plugins/page-plugin">Generate code from official facebook page.</a>
<a style="display:block" href="http://ipics32.blogspot.com/p/generate-facebook-code.html">If you are having issues generate from here.</a>