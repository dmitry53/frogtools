CONTACT FORM for FROG CMS=========================Version: 1.0.2a--------------
License: MIT--------
Original 1.0 version: You are free to change modify and alter this plugin in way shape or form, just provide a link back to ajcates.com in the readme file or source code.
You may distribute this plugin freely but never sell it.
v. 1.0.1+ maintained by David Reimer (http://erajad.byethost.10.com/)
How to setup:-------------1. Unzip (if you're reading this, you have!) and move the contents of the "contact_form" *folder* to your /frog/plugins/ directory.2. Go to the "Administration" > "Plugins" tab in Frog's backend, and tick the Contact Form box in the "Enabled" column. Click on the "Settings" tab, go to the bottom of the page and click on the "Save" button.
3. Create your "contact" page (or using an appropriate current page), insert this code into the "Body" portion:
<?php makeForm(yourEmail@yourSite.com); ?>with the email you wish the message to be sent to replacing the "dummy" email address above.(Note that the TinyMCE filter does *not* like raw PHP! So for this page, use either the Markdown filter, or none at all.)
4. Add the following code to your site's css file:
.contactForm {  width:308px;}.contactForm p {  padding:10px;}.contactForm input {  width:240px;}.contactForm textarea {  width:281px;  height:120px;}.submit {  width:45px!important;}5. Done!How to update:--------------Simply replace the old /plugins/contact_form/index.php file with the new one.
/////////////////////////
Change log:-----------1.0.2a [2009.03.02]- added 'update_url' XML option- added update instruction to doc1.0.2 [2009.02.28]- revised error check logic to ensure cleaner exit- text altered to provide more generic messages- a little more code-tidying1.0.1- added simple error check to prevent sending empty fields- enhanced documentation (this file)- added MIT license to this version
1.0- It works![end]