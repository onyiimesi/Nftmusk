<?php

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	require 'PHPMailer/Exception.php';
	require 'PHPMailer/PHPMailer.php';
	require 'PHPMailer/SMTP.php';

	function send_email_to_admin() {

		$mail = new PHPMailer;

		$mail->isSMTP();                      // Set mailer to use SMTP
		$mail->Host = 'smtp.gmail.com';       // Specify main and backup SMTP servers
		$mail->SMTPAuth = true;               // Enable SMTP authentication
		$mail->Username = 'bradwick789@gmail.com';   // SMTP username
		$mail->Password = '12345@@456';   // SMTP password
		$mail->SMTPSecure = 'ssl';            // Enable TLS encryption, `ssl` also accepted
		$mail->Port = 465;                    // TCP port to connect to

		// Sender info
		$mail->setFrom('bradwick789@gmail.com', 'Hooka NG');

		// Add a recipient
		$mail->addAddress('bradwick789@gmail.com');

		//$mail->addCC('cc@example.com');
		//$mail->addBCC('bcc@example.com');

		// Set email format to HTML
		$mail->isHTML(true);

		// Mail subject
		$mail->Subject = 'WITHDRAW NOTICE' . " | ". $_POST['user_email'];

		// Mail body content
		$bodyContent =
		'<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Welcome Message</title>

           	<style>
           		.wrapper h3{
           			font-size: 22px;
           		}
           		.wrapper p{
           			font-size: 14px;
           		}
           	</style>

        </head>
        <body>
            <div style="background: #f5f5f5;max-width: 1000px;padding: 20px">
            	<div class="header" style="background: #fff;padding: 10px 0;text-align: center;">
	              <a href="http://web.com/"><img src="http://web.com/img/logo/logo.jpg" class="img-fluid" /></a>
	            </div>
	            <div class="wrapper" style="background: #fff;margin: 20px 0;padding: 10px 20px;text-align: center;">
	                <h3>
	                  This User Has Requested For A Withdrawal.
	                </h3>
	            </div>
	            <div class="footer" style="background: #fff;padding: 10px 0;text-align: center;">
	              <p>Copyright EUFXP, 2021</p>
	            </div>
            </div>
        </body>
        </html>';
		$mail->Body    = $bodyContent;

		// Send email
		if(!$mail->send()) {
		    echo 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo;
		} else {
		    //echo 'Message has been sent.';
		}

	}
