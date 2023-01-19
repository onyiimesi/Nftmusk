<?php include "inc/head.php"; ?>
            <!-- header area end -->
            <!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">Dashboard</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="/admin/admin.php">Home</a></li>
                                <li><span>Dashboard</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 clearfix">
                        <div class="user-profile pull-right">

                            <h4 class="user-name dropdown-toggle" data-toggle="dropdown"><?php echo Session::get("adminUser"); ?></h4>
                            <div class="dropdown-menu">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- page title area end -->
            <div class="main-content-inner">
              <div class="row">
                  <!-- seo fact area start -->
                  <div class="col-lg-12">
                      <div class="row">

                        <div class="col-md-3 mt-5 mb-3">
                                <div class="card">
                                    <a href="/admin/view-admin.php">
                                      <div class="seo-fact sbg1">
                                          <div class="p-4 d-flex justify-content-between align-items-center">
                                              <div class="seofct-icon"><i class="ti-user"></i> Admin</div>
                                          </div>
                                      </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-3 mt-md-5 mb-3">
                                <div class="card">
                                    <a href="/admin/view-users.php">
                                      <div class="seo-fact sbg2">
                                          <div class="p-4 d-flex justify-content-between align-items-center">
                                              <div class="seofct-icon"><i class="ti-user"></i> Users</div>
                                              <!-- <h2>3,984</h2> -->
                                          </div>
                                          <!-- <canvas id="seolinechart2" height="50"></canvas> -->
                                      </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-3 mt-md-5 mb-3">
                                <div class="card">
                                    <a href="/admin/referral.php">
                                      <div class="seo-fact sbg3">
                                          <div class="p-4 d-flex justify-content-between align-items-center">
                                              <div class="seofct-icon"><i class="ti-world"></i> Referrals</div>
                                              <!-- <h2>3,984</h2> -->
                                          </div>
                                          <!-- <canvas id="seolinechart2" height="50"></canvas> -->
                                      </div>
                                    </a>
                                </div>
                            </div>
                      </div>
                  </div>
                </div>
            </div>
        </div>
        <!-- main content area end -->
        <!-- footer area start-->
<?php include "inc/foot.php"; ?>
