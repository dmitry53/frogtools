<?php/* * * * * * * * * * * * * * * * * * * * * * * *  * * Contact Form - Basic contact form for Frog CMS * * Original Author: A.J. Cates; http://ajcates.com/ * Updated (1.0.1+) by: D.J. Reimer; http://erajad.byethost10.com/ * * Licensed under the MIT license: *   http://www.opensource.org/licenses/mit-license.php * * * * * * * * * * * * * * * * * * * * * * * * */
Plugin::setInfos(array(
    'id'          => 'contact_form',    'title'       => 'Contact Form',    'description' => 'A contact form plugin.',    'version'     => '1.0.2a',    'license'     => 'MIT',    'require_frog_version' => '0.9.2',    'update_url'  => 'http://frogtools.googlecode.com/svn/xml/frogtool-versions.xml',    'website'     => 'http://erajad.byethost10.com/articles/frog-contact-plugin'));
function makeForm($emailOut) {
if(isset($_POST["name"],$_POST["email"], $_POST["content"])) {
	$to = $emailOut;	$subject = $_POST["name"];	$message = $_POST["content"];	$from = $_POST["email"];	$headers = "From: $from";
	    if(empty($subject) || empty($from) || empty($message )) {            echo "<p><strong>Reload this page - fill in all fields!</strong></p>";        }  else {	mail($to,$subject,$message,$headers);	echo "<p><em>Message sent!</em></p><p>Please allow up to three days for a reply.</p>";		}
    } else {
	echo <<<END
<div class="contactForm"><form id="gb_form" method="post" action="#"><p>Name:<br /><input type="text" name="name"/></p><p>Email:<br /><input type="text" name="email"/></p><p>Message:<br /><textarea name="content" rows="10" cols="45" wrap="physical"></textarea></p><p><input class="submit" type="submit" value="Send"/></p></form></div>
END;
    }
}?>