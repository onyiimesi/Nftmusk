<?php include "inc/header.php"; ?>

      <?php

        $user = new User();

        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['reinvest'])){

            $reinvest = $user->reinvest();
        }

      ?>

      <?php  

        $AdminVerify = Session::get("AdminVerify");

        if ($AdminVerify == 0): ?>

          <div class="main-panel">
            <div class="content-wrapper">
              <div class="row">
                <div class="col-sm-12">
                  <div class="home-tab">
                    <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                      <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                          <a class="nav-link active ps-0" id="home-tab" data-bs-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">Overview</a>
                        </li>
                        
                        <li class="nav-item">
                          <h6 class="pt-3 ps-2">UNACTIVATED</h6>
                        </li>
                    </div>
                    <div class="tab-content tab-content-basic">
                      <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview"> 
                        <div class="row">
                          <div class="col-sm-12">
                            <div class="statistics-details d-flex align-items-center justify-content-between">
                              <div class="boxx"> 
                                <p class="statistics-title">Locked Balance</p>
                                <div class="d-flex">
                                  <h3 class="rate-percentage"></h3>
                                  <div class="ms-auto mt-2 a">
                                    <p><i class="mdi mdi-alert-circle-outline" data-bs-toggle="modal" data-bs-target="#lockedBalance"></i></p>
                                  </div>
                                </div>
                                <!-- Button trigger modal -->

                                <!-- Modal -->
                                <div class="modal fade" id="lockedBalance" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Locked Balance</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                      </div>
                                      <div class="modal-body">
                                        <h5>
                                          Only 80% of your locked balance is withdrawable anytime.
                                        </h5>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <!-- <p class="text-danger d-flex"><i class="mdi mdi-menu-down"></i><span>-0.5%</span></p> -->
                              </div>

                              <div class="boxx">
                                <p class="statistics-title">Revenue Share</p>
                                <div class="d-flex">
                                  
                                  <h3 class="rate-percentage"></h3>
                                  <div class="ms-auto mt-2 a">
                                    <p><i class="mdi mdi-alert-circle-outline" data-bs-toggle="modal" data-bs-target="#mainBalance"></i></p>
                                  </div>
                                </div>

                                <!-- Modal -->
                                <div class="modal fade" id="mainBalance" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Revenue Share</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                      </div>
                                      <div class="modal-body">
                                        <h5 style="line-height: 1.5rem;">
                                          The percentage of your locked balance you'll receive every week.
                                        </h5>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <!-- <p class="text-success d-flex"><i class="mdi mdi-menu-up"></i><span>+0.1%</span></p> -->
                              </div>
                              
                              <div class="boxx">
                                <p class="statistics-title">Account Tier</p>
                                <h3 class="rate-percentage">

                                </h3>
                                <!-- <p class="text-danger d-flex"><i class="mdi mdi-menu-down"></i><span>68.8</span></p> -->
                              </div>
                              <div class="d-none d-md-block">
                                <!-- <p class="statistics-title">Avg. Time on Site</p>
                                <h3 class="rate-percentage">2m:35s</h3>
                                <p class="text-success d-flex"><i class="mdi mdi-menu-down"></i><span>+0.8%</span></p> -->
                              </div>
                              <div class="d-none d-md-block">
                                <!-- <p class="statistics-title">New Sessions</p>
                                <h3 class="rate-percentage">68.8</h3>
                                <p class="text-danger d-flex"><i class="mdi mdi-menu-down"></i><span>68.8</span></p> -->
                              </div>
                              <div class="d-none d-md-block">
                                <!-- <p class="statistics-title">Avg. Time on Site</p>
                                <h3 class="rate-percentage">2m:35s</h3>
                                <p class="text-success d-flex"><i class="mdi mdi-menu-down"></i><span>+0.8%</span></p> -->
                              </div>
                            </div>
                          </div>
                        </div> 
                        
                        <!-- Row -->

                        <div class="row i">

                          <div class="col-6 col-md-3 col-sm-4">
                          
                            <div style="background: #888;color: #fff;" class="card text-center card-rounded mb-3">
                              <div class="card-body text-center shadow-sm" onclick="upgrade()">
                                <i style="color: #000 !important;" class="mdi mdi-autorenew menu-icon"></i>
                                <h3>Reinvest</h3>
                              </div>
                              <i style="font-size: 20px;color: #fff;" class="mdi mdi-alert-circle-outline" data-bs-toggle="modal" data-bs-target="#Reinvest"></i>
                            </div>
                          
                        </div>

                          <!-- Modal -->
                          <div class="modal fade" id="Reinvest" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Reinvest</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                  <h5 style="line-height: 1.5rem;">
                                    You can increase your locked balance by reinvesting your revenue share when the timer runs out.
                                  </h5>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="col-6 col-md-3 col-sm-4">
                            
                            <div class="card card-rounded mb-3 text-center">
                              <a href="javascript:void" onclick="upgrade()">
                                <div class="card-body text-center">
                                  <i class="mdi mdi-account-group menu-icon"></i>
                                  <h3>Referral</h3>
                                </div>
                              </a>
                              <i style="font-size: 20px;color: #000;" class="mdi mdi-alert-circle-outline" data-bs-toggle="modal" data-bs-target="#Referral"></i>
                            </div>
                            
                          </div>
                          <!-- Modal -->
                          <div class="modal fade" id="Referral" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Referral</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                  <h5 style="line-height: 1.5rem;">
                                    You'll earn a 15% deposit commission from the  whoever you refer and also 15% top up commission.
                                  </h5>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                              </div>
                            </div>
                          </div>


                          <div class="col-6 col-md-3 col-sm-4">
                            <a href="/collection" target="_blank">
                              <div class="card card-rounded mb-3 shadow-sm">
                                <div class="card-body text-center">
                                  <i class="mdi mdi-square-inc-cash menu-icon"></i>
                                  <h3>Buy NFT</h3>
                                </div>
                              </div>
                            </a>
                          </div>
                          

                          <div class="col-6 col-md-3 col-sm-4">
                            <a href="javascript:void" onclick="upgrade()">
                              <div class="card card-rounded mb-3 shadow-sm">
                                <div class="card-body text-center">
                                  <i class="mdi mdi-upload menu-icon"></i>
                                  <h3>Upload NFT</h3>
                                </div>
                              </div>
                            </a>
                          </div>


                          <div class="col-6 col-md-3 col-sm-4">
                            
                            <div class="card card-rounded mb-3 text-center shadow-sm">
                              <a href="javascript:void" onclick="upgrade()">
                                <div class="card-body text-center">
                                  <i class="mdi mdi-arrow-up-thick menu-icon"></i>
                                  <h3>Withdraw</h3>
                                </div>
                              </a>
                              <i style="font-size: 20px;color: #000;" class="mdi mdi-alert-circle-outline" data-bs-toggle="modal" data-bs-target="#Withdraw"></i>
                            </div>
                          </div>
                          <!-- Modal -->
                          <div class="modal fade" id="Withdraw" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Withdraw</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                  <h5 style="line-height: 1.5rem;">
                                    You can withdraw up to 80% of your locked balance once in a week.
                                  </h5>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="col-6 col-md-3 col-sm-4">
                            
                              <div class="card card-rounded text-center mb-3 shadow-sm">
                                <a href="javascript:void" onclick="upgrade()">
                                  <div class="card-body text-center">
                                    <i class="mdi mdi-arrow-down-thick menu-icon"></i>
                                    <h3>Top Up</h3>
                                  </div>
                                </a>
                                <i style="font-size: 20px;color: #000;" class="mdi mdi-alert-circle-outline" data-bs-toggle="modal" data-bs-target="#Top"></i>
                              </div>
                            
                          </div>
                          <!-- Modal -->
                          <div class="modal fade" id="Top" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Top Up</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                  <h5 style="line-height: 1.5rem;">
                                    You can top up your locked balance anytime to increase your revenue share and account privileges.
                                  </h5>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                              </div>
                            </div>
                          </div>
                          
                        </div>
                        <div class="marquee">
                          <iframe src="https://widget.coinlib.io/widget?type=horizontal_v2&theme=dark&pref_coin_id=1505&invert_hover=" width="100%" height="40px" scrolling="auto" marginwidth="0" marginheight="0" frameborder="0" border="0" style="border:0;margin:0;padding:0;"></iframe>
                        </div>

                        <!-- End -->
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row collection">
                <?php 


                    $getimage = $admin->getAllImage();
                    if($getimage){
                        while($result = $getimage->fetch_assoc()){

                
                ?>
                <div class="col-6 col-md-3 col-sm-4">
                  <div class="img text-center">
                    <div style="min-height: 280px;">
                      <a href="<?= $result['link']; ?>" target="_blank">
                        <img src="/admin/<?= $result['image']; ?>" class="img-fluid" alt="">
                        <h5><?php echo $result['title']; ?></h5>
                      </a>
                    </div>
                    <div>
                      <a href="<?= $result['link']; ?>"><button class="buttons">Place a Bid</button></a>
                    </div>
                  </div>
                </div>
                <?php } } ?>
              </div>
     
            </div>

        <?php endif; ?>
        
        <?php  

        $AdminVerify = Session::get("AdminVerify");

        if ($AdminVerify == 1): ?>
  
          <!-- partial -->
          <div class="main-panel">
            <div class="content-wrapper">
              <div class="row">
                <div class="col-sm-12">
                  <div class="home-tab">
                    <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                      <ul class="nav nav-tabs mt-3" role="tablist">
                        <li class="nav-item">
                          <a class="nav-link active ps-0" id="home-tab" data-bs-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">Overview</a>
                        </li>
                        <?php
    
    
                         $id = Session::get("UserId");
    
                          $getUser = $admin->getUserById($id);
    
                          if($getUser){
                            $i = 0;
                            while($result = $getUser->fetch_assoc()){
                              $i++;
    
                        ?>
                        <li class="nav-item">
                          <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#audiences" role="tab" aria-selected="false"><small style="font-weight: 600;color: #4099FF;padding: 10px;font-size: 17px;" class="timerp" id="demo<?php echo $result['user_id']; ?>"></small>
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
                                days + "d : " + hours + "h : " + minutes + "m : " + seconds + "s ";
    
                                // If the count down is finished, write some text
                                if (distance < 0) {
                                  clearInterval(x);
                                  document.getElementById(elementId).innerHTML = "00-00-00";
                                }
                              }, 1000);
                            }
    
                            createCountDown("demo<?php echo $result['user_id']; ?>", "<?php echo $result['wallet_date']; ?>");
    
                            </script></a>
                        </li>
                        <?php } } ?>
                        <!-- <li class="nav-item">
                          <a class="nav-link" id="contact-tab" data-bs-toggle="tab" href="#demographics" role="tab" aria-selected="false">Demographics</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link border-0" id="more-tab" data-bs-toggle="tab" href="#more" role="tab" aria-selected="false">More</a>
                        </li> -->
                      </ul>
                      <!-- <div>
                        <div class="btn-wrapper">
                          <a href="#" class="btn btn-otline-dark align-items-center"><i class="icon-share"></i> Share</a>
                          <a href="#" class="btn btn-otline-dark"><i class="icon-printer"></i> Print</a>
                          <a href="#" class="btn btn-primary text-white me-0"><i class="icon-download"></i> Export</a>
                        </div>
                      </div> -->
                    </div>
                    <div class="tab-content tab-content-basic">
                      <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview"> 
                        <div class="row">
                          <div class="col-sm-12">
                            <div class="statistics-details d-flex align-items-center justify-content-between">
                              <?php
    
                               $id = Session::get("UserId");
    
                                $getUser = $admin->getUserById($id);
    
                                if($getUser){
                                  $i = 0;
                                  while($result = $getUser->fetch_assoc()){
                                    $i++;
    
                              ?>
                              <div class="boxx"> 
                                <p class="statistics-title">Locked Balance</p>
                                <div class="d-flex">
                                  <h3 class="rate-percentage">$<?php echo number_format($result['new_wallet_coins']); ?></h3>
                                  <div class="ms-auto mt-2 a">
                                    <p><i class="mdi mdi-alert-circle-outline" data-bs-toggle="modal" data-bs-target="#lockedBalance"></i></p>
                                  </div>
                                </div>
                                <!-- Button trigger modal -->
    
                                <!-- Modal -->
                                <div class="modal fade" id="lockedBalance" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Locked Balance</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                      </div>
                                      <div class="modal-body">
                                        <h5>
                                          Only 80% of your locked balance is withdrawable anytime.
                                        </h5>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <!-- <p class="text-danger d-flex"><i class="mdi mdi-menu-down"></i><span>-0.5%</span></p> -->
                              </div>
    
                              <div class="boxx">
                                <p class="statistics-title">Revenue Share</p>
                                <div class="d-flex">
                                  <?php
    
                                    $id = Session::get("UserId");
                                    $email = Session::get("UserEmail");
                                    $getUsers = $user->getUserCoin($id);
    
                                    if($getUsers){
    
                                      while($result = $getUsers->fetch_assoc()){
                                        $new_wallet_coins = $result['new_wallet_coins'];
                                      }
                                    }
    
                                    $total = $new_wallet_coins;
    
                                  ?>
                                  <h3 class="rate-percentage">$<?php 
    
                                    if($total <= 299){
                                      $percentToGet = 10;
                                      $percentInDecimal = $percentToGet / 100;
                                      $totalamount = $percentInDecimal * $total;
    
                                      echo number_format($totalamount);
    
                                    }else if($total <= 999){
    
                                      $percentToGet = 15;
                                      $percentInDecimal = $percentToGet / 100;
                                      $totalamount = $percentInDecimal * $total;
    
                                      echo number_format($totalamount);
    
                                    }else if($total <= 9999){
    
                                      $percentToGet = 20;
                                      $percentInDecimal = $percentToGet / 100;
                                      $totalamount = $percentInDecimal * $total;
    
                                      echo number_format($totalamount);
    
                                    }else if($total <= INF){
    
                                      $percentToGet = 30;
                                      $percentInDecimal = $percentToGet / 100;
                                      $totalamount = $percentInDecimal * $total;
    
                                      echo number_format($totalamount);
                                    }
    
                                   ?></h3>
                                  <div class="ms-auto mt-2 a">
                                    <p><i class="mdi mdi-alert-circle-outline" data-bs-toggle="modal" data-bs-target="#mainBalance"></i></p>
                                  </div>
                                </div>
    
                                <!-- Modal -->
                                <div class="modal fade" id="mainBalance" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Revenue Share</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                      </div>
                                      <div class="modal-body">
                                        <h5 style="line-height: 1.5rem;">
                                          The percentage of your locked balance you'll receive every week.
                                        </h5>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <!-- <p class="text-success d-flex"><i class="mdi mdi-menu-up"></i><span>+0.1%</span></p> -->
                              </div>
                              <?php } } ?>
                              <div class="boxx">
                                <p class="statistics-title">Account Tier</p>
                                <?php
    
                                  $id = Session::get("UserId");
                                  $getUsers = $user->getUserCoin($id);
    
                                  if($getUsers){
    
                                    while($result = $getUsers->fetch_assoc()){
                                      $new_wallet_coins = $result['new_wallet_coins'];
                                    }
                                  }
    
                                  $total = $new_wallet_coins;
    
                                ?>
                                <h3 class="rate-percentage">
                                  <?php  
    
                                    if($total <= 299){
                                      echo 1;
                                    }else if($total <= 999){
                                      echo 2;
                                    }else if($total <= 9999){
                                      echo 3;
                                    }else if($total <= INF){
                                      echo 4;
                                    }
    
                                  ?>
                                </h3>
                                <!-- <p class="text-danger d-flex"><i class="mdi mdi-menu-down"></i><span>68.8</span></p> -->
                              </div>
                              <div class="d-none d-md-block">
                                <!-- <p class="statistics-title">Avg. Time on Site</p>
                                <h3 class="rate-percentage">2m:35s</h3>
                                <p class="text-success d-flex"><i class="mdi mdi-menu-down"></i><span>+0.8%</span></p> -->
                              </div>
                              <div class="d-none d-md-block">
                                <!-- <p class="statistics-title">New Sessions</p>
                                <h3 class="rate-percentage">68.8</h3>
                                <p class="text-danger d-flex"><i class="mdi mdi-menu-down"></i><span>68.8</span></p> -->
                              </div>
                              <div class="d-none d-md-block">
                                <!-- <p class="statistics-title">Avg. Time on Site</p>
                                <h3 class="rate-percentage">2m:35s</h3>
                                <p class="text-success d-flex"><i class="mdi mdi-menu-down"></i><span>+0.8%</span></p> -->
                              </div>
                            </div>
                          </div>
                        </div> 
                        
                        <!-- Row -->
    
                        <div class="row i">
                          <?php  
                            if(isset($reinvest)){
                              echo $reinvest;
                            }
                          ?>
                          <?php 
                            $id = Session::get("UserId");
                            $email = Session::get("UserEmail");
                            $getUsers = $user->getUserCoin($id);
    
                            if($getUsers){
    
                              while($result = $getUsers->fetch_assoc()){
                                $wallet_date = $result['wallet_date'];
                              }
                            }
    
                            $date = new DateTime($wallet_date);
                            
                          ?>
                          <?php  
    
                            if($date < new DateTime()){?>
    
                          <div class="col-6 col-md-3 col-sm-4">
                            <form class="card card-rounded text-center" action="" method="post">
                              <button style="border: 0;" type="submit" name="reinvest">
                                <div class="card card-rounded mb-3">
                                  <div class="card-body text-center">
                                    <i style="color: green !important;" class="mdi mdi-autorenew menu-icon"></i>
                                    <h3>Reinvest</h3>
                                  </div>
                                  <i style="font-size: 20px;color: #000;" class="mdi mdi-alert-circle-outline" data-bs-toggle="modal" data-bs-target="#Reinvest"></i>
                                </div>
                              </button>
                            </form>
                          </div>
                          <?php }else{ ?>
                            <div class="col-6 col-md-3 col-sm-4">
                            
                              <div style="background: #888;color: #fff;" class="card text-center card-rounded mb-3">
                                <div class="card-body text-center shadow-sm">
                                  <i style="color: #000 !important;" class="mdi mdi-autorenew menu-icon"></i>
                                  <h3>Reinvest</h3>
                                </div>
                                <i style="font-size: 20px;color: #fff;" class="mdi mdi-alert-circle-outline" data-bs-toggle="modal" data-bs-target="#Reinvest"></i>
                              </div>
                            
                          </div>
                          <?php } ?>
    
                          <!-- Modal -->
                          <div class="modal fade" id="Reinvest" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Reinvest</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                  <h5 style="line-height: 1.5rem;">
                                    You can increase your locked balance by reinvesting your revenue share when the timer runs out.
                                  </h5>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                              </div>
                            </div>
                          </div>
    
                          <div class="col-6 col-md-3 col-sm-4">
                            <?php
    
                              $id = Session::get("UserId");
                              $getUsers = $admin->getUserById($id);
    
                              if($getUsers){
    
                                while($result = $getUsers->fetch_assoc()){
                                  $user_unique_id = $result['user_unique_id'];
                                }
                              }
    
                            ?>
                            
                              <div class="card card-rounded mb-3 text-center">
                                <a href="/dashboard/referral?id=<?php echo $user_unique_id; ?>">
                                  <div class="card-body text-center">
                                    <i class="mdi mdi-account-group menu-icon"></i>
                                    <h3>Referral</h3>
                                  </div>
                                </a>
                                <i style="font-size: 20px;color: #000;" class="mdi mdi-alert-circle-outline" data-bs-toggle="modal" data-bs-target="#Referral"></i>
                              </div>
                            
                          </div>
                          <!-- Modal -->
                          <div class="modal fade" id="Referral" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Referral</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                  <h5 style="line-height: 1.5rem;">
                                    You'll earn a 15% deposit commission from the  whoever you refer and also 15% top up commission.
                                  </h5>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                              </div>
                            </div>
                          </div>
    
    
                          <div class="col-6 col-md-3 col-sm-4">
                            <a href="/collection" target="_blank">
                              <div class="card card-rounded mb-3 shadow-sm">
                                <div class="card-body text-center">
                                  <i class="mdi mdi-square-inc-cash menu-icon"></i>
                                  <h3>Buy NFT</h3>
                                </div>
                              </div>
                            </a>
                          </div>
                          
    
                          <div class="col-6 col-md-3 col-sm-4">
                            <a href="/dashboard/upload">
                              <div class="card card-rounded mb-3 shadow-sm">
                                <div class="card-body text-center">
                                  <i class="mdi mdi-upload menu-icon"></i>
                                  <h3>Upload NFT</h3>
                                </div>
                              </div>
                            </a>
                          </div>
    
    
                          <div class="col-6 col-md-3 col-sm-4">
                            
                            <div class="card card-rounded mb-3 text-center shadow-sm">
                              <a href="/dashboard/withdraw">
                                <div class="card-body text-center">
                                  <i class="mdi mdi-arrow-up-thick menu-icon"></i>
                                  <h3>Withdraw</h3>
                                </div>
                              </a>
                              <i style="font-size: 20px;color: #000;" class="mdi mdi-alert-circle-outline" data-bs-toggle="modal" data-bs-target="#Withdraw"></i>
                            </div>
                          </div>
                          <!-- Modal -->
                          <div class="modal fade" id="Withdraw" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Withdraw</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                  <h5 style="line-height: 1.5rem;">
                                    You can withdraw up to 80% of your locked balance once in a week.
                                  </h5>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                              </div>
                            </div>
                          </div>
    
                          <div class="col-6 col-md-3 col-sm-4">
                            
                              <div class="card card-rounded text-center mb-3 shadow-sm">
                                <a href="/dashboard/deposit">
                                  <div class="card-body text-center">
                                    <i class="mdi mdi-arrow-down-thick menu-icon"></i>
                                    <h3>Top Up</h3>
                                  </div>
                                </a>
                                <i style="font-size: 20px;color: #000;" class="mdi mdi-alert-circle-outline" data-bs-toggle="modal" data-bs-target="#Top"></i>
                              </div>
                            
                          </div>
                          <!-- Modal -->
                          <div class="modal fade" id="Top" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Top Up</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                  <h5 style="line-height: 1.5rem;">
                                    You can top up your locked balance anytime to increase your revenue share and account privileges.
                                  </h5>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                              </div>
                            </div>
                          </div>
                          
                          <div class="pop">
                              
                              <h4>
                                 
                              </h4>
                          </div>
                        </div>
                        <div class="marquee">
                          <iframe src="https://widget.coinlib.io/widget?type=horizontal_v2&theme=dark&pref_coin_id=1505&invert_hover=" width="100%" height="40px" scrolling="auto" marginwidth="0" marginheight="0" frameborder="0" border="0" style="border:0;margin:0;padding:0;"></iframe>
                        </div>
    
                        <!-- End -->
    
    
                      </div>
                    </div>
                  </div>
                </div>
              </div>
    
              <div class="row collection">
                <?php 
    
    
                    $getimage = $admin->getAllImage();
                    if($getimage){
                        while($result = $getimage->fetch_assoc()){
    
                
                ?>
                <div class="col-6 col-md-3 col-sm-4">
                  <div class="img text-center">
                    <div style="min-height: 280px;">
                      <a href="<?= $result['link']; ?>" target="_blank">
                        <img src="/admin/<?= $result['image']; ?>" class="img-fluid" alt="">
                        <h5><?php echo $result['title']; ?></h5>
                      </a>
                    </div>
                    <div>
                      <a href="<?= $result['link']; ?>"><button class="buttons">Place a Bid</button></a>
                    </div>
                  </div>
                </div>
                <?php } } ?>

                <div class="text-center">
                  <a href="http://musknft.web/collection" target="_blank"><button class="btn btn-success">View More</button></a>
                </div>
              </div>
      
            </div>
        <?php endif; ?>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->

<?php include "inc/footer.php" ?>