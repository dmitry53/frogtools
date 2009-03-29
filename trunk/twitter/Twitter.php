<?php
/*
Script originally written by A.J. Cates

You are free to modify and redistrubte this file.

This message must stay in the file.

If you do decide to use and or edit this file, please email me aj@ajcates.com

If I blog or write an article on this script I may link to you in my blog.
*/
class Twitter {
	var $userName; //The username
	var $url; //Our url for twitter
	var $simpXml; //The simple xml object
	var $xmlLocation; //the location to our local xml file
	var $timeOut; //Time to give the twitter server in seconds
	var $refresh; //Time before we get a refresh of our local file.
	var $baseDomain; //= twitter.com
	var $twitterCount;
	var $needed;
	public function Twitter($count) {
		$this->xmlLocation = CORE_ROOT . '/plugins/Twitter/twitter.xml';
		$this->timeOut = 3;
		$this->refresh = 10; //when we check to see if we need another twitter xml file
		$this->twitterCount = $count;
		$this->needed = false;
	}
	public function refreshNeeded() {
		//reuturns true or false depending on if we need to refresh our xml file
		clearstatcache();
		if(!$lastMod = filemtime($this->xmlLocation)) {
			return true;
		}
		$tenMinAgo = time() - ($this->refresh * 60);
		if($lastMod < $tenMinAgo) {
			$this->needed = true;
			return true;
		} else {
			$this->needed = false;
			return false;
		}
	}
	public function refreshXml() {
		//refreshes our xml file, returns true or false depending if succesful
		if($this->simpXml->asXML($this->xmlLocation)) {
			return true;
		} else {
			$fh = fopen($this->xmlLocation, 'w') or die('can\'t open file');
			if(fwrite($fh, $this->simpXml->asXML())) {
				return true;
			} else {
				return false;
			}
			fclose($fh);
		}
	}
	public function pullXml() {
		//will pull our xml and load it into our simple xml object returns true if succeful
		$fp = fsockopen($this->baseDomain, 80);
		if (!$fp) {
			return false;
		} else {
		    fwrite($fp, "GET $this->url HTTP/1.0\r\n\r\n");
		    stream_set_timeout($fp, $this->timeOut);
		    $info = stream_get_meta_data($fp);
		    fclose($fp);
		    if ($info['timed_out']) {
				return false;
		    } else {
				if($this->simpXml = @simplexml_load_file('http://' . $this->baseDomain . $this->url)) {
					return true;
				} else {
					$handle = fopen('http://' . $this->baseDomain . $this->url, 'rb');
					$contents = stream_get_contents($handle);
					fclose($handle);
					$this->simpXml = simplexml_load_string($contents);
				}
		    }
		}
	}
	public function drawTwitter($username) {
		//will draw our twitter
		$this->userName = $username;
		if($this->refreshNeeded()) {
			$this->buildUrl();
			$this->pullXml();
		} else {
			//$xmlFileName = CORE_ROOT.'/plugins/captcha/'."questions.xml";
			//$fp = fopen($this->xmlLocation, "rb");
			//$fileContents = fread($fp, filesize($this->xmlLocation)); 
			$this->simpXml = simplexml_load_file($this->xmlLocation);
		}
		$time = time();
		$i = 0;
		$returnTweet = array();
		foreach ($this->simpXml->status as $stat) {
			//the loop for each update....
			$date = $time - strtotime($stat->created_at);
			// $source = htmlspecialchars($stat->source);
			if(60 > $date) {
				//under a min
				$timePost = $date . ' seconds ago';
			} else if(3600 > $date) {
				//under an hour
				$timePost = floor($date/60) . ' minutes ago';
			} else if(86400 > $date) {
				//under a day
				$timePost = floor(($date/60)/60) . ' hours ago';
			} else if(604800 > $date) {
				//under a week
				$timePost = floor((($date/60)/60)/24) . ' days ago';
			} else if(2419200 > $date) {
				//under a month
				$timePost = floor(((($date/60)/60)/24)/7) . ' weeks ago';
			} else {
				//over a month
				$timePost = 'a long, long time ago';
			}
			$text = htmlentities($stat->text);
			$returnTweet[$i] = new Tweet();
			$returnTweet[$i]->id = $stat->id;
			$returnTweet[$i]->text = $text;
			$returnTweet[$i]->date = $timePost;
			$returnTweet[$i]->url = 'http://twitter.com/' . $this->userName . '/statuses/' . $stat->id;
			$returnTweet[$i]->source = $stat->source;
			$returnTweet[$i]->truncated = $stat->truncated;
			$returnTweet[$i]->in_reply_to_status_id = $stat->in_reply_to_status_id;
			$returnTweet[$i]->in_reply_to_user_id = $stat->in_reply_to_user_id;
			$returnTweet[$i]->favorited = $stat->favorited;
			$i++;
		}
		if($this->needed) {
			$this->refreshXml();
		}
		return $returnTweet;
	}
	public function buildUrl() {
		//will return a url for our twitter user. retruns false if the user name is not set.
		if(isset($this->userName)) {
			$this->url = '/statuses/user_timeline/'.$this->userName.'.xml?count=' . $this->twitterCount;
			$this->baseDomain = 'twitter.com';
			return $this->url;
		} else {
			return false;
		}
	}
}
class Tweet {
	var $id; //the id of the tweet
	var $text; //the text inside the tweet
	var $date; //the date the tweet was posted
	var $url; //the url of the tweet
	var $source; //source of the tweet
	var $truncated;
	var $in_reply_to_status_id;
	var $in_reply_to_user_id;
	var $favorited;
}
?>