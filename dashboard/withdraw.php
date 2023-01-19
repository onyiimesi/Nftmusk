<?php include "inc/header.php"; ?>



    <?php

            $admin = new Admin();

            if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['withdraw'])){

                $withdraw = $admin->withdraw($_POST);
            }

    ?>




    <!-- page title area end -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Withdraw Funds</h4><hr>
                            <p class="card-description">
                            </p>

                            <div style="font-weight: 600; text-transform:uppercase; font-size: 16px;">

                                <?php

                                    if(isset($withdraw)){
                                        echo $withdraw;
                                    }

                                ?>
                            </div>

                            <?php

                            $id = Session::get("UserId");
                            $email = Session::get("UserEmail");
                            
                            $getUsers = $admin->getUserById($id);

                            if($getUsers){

                              while($result = $getUsers->fetch_assoc()){
                                $user_wallet_id = $result['user_wallet_id'];

                                $wallet_coins = $result['new_wallet_coins'];
                                $percentToGet = 80;
                                $percentInDecimal = $percentToGet / 100;
                                $totalamount = $percentInDecimal * $wallet_coins;

                              }
                            }

                            ?>
                            <form action="" method="post" class="mb-5">
                              <h6>Note: Minimum withdrawal is $100</h6><br>
                              <div class="mb-3">
                                <input type="hidden" name="user_email" value="<?php echo $email; ?>" readonly class="form-control">
                              </div>
                              <div class="mb-3">
                                <label for="" class="form-label"><strong>Wallet ID</strong></label>
                                <input type="text" name="wallet_id" value="<?php echo $user_wallet_id; ?>" readonly class="form-control">
                              </div>
                              <div class="mb-3">
                                <label for="" class="form-label"><strong>Amount</strong></label>
                                <input type="text" name="amount" class="form-control">
                                <h5 style="padding:10px 0 0 0;font-size: 14px;">Your maximum amount is $<?php echo number_format($totalamount); ?></h5>
                              </div>
                              <button type="submit" name="withdraw" class="btn btn-success">Withdraw</button>
                            </form>
                            <h5>Note:<br>
                              <span style="font-size: 15px;">Only 80% of funds are accessible, 20% is locked for
                                company insurance of trade.</span>
                            </h5><br>
                            <!-- <h5 style="font-size: 15px;">After a successful withdrawal
                            your next withdrawal will be
                            a week from now, and payment will be processed within 24 hours.</h5> -->

                        </div>
                     </div>
                </div>
            </div>
    </div>






<?php include "inc/footer.php"; ?>
