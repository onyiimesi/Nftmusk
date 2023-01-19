<?php include "inc/head.php"; ?>

	<?php  

		$AdminVerify = Session::get("AdminVerify");

        if ($AdminVerify == 1){
        	header("Location: /dashboard/home");
        }

	?>

	<?php

    $admin = new Admin();

    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['notify'])){

        $notify = $admin->notify($_POST);
    }

	?>
  
      <!-- partial -->
      <div class="main-panel pending">
        <div class="content-wrapper">
        	<div class="row">
        		<div class="col-md-12">
        			<div class="txt text-center">
        				<h5>
        				Your registration is successful, to activate your dashboard and get started with NFT MUSK.
        				</h5>
        				<p><strong>Choose your desired plan below</strong></p>
        			</div>
        		</div>
        	</div>
          <div class="row">
            <div class="col-md-3 mb-5">
              <div class="pend">
              	<div class="mb-5">
              		<h3>Teir 1</h3>
		              <h3>10% revenue share weekly</h3>
		              <h3>Every 7 days</h3>
		              <h5>No NFT Upload</h5>
		              <h6>0% return on NFT</h6>
		              <h5>MINIMUM AMOUNT : $100</h5>
		              <h5>REFERRAL BONUS : 15%</h5>
              	</div>
              </div>	
            </div>
            <div class="col-md-3 mb-5">
              <div class="pend">
              	<div class="mb-5">
              		<h3>Teir 2</h3>
		              <h3>15% revenue share weekly</h3>
		              <h3>EVERY 7 DAYS</h3>
		              <h5>2 NFT Upload Weekly</h5>
		              <h6>50% Returns on Your NFT Sales</h6>
		              <h5>MINIMUM AMOUNT : $300</h5>
		              <h5>REFERRAL BONUS : 15%</h5>
              	</div>
              </div>	
            </div>
            <div class="col-md-3 mb-5">
              <div class="pend">
              	<div class="mb-5">
              		<h3>Teir 3</h3>
		              <h3>20% revenue share weekly</h3>
		              <h3>EVERY 7 DAYS</h3>
		              <h5>5 NFT Upload Weekly</h5>
		              <h6>60% Returns on Your NFT Sales</h6>
		              <h5>MINIMUM AMOUNT : $1000</h5>
		              <h5>REFERRAL BONUS : 15%</h5>
              	</div>
              </div>	
            </div>
            <div class="col-md-3 mb-5">
              <div class="pend">
              	<div class="mb-5">
              		<h3>Teir 4</h3>
		              <h3>30% revenue share weekly</h3>
		              <h3>EVERY 7 DAYS</h3>
		              <h5>Unlimited NFT Upload</h5>
		              <h6>75% Returns on Your NFT Sales</h6>
		              <h5>MINIMUM AMOUNT : $10000</h5>
		              <h5>REFERRAL BONUS : 15%</h5>
              	</div>
              </div>	
            </div>
            
          </div>

          <div class="row mt-5">
          	<div class="col-md-12">
            	<div class="card">
            		<div class="card-body">
            			<h4>TO ACTIVATE YOUR ACCOUNT</h4><hr>
            			<h5>Copy and Send the equivalent BinanceSC or Ethereum of your Desired Plan to Wallet Address
            			<div id="inviteCode" class="invite-page mt-2 mb-2">
	                  <input id="link" value="0x7fc3d8c96d113ba2201a503b7052327eb7f4dca1" readonly>
	                  <div id="copy">
	                    <i class="mdi mdi-content-copy" aria-hidden="true" data-copytarget="#link"></i>
	                  </div>
	                </div>
            			<p>It's important to send From the same wallet address used to register and you'll get a confirmation email before your can access your dashboard and enjoy the full benefits of NFT MUSK</p>
            			<p>
            				You can contact us here if you sent BinanceSC or Ethereum from the wrong wallet address
            			</p>


            			
            			<form action="" method="post" class="mt-5">
            				<?php

                      if(isset($notify)){
                          echo $notify;
                      }

                    ?>
            				<div class="form-group">
	        				  	<div class="form-group">
			                      <label for="exampleInputUsername1">Email Address</label>
			                      <input type="email" class="form-control" name="notify_title" id="exampleInputUsername1" placeholder="Email Address">
			                  	</div>
		                      <label for="">Send A Message</label>
		                      <textarea class="form-control" name="notify_desc" cols="30" rows="10" id="exampleInputEmail1" placeholder="Send A Message"></textarea>
		                      <div class="g-recaptcha d-flex justify-content-center" data-sitekey="6LcweWUeAAAAAApj_ozngzd5WjksWPUWvzMNVJN8"></div>
		                      <button type="submit" name="notify" class="btn btn-primary mt-3">Send</button>
		                    </div>
            			</form>
            		</div>
            	</div>
            </div>
          </div>

          <div class="row mt-5">
          	<div class="col-md-12">
            	<div class="card">
            		<div class="card-body">
            			<a class="btn btn-success" href="/dashboard/home">PROCCED TO DASHBOARD</a>
            		</div>
            	</div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->

<?php include "inc/footer.php" ?>