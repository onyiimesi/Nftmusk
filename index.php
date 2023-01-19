<?php include "inc/header.php"; ?>
    <!-- End of Header -->

    <!-- Banner Section -->
      <section class="bannersec">
        <div class="banner">
          <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="img/ban1.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-md-block">
                  <!-- <h5><strong>The impossible</strong> <br> and unthinkable</h5> -->
                </div>
              </div>
              <div class="carousel-item">
                <img src="img/ban2.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-md-block">
                  <!-- <h5><strong>The impossible</strong> <br> and unthinkable</h5> -->
                </div>
              </div>
              <div class="carousel-item">
                <img src="img/ban3.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-md-block">
                  <!-- <h5><strong>Endless</strong> <br> Opportunity</h5> -->
                </div>
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>
        <div class="marquee">
          <iframe src="https://widget.coinlib.io/widget?type=horizontal_v2&theme=dark&pref_coin_id=1505&invert_hover=" width="100%" height="40px" scrolling="auto" marginwidth="0" marginheight="0" frameborder="0" border="0" style="border:0;margin:0;padding:0;"></iframe>
        </div>
      </section>
    <!-- End of Banner Section -->
    
    <section class="invest">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="invest text-center">
              <h4>Invest, Buy and Sell Extraordinary NFTs with NftMusk</h4>
              <p>NFTmusk is a Large Marketplace, We solve your NFT sales problems. Bringing Wealth From Talent, Because in The Decentralized Market, Creativity is Money.</p>
              <div class="b">
                <a href="/login" class="button">Upload</a>
                <a href="/collection" class="buttons">Buy</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Section Front Page Feature -->
      <section class="features">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-4 p-0">
              <div class="team feature-item">
                  <h3>What Are <br> NFTs?</h3>
                  <p>
                    An NFT is a cryptographic token that represents a unique asset. It's a unique unit of data employing technology that allows digital content from videos to songs to images to become logged and authenticated on cryptocurrency blockchains, Once content is logged onto the blockchain, every transaction from transfers to sales is recorded on-chain, creating an easily accessible ledger.
                  </p>
                </div>
            </div>
            
            <div class="col-lg-4 p-0">
              <div class="timing feature-item">
                  <h3>We solve your NFT sales <br>Problems</h3>
                  <p>
                    Bringing Wealth From Talent, Because in The Decentralized Market, Creativity is Money.
                  </p>
                </div>
            </div>

            <div class="col-lg-4 p-0">
              <div class="technology feature-item">
                  <h3>Oppurtunities on <br>NftMusk</h3>
                  <p>
                    Even if you are New to NFT market, or you are a Professional NFT creator. Our Platform are open to Endless Oppurtunities and Every user is Entitled to making Money from the Market.NFTs are taking Over. Create Your Account, and Make Profit From Our NFT Sales. Endless Oppurtunities with NFTMusk
                  </p>
                </div>
            </div>
          </div>
        </div>
      </section>
    <!-- End -->
    
    <section class="imgsssss">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="col_txt mb-4 text-center">
              <h3 style="font-weight: 600;">Our Collections</h3>
              <p>This page shows the latest collection of nft in our gallery.</p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">

            <div class="slider_imgs">
              <?php 


                  $getimage = $admin->getImage();
                  if($getimage){
                      while($result = $getimage->fetch_assoc()){

              
              ?>
              <div class="slide">
                <a href="<?= $result['link']; ?>" target="_blank">
                  <img src="/admin/<?= $result['image']; ?>" class="img-fluid" alt="">
                </a>
              </div>
              <?php } } ?>
            </div>

          </div>
        </div>
      </div>
    </section>
    

    <section class="wid">
     
          
        <div style="height:669px; background-color: #1D2330; overflow:hidden; box-sizing: border-box; border: 1px solid #282E3B; border-radius: 4px; text-align: right; line-height:14px; font-size: 12px; font-feature-settings: normal; text-size-adjust: 100%; box-shadow: inset 0 -20px 0 0 #262B38; padding: 0px; margin: 0px; width: 100%;"><div style="height:649px; padding:0px; margin:0px; width: 100%;"><iframe src="https://widget.coinlib.io/widget?type=full_v2&theme=dark&cnt=10&pref_coin_id=1505&graph=yes" width="100%" height="645px" scrolling="auto" marginwidth="0" marginheight="0" frameborder="0" border="0" style="border:0;margin:0;padding:0;"></iframe></div><div style="color: #626B7F; line-height: 14px; font-weight: 400; font-size: 11px; box-sizing: border-box; padding: 2px 6px; width: 100%; font-family: Verdana, Tahoma, Arial, sans-serif;"><a href="https://coinlib.io" target="_blank" style="font-weight: 500; color: #626B7F; text-decoration:none; font-size:11px">Cryptocurrency Prices Powered</a>&nbsp;by NFTMUSK</div>
        </div>
          
       
    </section>
    
    <section class="create">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="create_txt text-center">
              <h3>Create and sell your NFTs</h3>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3">
            <div class="createnft text-center">
              <img src="/img/register.png" alt="">
              <h4>Register An Account</h4>
              <p>
                Choose A Level and Activate your Account. Once you’ve set up your account level of your Choice, Your dashboard will become visible, and you can operate based on your account limit.
              </p>
            </div>
          </div>

          <div class="col-md-3">
            <div class="createnft text-center">
              <img src="/img/collection.svg" alt="">
              <h4>Visit My Profile</h4>
              <p>
                Click <a href="">My Profile</a> and set up your collection. Add social links, a description, profile & banner images.
              </p>
            </div>
          </div>

          <div class="col-md-3">
            <div class="createnft text-center">
              <img src="/img/nft.svg" alt="">
              <h4>Add your NFTs</h4>
              <p>
                Upload your work (image, video, audio, or 3D art), add a title and description, and customize your NFTs with properties, stats, and unlockable content.
              </p>
            </div>
          </div>

          <div class="col-md-3">
            <div class="createnft text-center">
              <img src="/img/sale.svg" alt="">
              <h4>List them for sale</h4>
              <p>
                Choose between auctions, fixed-price listings, and declining-price listings. You choose how you want to sell your NFTs, and we help you sell them!
              </p>
            </div>
          </div>
        </div>
        <div class="row mt-3">
          <div class="col-md-3">
            <div class="createnft text-center">
              <img src="/img/money.png" alt="">
              <h4>Make Money</h4>
              <p>
                There are many benefits attached to being a Content Creator on NFTMusk. Whether you are a Tier 1 user or a Top User, every User is Entitled to make money From Our Broad Marketplace. Starting From Weekly Revenue Share, You make Profit based on your Account Level if you Decide to create and Sell NFT or Not. You upload your NFT work to us,we market, and your Percentage on Returns of the Sales depends on your Account & Levels.
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- frontpage -->
    <section class="videoad">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="vid">
              <video controls>
                <source src="/img/vid.mp4" type="video/mp4">
              </video>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="plans">
      <h2 class="text-center">Account Level</h2>
      <div class="container">
        <div class="row">

          <div class="col-md-3">
            <div class="plan">
              <h3>Teir 1</h3>
              <h3>10% revenue share weekly</h3>
              <h3>Every 7 days</h3>
              <h5>No NFT Upload</h5>
              <h5>0% return on NFT</h5>
              <h5>MINIMUM AMOUNT : $100</h5>
              <h5>REFERRAL BONUS : 15%</h5>
              <div class="text-center mt-4">
                <a class="btn btn-success butt" href="register">Get Started</a>
              </div>
            </div>
          </div>

          <div class="col-md-3">
            <div class="plan">
              <h3>Teir 2</h3>
              <h3>15% revenue share weekly</h3>
              <h3>EVERY 7 DAYS</h3>
              <h5>2 NFT Upload Weekly</h5>
              <h5>50% Returns on Your NFT Sales</h5>
              <h5>MINIMUM AMOUNT : $300</h5>
              <h5>REFERRAL BONUS : 15%</h5>
              <div class="text-center mt-4">
                <a class="btn btn-success butt" href="register">Get Started</a>
              </div>
            </div>
          </div>

          <div class="col-md-3">
            <div class="plan">
              <h3>Teir 3</h3>
              <h3>20% revenue share weekly</h3>
              <h3>EVERY 7 DAYS</h3>
              <h5>5 NFT Upload Weekly</h5>
              <h5>60% Returns on Your NFT Sales</h5>
              <h5>MINIMUM AMOUNT : $1000</h5>
              <h5>REFERRAL BONUS : 15%</h5>
              <div class="text-center mt-4">
                <a class="btn btn-success butt" href="register">Get Started</a>
              </div>
            </div>
          </div>

          <div class="col-md-3">
            <div class="plan">
              <h3>Teir 4</h3>
              <h3>30% revenue share weekly</h3>
              <h3>EVERY 7 DAYS</h3>
              <h5>Unlimited NFT Upload</h5>
              <h5>75% Returns on Your NFT Sales</h5>
              <h5>MINIMUM AMOUNT : $10000</h5>
              <h5>REFERRAL BONUS : 15%</h5>
              <div class="text-center mt-4">
                <a class="btn btn-success butt" href="register">Get Started</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>


    <!-- Experience -->
    <!--<section class="experience text-center">-->
    <!--  <div class="container">-->
    <!--      <div class="row">-->
    <!--          <div class="col-lg-12">-->
    <!--              <div class="experience-now">-->
    <!--                <h1><strong>Have the NTFMUSK Group’s</strong><br>-->
    <!--                  Ultimate Experience</h1>-->
    <!--                <a class="btn btn-success button" href="/live" title="Get Tickets to the Next Event">Get Tickets to the Next Event</a>-->
    <!--              </div>-->
    <!--          </div>-->
    <!--      </div>-->
    <!--  </div>-->
    <!--</section>-->
    <!-- End -->

    <!-- Help -->
    <section class="help text-center">
      <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="experience-help">
                    <span>Need Help?</span> <a href="/contact" class="btn btn-light" style="color:#16638f">Contact Us</a>
                </div>
            </div>
        </div>
      </div>
    </section>
    <!-- End -->


    <!-- Footer -->
<?php include "inc/footer.php"; ?>
