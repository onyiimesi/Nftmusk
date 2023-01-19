<?php

$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');

$filepath = realpath(dirname(__FILE__));
require_once ($filepath.'/../format/helper.php');



?>

<?php

  class User{

        private $db;
        private $format;

        public function __construct(){
        $this->db = new Database();
        $this->format = new Format();

        }


        public function userRegistration($data){
            $username = mysqli_real_escape_string($this->db->link, $data['username']);
            $user_email = mysqli_real_escape_string($this->db->link, $data['user_email']);
            $user_wallet_id = mysqli_real_escape_string($this->db->link, $data['user_wallet_id']);
            $user_country = mysqli_real_escape_string($this->db->link, $data['user_country']);

            $user_token = bin2hex(random_bytes(50));
            $user_unique_id = uniqid();
            $user_pass = mysqli_real_escape_string($this->db->link, md5($data['user_pass']));
            $otp = rand(100000,999999);
            $_SESSION['otp'] = $otp;
            $_SESSION['mail'] = $user_email;

            $date = date("Y-m-d");

            $ip = $_SERVER['REMOTE_ADDR'];



            // $query = "SELECT * FROM users WHERE user_email = '$user_email' ";
            // $results = $this->db->select($query);
            // if($results){
            //
            //   while($result = $results->fetch_assoc()){
            //     $user_id = $result['user_id'];
            //   }

              if (isset($data['refer'])) {
                $refer = $data['refer'];

                $mailquery = "SELECT * FROM referral WHERE newuseremail = '$user_email' LIMIT 1 ";
                $mailcheck = $this->db->select($mailquery);
                if($mailcheck != false){
                    return "<div class='alert alert-danger'>Email already exist.</div>";
                }else{
                  $query = "INSERT INTO referral(senderid, newuseremail, newusername) VALUES('$refer', '$user_email', '$username')";
                  $refer = mysqli_query($this->db->link, $query);
                }

              }



            if($username == "" || $user_email == "" || $user_wallet_id == "" || $user_country == "" || $user_pass ==
            ""){
                return "<div class='alert alert-danger' role='alert'>Field must not be empty.</div>";
            }

            if(empty($data['user_pass'])){
                $msg = "<div class='alert alert-danger' role='alert'>Password can not be empty.</div>";
                return $msg;
            }

            if(strlen($data['user_pass']) < 8){
                $msg = "<div class='alert alert-danger' role='alert'>Password must be 8 characters long.</div>";
                return $msg;
            }

            $walquery = "SELECT * FROM users WHERE user_wallet_id = '$user_wallet_id' LIMIT 1 ";
            $walcheck = $this->db->select($walquery);
            if($walcheck != false){
                return "<div class='alert alert-danger'>BSC Wallet Address Already Exist.</div>";
            }

            $mailquery = "SELECT * FROM users WHERE user_email = '$user_email' LIMIT 1 ";
            $mailcheck = $this->db->select($mailquery);
            if($mailcheck != false){
                return "<div class='alert alert-danger'>Email Address Already Exist.</div>";
            }

            $ipquery = "SELECT * FROM users WHERE ip_address = '$ip' LIMIT 1 ";
            $ipcheck = $this->db->select($ipquery);
            if($ipcheck != false){
                return "<div class='alert alert-danger'>Device Already Registered.</div>";
            }

            if(!preg_match("~@gmail\.com$~",$user_email) && !preg_match("~@yahoo\.com$~",$user_email) && !preg_match("~@outlook\.com$~",$user_email) && !preg_match("~@icloud\.com$~",$user_email) && !preg_match("~@zohomail\.com$~",$user_email) && !preg_match("~@mail\.com$~",$user_email) && !preg_match("~@gmx\.com$~",$user_email) && !preg_match("~@protonmail\.com$~",$user_email)){
                return "<div class='alert alert-danger'>Can't perform this action, use a different service provider.</div>";
            }

            if (!filter_var($user_email, FILTER_VALIDATE_EMAIL)) {
                return "<div class='alert alert-danger'>Invalid Email Format.</div>";
            }else{
                $query = "INSERT INTO users(ip_address,username,user_email,user_wallet_id,user_country,new_wallet_coins,wallet_date,otp,user_verified,admin_verify,user_token,user_unique_id,user_pass)
                VALUES('$ip','$username','$user_email','$user_wallet_id','$user_country',0,'$date','$otp',0,0,'$user_token','$user_unique_id','$user_pass') ";
                $insert_user = $this->db->insert($query);

                if($insert_user){

                    require "Mail/phpmailer/PHPMailerAutoload.php";
                    $mail = new PHPMailer(true);

                    $mail->isSMTP();
                    $mail->Host='mail.nftmusk.us';
                    $mail->Port=465;
                    $mail->SMTPAuth=true;
                    $mail->SMTPSecure='ssl';

                    $mail->Username='support@nftmusk.us';
                    $mail->Password='i@CoIwm3=mXH';

                    $mail->setFrom('support@nftmusk.us', 'OTP Verification');
                    $mail->addAddress($_POST["user_email"]);

                    $mail->isHTML(true);
                    $mail->Subject="Your verify code";
                    $mail->Body="<!DOCTYPE html>
                        <html lang='en'>
                        <head>
                            <meta charset='UTF-8'>
                            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                            <title>Verify Email</title>

                            <style>

                                .wrapper{
                                    background: #f5f5f5;
                                    padding: 20px 0 30px 20px;
                                    border-radius: 5px;
                                    text-align: center;
                                }

                                .otp{
                                    width: 200px;
                                    padding: 1px;
                                    background: #16638f;
                                    border-radius: 8px;
                                    margin: 0 auto;
                                }
                                .otp h4{
                                    letter-spacing: 0.7em;
                                    color: #fff;
                                    font-size: 18px;
                                }
                                p{
                                    color: #333;
                                    text-align: center;
                                }

                                .header{
                                    text-align: center;
                                    margin: 10px 0 20px 0;
                                }

                            </style>
                        </head>
                        <body>
                            
                            <div class='wrapper'>
                                <div class='header'>

                                    <img src='/img/logo.png' />

                                </div>

                                <h3>Dear $username,</h3>
                                <h4>
                                    Verify O.T.P
                                </h4>
                                <div class='otp'>
                                    <h4>$otp</h4>
                                </div>
                                <p>The code expires in 10 minutes.</p>
                            </div>
                        </body>
                        </html>
                    ";

                    if(!$mail->send()){
                        ?>
                            <script>
                                alert("<?php echo "Registration Failed, Invalid Email "?>");
                            </script>
                        <?php
                    }else{
                        ?>
                        <script>
                            alert("<?php echo "Registration Successful, OTP sent to " . $user_email ?>");
                            window.location.replace('/verify-account');
                        </script>
                        <?php
                    }

                }else{
                    return "<div class='alert alert-danger' role='alert'>Registration not Successful.</div>";
                  }
            }

        }

        public function userVerify($data){


            $otp = $_SESSION['otp'];
            $user_email = $_SESSION['mail'];
            $otp_code = mysqli_real_escape_string($this->db->link, $data['otp_code']);

            if ($otp_code == "") {
                return "<div class='alert alert-danger'>Please fill in the field.</div>";
            }



            if($otp != $otp_code){
                ?>
               <script>
                   alert("Invalid OTP code");
               </script>
               <?php
            }else{

                $query = "UPDATE users SET user_verified = 1 WHERE user_email = '$user_email'";
                $update_query = $this->db->update($query);



                if ($update_query) {
                    $walletquery = "SELECT * FROM users WHERE user_email = '$user_email' LIMIT 1 ";
                    $walletcheck = $this->db->select($walletquery);

                    if ($walletcheck) {
                        $value = $walletcheck->fetch_assoc();
                        Session::set("UserLogin", true);
                        Session::set("UserId", $value['user_id']);
                        Session::set("UserEmail", $value['user_email']);
                        Session::set("user_verified", $value['user_verified']);
                        Session::set("AdminVerify", $value['admin_verify']);
                    }
                }

                ?>
                 <script>
                     alert("Verfiy Account Done");
                       window.location.replace("/dashboard/pending");
                 </script>
                 <?php
            }

        }

        public function userLogin($data){

            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'] ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR'];

            $user_email = mysqli_real_escape_string($this->db->link, $data['user_email']);
            $user_pass = mysqli_real_escape_string($this->db->link, md5($data['user_pass']));

            if($user_email == "" || $user_pass == ""){
                return "<div class='alert alert-danger' role='alert'>Field must not be empty.</div>";
            }

            if(empty($data['user_pass'])){
                $msg = "<div class='alert alert-danger' role='alert'>Password can not be empty.</div>";
                return $msg;
            }

            $check = "SELECT * FROM users WHERE user_email = '$user_email' LIMIT 1 ";
            $chk = $this->db->select($check);

            if ($chk) {
                $value = $chk->fetch_assoc();

                $ips = $value['ip_address'];
            }

            if(empty($ips)){

                $query = "UPDATE users SET ip_address = '$ip' WHERE user_email = '$user_email' ";
    
                $update_row = $this->db->update($query);
            }


            $query = "SELECT * FROM users WHERE user_email = '$user_email' AND user_pass = '$user_pass' AND user_verified = 1 AND ip_address = '$ip' ";
            $result = $this->db->select($query);

            if($result != false){
                $value = $result->fetch_assoc();
                Session::set("UserLogin", true);
                Session::set("UserId", $value['user_id']);
                Session::set("UserEmail", $value['user_email']);
                Session::set("user_verified", $value['user_verified']);
                Session::set("UserFullname", $value['username']);
                Session::set("UserWallet", $value['user_wallet_id']);
                Session::set("AdminVerify", $value['admin_verify']);

                header("Location: /dashboard/home");

            }else{
                return "<div class='alert alert-danger'>Email or Password don't match</div>";
            }

            $notverify = "SELECT * FROM users WHERE user_email = '$user_email' AND user_pass = '$user_pass' AND user_verified = 1 AND admin_verify = 0 LIMIT 1 ";
            $notcheck = $this->db->select($notverify);

            if($notcheck != false){
                $value = $notcheck->fetch_assoc();
                Session::set("UserLogin", true);
                Session::set("UserId", $value['user_id']);
                Session::set("UserEmail", $value['user_email']);
                Session::set("user_verified", $value['user_verified']);
                Session::set("UserFullname", $value['username']);
                Session::set("UserWallet", $value['user_wallet_id']);
                Session::set("AdminVerify", $value['admin_verify']);

                header("Location: /dashboard/pending");

            }
            
        }

        public function verifyUser($user_token){

          $user_token = mysqli_real_escape_string($this->db->link, $user_token);

          $sql = "SELECT * FROM users WHERE user_token = '$user_token' LIMIT 1 ";
          // $result = $this->db->select($sql);
          $result = mysqli_query($this->db->link, $sql);

          if (mysqli_num_rows($result) > 0) {
//            $user = mysqli_fetch_assoc($result);
            $update_query = "UPDATE users SET user_verified = 1 WHERE user_token = '$user_token' ";
            $query = mysqli_query($this->db->link, $update_query);

            if ($query != false) {

              header("Location: /login");


            }
          }else{
            echo "User not found";
          }
        }


        public function getUserCoin($id){

            $query = "SELECT * FROM users WHERE user_id = '$id' ";
            $result = $this->db->select($query);
            return $result;

        }

        public function reinvest(){
            $id = Session::get("UserId");

            $email = Session::get("UserEmail");

            $squery = "SELECT * FROM users WHERE user_email = '$email' ";
            $result = $this->db->select($squery)->fetch_assoc();

            $wallet_coins = $result['new_wallet_coins'];
            $percentToGet = 80;
            $percentInDecimal = $percentToGet / 100;
            $totalamount = $percentInDecimal * $wallet_coins;


            $wallet_date = $result['wallet_date'];
            $wallet_date = strtotime($wallet_date);
            $wallet_dates = strtotime("+8 day", $wallet_date);
            $wallet_date = date('Y-m-d h:i:s', $wallet_dates);





            if($wallet_coins <= 299){
              $percentToGet = 10;
              $percentInDecimal = $percentToGet / 100;
              $totalamount = $percentInDecimal * $wallet_coins;

            }else if($wallet_coins <= 999){

              $percentToGet = 15;
              $percentInDecimal = $percentToGet / 100;
              $totalamount = $percentInDecimal * $wallet_coins;

            }else if($wallet_coins <= 9999){

              $percentToGet = 20;
              $percentInDecimal = $percentToGet / 100;
              $totalamount = $percentInDecimal * $wallet_coins;

            }else if($wallet_coins <= INF){

              $percentToGet = 30;
              $percentInDecimal = $percentToGet / 100;
              $totalamount = $percentInDecimal * $wallet_coins;

            }

            date_default_timezone_set('Africa/Lagos');

            // $querys = "CREATE EVENT history$id ON SCHEDULE AT CURRENT_TIMESTAMP + INTERVAL 1 MINUTE DO INSERT INTO history(history_title,history_desc) VALUES('Test MySQL Event 3','aa'); END";
            // // $update_querys = $this->db->insert($querys);


            


            $query = "UPDATE users SET new_wallet_coins = new_wallet_coins + $totalamount, wallet_date = '$wallet_date' WHERE user_id = '$id' ";
            $update_query = $this->db->update($query);

            if($update_query){ ?>

                <script>
                    if ( window.history.replaceState ) {
                        window.history.replaceState( null, null, window.location.href );
                    }
                </script>
                <?php
                return "<div class='alert alert-success'>Added Successfully!</div>";

            }else{
                return "<div class='alert alert-success'>Error Occured.</div>";
            }


        }

        public function upload($data, $file){

            $id = Session::get("UserId");
            $user_email = Session::get("UserEmail");
            $user_wallet_id = Session::get("UserWallet");

            $name = mysqli_real_escape_string($this->db->link, $data['name']);
            $link = mysqli_real_escape_string($this->db->link, $data['link']);
            $description = mysqli_real_escape_string($this->db->link, $data['description']);

            $row_count = "";
            $numrows = "SELECT * FROM user_upload WHERE user_email = '$user_email' AND month(date) = month(curdate()) ";
            $num_result = $this->db->select($numrows);

            if($num_result){
                $row_count = $num_result->num_rows;
            }

            $squery = "SELECT * FROM users WHERE user_id = '$id' ";
            $result = $this->db->select($squery)->fetch_assoc();

            $wallet_coins = $result['new_wallet_coins'];

            if($wallet_coins <= 299){
              $percentToGet = 10;
              $percentInDecimal = $percentToGet / 100;
              $totalamount = $percentInDecimal * $wallet_coins;

              
                if ($row_count >= 1) {
                    return "<div class='alert alert-danger'>Upgrade your account to upload.</div>";
                }

            }else if($wallet_coins <= 999){

              $percentToGet = 15;
              $percentInDecimal = $percentToGet / 100;
              $totalamount = $percentInDecimal * $wallet_coins;

                if($row_count >= 2){
                  
                    return "<div class='alert alert-danger'>Upgrade your account to upload.</div>";
                  
                }
                

            }else if($wallet_coins <= 9999){

              $percentToGet = 20;
              $percentInDecimal = $percentToGet / 100;
              $totalamount = $percentInDecimal * $wallet_coins;

                if($row_count >= 5){
                  
                    return "<div class='alert alert-danger'>Upgrade your account to upload.</div>";
                  
                }

            }else if($wallet_coins == INF){

              $percentToGet = 30;
              $percentInDecimal = $percentToGet / 100;
              $totalamount = $percentInDecimal * $wallet_coins;

              
            }



            $file_name = $file['file']['name'];
            $file_size = $file['file']['size'];
            $file_temp = $file['file']['tmp_name'];

            $div = explode('.', $file_name);
            $file_ext = strtolower(end($div));

            $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
            $uploaded_image = "images/user_upload/".$unique_image;

            $permit = array('jpg','jpeg','png','gif','svg','mp4','webm','mp3');

            if ($file_name == "" || $name == "") {
                
                return "<div class='alert alert-danger'>Field can't be empty.</div>";

            }


            if($file_size > 10000000){
                echo "<span class='danger'>Image size should be less than 100MB.</span>";
            }elseif(in_array($file_ext, $permit) === false){
                echo "<span class='danger'>You can upload only".implode(',', $permit)."</span>";
            }else{

                // return "<div class='alert alert-danger'>Upgrade Your Account.</div>";
                // die();

                move_uploaded_file($file_temp, $uploaded_image);

                $query = "INSERT INTO user_upload(user_email,user_wallet_id,file,name,link,description) 
                VALUES('$user_email','$user_wallet_id', '$uploaded_image', '$name', '$link', '$description') ";
                $insert_upload = $this->db->insert($query);

                if($insert_upload){ ?>

                    <script>
                        if ( window.history.replaceState ) {
                            window.history.replaceState( null, null, window.location.href );
                        }
                    </script>
                    <?php
                    return "<div class='alert alert-success'>Upload Successful.</div>";

                    
                }else{ ?>

                    <script>
                        if ( window.history.replaceState ) {
                            window.history.replaceState( null, null, window.location.href );
                        }
                    </script>
                    <?php
                    return "<div class='alert alert-danger'>Upload not Successful.</div>";
                }

            }
        }

        public function profileUpdate($data, $file, $id){

            $username = mysqli_real_escape_string($this->db->link, $data['username']);
            $user_country = mysqli_real_escape_string($this->db->link, $data['user_country']);

            $permit = array('jpg','jpeg','png','gif');
            $file_name = $file['user_image']['name'];
            $file_size = $file['user_image']['size'];
            $file_temp = $file['user_image']['tmp_name'];

            
    
            $div = explode('.', $file_name);
            $file_ext = strtolower(end($div));
    
            $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
            $uploaded_image = "images/profile/".$unique_image;

            if($username == ""){
                return "<div class='alert alert-danger'>Field must not be empty.</div>";
            }else{

                if(!empty($file_name)){
                    $sourceProperties = getimagesize($file_temp);
                    
                    $uploadImageType = $sourceProperties[2];
                    $sourceImageWidth = $sourceProperties[0];
                    $sourceImageHeight = $sourceProperties[1];

                    switch ($uploadImageType) {
                        case IMAGETYPE_JPEG:
                            $resourceType = imagecreatefromjpeg($file_temp); 
                            $imageLayer = $this->format->resizeProfileImage($resourceType,$sourceImageWidth,$sourceImageHeight);
                            imagejpeg($imageLayer,$uploaded_image);
                            break;
             
                        case IMAGETYPE_GIF:
                            $resourceType = imagecreatefromgif($file_temp); 
                            $imageLayer = $this->format->resizeProfileImage($resourceType,$sourceImageWidth,$sourceImageHeight);
                            imagegif($imageLayer,$uploaded_image);
                            break;
             
                        case IMAGETYPE_PNG:
                            $resourceType = imagecreatefrompng($file_temp); 
                            $imageLayer = $this->format->resizeProfileImage($resourceType,$sourceImageWidth,$sourceImageHeight);
                            imagepng($imageLayer,$uploaded_image);
                            break;
             
                        default:
                            $imageProcess = 0;
                            break;
                    }
                
            
                    if($file_size > 100000000){
                        echo "<span class='danger'>Image size should be less than 1MB.</span>";
                    }elseif(in_array($file_ext, $permit) === false){
                        echo "<span class='danger'>You can upload only".implode(',', $permit)."</span>";
                    }else{
                        move_uploaded_file($file_ext, $uploaded_image);
                        $query ="UPDATE users 
                        SET
                        username = '$username',
                        user_image = '$uploaded_image',
                        user_country = '$user_country'
                        WHERE user_id = '$id' ";
    
                        $update_row = $this->db->update($query);
                        if($update_row){
                            $msg = "<div class='alert alert-success'>Profile Updated Successfully.</div>";
                            return $msg;
                        }else{
                            $msg = "<div class='alert alert-danger'>Error updating profile.</div>";
                            return $msg;
                        }
                    }
                }else{

                    $query ="UPDATE users 
                    SET
                    username = '$username',
                    user_country = '$user_country'

                    WHERE user_id = '$id' ";

                    $update_row = $this->db->update($query);
                    if($update_row){
                        $msg = "<div class='alert alert-success'>Updated successfully.</div>";
                        return $msg;
                    }else{
                        $msg = "<div class='alert alert-danger'>Error updating.</div>";
                        return $msg;
                    }
                }

            }

        }

        public function getUserWithdraw($id){

            $query = "SELECT * FROM withdraw WHERE user_id = '$id' ";
            $result = $this->db->select($query);
            return $result;

        }
        public function getUserImage($email){
          $query = "SELECT * FROM user_upload WHERE user_email = '$email' ";
          $result = $this->db->select($query);
          return $result;        
        }

        public function passwordResetToken($data){
          
            $emailId = mysqli_real_escape_string($this->db->link, $data['email']);

            $query = "SELECT * FROM users WHERE user_email='" . $emailId . "' ";
            $result = $this->db->select($query);
  

            if($result){
              
               $token = md5($emailId).rand(10,9999);

               $expFormat = mktime(
               date("H"), date("i"), date("s"), date("m") ,date("d")+1, date("Y")
               );

              $expDate = date("Y-m-d H:i:s",$expFormat);

              $update = "UPDATE users SET reset_link_token='" . $token . "' ,exp_date='" . $expDate . "' WHERE user_email='" . $emailId . "'";

              $result = $this->db->update($update);

              $link = "<a href='http://musknft.web/reset-password?key=".$emailId."&token=".$token."'>Click To Reset password</a>";

              require "Mail/phpmailer/PHPMailerAutoload.php";
              $mail = new PHPMailer;

              $mail->CharSet =  "utf-8";
              $mail->IsSMTP();
              // enable SMTP authentication
              $mail->SMTPAuth = true;                  
              // GMAIL username
              $mail->Username = "support@nftmusk.us";
              // GMAIL password
              $mail->Password = "YUtZU6aek_a=";
              $mail->SMTPSecure = "ssl";  
              // sets GMAIL as the SMTP server
              $mail->Host = "mail.nftmusk.us";
              // set the SMTP port for the GMAIL server
              $mail->Port = "465";
              $mail->From='support@nftmusk.us';
              $mail->FromName='';
              $mail->AddAddress($emailId, 'reciever_name');
              $mail->Subject  =  'Reset Password';
              $mail->IsHTML(true);
              $mail->Body    = 'Click On This Link to Reset Password '.$link.'';
              if($mail->Send())
              {
                return "<div class='alert alert-success'>Check Your Email and Click on the link sent to your email</div>";
              }
              else
              {
                return "<div class='alert alert-danger'>Mail Error - > </div>".$mail->ErrorInfo;
              }
            }else{
              return "<div class='alert alert-danger'>Invalid Email Address. Go back </div>";
            }

            

        }

        public function passwordReset($data){

            $emailId = mysqli_real_escape_string($this->db->link, $data['email']);

            $token = mysqli_real_escape_string($this->db->link, $data['reset_link_token']);

            $password = md5($data['password']);

            $query = "SELECT * FROM `users` WHERE `reset_link_token`='".$token."' and `user_email`='".$emailId."'";
            $result = $this->db->select($query);

            if($result){
                $row_count = $result->num_rows;

                if($row_count){

                    $update = "UPDATE users set  user_pass='" . $password . "', reset_link_token='" . NULL . "' ,exp_date='" . NULL . "' WHERE user_email='" . $emailId . "'";
                    $result = $this->db->update($update);

                    if ($result) {
                        return "<div class='alert alert-success'>Congratulations! Your password has been updated successfully.</div> <div class='text-center mb-3'><a style='text-decoration: none;' class='bg-primary p-2 text-white' href='/login'>Login Here</a></div>";
                    }else{
                        return "<div class='alert alert-danger'>Something goes wrong. Please try again</div>";
                    }
                }
            }

            

        }


  }





?>
