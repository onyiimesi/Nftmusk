<?php include "inc/head.php"; ?>

<?php include "../classes/Admin.php"; ?>

    <?php

      $admin = new Admin();

      if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['upload'])){

          $upload = $admin->uploadImage($_POST, $_FILES);
      }

    ?>

    <!-- page title area start -->
    <div class="page-title-area">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">Upload Image</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="/admin/admin.php">Home</a></li>
                        <li><span>Upload Image</span></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6 clearfix">
                <div class="user-profile pull-right">

                    <h4 class="user-name dropdown-toggle" data-toggle="dropdown">Upload Image</h4>
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
              <div style="font-weight: 600; padding: 10px; text-transform:uppercase; font-size: 16px;">

                <?php  

                  if (isset($upload)) {
                    echo $upload;
                  }

                ?>

              </div>
              <form action="" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                  <label for="" class="form-label"><strong>Title</strong></label>
                  <input type="text" name="title" class="form-control">
                </div>
                <div class="mb-3">
                  <label for="" class="form-label"><strong>Image</strong></label>
                  <input type="file" name="image" class="form-control">
                </div>
                <div class="mb-3">
                  <label for="" class="form-label"><strong>Link</strong></label>
                  <input type="text" name="link" class="form-control">
                </div>
                <button type="submit" name="upload" class="btn btn-success">Upload</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>



<?php include "inc/foot.php"; ?>
