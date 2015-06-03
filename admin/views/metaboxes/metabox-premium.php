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
<a style="display:block" target="_blank" href="https://developers.facebook.com/docs/plugins/page-plugin">Generate code from official facebook page.</a>
<a style="display:block" target="_blank" href="http://ipics32.blogspot.com/p/generate-facebook-code.html">If you are having issues generate from here.</a>
Note: If you want to create a facebook page like popup you must set <a href="#sectri">trigger action seconds</a> to zero otherwise it will not work correctly.
Facebook script is already added you do not need to add it again. You should set width to 350px for perfect working.