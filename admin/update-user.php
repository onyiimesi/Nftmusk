<?php include "inc/head.php"; ?>

<?php include "../classes/Admin.php"; ?>


<?php

    if(!isset($_GET['userid']) || $_GET['userid'] == null){
        echo "<script>window.location = 'update-user.php'; </script> ";
    }else{
        $id = $_GET['userid'];
    }


?>
<?php

        $admin = new Admin();

        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['updateuser'])){

            $updateuser = $admin->userUpdate($_POST, $id);
        }

        // if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['updatenewcoin'])){
        //
        //     $updatenewcoin = $admin->newCoinUpdate($_POST, $id);
        // }
        //
        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['updatedate'])){
        
             $updatedate = $admin->dateUpdate($_POST, $id);
        }

        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['history'])){

            $history = $admin->history($_POST, $id);
        }

?>


    <!-- page title area start -->
    <div class="page-title-area">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">Update Coin</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="/admin/admin.php">Home</a></li>
                        <li><span>Update Coin</span></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6 clearfix">
                <div class="user-profile pull-right">

                    <h4 class="user-name dropdown-toggle" data-toggle="dropdown">Update Coin</h4>
                    <div class="dropdown-menu">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- page title area end -->

    <!-- page title area end -->
    <div class="main-content-inner">
        <div class="row">
          <div class="col-lg-12 mt-5">
              <div class="card">
                  <div class="card-body">
                    <h4 class="header-title">Update User</h4>
                    <div style="margin: 15px; text-align: center">
                        <div style="font-weight: 600; padding: 10px; text-transform:uppercase; font-size: 16px;">

                            <?php

                                if(isset($updateuser)){
                                    echo $updateuser;
                                }

                            ?>
                        </div>
                    </div>
                    <?php

                      $getUsers = $admin->getUserById($id);

                      if($getUsers){

                        while($result = $getUsers->fetch_assoc()){
                          $new_wallet_coins = $result['new_wallet_coins'];

                        }
                      }

                    ?>
                    <form action="" method="post">
                      <div class="mb-3">
                        <label for="" class="form-label">Main Balance</label>
                        <input type="text" name="new_wallet_coins" value="<?php echo $new_wallet_coins; ?>" class="form-control">
                      </div>
                      <button type="submit" name="updateuser" class="btn btn-success">Update Balance</button>
                    </form>
                  </div>
               </div>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-12 mt-5">
            <div class="card">
                <div class="card-body">
                  <h4 class="header-title">Update Time</h4>
                  <?php

                      $getUsers = $admin->getUserById($id);

                      if($getUsers){

                        while($result = $getUsers->fetch_assoc()){
                          $date = $result['wallet_date'];

                        }
                      }

                    ?>
                    <?php

                        if(isset($updatedate)){
                            echo $updatedate;
                        }

                    ?>
                  <form action="" method="post">
                    <div class="mb-3">
                      <label for="" class="form-label">Date</label>
                      <input type="date" name="wallet_date" value="<?php echo $date; ?>" class="form-control">
                    </div>
                    <button type="submit" name="updatedate" class="btn btn-success">Update</button>
                  </form>
                </div>
              </div>
          </div>  
        </div>

        <div class="row">
          <div class="col-lg-12 mt-5">
            <div class="card">
                <div class="card-body">
                  <h4 class="header-title">Transaction History</h4>
                  <div style="margin: 15px; text-align: center">
                      <div style="font-weight: 600; padding: 10px; text-transform:uppercase; font-size: 16px;">

                          <?php

                              if(isset($history)){
                                  echo $history;
                              }

                          ?>
                      </div>
                  </div>
                  <form action="" method="post">
                    <div class="mb-3">
                      <label for="" class="form-label">Title</label>
                      <input type="text" name="history_title" class="form-control" placeholder="Deposit/Withdraw">
                    </div>
                    <div class="mb-3">
                      <label for="" class="form-label"></label>
                      <textarea class="form-control" name="history_desc" rows="8" cols="80" placeholder="Description"></textarea>
                    </div>
                    <button type="submit" name="history" class="btn btn-success">Send History</button>
                  </form>
                </div>
              </div>
          </div>
        </div>
    </div>











<?php include "inc/foot.php"; ?>
