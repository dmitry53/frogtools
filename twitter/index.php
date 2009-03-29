<?php
/*
Script originally written by A.J. Cates

You are free to modify and redistrubte this file.

This message must stay in the file.

If you do decide to use and or edit this file, please email me aj@ajcates.com

If I blog or write an article on this script I may link to you in my blog.
*/
Plugin::setInfos(array(
	'id'          => 'twitter',
	'title'       => 'Twitter',
	'description' => 'Adds in twitter functionality. See readme.txt in plugin folder.',
	'version'     => '1.0.0',
	'license'     => 'MIT',
	'author'      => '<a href="http://ajcates.com">A.J. Cates</a>',
	'website'     => 'http://code.google.com/p/frogtools/wiki/TwitterPluginReadMe',
	'update_url'  => 'http://frogtools.googlecode.com/svn/xml/frogtool-versions.xml',
	'require_frog_version' => '0.9.3'
));

include "Twitter.php";

function twitterUpdates($userName, $count=5) {
	$myTwitter = new Twitter($count);
	return $myTwitter->drawTwitter($userName);
}

?>