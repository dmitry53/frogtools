# Twitter Plugin #

## About ##

A plugin for Frog CMS that will allow you to display your twitter feed anywhere inside Frog.

## Instructions ##
  1. nzip and then place the contents in a folder named "twitter" in your /frog/plugins/ directory.

  1. ut this code where you want to show your twitter updates. Replacing `Twitter_User_Name` with your twitter username. The second parameter is the number of updates you would like display:

```
<?php $tweets = twitterUpdates('Twitter_User_Name', 4); ?>
<?php foreach($tweets as $tweet): ?>
	<li class="tweet"><?php echo $tweet->text;?><span><a href="<?php echo $tweet->url?>"><?php echo $tweet->date;?></a></span></li>
<?php endforeach; ?>
```

The $tweets variable will now hold an array of the tweet class. You can simply loop through the array just like any other. The tweet object is mostly the same as the [Status Element](http://apiwiki.twitter.com/REST+API+Documentation#Statuselement) as described in the twitter documentation. I added 2 more items, url and date for convenience.

Next you need to set the twitter.xml file to be readable and writable to php. You can do this by using the [chmod](http://apiwiki.twitter.com/REST+API+Documentation#Statuselement) command:
```
chmod a+r+w twitter.xml
```