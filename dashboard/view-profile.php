<?php include "inc/header.php"; ?>

    <?php 
        $id = Session::get("UserId"); 
        $email = Session::get("UserEmail"); 
    ?>

    <!-- page title area end -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h3>My Profile</h3><hr>
                            <?php

                                $getUsers = $admin->getUserById($id);

                                if($getUsers){

                                  while($result = $getUsers->fetch_assoc()){
                                    $username = $result['username'];
                                    $user_email = $result['user_email'];
                                    $user_wallet_id = $result['user_wallet_id'];
                                    $user_country = $result['user_country'];
                                    $user_image = $result['user_image'];

                                  }
                                }

                                if(empty($user_image)){

                                    $user_image = "/dashboard/images/faces/face88.jpg";

                                }else if(!file_exists($user_image)){

                                    $user_image = "/dashboard/images/faces/face88.jpg";
                                }

                            ?>
                            <div class="profile text-center">
                                <div class="img">
                                    <img src="<?php echo $user_image; ?>" class="rounded-circle" width="150" height="150" alt="">
                                </div>
                                <div class="detail mt-4">
                                   <div class="row">
                                       <div class="col-md-3 mb-3">
                                            <span>Username</span>
                                          <h5 style="font-size: 15px;font-weight: 600;padding: 10px 0;"><?= $username; ?></h5> 
                                       </div>
                                       <div class="col-md-4 mb-3">
                                         <span>Email Address</span>
                                         <h5 style="font-size: 15px;font-weight: 600;padding: 10px 0;"><?= $user_email; ?></h5>  
                                       </div>
                                       <div class="col-md-5 mb-3">
                                            <span>Wallet Address</span>
                                          <h5 style="font-size: 15px;font-weight: 600;padding: 10px 0;"><?= $user_wallet_id; ?></h5> 
                                       </div>
                                   </div> 
                                </div>
                            </div>

                        </div>
                     </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">

                            <h3>Withdraw History</h3><hr>

                            <div class="table-responsive">
                                <table class="table">
                                  <thead>
                                    <tr>
                                      <th>Amount</th>
                                      <th>Date</th>
                                      <th>Status</th>
                                    </tr>
                                  </thead>
                                  <tbody>

                                    <?php

                                        $getUsers = $user->getUserWithdraw($id);

                                        if($getUsers){

                                          while($result = $getUsers->fetch_assoc()){
                                            $user_email = $result['user_email'];
                                            $amount = $result['amount'];
                                            $wallet_id = $result['wallet_id'];
                                            $date = $result['date'];
                                            $date = $result['status'];

                                    ?>
                                    <tr>
                                      <td>$<?php echo $result['amount']; ?></td>
                                      <td><?php echo $format->formatDate($result['date']); ?></td>
                                      <td><label class="badge badge-danger">
                                            <?php 
                                             if ($result['status'] == 'rejected') {
                                                echo "Request Rejected";
                                             }else {
                                                echo $result['status'];
                                             }
                                            ?>
                                                         
                                        </label></td>
                                    </tr>
                                    <?php } }?>
                                  </tbody>
                                </table>
                                <?php if (empty($getUsers)): ?>
                                    <div class="text-center">
                                        <h3 style="color: #333;font-size: 20px;padding: 20px 0 0 0;">No Withdraw Record.</h3>
                                    </div>
                               <?php endif ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row collections">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h3>My NFT Upload</h3><hr>

                            <div class="nft">
                                <div class="row">
                                    <?php 
    
    
                                        $getimage = $user->getUserImage($email);
                                        if($getimage){
                                            while($result = $getimage->fetch_assoc()){
                        
                                    
                                    ?>
                                    <div class="col-6 col-md-3 col-sm-4">
                                      <div class="img text-center">
                                        <div style="min-height: 280px;">
                                            <img src="/dashboard/<?= $result['file']; ?>" class="img-fluid" alt="">
                                            <h5><?php echo $result['name']; ?></h5>
                                          
                                        </div>
                                      </div>
                                    </div>
                                    <?php } } ?>
                                    <?php if (empty($getimage)): ?>
                                    <div class="text-center">
                                        <h3 style="color: #333;font-size: 20px;padding: 20px 0 0 0;">No Upload.</h3>
                                    </div>
                               <?php endif ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>






<?php include "inc/footer.php"; ?>
