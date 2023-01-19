<?php include "inc/head.php"; ?>

<?php include "../classes/Admin.php"; ?>

<?php

        $admin = new Admin();

        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add'])){

            $adduser = $admin->addAdminUser($_POST);
        }

?>

    <!-- page title area start -->
    <div class="page-title-area">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">Add User</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="/admin/admin.php">Home</a></li>
                        <li><span>Add User</span></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6 clearfix">
                <div class="user-profile pull-right">

                    <h4 class="user-name dropdown-toggle" data-toggle="dropdown">Add User</h4>
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
                    <h4 class="header-title">Add User</h4>
                    <div style="margin: 15px; text-align: center">
                        <div style="font-weight: 600; padding: 10px; text-transform:uppercase; font-size: 16px;">

                            <?php

                                if(isset($adduser)){
                                    echo $adduser;
                                }

                            ?>
                        </div>
                    </div>
                    <form action="" method="post">
                      <div class="mb-3">
                        <label for="" class="form-label">Full Name</label>
                        <input type="text" name="admin_name" class="form-control">
                      </div>
                      <div class="mb-3">
                        <label for="" class="form-label">Username</label>
                        <input type="text" name="admin_user" class="form-control">
                      </div>
                      <div class="mb-3">
                        <label for="" class="form-label">Email</label>
                        <input type="email" name="admin_email" class="form-control">
                      </div>
                      <div class="mb-3">
                        <label for="" class="form-label">Password</label>
                        <input type="password" name="admin_pass" class="form-control">
                      </div>
                      <button type="submit" name="add" class="btn btn-primary">Add User</button>
                    </form>
                  </div>
               </div>
          </div>
        </div>
    </div>











<?php include "inc/foot.php"; ?>
