<div class="footer text-center">
  <div class="container">
      <div class="row">
          <div class="col-lg-4">
            <div class="footer-logo">
              <img src="img/logo.png" class="img-fluid" alt="">
            </div>
          </div>
          <div class="col-lg-4">
            <div class="footer-nav">
              <ul>
                <li><a href="/about">About Us</a></li>
                <li><a href="/contact">Contact Us</a></li>
                <li><a href="/collection">NFT Collection</a></li>
                <li><a href="/join-us">Join our Team</a></li>
                <li><a href="/privacy">Privacy Policy</a></li>
                <li><a href="/terms">Terms & Conditions</a></li>
              </ul>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="footer-social">
              <h3>We Are Social</h3>
              <div class="social-icons">
                <ul>
                  <li><a href="https://twitter.com/NftmuskOfficial" target="_blank"><i class="fa fa-twitter"></i> </a></li>
                  <li><a href="https://t.me/NftmuskOfficial" target="_blank"><i class="fa fa-telegram"></i> </a></li>
                </ul>
              </div>
            </div>
          </div>
      </div>
  </div>
</div>
<!-- End -->

<!-- Copyright -->
<footer>
  <div class="container-fluid">
      <div class="row">
          <div class="col-lg-12">
              <div class="copy">
                  <span>&copy; Copyright 2021. All Rights Reserved</span>
              </div>
          </div>
      </div>
  </div>
</footer>
<!-- End -->


















<script src="/js/jquery-3.3.1.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/js/slick.min.js"></script>
<script src="/js/script.js" charset="utf-8"></script>
<script src="/js/scripts.js" charset="utf-8"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>



<script type="text/javascript">
  $(window).on("load", function () {
    AOS.init();
  });
</script>


<script type="text/javascript">
  function sendEmail(){
    var name = $("#name");
    var email = $("#email");
    var subject = $("#subject");
    var body = $("#body");

    if (isNotEmpty(name) && isNotEmpty(email) && isNotEmpty(subject) && isNotEmpty(body)) {
      $.ajax({
        url: 'contactform.php',
        method: 'POST',
        dataType: 'json',
        data: {
          name: name.val(),
          email: email.val(),
          subject: subject.val(),
          body: body.val()
        }, success: function(response){
          $('#myForm')[0].reset();
          $('.sent-notifiation').text("Message sent successfully.");
        }
      });
    }
  }
  function isNotEmpty(caller){
    if (caller.val() == "") {
      caller.css('border', '1px solid red');
      return false;
    }else{
      caller.css('border', '');
      return true;
    }
  }
</script>

<script type="text/javascript">
  $(document).ready(function(){
    $('.slider_imgs').slick({
        dots: false,
        infinite: true,
        speed: 300,
        slidesToShow: 8,
        autoplay: true,
        arrows: false,
        autoplaySpeed: 2000,
        slidesToScroll: 1,
        responsive: [
          {
            breakpoint: 1024,
            settings: {
              slidesToShow: 3,
              slidesToScroll: 3,
              infinite: true,
              dots: true
            }
          },
          {
            breakpoint: 600,
            settings: {
              slidesToShow: 3,
              autoplay: true,
          autoplaySpeed: 2000,
              slidesToScroll: 2
            }
          },
          {
            breakpoint: 480,
            settings: {
              slidesToShow: 2,
              autoplay: true,
          autoplaySpeed: 2000,
              slidesToScroll: 1
            }
          }
          // You can unslick at a given breakpoint now by adding:
          // settings: "unslick"
          // instead of a settings object
        ]
      });
  });
</script>

</body>
</html>
