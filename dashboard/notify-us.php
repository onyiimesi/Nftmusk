<?php include "inc/header.php"; ?>

	<?php

	        $admin = new Admin();

	        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['notify'])){

	            $notify = $admin->notifys($_POST);
	        }

	?>
	<div class="main-panel">
        <div class="content-wrapper">
          <div class="row">

          	<div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Notify Us</h4>
                  <p class="card-description">
                    
                  </p>
                  <div style="font-weight: 600; padding: 10px; text-transform:uppercase; font-size: 16px;">

	                    <?php

	                        if(isset($notify)){
	                            echo $notify;
	                        }

	                    ?>
                	</div>
                  <form class="forms-sample" method="post">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Title</label>
                      <input type="text" class="form-control" name="notify_title" id="exampleInputUsername1" placeholder="Title">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Description</label>
                      <textarea class="form-control" name="notify_desc" cols="30" rows="10" id="exampleInputEmail1" placeholder="Description"></textarea>
                      
                    </div>
                    <button type="submit" name="notify" class="btn btn-primary me-2">Submit</button>
                  </form>
                </div>
              </div>
            </div>

          </div>
      	</div>












<?php include "inc/footer.php"; ?>