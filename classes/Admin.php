<?php

$filepath = realpath(dirname(__FILE__));

include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../format/helper.php');
?>

<?php


/**
 * Admin Login
 */
class Admin{

    private $db;
    private $format;

    public function __construct(){
       $this->db = new Database();
       $this->format = new Format();

    }

    public function addCoins($data){
      $coin_name = mysqli_real_escape_string($this->db->link, $data['coin_name']);
      $coin_amount = mysqli_real_escape_string($this->db->link, $data['coin_amount']);

      $query = "INSERT INTO coins(coin_name,coin_amount)
      VALUES('$coin_name','$coin_amount') ";
      $insert_user = $this->db->insert($query);

      if($insert_user){
          $msg = "<div class='alert alert-success' role='alert'>Added Successfully.</div>";
          return $msg;
      }else{
          $msg = "<div class='alert alert-danger' role='alert'>Added not Successful.</div>";
          return $msg;
      }

    }

    public function getAllCoins(){
      $query = "SELECT * FROM coins ";
      $result = $this->db->select($query);
      return $result;
    }

    public function delCoinById($id){
      $delquery = "DELETE FROM coins WHERE coin_id = '$id' ";
      $deldata = $this->db->delete($delquery);
      if($deldata){
          $msg = "<div class='alert alert-success' role='alert'>Coin deleted successfully.</div>";
          return $msg;
      }else{
          $msg = "<div class='alert alert-danger' role='alert'>Coin not deleted.</div>";
          return $msg;
      }
    }

    public function tronUpdate($tron){
      $tron = mysqli_real_escape_string($this->db->link, $tron);

      if(empty($tron)){
          $msg = "<div class='alert alert-danger' role='alert'>Field cannot be empty.</div>";
          return $msg;
      }else{
          $query = "UPDATE coins SET coin_amount = '$tron' WHERE coin_name = 'TRON' ";
          $update_query = $this->db->update($query);
          if($update_query){
              $msg = "<div class='alert alert-success' role='alert'>Coin updated successfully.</div>";
              return $msg;
          }else{
              $msg = "<div class='alert alert-danger' role='alert'>Coin not updated.</div>";
              return $msg;
          }
      }

    }


    public function addAdminUser($data){
      $admin_name = mysqli_real_escape_string($this->db->link, $data['admin_name']);
      $admin_user = mysqli_real_escape_string($this->db->link, $data['admin_user']);
      $admin_email = mysqli_real_escape_string($this->db->link, $data['admin_email']);
      $admin_pass = mysqli_real_escape_string($this->db->link, md5($data['admin_pass']));

      if($admin_name == "" || $admin_user == "" || $admin_email == "" || $admin_pass == ""){
                $msg = "<span class='danger'>Field must not be empty.</span>";
                return $msg;
      }

      $mailquery = "SELECT * FROM admin WHERE admin_email = '$admin_email' LIMIT 1 ";
            $mailcheck = $this->db->select($mailquery);
            if($mailcheck != false){
                $msg = "<span class='danger'>Email already exist.</span>";
                return $msg;
      }else{
          $query = "INSERT INTO admin(admin_name,admin_user,admin_email,admin_pass)
          VALUES('$admin_name','$admin_user','$admin_email','$admin_pass') ";
          $insert_user = $this->db->insert($query);

          if($insert_user){
              $msg = "<div class='alert alert-success' role='alert'>New User Added Successfully.</div>";
              return $msg;
          }else{
              $msg = "<div class='alert alert-danger' role='alert'>Not Successful.</div>";
              return $msg;
          }
        }

    }

    public function getAllAdminUsers(){
      $query = "SELECT * FROM admin ";
      $result = $this->db->select($query);
      return $result;
    }

    public function delAdminById($id){
      $delquery = "DELETE FROM admin WHERE admin_id = '$id' ";
      $deldata = $this->db->delete($delquery);
      if($deldata){
          $msg = "<div class='alert alert-success' role='alert'>User deleted successfully.</div>";
          return $msg;
      }else{
          $msg = "<div class='alert alert-danger' role='alert'>User not deleted.</div>";
          return $msg;
      }
    }

