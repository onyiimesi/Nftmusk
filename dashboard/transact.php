<?php include "inc/header.php"; ?>
	<?php
      $id = Session::get("UserId");

    ?>

    <?php

      if(isset($_GET['delhistory'])){
        $ids = $_GET['delhistory'];
        $delhistory = $admin->delHistoryById($ids);
      }

    ?>

    <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">

          	<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Transaction History</h4>
                  <p class="card-description">
                    
                  </p>
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>Id</th>
                          <th>Title</th>
                          <th>Description</th>
                          <th>Date</th>
                          <th>Action</th>
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




<?php include "inc/footer.php"; ?>