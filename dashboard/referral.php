<?php include "inc/header.php"; ?>

	<?php
    if(isset($_GET['id'])){
        $refid = $_GET['id'];

    }
  ?>
	<div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
      	<div class="col-md-8 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Referral</h4><hr>
              <p class="card-description">
              </p>

              <h4 class="card-title text-center"><strong>Refer Others</strong></h4>
              <?php

              $id = Session::get("UserId");
              $getUsers = $admin->getUserById($id);

              if($getUsers){

                while($result = $getUsers->fetch_assoc()){
                  $user_unique_id = $result['user_unique_id'];
                }
              }

              ?>
              
                <div id="inviteCode" class="invite-page">
                  <input id="link" value="http://musknft.web/register?refer=<?php echo $user_unique_id; ?>" readonly>
                  <div id="copy">
                    <i class="mdi mdi-content-copy" aria-hidden="true" data-copytarget="#link"></i>
                  </div>
                </div>
                
            </div>
            <div class="card">
             <div class="card-body">
                <h4 class="header-title">Note:</h4>
                  <p><strong>You will get 15% of the initial deposit of whoever you refer on your next withdrawal automatically.</strong></p>
             </div>
           	</div>
          </div>
        </div>

        <div class="col-md-4 grid-margin stretch-card">
      		<div class="card">
            <div class="card-body">
              <h4 class="card-title">Referral(s)</h4><hr>

              <h5>You have referred <span style="color: green; font-weight: 600;">
                <?php
                    $getData = $admin->getNumRefer($refid);

                    if(isset($getData)){
                        echo $getData;
                    }

                ?>

              </span> Person(s)</h5>
              <div style="margin: 20px 0 0 5px;">
                <?php

                    $getPro = $admin->getRefer($refid);
                    if($getPro){

                        while($result = $getPro->fetch_assoc()){

                ?>
                <ol>
                  <li style="font-size: 15px;font-weight: 600;"><?php echo $result['newusername']; ?></li>
                </ol>
              </div>
              <?php } } ?>
            </div>
          </div>
        </div>
      

      </div>
    </div>

<?php include "inc/footer.php"; ?>