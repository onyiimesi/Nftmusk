<?php include "inc/header.php"; ?>
	
	<?php
      $id = Session::get("UserId");

    ?>

	<div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
          	<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Active Investment</h4>
                  <p class="card-description">
                    
                  </p>
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>Wallet</th>
                          <th>Main Balance</th>
                          <th>Time (hrs)</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      	<?php

	                        $getUser = $admin->getUserById($id);

	                        if($getUser){
	                          $i = 0;
	                          while($result = $getUser->fetch_assoc()){
	                            $i++;

	                    ?>
                        <tr>
                          <td><?php echo $result['user_wallet_type']; ?></td>
                          <td>$<?php echo number_format($result['new_wallet_coins']); ?></td>
                          <td>
                            <small style="color: #000;padding: 8px;font-size: 16px;" class="timerp" id="demo<?php echo $result['user_id']; ?>"></small>
                            <script>
                               function createCountDown(elementId, date) {
                                // Set the date we're counting down to
                                var countDownDate = new Date(date).getTime();

                                // Update the count down every 1 second
                                var x = setInterval(function () {
                                  // Get todays date and time
                                  var now = new Date().getTime();

                                  // Find the distance between now an the count down date
                                  var distance = countDownDate - now;

                                  // Time calculations for days, hours, minutes and seconds
                                  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                                  var hours = Math.floor(distance % (1000 * 60 * 60 * 24) / (1000 * 60 * 60));
                                  var minutes = Math.floor(distance % (1000 * 60 * 60) / (1000 * 60));
                                  var seconds = Math.floor(distance % (1000 * 60) / 1000);

                                  // Display the result in the element with id="demo"
                                  document.getElementById(elementId).innerHTML =
                                  days + "d : " + hours + "h : " + minutes + "m : " + seconds + "s ";

                                  // If the count down is finished, write some text
                                  if (distance < 0) {
                                    clearInterval(x);
                                    document.getElementById(elementId).innerHTML = "00-00-00";
                                  }
                                }, 1000);
                              }

                              createCountDown("demo<?php echo $result['user_id']; ?>", "<?php echo $result['wallet_date']; ?>");

                              </script>

                          </td>
                          <td><a href='/dashboard/withdraw' class='btn btn-success'>Withdraw</a></td>
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