    public function verifyUserById($id){

      $squery = "SELECT * FROM users WHERE user_email = '$id' ";
      $result = $this->db->select($squery)->fetch_assoc();

      $wallet_date = $result['wallet_date'];
      $wallet_date = strtotime($wallet_date);
      $wallet_dates = strtotime("+8 day", $wallet_date);
      $wallet_date = date('Y-m-d h:i:s', $wallet_dates);

      $verifyuser = "UPDATE users SET admin_verify = 1, wallet_date = '$wallet_date' WHERE user_email = '$id' ";
      $verifydata = $this->db->update($verifyuser);

      $verifyrefer = "UPDATE referral SET admin_verify = 1 WHERE newuseremail = '$id' ";
      $verifydatas = $this->db->update($verifyrefer);



      $squery = "SELECT * FROM users WHERE user_email = '$id' ";
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

      $query = "CREATE EVENT IF NOT EXISTS reinvest ON SCHEDULE EVERY 1 MINUTE DO UPDATE users SET new_wallet_coins = new_wallet_coins + $totalamount WHERE user_email = '$id' AND admin_verify = 1 ";
      $update_query = $this->db->update($query);

      if($verifydata){ ?>

          <script>
              if ( window.history.replaceState ) {
                  window.history.replaceState( null, null, window.location.href );
              }
          </script>
          <?php
          return "<div class='alert alert-success' role='alert'>User verified successfully.</div>";
          
      }else{ ?>

            <script>
                if ( window.history.replaceState ) {
                    window.history.replaceState( null, null, window.location.href );
                }
            </script>
            <?php
          return "<div class='alert alert-danger' role='alert'>User not verified.</div>";
          
      }

    }

    public function delUserById($id){
      $delquery = "DELETE FROM users WHERE user_id = '$id' ";
      $deldata = $this->db->delete($delquery);
      if($deldata){
          $msg = "<div class='alert alert-success' role='alert'>User deleted successfully.</div>";
          return $msg;
      }else{
          $msg = "<div class='alert alert-danger' role='alert'>User not deleted.</div>";
          return $msg;
      }
    }

    public function getAllUsers(){
      $query = "SELECT * FROM users WHERE user_verified = '1' AND admin_verify = '1' ORDER BY wallet_date DESC ";
      $result = $this->db->select($query);
      return $result;
    }

    public function getVerifiedUsers(){
      $query = "SELECT * FROM users WHERE user_verified = '1' AND admin_verify = '0' ORDER BY wallet_date DESC ";
      $result = $this->db->select($query);
      return $result;
    }

    public function getUserById($id){
      $query = "SELECT * FROM users WHERE user_id = '$id' ";
      $result = $this->db->select($query);
      return $result;
    }

    public function getAllReferall(){
      $query = "SELECT users.*, referral.referral_id,referral.senderid, referral.newuseremail,referral.newusername,referral.admin_verify
            FROM users INNER JOIN referral ON users.user_unique_id = referral.senderid WHERE referral.admin_verify = 0 ORDER BY users.user_id DESC ";
        $result = $this->db->select($query);
        return $result;
    }

    public function delRefById($id){
      $delquery = "DELETE FROM referral WHERE referral_id = '$id' ";
      $deldata = $this->db->delete($delquery);
      if($deldata){
          $msg = "<div class='alert alert-success' role='alert'>Deleted successfully.</div>";
          return $msg;
      }else{
          $msg = "<div class='alert alert-danger' role='alert'>Delete not successful.</div>";
          return $msg;
      }
    }

    public function getNumRefer($refid){
      $query = "SELECT * FROM referral WHERE senderid = '$refid' AND admin_verify = 1 ";
      $result = $this->db->select($query);
      if($result){
          $row_count = $result->num_rows;
          echo $row_count;
      }elseif (empty($result)) {
          echo 0;
      }
    }

    public function getRefer($refid){
      $query = "SELECT users.*, referral.senderid, referral.newuseremail, referral.newusername,referral.admin_verify
            FROM users INNER JOIN referral ON users.user_unique_id = referral.senderid WHERE senderid = '$refid' AND referral.admin_verify = 0 ";
        $result = $this->db->select($query);
        return $result;
    }

    public function userUpdate($data, $id){
      $new_wallet_coins = mysqli_real_escape_string($this->db->link, $data['new_wallet_coins']);


      if($new_wallet_coins == ""){
          $msg = "<span class='danger'>Field must not be empty.</span>";
          return $msg;
      }else{
            $query ="UPDATE users
            SET
            new_wallet_coins = '$new_wallet_coins'
            WHERE user_id = '$id' ";

            $update_row = $this->db->update($query);
            if($update_row){
                $msg = "<div class='alert alert-success' role='alert'>Updated successfully.</div>";
                return $msg;
            }else{
                $msg = "<div class='alert alert-danger' role='alert'>Error updating Coin.</div>";
                return $msg;
            }
          }
    }

