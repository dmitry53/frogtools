CONTACT FORM for FROG CMS


Version: 1.0.4

---


License: MIT

---


Original 1.0 version: "You are free to change modify and alter this
plugin in way shape or form, just provide a link back to ajcates.com in
the readme file or source code.

You may distribute this plugin freely but never sell it."

v. 1.0 Created by AJ Cates (http://ajcates.com/)
v. 1.0.1+ maintained by David Reimer (http://erajad.byethost.10.com/)
V. 1.0.2+ collaborative code on Frogtools (http://code.google.com/p/frogtools/)
USE THE ISSUE TRACKER AT GOOGLE CODE FOR ANY BUG REPORTS


About:

---

This simple contact form supplies three fields: name, email, and message.
The form is checked to ensure all fields are filled in; if any are missing,
the form must be reloaded.
As of 1.0.3, an additional field has been added to inhibit spambots.
See changelog.txt for complete updates listing.

How to setup:

---


1. Unzip (if you're reading this, you have!) and move the contents of the
"contact\_form" **folder** to your /frog/plugins/ directory.

2. Go to the "Administration" > "Plugins" tab in Frog's backend, and tick
the Contact Form box in the "Enabled" column. Click on the "Settings" tab,
go to the bottom of the page and click on the "Save" button.

3. Create your "contact" page (or using an appropriate current page),
insert this code into the "Body" portion:

<?php makeForm('yourEmail@yourSite.com'); ?>

with the email you wish the message to be sent to replacing the "dummy"
email address above.

(Note that the TinyMCE and Textile filters do **not** like raw PHP! So for
this page, use either the Markdown filter, or none at all.)

4. Add the following code to your site's CSS file:

.contactForm {
> width:308px;
}
.contactForm p {
> padding:10px;
}
.contactForm input {
> width:240px;
}
.contactForm textarea {
> width:281px;
> height:120px;
}
.submit {
> width:45px!important;
}
.hide {
> display:none;
}

5. Done!


How to update:

---


Simply replace the old /plugins/contact\_form/index.php file with the new one.


/////////////////////////