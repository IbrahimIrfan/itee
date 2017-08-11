<?php
if(isset($_POST['submit'])) {

 $email = strip_tags(trim($_POST['email']));
 $fname = strip_tags(trim($_POST['firstname']));


 if ($medInfo == ""){
   $medInfo = "None";
 }
 $error = false;

 if (empty($email) || empty($fname)){
   $error = true;
 }

 if (!$error) {
   // send confirmation email

         require 'PHPMailer/PHPMailerAutoload.php';

         $mail = new PHPMailer;

         $mail->isSMTP();
         $mail->Host = 'smtp.gmail.com';
         $mail->SMTPAuth = true;
         $mail->Username = 'email@gmail.com';
         $mail->Password = 'password';
         $mail->SMTPSecure = 'tls';
         $mail->Port = 587;

         $mail->setFrom('email@gmail.com', 'ITEE Group Canada');
         $mail->addAddress($email);               // recipient

         $mail->isHTML(true);           // Set email format to HTML

         
         $mail->Subject = 'New Form Submission: "' + $subject + '"';
         $mail->Body    = $emailbody;

         if(!$mail->send()) {
           $errMSG = 'Mailer Error: ' . $mail->ErrorInfo;
         }
  }
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
                <li class="active"><a href='contact.html'><span>Contact</span></a></li>
            </ul>
        </div>

        <div class="main">
            <h1 class="heading2">Contact Us</h1>
            <div class="subheading2">Start the conversation.</div>

            <div class="whiteBackground scroll" id="contactContainer">
            <div class="bothTablesWrapper">
                <div class="formContainer">
                    <form id="contact" method='post'>

                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input" type="text" id="firstname" name="firstname">
                            <label class="mdl-textfield__label" for="firstname">Name<span class="red">*</span></label>
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
                            <textarea class="mdl-textfield__input" type="text" rows="5" id="message"></textarea>
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
                        <a href="http://googlemapslink" target="_blank">
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
