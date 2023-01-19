<?php include "inc/head.php"; ?>

    <?php
      $id = Session::get("UserId");

    ?>

    <!-- page title area start -->
    <div class="page-title-area">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">Transaction History</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="/dashboard/home.php">Home</a></li>
                        <li><span>Transaction History</span></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6 clearfix">
                <div class="user-profile pull-right">

                    <h4 class="user-name dropdown-toggle" data-toggle="dropdown">Transaction History</h4>
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
                    <h4 class="header-title">Withdraw History</h4>

                  </div>
               </div>
          </div>
        </div>
    </div>








<?php include "inc/foot.php"; ?>
