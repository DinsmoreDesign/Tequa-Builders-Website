<?php 
    //set validation error flag as false
    $error = false;
    //check if form is submitted
    if (isset($_POST['submit']))
    {
        $name = trim($_POST['txt_name']);
        $fromemail = trim($_POST['txt_email']);
        $subject = trim($_POST['txt_subject']);
        $message = trim($_POST['txt_msg']);
        $valid = trim($_POST['txt_valid']);

        //name can contain only alpha characters and space
        if (!preg_match("/^[a-zA-Z ]+$/",$name))
        {
            $error = true;
            $name_error = "Please enter valid name";
        }
        if(!filter_var($fromemail,FILTER_VALIDATE_EMAIL))
        {
            $error = true;
            $fromemail_error = "Please enter a valid email";
        }
        if(empty($subject))
        {
            $error = true;
            $subject_error = "Please enter a subject";
        }
        if(empty($message))
        {
            $error = true;
            $message_error = "Please enter a message";
        }
        if($valid !== "12")
        {
            $error = true;
            $valid_error = "Please enter the correct number";

        }
        if (!$error)
        {
            //send mail
            $toemail = "jd@tequabuilders.com";
            $subject = "Tequa Builders Inquiry " . $name;
            $body = "Message Details: \n\n Name: $name \n From: $fromemail \n Message: \n $message";
            $headers = "From: $fromemail\n";
            $headers .= "Reply-To: $fromemail";

            if (mail ($toemail, $subject, $body, $headers))
                $alertmsg  = '<div class="alert alert-success text-center">Your message was successfully sent.  We will get back to you shortly!</div>';
            else
                $alertmsg = '<div class="alert alert-danger">There was an error sending your email.  Please try again later.</div>';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tequa Builders | Contact</title>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/parallax.js"></script>
    
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/114x114.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/72x72.png">
    <link rel="apple-touch-icon-precomposed" href="img/57x57.png">
    <link rel="shortcut icon" href="img/favicon.png">
</head>
<body>

<!-- Navbar -->
    
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
            
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>                        
                </button>
            
                    <a class="navbar-brand" href="index.html">
                        <img src="img/logo-sm.png" alt="Tequa Builders Logo" class="img-responsive">
                    </a>
            </div>
            
            <div class="collapse navbar-collapse navbar-right" id="myNavbar">
                    <a href="index.html"><button>Home</button></a>
                    <a href="about.html"><button>About</button></a>
                    <a href="services.html"><button>Services</button></a>
                    <a href="contact.php"><button class="active">Contact</button></a>
            </div>
            
        </div>
    </nav>
    
<!-- Top Image -->
    
    <aside class="callout" id="imageheader-contact" data-speed="6" data-type="background">
        <div class="text-vertical-center">
            <h1 class="whitebox">Send us an email!</h1>
        </div>
    </aside>
    
<!-- Contact form -->
    
    <div class="orangebox">
        <div class="container" id="infobox">
            <div class="row">
                <div class="col-sm-10 col-sm-offset-1">
                    <form role="form" class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="contactform">
                        <fieldset>

                            <div class="form-group">
                                <div class="col-sm-2">
                                    <label for="txt_name" class="control-label">Name</label>
                                </div>
                                <div class="col-sm-10">
                                    <input class="form-control" name="txt_name" placeholder="John Doe" type="text" value="<?php if($error) echo $name; ?>" />
                                    <span class="text-danger"><?php if (isset($name_error)) echo $name_error; ?></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-2">
                                    <label for="txt_email" class="control-label">Email</label>
                                </div>
                                <div class="col-sm-10">
                                    <input class="form-control" name="txt_email" placeholder="youremail@example.com" type="text" value="<?php if($error) echo $fromemail; ?>" />
                                    <span class="text-danger"><?php if (isset($fromemail_error)) echo $fromemail_error; ?></span> 
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-2">
                                    <label for="txt_subject" class="control-label">Subject</label>
                                </div>
                                <div class="col-sm-10">
                                    <input class="form-control" name="txt_subject" placeholder="Help remodel my house!" type="text" value="<?php if($error) echo $subject; ?>" />
                                    <span class="text-danger"><?php if (isset($subject_error)) echo $subject_error; ?></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-2">
                                    <label for="txt_msg" class="control-label">Message</label>
                                </div>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="txt_msg" rows="4" placeholder="I'd like more information about..."><?php if($error) echo $message; ?></textarea>
                                    <span class="text-danger"><?php if (isset($message_error)) echo $message_error; ?></span>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="col-sm-2">
                                    <label for="txt_subject" class="control-label">5 + 7 = ?</label>
                                </div>
                                <div class="col-sm-10">
                                    <input class="form-control" name="txt_valid" placeholder="123456789" type="text" value="<?php if($error) echo $valid; ?>" />
                                    <span class="text-danger"><?php if (isset($valid_error)) echo $valid_error; ?></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-10 col-sm-offset-2">
                                    <input name="submit" type="submit" class="button" value="Send" />
                                </div>
                            </div>
                            
                        </fieldset>
                    </form>
                        <?php if (isset($alertmsg)) { echo $alertmsg; } ?>
                </div>
            </div>
        </div>
    </div>
    
<!-- Footer -->
    
    <footer class="graybox">
        <div class="container" id="footer">
            <div class="row">
                <div class="col-xs-6 text-left">
                    <p>© 2015
                    <br>
                    Tequa Builders, LLC.</p>
                </div>
                <div class="col-xs-6 text-right">
                    <p>Website by
                    <br>
                    <a href="http://dinsmore-design.com/">Dinsmore Design</a></p>
                </div>
            </div>
        </div>
    </footer>
    
</body>
</html>
