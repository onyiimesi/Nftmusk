<?php

include "../lib/Session.php";
Session::checkSession();

include '../lib/Database.php';
include_once "../format/helper.php";
require 'mail.php';

$db = new Database();
$format = new Format();

require_once '../classes/User.php';
$user = new User();

include '../classes/Admin.php';

$admin = new Admin();

?>
<?php

    $admin = new Admin();

    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['transact'])){

        $transact = $admin->transact($_POST);
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>NFTMUSK Dashboard </title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/typicons/typicons.css">
  <link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <script src="https://kit.fontawesome.com/55ffce7a75.js" crossorigin="anonymous"></script>
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../img/logo.png" />

  <style>
    body{
        background-color: #f5f5f5;

    }
    .main{
        padding: 50px 0;
    }
    .payment{
        width: 40%;
        height: 100%;
        background-color: #fff;
        padding: 50px 10px;
        margin: 0 auto;
        border-radius: 8px;
    }
    .pay_name{
        padding: 20px 10px 0 10px;
        text-align: right;
    }
    .pay_name span{
        font-size: 14px;
    }
    .pay_name h3{
        padding: 8px 0 0 0;
    }

    #CDT {
        font-size: 15px;
        color: #000;
        margin: 30px 0;
        font-weight: bolder;
    }

    #CDT .number-wrapper {
        width: 19px;
        height: auto;
        padding: 2px;
        margin: 0 ;
        display: inline-block;
        color: #000;
        background: #fff;
        border-radius: 5px;
    }

    #CDT .number {
        color: var(--bg);
        background: var(--main);
        -moz-background-clip: padding;
        -webkit-background-clip: padding-box;
        background-clip: padding-box;
        text-align: center;
    }

    .amt{
        text-align: right;
        font-weight: 600;
    }

    #inviteCode.invite-page {
      box-sizing: border-box;
      display: flex;
      flex-direction: row;
      background-color: #fff;
      border: 1px solid #ccc;
      padding: 10px;
      margin-bottom: 10px;
      border-radius: 5px;
      justify-content: space-between;
      width: 100%;
      box-shadow: 0px 1px 2px rgba(0, 0, 0, 0.07);
    }
     #inviteCode.invite-page #link,#link2,#link3,#link4,#link5,#link6 {
      align-self: center;
      font-size: 1.2em;
      color: #333;
      font-weight: bold;
      flex-grow: 2;
      background-color: #fff;
      border: none;
    }
     #inviteCode.invite-page #copy {
      width: 30px;
      height: 30px;
      margin-left: 20px;
      border: 1px solid black;
      border-radius: 5px;
      background-color: #f8f8f8;
    }
     #inviteCode.invite-page #copy i {
      display: block;
      line-height: 30px;
      position: relative;
    }
     #inviteCode.invite-page #copy i::before {
      display: block;
      width: 15px;
      margin: 0 auto;
    }
     #inviteCode.invite-page #copy i.copied::after {
      position: absolute;
      top: 0px;
      right: 35px;
      height: 30px;
      line-height: 25px;
      display: block;
      content: "copied";
      font-size: 1.5em;
      padding: 2px 10px;
      color: #fff;
      background-color: #4099FF;
      border-radius: 3px;
      opacity: 1;
      will-change: opacity, transform;
      -webkit-animation: showcopied 1.5s ease;
              animation: showcopied 1.5s ease;
    }
     #inviteCode.invite-page #copy:hover {
      cursor: pointer;
      background-color: #dfdfdf;
      transition: background-color 0.3s ease-in;
    }
    @-webkit-keyframes showcopied {
        0% {
            opacity: 0;
            transform: translateX(100%);
        }
        70% {
          opacity: 1;
          transform: translateX(0);
        }
        100% {
          opacity: 0;
        }
    }

    @keyframes showcopied {
        0% {
          opacity: 0;
          transform: translateX(100%);
        }
        70% {
          opacity: 1;
          transform: translateX(0);
        }
        100% {
          opacity: 0;
        }
    }
    .t{
        font-weight: 600;
        font-size: 14px;
    }
    .send button{
        border: 0;
        background-color: #16638f;
        padding: 8px 30px;
        border-radius: 20px;
        font-size: 14px;
        color: #fff;
    }
    .send button i{
        color: #fff;
        font-size: 14px;
    }
    .scan p{
        font-size: 15px;
    }
    .scan img{
        width: 150px;
        height: 150px;
    }
    .scan h4{
        padding: 10px 0 0 0;
    }




    @media only screen and (min-width: 992px) and (max-width: 1199px) {
            .payment{
                width: 100%;
            }
        }

        @media only screen and (min-width: 768px) and (max-width: 991px) {
            .payment{
                width: 100%;
            }
        }


        @media only screen and (max-width: 767px) {
            .payment{
                width: 100%;
            }
        }

        @media only screen and (min-width: 576px) and (max-width: 766px) {
            .payment{
                width: 100%;
            }
        }

        @media only screen and (max-width: 479px) {
            .payment{
                width: 100%;
            }
        }

        @media only screen and (min-width: 350px) and (max-width: 375px) {

            .payment{
                width: 100%;
            }
        }

        @media only screen and (max-width: 320px) {

            .payment{
                width: 100%;
            }   

        }
  </style>

