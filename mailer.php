<?php
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $to = 'paintballthunder2000@gmail.com'; 
    $subject = 'New Message at TequaBuilders.com';
    $human = $_POST['human'];

			
    $body = "From: $name\n E-Mail: $email\n Message:\n $message";
				
    if ($_POST['submit']) {
        if ($name != '' && $email != '' && $message != '') {
            if ($human == '5') {				 
                if (mail ($to, $subject, $body, $from,"-f$email")) { 
                    echo '<p>Thank you for contacting Tequa Builders, your message has been received.  Please click <a href="contact.html">here</a> to return to our website.</p>';
                }
            else { 
                echo '<p>Oops! Something went wrong, please click "back" on your browser and try again.</p>'; 
            } 
            }
            else if ($_POST['submit'] && $human != '4') {
                echo '<p>Sorry, you answered the anti-spam question incorrectly.  Please click "back" and try again.</p>';
            }
        }
        else {
            echo '<p>Whoops! You missed a required field. Please click "back" and fill it in!</p>';
        }
    }
?>