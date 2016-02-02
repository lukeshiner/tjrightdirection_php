<?php
require_once(dirname($_SERVER['DOCUMENT_ROOT']) . '/private/config.php');
require_once($PRIVATE . 'html/header.php');
$email = new tjrightdirection\Email();

if (isset($_POST['name']) && isset($_POST['message']) && (isset($_POST['phone']) || isset($_POST['email']))) {
    echo "<p>Name: {$_POST['name']}</p>\n";
    echo "<p>eMail: {$_POST['email']}</p>\n";
    echo "<p>Phone: {$_POST['phone']}</p>\n";
    echo "<p>Message:<textarea>{$_POST['message']}</textarea></p>\n";
    $message = "\n\neMail: {$_POST['email']}\n\nPhone: {$_POST['phone']}\n\n" . $_POST['message'];
    echo "<textarea>{$message}</textarea>\n";
    if ($email->sendContactFormMessage($_POST['name'], $message) == 0) {
        echo "<h3>Message Sent Successfully</h3>\n";
    } else {
        echo "<h3 class=\"error\">Message Failed!</h3>\n";
    }
} else {
    ?>
    <p class="page_header">To get in touch please call us on the number above, email us at <a href="mailto:info@tjrightdirection.co.uk">info@tjrightdirection.co.uk</a> or use the contact form below</p>
    <form id="contact_form" method="post">
        <label for="name">Name</lable>
        <input type="text" name="name" class="contact_input" id="contact_name" size="50" />
        <br />
        <label for="email">eMail Address</lable>
        <input type="email" name="email" class="contact_input" id="contact_email" size="41"/>
        <br />
        <label for="phone">Phone Number</lable>
        <input type="text" name="phone" class="contact_input" id="contact_phone" />
        <br />
        <label for="message">Message</lable>
        <textarea name="message" class="contact_input" id="contact_message" rows="30" cols="70"></textarea>
        <br />
        <input type="submit" id="contact_submit" class="contact_input" value="Submit" />
    </form>
    <?php
}
require_once($PRIVATE . 'html/footer.php');
