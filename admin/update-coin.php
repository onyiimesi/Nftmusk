<?php include "inc/head.php"; ?>

<?php include "../classes/Admin.php"; ?>

<?php

        $admin = new Admin();

        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['trons'])){
            $tron = $_POST['tron'];
            $updatetron = $admin->tronUpdate($tron);
        }

?>

<?php

        $admin = new Admin();

        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['litecoin'])){
            $lite = $_POST['lite'];
            $updatelite = $admin->liteUpdate($lite);
        }

?>

<?php

        $admin = new Admin();

        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['doges'])){
            $doge = $_POST['doge'];
            $updatedoge = $admin->dogeUpdate($doge);
        }

?>

<?php

        $admin = new Admin();

        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['usdtrc'])){
            $usd = $_POST['usd'];
            $updateusd = $admin->usdUpdate($usd);
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
                    <h4 class="header-title">Update Coin</h4>
                    <div style="margin: 15px; text-align: center">
                        <div style="font-weight: 600; padding: 10px; text-transform:uppercase; font-size: 16px;">

                            <?php

                                if(isset($updatetron)){
                                    echo $updatetron;
                                }

                            ?>
                        </div>
                    </div>
                    <form action="" method="post" class="mb-5">
                      <div class="mb-3">
                        <label for="" class="form-label"><strong>TRON</strong> Coin Amount</label>
                        <input type="text" name="tron" class="form-control">
                      </div>
                      <button type="submit" name="trons" class="btn btn-primary">Update</button>
                    </form>

                    <div style="margin: 15px; text-align: center">
                        <div style="font-weight: 600; padding: 10px; text-transform:uppercase; font-size: 16px;">

                            <?php

                                if(isset($updatelite)){
                                    echo $updatelite;
                                }

                            ?>
                        </div>
                    </div>
                    <form action="" method="post" class="mb-5">
                      <div class="mb-3">
                        <label for="" class="form-label"><strong>LITECOIN</strong> Coin Amount</label>
                        <input type="text" name="lite" class="form-control">
                      </div>
                      <button type="submit" name="litecoin" class="btn btn-primary">Update</button>
                    </form>

                    <div style="margin: 15px; text-align: center">
                        <div style="font-weight: 600; padding: 10px; text-transform:uppercase; font-size: 16px;">

                            <?php

                                if(isset($updatedoge)){
                                    echo $updatedoge;
                                }

                            ?>
                        </div>
                    </div>
                    <form action="" method="post" class="mb-5">
                      <div class="mb-3">
                        <label for="" class="form-label"><strong>DOGECOIN</strong> Coin Amount</label>
                        <input type="text" name="doge" class="form-control">
                      </div>
                      <button type="submit" name="doges" class="btn btn-primary">Update</button>
                    </form>

                    <div style="margin: 15px; text-align: center">
                        <div style="font-weight: 600; padding: 10px; text-transform:uppercase; font-size: 16px;">

                            <?php

                                if(isset($updateusd)){
                                    echo $updateusd;
                                }

                            ?>
                        </div>
                    </div>
                    <form action="" method="post">
                      <div class="mb-3">
                        <label for="" class="form-label"><strong>USD(TRC20)</strong> Coin Amount</label>
                        <input type="text" name="usd" class="form-control">
                      </div>
                      <button type="submit" name="usdtrc" class="btn btn-primary">Update</button>
                    </form>
                  </div>
               </div>
          </div>
        </div>
    </div>











<?php include "inc/foot.php"; ?>
