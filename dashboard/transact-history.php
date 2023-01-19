<?php include "inc/head.php"; ?>

    <?php
      $id = Session::get("UserId");

    ?>

    <?php

      if(isset($_GET['delhistory'])){
        $ids = $_GET['delhistory'];
        $delhistory = $admin->delHistoryById($ids);
      }

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
                    <div class="single-table">
                      <div class="table-responsive">
                          <table class="table text-center">
                              <thead class="text-uppercase">
                                  <tr>
                                    <th scope="col">Id</th>
                                      <th scope="col">Title</th>
                                      <th scope="col">Description</th>
                                      <th scope="col">Date</th>
                                      <th scope="col">Action</th>
                                  </tr>
                              </thead>
                              <tbody>
                                <div style="margin: 15px; text-align: center">
                                    <div style="font-weight: 600; padding: 10px; text-transform:uppercase; font-size: 16px;">

                                        <?php

                                            if(isset($delhistory)){
                                                echo $delhistory;
                                            }

                                        ?>
                                    </div>
                                </div>
                                <?php

                                    $getUser = $admin->getHistory($id);

                                    if($getUser){
                                      $i = 0;
                                      while($result = $getUser->fetch_assoc()){
                                        $i++;

                                  ?>
                                  <tr>
                                      <td><?php echo $i; ?></td>
                                      <td><?php echo $result['history_title']; ?></td>
                                      <td><?php echo $result['history_desc']; ?></td>
                                      <td><?php echo $format->formatDate($result['date']); ?></td>
                                      <td><a onClick="return confirm('Are you sure?')" class="btn btn-danger" href="?delhistory=<?php echo $result['history_id']; ?>">Delete</a></td>

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
    </div>








<?php include "inc/foot.php"; ?>
