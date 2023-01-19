<?php



    // public function formatDate($date){
    //     return date('F jS, Y', strtotime($date));
    // }
    //
    // public function textShorten($text, $limit = 400){
    //     $text = $text. "";
    //     $text = substr($text, 0, $limit);
    //     $text = $text."...";
    //     return $text;
    // }
    //
    // public function validation($data){
    //     $data = trim($data);
    //     $data = stripcslashes($data);
    //     $data = htmlspecialchars($data);
    //     return $data;
    // }

    $filepath = realpath(dirname(__FILE__));
    require_once ($filepath.'/../vendor/autoload.php');

    $filepath = realpath(dirname(__FILE__));
    require_once ($filepath.'/../config/config.php');



    // Create the Transport
    $transport = (new Swift_SmtpTransport('mail.eufxp.com', 465, 'ssl'))
      ->setUsername(EMAIL)
      ->setPassword(PASSWORD)
    ;

    // Create the Mailer using your created Transport
    $mailer = new Swift_Mailer($transport);



  function sendVerificationEmail($user_email, $user_token){
      global $mailer;

      $body = '<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Verify Email</title>

        </head>
        <body>
            <div class="header">
              <a href="http://eufxp.ng/"><img src="http://eufxp.ng/img/logo.png" class="img-fluid" /></a>
            </div>
            <div class="wrapper">
                <p>
                  Hello, it is a pleasure and a great choice to have you onboard!
                </p>
                <p>
                  Let your journey begin here!
                </p>
                <p>
                  Follow the link to verify your account
                </p>
                <a href="http://eufxp.ng/login?user_token=' . $user_token . '">Verify Your Email Address</a>
                <p>
                    Your verification link is valid for 1 hour, do not share this link with anyone. If you did not
                    initiate this operation, ignore this message or contact us @
                    <a href="http://eufxp.ng/contact">Contact Us</a>
                </p>
                <p>
                  Your Smile, Our Smile!
                </p>
                <p>
                  Investion with us
                </p>
                <p>
                  EUFXP Team<br> Automated message please do not reply
                </p>
            </div>
            <div class="footer">
              <img src="http://eufxp.ng/img/ban3.jpg" class="img-fluid" />
            </div>
        </body>
        </html>';
      // Create a message
      $message = (new Swift_Message('Verify Your Email Address'))
        ->setFrom(EMAIL)
        ->setTo($user_email)
        ->setBody($body, 'text/html');

      // Send the message
      $result = $mailer->send($message);
    }












?>
