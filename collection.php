<?php include "inc/header.php"; ?>
    <!-- End of Header -->

    <section class="join">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="joinus text-center">
              <h1>NFT COLLECTION</h1>
              <h6>This page shows the latest collection of nft in our gallery.</h6>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="collection">
      <div class="container">
        <div class="row">
          <?php 


              $getimage = $admin->getAllImage();
              if($getimage){
                  while($result = $getimage->fetch_assoc()){

          
          ?>
          <div class="col-6 col-md-3 col-sm-4">
            <div class="img text-center">
              <div style="min-height: 280px;">
                <a href="<?= $result['link']; ?>" target="_blank">
                  <img src="/admin/<?= $result['image']; ?>" class="img-fluid" alt="">
                  <h5><?php echo $result['title']; ?></h5>
                </a>
              </div>
              <div>
                <a href="<?= $result['link']; ?>"><button class="buttons">Place a Bid</button></a>
              </div>
            </div>
          </div>
          <?php } } ?>
        </div>
      </div>
    </section>



    <!-- Footer -->
<?php include "inc/footer.php"; ?>