<body>


    <div class="main">
        
        <div class="payment">
            <div class="container">
                <?php 
                    
                    if($transact){
                        echo $transact;
                    }
                    
                ?>
                <?php 

                    $email = Session::get("UserEmail");
                    
                    $getUsers = $admin->getUserTopUp($email);

                    if($getUsers){

                      while($result = $getUsers->fetch_assoc()){
                        $email = $result['email'];
                        $amount = $result['amount'];
                        $date = $result['date_added'];
                        $id = $result['topup_id'];


                      }
                    }

                ?>
                <div class="row">
                    <div class="col-6 col-md-6">
                        <div class="companyLogo">
                            <a href="/dashboard/home"><img src="../img/logo.png" alt=""></a>
                        </div>
                    </div>

                    <div class="col-6 col-md-6">
                       <div class="pay_name">
                           <span><?=$email?></span>
                           <h3><?=number_format($amount)?> USD</h3>
                       </div> 
                    </div>
                </div><hr>

                <div class="row mb-5">
                    <div class="col-md-12">
                        <div class="scan text-center">
                            <p>Scan the QR Code or copy and paste the payment details to your wallet</p>

                            <img src='/dashboard/images/barcode.jpg' class='img-fluid' rel='nofollow' alt='qr code'><a href='https://www.qr-code-generator.com' border='0' style='cursor:default'  rel='nofollow'></a>
                            <h4>Send payment within <small style="font-weight: 600;padding: 10px;font-size: 17px;" class="timerp" id="demo<?= $id ?>"></small></h4>
                            
                            <script>
                                function createCountDown(elementId, date) {
                                  // Set the date we're counting down to
                                  var countDownDate = new Date(date).getTime();
        
                                  // Update the count down every 1 second
                                  var x = setInterval(function () {
                                    // Get todays date and time
                                    var now = new Date().getTime();
        
                                    // Find the distance between now an the count down date
                                    var distance = countDownDate - now;
        
                                    // Time calculations for days, hours, minutes and seconds
                                    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                                    var hours = Math.floor(distance % (1000 * 60 * 60 * 24) / (1000 * 60 * 60));
                                    var minutes = Math.floor(distance % (1000 * 60 * 60) / (1000 * 60));
                                    var seconds = Math.floor(distance % (1000 * 60) / 1000);
        
                                    // Display the result in the element with id="demo"
                                    document.getElementById(elementId).innerHTML =
                                    minutes + ":" + seconds + "s ";
        
                                    // If the count down is finished, write some text
                                    if (distance < 0) {
                                      clearInterval(x);
                                      document.getElementById(elementId).innerHTML = "00:00";
                                    }
                                  }, 1000);
                                }
        
                                createCountDown("demo<?=$id?>", "<?=$date?>");
                            </script>

                            <div class="dropdown send mt-4">
                                <button type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-check"></i>&nbsp; <span>I've made the transfer</span></button>
                                <ul class="dropdown-menu p-4" aria-labelledby="dropdownMenuButton1" style="max-width: 300px;">
                                    <form method="post">
                                        <div class="mb-3">
                                            <label class="pb-2" style="font-size: 16px;font-weight: 600;">Enter Transaction ID</label>
                                            <input type="text" class="form-control p-4" name="transact_id" placeholder="Transaction ID">
                                        </div>
                                        
                                        <div class="mb-3">
                                            <button type="submit" name="transact" class="btn btn-success">Submit</button>
                                        </div>
                                    </form>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mb-5">
                    <div class="col-6 col-md-6">
                        <span>Amount to pay:</span>
                    </div>

                    <div class="col-6 col-md-6">
                       <div class="amt text-end"><?=number_format($amount)?> USDT</div> 
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="copy">
                            <div class="t">Address</div>
                            <div id="inviteCode" class="invite-page">

                                <input id="link" value="0xea1d324f330d2c21bf4c538283c7daaf2b3864a3" readonly>
                                <div id="copy">
                                  <i class="mdi mdi-content-copy" aria-hidden="true" data-copytarget="#link"></i> 
                                </div>
                          </div>

                          <div class="input">
                                <div class="t">Network</div>
                              <input class="form-control p-4" type="text" readonly placeholder="Binance Smart Chain (BEP20)">
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>




















    <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="vendors/chart.js/Chart.min.js"></script>
  <script src="vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
  <script src="vendors/progressbar.js/progressbar.min.js"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/jquery.cookie.js" type="text/javascript"></script>
  <script src="js/dashboard.js"></script>
  <script src="js/Chart.roundedBarCharts.js"></script>
  <script src="js/script.js" charset="utf-8"></script>
  <script src="js/js.js" charset="utf-8"></script>
  <!-- End custom js for this page-->

  <script type="text/javascript">
        function CountdownTimer(elm,tl,mes){
         this.initialize.apply(this,arguments);
        }
        CountdownTimer.prototype={
         initialize:function(elm,tl,mes) {
          this.elem = document.getElementById(elm);
          this.tl = tl;
          this.mes = mes;
         },countDown:function(){
          var timer='';
          var today=new Date();
          var day=Math.floor((this.tl-today)/(24*60*60*1000));
          var hour=Math.floor(((this.tl-today)%(24*60*60*1000))/(60*60*1000));
          var min=Math.floor(((this.tl-today)%(24*60*60*1000))/(60*1000))%60;
          var sec=Math.floor(((this.tl-today)%(24*60*60*1000))/1000)%60%60;
          var me=this;

          if( ( this.tl - today ) > 0 ){
           timer += '<span class="number-wrapper"><div class="line"></div><span class="number min">'+this.addZero(min)+'</span><div class="caption"></div></span>:<span class="number-wrapper"><div class="line"></div><span class="number sec">'+this.addZero(sec)+'</span><div class="caption"></div></span>';
           this.elem.innerHTML = timer;
           tid = setTimeout( function(){me.countDown();},10 );
          }else{
           this.elem.innerHTML = this.mes;
           return;
          }
         },addZero:function(num){ return (''+num).slice(-2); }
        }
        function CDT(){

         // Set countdown limit
         var tl = new Date('2022/06/05 14:11:00');

         // You can add time's up message here
         var timer = new CountdownTimer('CDT',tl,'<span class="number-wrapper"><div class="line"></div><span class="number end">Time is up!</span></span>');
         timer.countDown();
        }
        window.addEventListener("load",function(){
         CDT();
        },false);
    </script>

    <script>
        // trigger copy event on click
        $('#copy').on('click', function(event) {
          console.log(event);
          copyToClipboard(event);
        });

        // event handler
        function copyToClipboard(e) {
          // alert('this function was triggered');
          // find target element
          var
            t = e.target,
            c = t.dataset.copytarget,
            inp = (c ? document.querySelector(c) : null);
          console.log(inp);
          // check if input element exist and if it's selectable
          if (inp && inp.select) {
            // select text
            inp.select();
            try {
              // copy text
              document.execCommand('copy');
              inp.blur();

              // copied animation
              t.classList.add('copied');
              setTimeout(function() {
                t.classList.remove('copied');
              }, 1500);
            } catch (err) {
              //fallback in case exexCommand doesnt work
              alert('please press Ctrl/Cmd+C to copy');
            }

          }

        }
    </script>   

</body>

</html>