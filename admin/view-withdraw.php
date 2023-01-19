<?php include "inc/head.php"; ?>

<?php include "../classes/Admin.php"; ?>


    <?php
      $admin = new Admin;

      $format = new Format;
    ?>

    <?php

        if(isset($_GET['approve'])){
            $id = $_GET['approve'];
            $date = $_GET['date'];

            $approve = $admin->withdrawApproved($id, $date);
            
        }

      if(isset($_GET['delwithdraw'])){
        $id = $_GET['delwithdraw'];
        $delwithdraw = $admin->delWithdrawById($id);
      }

    ?>

    <!-- page title area start -->
    <div class="page-title-area">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">View Withdraw Notice</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="/admin/admin.php">Home</a></li>
                        <li><span>View Withdraw Notice</span></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6 clearfix">
                <div class="user-profile pull-right">

                    <h4 class="user-name dropdown-toggle" data-toggle="dropdown">View Withdraw Notice</h4>
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

                                        if(isset($approve)){
                                            echo $approve;
                                        }

                                    ?>

                                    <?php

                                        if(isset($delwithdraw)){
                                            echo $delwithdraw;
                                        }

                                    ?>
                                </div>
                            </div>
                              <thead class="text-uppercase">
                                  <tr>
                                      <th scope="col">Id</th>
                                      <th scope="col">Email</th>
                                      <th scope="col">Amount</th>
                                      <th scope="col">Wallet ID</th>
                                      <th scope="col">Date</th>
                                      <th scope="col">Approve</th>
                                      <th scope="col">Action</th>
                                  </tr>
                              </thead>
                              <tbody>
                                <?php

                                    $getUsers = $admin->getAllWithdraws();

                                    if($getUsers){
                                      $i = 0;
                                      while($result = $getUsers->fetch_assoc()){
                                        $i++;

                                  ?>
                                  <tr>
                                      <td><?php echo $i; ?></td>
                                      <td><?php echo $result['user_email']; ?></td>
                                      <td>$<?php echo $result['amount']; ?></td>
                                      <td><?php echo $result['wallet_id']; ?></td>
                                      <td><?php echo $format->formatDate($result['date']); ?></td>
                                      <td><a onClick="return confirm('Are you sure?')" class="btn btn-success" href="?approve=<?php echo $result['withdraw_id']; ?>&date=<?php echo $result['date']; ?>">Approve</a></td>
                                      <td><a onClick="return confirm('Are you sure?')" class="btn btn-danger" href="?delwithdraw=<?php echo $result['withdraw_id']; ?>">Delete</a>
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
