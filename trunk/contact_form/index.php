<?php
Plugin::setInfos(array(
    'id'          => 'contact_form',
function makeForm($emailOut) {
if(isset($_POST["name"],$_POST["email"], $_POST["content"])) {
	$to = $emailOut;
	    if(empty($subject) || empty($from) || empty($message )) {
    } else {
	echo <<<END
<div class="contactForm">
END;
    }
}