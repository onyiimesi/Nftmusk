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

    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['topup'])){

        $transact = $admin->topup($_POST);
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Musknft Dashboard </title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/typicons/typicons.css">
  <link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
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
  		.pay{
  			width: 40%;
  			height: 100%;
  			background-color: #fff;
  			margin: 0 auto;
  			
  			border-radius: 8px;
  		}

  		.companyLogo{
  			padding: 30px 50px;
  		}
  		.companyLogo h3{
  			font-size: 20px;
  			padding: 20px 0;
  		}
  		.form{
  			padding: 30px;
  		}





  		@media only screen and (min-width: 992px) and (max-width: 1199px) {
  			.pay{
	  			width: 100%;
	  		}
  		}

  		@media only screen and (min-width: 768px) and (max-width: 991px) {
  			.pay{
	  			width: 100%;
	  		}
  		}


  		@media only screen and (max-width: 767px) {
  			.pay{
	  			width: 100%;
	  		}
  		}

  		@media only screen and (min-width: 576px) and (max-width: 766px) {
  			.pay{
	  			width: 100%;
	  		}
  		}

  		@media only screen and (max-width: 479px) {
  			.pay{
	  			width: 100%;
	  		}
  		}

  		@media only screen and (min-width: 350px) and (max-width: 375px) {

  			.pay{
	  			width: 100%;
	  		}
  		}

  		@media only screen and (max-width: 320px) {

  			.pay{
	  			width: 100%;
	  		}	

  		} 
  	</style>
<body>
	
  	<div class="main">

		    <div class="container">
		    	<div class="row">
	      			<div class="col-md-12">
			          	<div class="pay">
			          		<div class="companyLogo text-center">
			          			<a href="/dashboard/home"><img src="../img/logo.png" alt=""></a>
			          			<h3>NFTMUSK</h3>
			          			<p>
			          				Top Up your account.
			          			</p>
			          		</div><hr>

			          		<div class="form">
				          		<form action="" method="post">
							    			<div class="row">
							    				<div class="col-md-6">
							    					<div class="mb-4">
							    						<label for="" class="pb-2">First Name</label>
							    						<input type="text" class="form-control p-4" name="fname" placeholder="John">
							    					</div>
							    				</div>
							    				<div class="col-md-6">
							    					<div class="mb-4">
							    						<label for="" class="pb-2">Last Name</label>
							    						<input type="text" class="form-control p-4" name="lname" placeholder="Doe">
							    					</div>
							    				</div>
							    			</div>
							    			<div class="row">
							    				<div class="col-md-12">
							    					<div class="mb-4">
							    						<label for="" class="pb-2">Email Address</label>
							    						<input type="email" class="form-control p-4" name="email" placeholder="johndoe@gmail.com">
							    					</div>
							    				</div>
							    			</div>
							    			<div class="row">
							    				<div class="col-md-12">
							    					<div class="mb-4">
							    						<label for="" class="pb-2">Amount</label>
							    						<input type="text" name="amount" class="form-control p-4" placeholder="1,000">
							    					</div>
							    				</div>
							    			</div>

							    			<div class="row">
							    				<div class="col-md-12">
							    					<div class="mb-4">
							    						<button type="submit" name="topup" class="btn btn-success">MAKE PAYMENT</button>
							    					</div>
							    				</div>
							    			</div>
							    		</form>
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


  <script>
    function upgrade(){
      alert("ACTIVATE YOUR ACCOUNT TO GET ACCESS TO ALL FEATURES!")
    }
  </script>
</body>

</html>
