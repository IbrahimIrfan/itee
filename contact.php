<?php
if(isset($_POST['submit'])) {

  $name = strip_tags(trim($_POST['name']));
  $email = strip_tags(trim($_POST['email']));
  $subject = strip_tags(trim($_POST['subject']));
  $message = strip_tags(trim($_POST['message']));

  $error = false;
  $errorCode = 0;

  if (empty($email) || empty($name)|| empty($subject)|| empty($message)){
   $error = true;
   $errorCode = 1;
  }
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
   $error = true;
   $errorCode = 2;
  }

  if (!$error) {

   // send confirmation email
   require 'PHPMailer/PHPMailerAutoload.php';

   $mail = new PHPMailer;

   $mail->isSMTP();
   $mail->Host = 'smtp.gmail.com';
   $mail->SMTPAuth = true;
   $mail->Username = 'noreplyitee@gmail.com';
   $mail->Password = 'PxPZkxu4Cs92';
   $mail->SMTPSecure = 'tls';
   $mail->Port = 587;
   $mail->isHTML(true);

   $mail->AddReplyTo($email, $name);
   $mail->setFrom('noreplyitee@gmail.com', 'ITEE Group Canada');
   $mail->addAddress('1ibrahimirfan@gmail.com'); //todo: change to iteecanada email

   $mail->Subject = 'New Form Submission: "' . $subject . '"';
   $mail->Body    = 'A new form submission was made:<br><br>Name: ' . $name .
   '<br>Subject: ' . $subject . '<br>Email: ' . $email . '<br>Message: ' . $message;

   if(!$mail->send()) {
    $errorCode = $mail->ErrorInfo;
    }

    $mail->addAddress($email);

    $mail->Subject = 'Thanks for contacting us!';
    $mail->Body    = 'Hi ' . $name . '<br><br>Thank you for contacting ITEE Group Canada.' .
      ' A representative will respond to your inquiry as soon as possible.<br><br>Have a great day,' .
      '<br><br>ITEE Group Canada<br>iteegroupcanada.com<br>info@iteecanada.com<br>(647)-224-7866<br>Skyward Business Centre - 2255 Dundas St W, Mississauga ON, Canada';

    if(!$mail->send()) {
     $errorCode = $mail->ErrorInfo;
    }
  }

  header("Location: http://itee.unaux.com/contact.php?error=".$errorCode."");

}

?>

<html>

<head>
    <title>ITEE Group Canada</title>
    <link rel="stylesheet" type="text/css" href="css/main-1.1.css"></link>
    <link rel="stylesheet" type="text/css" href="css/menu.css"></link>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.red-yellow.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        .fluid-ratio-resize {
            background-image: url(img/background.jpg);
        }
    </style>
</head>

<body>
    <div class="fluid-ratio-resize">

        <div id='cssmenu'>
            <ul>
                <li><a href='index.html'><span>Home</span></a></li>
                <li><a href='about.html'><span>About</span></a></li>
                <li><a href='services.html'><span>Services</span></a></li>
                <li class="active"><a href='contact.php'><span>Contact</span></a></li>
            </ul>
        </div>

        <div class="main">
            <h1 class="heading2">Contact Us</h1>
            <div class="subheading2">Start the conversation.</div>

            <div class="whiteBackground scroll" id="contactContainer">
            <div id="errorMSG"></div>
            <div class="bothTablesWrapper">
                <div class="formContainer">
                    <form id="contact" method='post'>

                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input" type="text" id="name" name="name">
                            <label class="mdl-textfield__label" for="name">Name<span class="red">*</span></label>
                        </div>

                        </br>

                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input" type="text" id="email" name="email">
                            <label class="mdl-textfield__label" for="email">Email<span class="red">*</span></label>
                        </div>

                        </br>

                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input" type="text" id="subject" name="subject">
                            <label class="mdl-textfield__label" for="subject">Subject<span class="red">*</span></label>
                        </div>

                        <!-- -->
                        </br>

                        <div class="mdl-textfield mdl-js-textfield">
                            <textarea class="mdl-textfield__input" type="text" rows="5" id="message" name="message"></textarea>
                            <label class="mdl-textfield__label" for="message">Message<span class="red">*</span></label>
                        </div>

                        <div class="disclaimer">Please note we work by appointment only.</div><br>
                        <input id="submit" name="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--primary" type="submit" value="Submit">
                        </input>
                    </form>

                </div>

                <div class="infoContainer">
                    <img class="contactIcon" src="img/phone.png" align="left">
                    <div class="contact">(647)-224-7866</div>
                    <br>
                      <a href="mailto:info@iteecanada.com" target="_blank">
                    <img class="contactIcon" src="img/email.png" align="left">
                    <div class="contact"><span class="link">info@iteecanada.com</span></div></a>
                        <br>
                        <a href="https://www.google.ca/maps/place/Skyward+Business+Centre/@43.5327588,-79.6733302,17z/data=!3m1!4b1!4m5!3m4!1s0x882b439537bc905b:0x55731e2e7ab7d44f!8m2!3d43.5327549!4d-79.6711362" target="_blank">
                        <img class="contactIcon" src="img/address.png" align="left">
                        <div class="contact">Skyward Business Centre <br>2255 Dundas St W, Mississauga ON, Canada</div>
                        <center><img class="mapImg" src="img/map.png"></center></a>
                    </div>

                </div>
              </div>
            </div>
        </div>



        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
        <script src="js/typing.js"></script>
        <script src="js/main-1.0.js"></script>
</body>

</html>