    // public function newCoinUpdate($data, $id){
    //   $new_wallet_coins = mysqli_real_escape_string($this->db->link, $data['new_wallet_coins']);
    //
    //
    //   if($new_wallet_coins == "" ){
    //       $msg = "<span class='danger'>Field must not be empty.</span>";
    //       return $msg;
    //   }else{
    //         $query ="UPDATE users
    //         SET
    //         new_wallet_coins = '$new_wallet_coins'
    //         WHERE user_id = '$id' ";
    //
    //         $update_row = $this->db->update($query);
    //         if($update_row){
    //             $msg = "<div class='alert alert-success' role='alert'>New Coin updated successfully.</div>";
    //             return $msg;
    //         }else{
    //             $msg = "<div class='alert alert-danger' role='alert'>Error updating Coin.</div>";
    //             return $msg;
    //         }
    //       }
    //   }
    //

      public function dateUpdate($data, $id){
        $rawdate = htmlentities($data['wallet_date']);
        $wallet_date = date('Y-m-d', strtotime($rawdate));
      
      
        $query ="UPDATE users SET wallet_date = '$wallet_date' WHERE user_id = '$id' ";
    
        $update_row = $this->db->update($query);

        if($update_row){?>

            <script>
                if ( window.history.replaceState ) {
                    window.history.replaceState( null, null, window.location.href );
                }
            </script>
            <?php
            return "<div class='alert alert-success' role='alert'>Date updated successfully.</div>";
            
        }else{?>

            <script>
                if ( window.history.replaceState ) {
                    window.history.replaceState( null, null, window.location.href );
                }
            </script>
            <?php
            return "<div class='alert alert-danger' role='alert'>Error updating Date.</div>";
            
        }
      
      }

      public function changePass($data){
          $old_pass = mysqli_real_escape_string($this->db->link, md5($data['opass']));
          $new_pass = mysqli_real_escape_string($this->db->link, md5($data['npass']));
          $confirm_pass = mysqli_real_escape_string($this->db->link, md5($data['cpass']));

          $id = Session::get("UserId");

          $query = "SELECT user_pass FROM users WHERE user_id = '{$id}' ";
          $result = $this->db->select($query);
          if($result){
              $row = $result->fetch_assoc();
              $oldpassword = $row['user_pass'];
          }


            if($old_pass == $oldpassword){
                if ($new_pass == $confirm_pass) {


                    $query = "UPDATE users SET
                    user_pass = '$new_pass'

                    WHERE user_id = '$id' ";

                    $update_query = $this->db->update($query);
                    if($update_query){
                        $msg = "<div class='alert alert-success' role='alert'>Password Changed Successfully.</div>";
                        return $msg;
                    }else{
                        $msg = "<div class='alert alert-danger' role='alert'>Password Change Not Successful.</div>";
                        return $msg;
                    }

                }else{
                    $msg = "<div class='alert alert-danger' role='alert'>New & Confirm Password Don't Match.</div>";
                    return $msg;
                }

            }else{
                $msg = "<div class='alert alert-danger' role='alert'>Old Password Don't Match.</div>";
                return $msg;
            }


        }

        public function withdraw($data){

          $id = Session::get("UserId");
          $squery = "SELECT * FROM users WHERE user_id = '$id' ";
          $result = $this->db->select($squery)->fetch_assoc();

          $user_wallet_id = $result['user_wallet_id'];

          $wallet_coins = $result['new_wallet_coins'];
          $percentToGet = 80;
          $percentInDecimal = $percentToGet / 100;
          $totalamount = $percentInDecimal * $wallet_coins;


          $wallet_id = mysqli_real_escape_string($this->db->link, $data['wallet_id']);
          $amount = mysqli_real_escape_string($this->db->link, $data['amount']);
          $id = Session::get("UserId");
          $email = Session::get("UserEmail");

          if ($amount > $totalamount) {
            $msg = "<div class='alert alert-danger' role='alert'>You can't withdraw more than your maximum amount ($totalamount)</div>";
            return $msg;
          }

          if ($amount >= 100) {
            $query = "INSERT INTO withdraw(user_id,user_email,amount,wallet_id,status)
            VALUES('$id','$email','$amount','$wallet_id','Pending') ";
            $insert_user = $this->db->insert($query);

            send_email_to_admin();

            if($insert_user){ ?>

                <script>
                    if ( window.history.replaceState ) {
                        window.history.replaceState( null, null, window.location.href );
                    }
                </script>
                <?php
                $msg = "<div class='alert alert-success' role='alert'>Withdraw Successful.</div>";
                return $msg;
            }else{ ?>

              <script>
                  if ( window.history.replaceState ) {
                      window.history.replaceState( null, null, window.location.href );
                  }
              </script>
                <?php
                $msg = "<div class='alert alert-danger' role='alert'>Not Successful.</div>";
                return $msg;
            }
          }else{ ?>

              <script>
                  if ( window.history.replaceState ) {
                      window.history.replaceState( null, null, window.location.href );
                  }
              </script>
                <?php
            $msg = "<div class='alert alert-danger' role='alert'>You can't withdraw below $100.</div>";
            return $msg;
          }

        }

