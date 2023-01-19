<?php include "inc/header.php"; ?>
    <!-- End of Header -->

    <section class="contact">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="cont text-center">
              <h1>CONTACT US</h1>
              <h6>Get In Touch With Us.</h6>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="contactus">
      <div class="container">
        <div class="row">
          <div class="col-lg-8">
            <div class="contact-form">
              <h3>Get In Touch</h3>
              <h3 class="text-success sent-notifiation" style="font-weight: 600;font-size: 20px;"></h3>
              <form id="myForm">
                <div class="mb-3">
                  <input type="text" class="form-control" id="name" placeholder="Full Name">
                </div>
                <div class="mb-3">
                  <input type="text" class="form-control" id="email" placeholder="Email">
                </div>
                <div class="mb-3">
                  <input type="text" class="form-control" id="subject" placeholder="Subject">
                </div>
                <div class="mb-3">
                  <textarea class="form-control" id="body" placeholder="Description" rows="8"></textarea>
                </div>
                <button type="button" onclick="sendEmail()" class="btn btn-primary">Send</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>



    <!-- Footer -->
<?php include "inc/footer.php"; ?>
