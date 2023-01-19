<?php include "inc/header.php"; ?>
	<?php

	    $admin = new Admin();

	    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['transact'])){

	        $transact = $admin->transact($_POST);
	    }

  	?>

  	<div class="main-panel">
    	<div class="content-wrapper">
      		<div class="row">
      			<div class="col-md-12 grid-margin stretch-card">
		          	<div class="card">
			            <div class="card-body">
			            	<h4 class="card-title">Deposit Funds</h4><hr>
			                <p class="card-description">
			                </p>

			                <div style="font-weight: 600; padding: 10px; text-transform:uppercase; font-size: 16px;">

			                  <?php

			                      if(isset($transact)){
			                          echo $transact;
			                      }

			                  ?>
			              	</div>
				            <form action="" method="post">
				                <div class="mb-3">
				                  <h3 style="font-size: 20px;letter-spacing: 0.1em;line-height: 1.6rem;">Copy any of the respective Wallet ID to make deposit, after making payment copy your
				                  transaction id and send below.</h3>
				                </div>
				                <div class="mb-3">
				                  <label for="" class="form-label"><strong>Transaction ID</strong></label>
				                  <input type="text" name="transact_id" class="form-control" maxlength="34">
				                </div>
				                <button type="submit" name="transact" class="btn btn-success">Send</button>
				            </form>
			      		</div>
		      		</div>
		      	</div>
		    </div>

		    <div class="row">
      			<div class="col-md-12 grid-margin stretch-card">
		          	<div class="card">
			            <div class="card-body">
			              <h5 style="font-size: 18px;">Note: Minimum deposit is $100.</h5><hr> 
	                      <div id="inviteCode" class="invite-page">
	                        <input id="link" value="0x7fc3d8c96d113ba2201a503b7052327eb7f4dca1" readonly>
	                        <div id="copy">
	                          <i class="mdi mdi-content-copy" aria-hidden="true" data-copytarget="#link"></i>
	                        </div>
	                      </div> 
			            </div>
		        	

		            <!-- <div class="card mb-5">
	                 	<div class="card-body">
	                      <h4 class="header-title">BITCOIN</h4>
		                    
	                       <div id="inviteCode" class="invite-page">
	                         <input id="link5" value="174MMwnjy7WTo8pqSueucsxwbYY8NUd8i8" readonly>
	                         <div id="copy5">
	                           <i class="mdi mdi-content-copy" aria-hidden="true" data-copytarget="#link5"></i>
	                         </div>
	                       </div>
		                    
	                	</div>
                	</div> -->

                	<!-- <div class="card mb-5">
	                  	<div class="card-body">
	                      <h4 class="header-title">ETHEREUM</h4>
	                      
	                        <div id="inviteCode" class="invite-page">
	                          <input id="link6" value="0x4d98a558747a87d2c5696c560b45c8171f8afcae" readonly>
	                          <div id="copy6">
	                            <i class="mdi mdi-content-copy" aria-hidden="true" data-copytarget="#link6"></i>
	                          </div>
	                        </div>
	                      
	                    </div>
	                </div>

	                <div class="card mb-5">
	                 	<div class="card-body">
	                     <h4 class="header-title">DOGECOIN</h4>
	                     
	                       <div id="inviteCode" class="invite-page">
	                         <input id="link2" value="DP6oJAG4x5wY26pAwGxapwxUMR1cnohmoq" readonly>
	                         <div id="copy2">
	                           <i class="mdi mdi-content-copy" aria-hidden="true" data-copytarget="#link2"></i>
	                         </div>
	                       </div>
	                     
	                   </div>
	                </div>

	                <div class="card mb-5">
	                  	<div class="card-body">
	                      <h4 class="header-title">LITECOIN</h4>
	                      
	                        <div id="inviteCode" class="invite-page">
	                          <input id="link3" value="LcDWqNc1Xmdnc31rUcMVwnu68BJQcafc4j" readonly>
	                          <div id="copy3">
	                            <i class="mdi mdi-content-copy" aria-hidden="true" data-copytarget="#link3"></i>
	                          </div>
	                        </div>
	                      
	                    </div>
	                </div>

	                <div class="card mb-5">
	                   	<div class="card-body">
	                       <h4 class="header-title">USD(TRC20)</h4>
	                       
	                         <div id="inviteCode" class="invite-page">
	                           <input id="link4" value="TGBNYGFZEi7bk1bbSTgExWUcK1fBuTrb7u" readonly>
	                           <div id="copy4">
	                             <i class="mdi mdi-content-copy" aria-hidden="true" data-copytarget="#link4"></i>
	                           </div>
	                         </div>
	                       
	                    </div>
	                </div> -->

	                <div class="card">
	                    <div class="card-body">
	                        <h4 class="header-title">Note:</h4>
	                        <p><strong>Make sure payment is made from your provided wallet ID.</strong></p>
	                    </div>
	                </div>
		        </div>
		    </div>
      	</div>	
    </div>

<?php include "inc/footer.php"; ?>