        public function getAllWithdraws(){
          $query = "SELECT * FROM withdraw WHERE status = 'Pending' ";
          $result = $this->db->select($query);
          return $result;
        }

        public function delWithdrawById($id){
          $delquery = "DELETE FROM withdraw WHERE withdraw_id = '$id' ";
          $deldata = $this->db->delete($delquery);
          if($deldata){
              $msg = "<div class='alert alert-success' role='alert'>Deleted successfully.</div>";
              return $msg;
          }else{
              $msg = "<div class='alert alert-danger' role='alert'>Delete not successful.</div>";
              return $msg;
          }
        }

        public function transact($data){
          $transact_id = mysqli_real_escape_string($this->db->link, $data['transact_id']);
          $id = Session::get("UserId");
          $email = Session::get("UserEmail");

          if($transact_id == ""){
              $msg = "<div class='alert alert-danger' role='alert'>Field can't be empty.</div>";
              return $msg;
          }

          $query = "INSERT INTO deposit(user_id,user_email,transact_id)
          VALUES('$id','$email','$transact_id') ";
          $insert_user = $this->db->insert($query);

          $querys = "INSERT INTO deposit_two(user_id,user_email,transact_id)
          VALUES('$id','$email','$transact_id') ";
          $insert_users = $this->db->insert($querys);

          if($insert_user){
              $msg = "<div class='alert alert-success' role='alert'>Sent Successful.</div>";
              return $msg;
          }else{
              $msg = "<div class='alert alert-danger' role='alert'>Not Successful.</div>";
              return $msg;
          }


        }

        public function getAllDeposit(){
          $query = "SELECT * FROM deposit ";
          $result = $this->db->select($query);
          return $result;
        }

        public function delDepositById($id){
          $delquery = "DELETE FROM deposit WHERE deposit_id = '$id' ";
          $deldata = $this->db->delete($delquery);
          if($deldata){
              $msg = "<div class='alert alert-success' role='alert'>Deleted successfully.</div>";
              return $msg;
          }else{
              $msg = "<div class='alert alert-danger' role='alert'>Delete not successful.</div>";
              return $msg;
          }
        }

        public function uploadImage($data, $file){
          $title = mysqli_real_escape_string($this->db->link, $data['title']);
          $link = mysqli_real_escape_string($this->db->link, $data['link']);

          $permit = array('jpg','jpeg','png','gif');
          $file_name = $file['image']['name'];
          $file_size = $file['image']['size'];
          $file_temp = $file['image']['tmp_name'];

          $div = explode('.', $file_name);
          $file_ext = strtolower(end($div));

          $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
          $uploaded_image = "image/".$unique_image;

          $permit = array('jpg','jpeg','png','gif','svg','mp4','webm','mp3');

          if ($title == "" || $link == "") {
              
              return "<div class='alert alert-danger'>Field can't be empty.</div>";

          }


          if($file_size > 10000000){
              echo "<span class='danger'>Image size should be less than 100MB.</span>";
          }elseif(in_array($file_ext, $permit) === false){
              echo "<span class='danger'>You can upload only".implode(',', $permit)."</span>";
          }else{

            move_uploaded_file($file_temp, $uploaded_image);

            $query = "INSERT INTO upload(title,link,image)
            VALUES('$title','$link','$uploaded_image') ";
            $insert_user = $this->db->insert($query);

            if($insert_user){
              return "<div class='alert alert-success' role='alert'>Upload Successful.</div>";
                
            }else{
              return "<div class='alert alert-danger' role='alert'>Not Successful.</div>";
                
            }

          }
        }

