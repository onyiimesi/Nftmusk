<?php include "inc/head.php"; ?>

    <?php

        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['change'])){

            $changePass = $admin->changePass($_POST);
        }

    ?>

    <!-- page title area start -->
    <div class="page-title-area">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">Change Password</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="/dashboard/home.php">Home</a></li>
                        <li><span>Change Password</span></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6 clearfix">
                <div class="user-profile pull-right">

                    <h4 class="user-name dropdown-toggle" data-toggle="dropdown">Change Password</h4>
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
                    <h4 class="header-title">Change Password</h4>
                    <div style="margin: 15px; text-align: center">
                        <div style="font-weight: 600; padding: 10px; text-transform:uppercase; font-size: 16px;">

                            <?php

                                if(isset($changePass)){
                                    echo $changePass;
                                }

                            ?>
                        </div>
                    </div>
                    <form action="" method="post">
                      <div class="mb-3">
                        <label for="" class="form-label">Old Password</label>
                        <input type="password" name="opass" class="form-control">
                      </div>
                      <div class="mb-3">
                        <label for="" class="form-label">New Password</label>
                        <input type="password" name="npass" class="form-control">
                      </div>
                      <div class="mb-3">
                        <label for="" class="form-label">Confirm Password</label>
                        <input type="password" name="cpass" class="form-control">
                      </div>
                      <button type="submit" name="change" class="btn btn-primary">Change</button>
                    </form>
                  </div>
               </div>
          </div>
        </div>
    </div>





<?php include "inc/foot.php"; ?>
