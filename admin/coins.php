<?php include "inc/head.php"; ?>

<?php include "../classes/Admin.php"; ?>


    <?php
      $admin = new Admin;
    ?>

    <?php

      if(isset($_GET['delcoin'])){
        $id = $_GET['delcoin'];
        $delcoin = $admin->delCoinById($id);
      }

    ?>

    <!-- page title area start -->
    <div class="page-title-area">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">Created Coins</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="/admin/admin.php">Home</a></li>
                        <li><span>Created Coins</span></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6 clearfix">
                <div class="user-profile pull-right">

                    <h4 class="user-name dropdown-toggle" data-toggle="dropdown">Created Coins</h4>
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
                    <h4 class="header-title">Created Coins</h4>

                      <div class="table-responsive">
                          <table class="table text-center">
                            <div style="margin: 15px; text-align: center">
                                <div style="font-weight: 600; padding: 10px; text-transform:uppercase; font-size: 16px;">

                                    <?php
                                        if(isset($delcoin)){
                                            echo $delcoin;
                                        }
                                    ?>
                                </div>
                            </div>
                              <thead class="text-uppercase">
                                  <tr>
                                      <th scope="col">Wallet</th>
                                      <th scope="col">Amount</th>
                                      <th scope="col">Action</th>
                                  </tr>
                              </thead>
                              <tbody>
                                <?php

                                    $getCoins = $admin->getAllCoins();

                                    if($getCoins){
                                      $i = 0;
                                      while($result = $getCoins->fetch_assoc()){
                                        $i++;

                                  ?>
                                  <tr>
                                      <td><?php echo $result['coin_name']; ?></td>
                                      <td>$<?php echo $result['coin_amount']; ?></td>
                                      <td><a onClick="return confirm('Are you sure?')" class="btn btn-danger" href="?delcoin=<?php echo $result['coin_id']; ?>">Delete</a></td>
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