        public function message($data){
          $msg_title = mysqli_real_escape_string($this->db->link, $data['msg_title']);
          $msg_desc = mysqli_real_escape_string($this->db->link, $data['msg_desc']);


          if($msg_title == "" || $msg_desc == ""){
              $msg = "<div class='alert alert-danger' role='alert'>Field can't be empty.</div>";
              return $msg;
          }

          $query = "INSERT INTO message(msg_title,msg_desc)
          VALUES('$msg_title','$msg_desc') ";
          $insert_user = $this->db->insert($query);

          if($insert_user){
              $msg = "<div class='alert alert-success' role='alert'>Message Sent Successful.</div>";
              return $msg;
          }else{
              $msg = "<div class='alert alert-danger' role='alert'>Not Successful.</div>";
              return $msg;
          }


        }

        public function getImage(){
          $query = "SELECT * FROM upload ORDER BY rand() LIMIT 8 ";
          $result = $this->db->select($query);
          return $result;        
        }

        public function getAllImage(){
          $query = "SELECT * FROM upload ORDER BY rand() LIMIT 20 ";
          $result = $this->db->select($query);
          return $result;        
        }

        public function notify($data){
          $siteKey     = '6LcweWUeAAAAAApj_ozngzd5WjksWPUWvzMNVJN8'; 
          $secretKey     = '6LcweWUeAAAAAO_N4SfmBn3rYFRL_nnlfSrjkTD_';

          $notify_title = mysqli_real_escape_string($this->db->link, $data['notify_title']);
          $notify_desc = mysqli_real_escape_string($this->db->link, $data['notify_desc']);
          $id = Session::get("UserId");
          $email = Session::get("UserEmail");

          if($notify_title == "" || $notify_desc == ""){
            return "<div class='alert alert-danger' role='alert'>Field can't be empty.</div>";

          }

          //if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])){

            //Verify the reCAPTCHA response 
            //$verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secretKey.'&response='.$_POST['g-recaptcha-response']); 

            //Decode json data 
            //$responseData = json_decode($verifyResponse);

            //If reCAPTCHA response is valid 
            //if($responseData->success){

              $query = "INSERT INTO notify(notify_title,notify_desc)
              VALUES('$notify_title','$notify_desc') ";
              $insert_user = $this->db->insert($query);

              if($insert_user){
                return "<div class='alert alert-success' role='alert'>Sent Successful.</div>";
              }else{
                return "<div class='alert alert-danger' role='alert'>Not Successful.</div>";
              }

            //}else{ 
              //return "<div class='alert alert-danger'>Robot verification failed, please try again.</div>"; 
            //}

          //}//else{ 
            //return "<div class='alert alert-danger'>Please check on the reCAPTCHA box.</div>"; 
          //}

        }

        public function getAllInbox(){
          $query = "SELECT * FROM notify ";
          $result = $this->db->select($query);
          return $result;
        }

        public function getUpload(){
          $query = "SELECT * FROM upload ";
          $result = $this->db->select($query);
          return $result;
        }

        public function deluplById($id){
          $delquery = "DELETE FROM upload WHERE upload_id = '$id' ";
          $deldata = $this->db->delete($delquery);
          if($deldata){ ?>

            <script>
                if ( window.history.replaceState ) {
                    window.history.replaceState( null, null, window.location.href );
                }
            </script>
            <?php
              $msg = "<div class='alert alert-success' role='alert'>Deleted successfully.</div>";
              return $msg;
          }else{ ?>

            <script>
                if ( window.history.replaceState ) {
                    window.history.replaceState( null, null, window.location.href );
                }
            </script>
            <?php
              $msg = "<div class='alert alert-danger' role='alert'>Delete not successful.</div>";
              return $msg;
          }
        }

        public function delmsgById($id){
          $delquery = "DELETE FROM notify WHERE notify_id = '$id' ";
          $deldata = $this->db->delete($delquery);
          if($deldata){
              $msg = "<div class='alert alert-success' role='alert'>Deleted successfully.</div>";
              return $msg;
          }else{
              $msg = "<div class='alert alert-danger' role='alert'>Delete not successful.</div>";
              return $msg;
          }
        }


