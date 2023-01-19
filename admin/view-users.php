<?php include "inc/head.php"; ?>

<?php include "../classes/Admin.php"; ?>


    <?php
      $admin = new Admin;
    ?>

    <?php

      if(isset($_GET['deluser'])){
        $id = $_GET['deluser'];
        $deluser = $admin->delUserById($id);
      }

    ?>

    <!-- page title area start -->
    <div class="page-title-area">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">View Users</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="/admin/admin.php">Home</a></li>
                        <li><span>View Users</span></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6 clearfix">
                <div class="user-profile pull-right">

                    <h4 class="user-name dropdown-toggle" data-toggle="dropdown">View Users</h4>
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
                    <h4 class="header-title">View Users</h4>

                      <div class="data-tables">
                          <table id="dataTable" class="text-center">
                            <div style="margin: 15px; text-align: center">
                                <div style="font-weight: 600; padding: 10px; text-transform:uppercase; font-size: 16px;">

                                    <?php

                                        if(isset($deluser)){
                                            echo $deluser;
                                        }

                                    ?>
                                </div>
                            </div>
                              <thead class="bg-light text-capitalize">
                                  <tr>
                                      <th scope="col">Id</th>
                                      <th scope="col">Username</th>
                                      <th scope="col">Email</th>
                                      <th scope="col">Wallet ID</th>
                                      <th scope="col">Main Balance</th>
                                      <th scope="col">Action</th>
                                  </tr>
                              </thead>
                              <tbody>
                                <?php

                                    $getUsers = $admin->getAllUsers();

                                    if($getUsers){
                                      $i = 0;
                                      while($result = $getUsers->fetch_assoc()){
                                        $i++;

                                  ?>
                                  <tr>
                                      <td><?php echo $i; ?></td>
                                      <td><?php echo $result['username']; ?></td>
                                      <td><?php echo $result['user_email']; ?></td>
                                      <td><?php echo $result['user_wallet_id']; ?></td>
                                      <td>$<?php echo $result['new_wallet_coins']; ?></td>
                                      <td><a onClick="return confirm('Are you sure?')" class="btn btn-danger" href="?deluser=<?php echo $result['user_id']; ?>">Delete</a>
                                      <a class="btn btn-success" href="update-user.php?userid=<?php echo $result['user_id']; ?>">Update</a></td>
                                  </tr>


                                  <?php } } ?>
                              </tbody>
                          </table>
                      </div>

                  </div>
               </div>
          </div>
        </div>
    </div>



<?php include "inc/foot.php"; ?>
