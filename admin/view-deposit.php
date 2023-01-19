<?php include "inc/head.php"; ?>

<?php include "../classes/Admin.php"; ?>


    <?php
      $admin = new Admin;
    ?>

    <?php

      if(isset($_GET['deldeposit'])){
        $id = $_GET['deldeposit'];
        $deldeposit = $admin->delDepositById($id);
      }

    ?>

    <!-- page title area start -->
    <div class="page-title-area">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">View Deposits</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="/admin/admin.php">Home</a></li>
                        <li><span>View Deposits</span></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6 clearfix">
                <div class="user-profile pull-right">

                    <h4 class="user-name dropdown-toggle" data-toggle="dropdown">View Deposits</h4>
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
                      <div class="table-responsive">
                          <table class="table text-center">
                            <div style="margin: 15px; text-align: center">
                                <div style="font-weight: 600; padding: 10px; text-transform:uppercase; font-size: 16px;">

                                    <?php

                                        if(isset($deldeposit)){
                                            echo $deldeposit;
                                        }

                                    ?>
                                </div>
                            </div>
                              <thead class="text-uppercase">
                                  <tr>
                                      <th scope="col">Id</th>
                                      <th scope="col">User Id</th>
                                      <th scope="col">Email</th>
                                      <th scope="col">Transaction ID</th>
                                      <th scope="col">Action</th>
                                  </tr>
                              </thead>
                              <tbody>
                                <?php

                                    $getUsers = $admin->getAllDeposit();

                                    if($getUsers){
                                      $i = 0;
                                      while($result = $getUsers->fetch_assoc()){
                                        $i++;

                                  ?>
                                  <tr>
                                      <td><?php echo $i; ?></td>
                                      <td><?php echo $result['user_id']; ?></td>
                                      <td><?php echo $result['user_email']; ?></td>
                                      <td><?php echo $result['transact_id']; ?></td>
                                      <td><a onClick="return confirm('Are you sure?')" class="btn btn-danger" href="?deldeposit=<?php echo $result['deposit_id']; ?>">Delete</a>
                                      </td>
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