        public function history($data, $id){
          $history_title = mysqli_real_escape_string($this->db->link, $data['history_title']);
          $history_desc = mysqli_real_escape_string($this->db->link, $data['history_desc']);

          if($history_title == "" || $history_desc == ""){
              $msg = "<span class='danger'>Field must not be empty.</span>";
              return $msg;
          }
          $query = "INSERT INTO history(userid,history_title,history_desc)
          VALUES('$id','$history_title','$history_desc') ";
          $insert_history = $this->db->insert($query);

          if($insert_history){
              $msg = "<div class='alert alert-success' role='alert'>Sent Successful.</div>";
              return $msg;
          }else{
              $msg = "<div class='alert alert-danger' role='alert'>Not Successful.</div>";
              return $msg;
          }
        }

          public function getHistory($id){
            $query = "SELECT users.*, history.history_id,history.userid,history.history_title,history.history_desc,history.date
                  FROM users INNER JOIN history ON users.user_id = history.userid WHERE userid = '$id' ";
              $result = $this->db->select($query);
              return $result;
          }

          public function delHistoryById($ids){
            $delquery = "DELETE FROM history WHERE history_id = '$ids' ";
            $deldata = $this->db->delete($delquery);
            if($deldata){
                $msg = "<div class='alert alert-success' role='alert'>Deleted successfully.</div>";
                return $msg;
            }else{
                $msg = "<div class='alert alert-danger' role='alert'>Delete not successful.</div>";
                return $msg;
            }
          }

          public function withdrawApproved($id, $date){
            $id = mysqli_real_escape_string($this->db->link, $id);
            $date = mysqli_real_escape_string($this->db->link, $date);

            $query = "UPDATE withdraw SET status = 'Approved' WHERE user_id = '$id' AND date = '$date' ";
            $update_query = $this->db->update($query);

            if ($update_query) {

              $chkamtquery = "SELECT * FROM users WHERE user_id = '$id' ";
              $check = $this->db->select($chkamtquery);

              if ($check) {
                  while($result = $check->fetch_assoc()){
                      $new_wallet_coins = $result['new_wallet_coins'];

                  }
              }
                

                $withquery = "SELECT * FROM withdraw WHERE user_id = '$id' ";
                $checks = $this->db->select($withquery);

                if ($checks) {
                    while($results = $checks->fetch_assoc()){
                        $amt = $results['amount'];
                    }
                }
                
                $balance = $amt;

                $querys = "UPDATE users SET new_wallet_coins = new_wallet_coins - '$balance' WHERE user_id = '$id'";
                $update_querys = $this->db->update($querys);
            }

            if($update_query){ ?>

              <script>
                  if ( window.history.replaceState ) {
                      window.history.replaceState( null, null, window.location.href );
                  }
                  <?php

                $msg = "<div class='alert alert-success'>Approved Successfully</div>";
                return $msg;
            }else{ ?>

              <script>
                  if ( window.history.replaceState ) {
                      window.history.replaceState( null, null, window.location.href );
                  }
                  <?php
                $msg = "<div class='alert alert-danger'>Not Successful</div>";
                return $msg;
            }
          }



          public function topup($data){
            $fname = mysqli_real_escape_string($this->db->link, $data['fname']);
            $lname = mysqli_real_escape_string($this->db->link, $data['lname']);
            $email = mysqli_real_escape_string($this->db->link, $data['email']);
            $amount = mysqli_real_escape_string($this->db->link, $data['amount']);
            
            date_default_timezone_set('Africa/Lagos');
            $wallet_date = date("Y-m-d H:i:s",strtotime(date("Y-m-d H:i:s")." +10 minutes"));
            
            

            if($fname == "" || $lname == "" || $email == "" || $amount == ""){
                return "<div class='alert alert-danger' role='alert'>Field can't be empty.</div>";
            }
            
            if($amount < 50){
                return "<div class='alert alert-danger' role='alert'>Minimum deposit is $50</div>";
            }

            $query = "INSERT INTO topup(fname,lname,email,amount,date_added)
            VALUES('$fname','$lname','$email','$amount','$wallet_date') ";
            $insert_user = $this->db->insert($query);

            if($insert_user){
                header("Location: /dashboard/pay");
            }else{
                $msg = "<div class='alert alert-danger' role='alert'>Not Successful.</div>";
                return $msg;
            }


          }

          public function getUserTopUp($email){
            $query = "SELECT * FROM topup WHERE email = '$email' ";
            $result = $this->db->select($query);
            return $result;
          }


}






?>
