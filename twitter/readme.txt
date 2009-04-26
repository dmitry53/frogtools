License:
========
Script originally written by A.J. Cates(http://ajcates.com) -  aj@ajcates.com
You may modify and redistribute this file as long as the following stays true:
	-You can not sell this file or trade it for goods or services, it must be given away.
	-This message must stay in the file.
	-If this file is edited and redistributed you must leave a message that must include your name & email(You can include more if you want).
	-If you do decide to use and or edit this file consider emailing me.
	-If I blog or write an article on this script I may want to link to you in the article as an example.

About:
======
A plugin for Frog CMS that will allow you to display your twitter feed anywhere inside Frog.

Instructions:
=============
1. Unzip and then place the contents in a folder named "twitter" in your /frog/plugins/ directory.
2. Put this code where you want to show your twitter updates. Replacing "Twitter_User_Name" with your twitter username. The second parameter is the number of updates you would like display:

<?php $tweets = twitterUpdates('Twitter_User_Name', 4); ?>
<?php foreach($tweets as $tweet): ?>
	<li class="tweet"><?php echo $tweet->text;?><span><a href="<?php echo $tweet->url?>"><?php echo $tweet->date;?></a></span></li>
<?php endforeach; ?>

The $tweets variable will now hold an array of the tweet class. You can simply loop through the array just like any other. The tweet object is mostly the same as the Status Element(See notes) as described in the twitter documentation. I added 2 more items, url and date for convenience.

Next you need to set the twitter.xml file to be readable and writable to php. You can do this by using the chmod command(See notes):

chmod a+r+w twitter.xml

Notes
=====
http://unixhelp.ed.ac.uk/CGI/man-cgi?chmod - Moreinfo on the CHMOD command
http://apiwiki.twitter.com/REST+API+Documentation#Statuselement - Moreinfo on the Status Element