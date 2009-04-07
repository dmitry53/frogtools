==Instructions==

Unzip and then place the contents in a folder named "twitter" in your /frog/plugins/ directory.

Put this code where you want to show your twitter updates in the backend of frog. Replacing "Twitter_User_Name" with your twitter username. The second parameter is the number of updates you would like pull.

	<? $tweets = twitterUpdates('Twitter_User_Name', 4); ?>

The tweet object is mostly the same as the [http://apiwiki.twitter.com/REST+API+Documentation#Statuselement Status Element] as described in the twitter documentation. I added 2 more items, url and date for convenience.

	<? foreach($tweets as $tweet): ?>
		<li class="tweet"><?=$tweet->text;?><span><a href="<?=$tweet->date?>"><?=$tweet->date;?></a></span></li>
	<? endforeach; ?>

Next you need to set the twitter.xml file to be readable and writable to php. You can do this by using the chmod command:

	chmod a+r+w twitter.xml