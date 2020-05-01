<?php
$this->load->view('website/include/header'); 
?>


<!-- banner shedule page section start -->
      <section class="golf-tour-banner-section">
        <div class="container-fluid">
          <div class="row">
            <div class="banner-box">
              <img src="<?=base_url()?>yatch_web/image/about-us-img/banner.jpg" class="img-responsive">
              <div class="golf-tour-brochure" style="background-image: url(<?=base_url()?>yatch_web/image/icons/free-pdf-button.png);">
                  <h5>FREE</h5>
                  <h6>PDF</h6>
                  <p>Brochure</p>
                  <span class="golf-tour-brochure-downl-icon"><img src="<?=base_url()?>yatch_web/image/download-icon.png" class="img-responsive"></span>
                </div>
            </div>
          </div>
        </div>
      </section>
<!-- banner shedule page section close -->

<!-- contact us page section start -->
      <section class="contact-pg-section">
        <div class="container">
          <div class="row">
            <div class="contact-pg-main-box">
              <h2 class="cust-heading1">Contact Us</h2>
              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.</p>
            </div>
          </div>
        </div>
      </section>

<!-- contact us page section close -->

<!-- contact info page section start -->
      <section class="contact-info-pg-section">
        <div class="container">
          <div class="row">
            <div class="contact-info-pg-main-box">
              <h2 class="">For Information</h2>
              <div class="col-md-3 col-sm-3">
                <span class="contac-info-icon">
                  <i><img src="<?=base_url()?>yatch_web/image/location.png"></i>
                  <p>1111 Brickell Bay Dr Unit 1202,Miami</p>
                </span>
              </div>
              <div class="col-md-3 col-sm-3">
                <span class="contac-info-icon">
                  <i><img src="<?=base_url()?>yatch_web/image/mail.png"></i>
                  <p>info@kalosgolf.com</p>
                </span>
              </div>
              <div class="col-md-3 col-sm-3">
                <span class="contac-info-icon">
                  <i><img src="<?=base_url()?>yatch_web/image/call.png"></i>
                  <p>8669423464</p>
                </span>
              </div>
              <div class="col-md-3 col-sm-3">
                <span class="contac-info-icon">
                  <i><img src="<?=base_url()?>yatch_web/image/clock.png"></i>
                  <p>Mon-Sat :9Am to 5Pm</p>
                </span>
              </div>
              <div class="clearfix"></div>
            
            </div>
          </div>
        </div>
      </section>

<!-- contact info page section close -->

<!-- contact  page  form section start -->
      <section class="contact-enquiry-pg-section">
        <div class="container">
          <div class="row">
          <h2 class="">For Enquiry</h2>
          </div>
        </div>
      </section>
      <section class="contact-pg-frm-section">
        <div class="container">
          <div class="row">
            <div class="contact-pg-frm-main-box">
              <form class="contact-pg-frm" action="">
                <div class="row">
                  <div class="col-md-6 col-sm-6">
                     <div class="form-group">
                      <input type="text" class="form-control" id="subject" placeholder="Subject">
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control" id="full-name" placeholder="Your Full Name">
                    </div>
                     <div class="form-group">
                      <input type="text" class="form-control" id="phone" placeholder="Your Phone Number">
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control" id="address" placeholder="Your Email Address">
                    </div>
                  </div>
                  <div class="col-md-6 col-sm-6">
                    <div class="form-group">
                      <textarea placeholder="Additional Comments"></textarea>
                    </div>
                  </div>
                </div>
               
              
                <div class="col-md-12 col-sm-12">
                  <div class="contact-pg-frm-btn">
                    <button type="submit" class="btn btn-default">Send</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </section>
<!-- contact  page  form section close -->
<section>
   <div class="container">
      <div class="row">
          <div class="chat-main-box">
                  <div class="chat-frm">
                     <p>Hey,i'm ready to help you!</p>
                     <i class="input-right-icon"><img src="<?=base_url()?>yatch_web/image/btn-right-red-icon.png" class="img-responsive"></i>
                     <img src="<?=base_url()?>yatch_web/image/chat.jpg" class="img-responsive">
                     <span class="online"></span>
                  </div>
               </div>
      </div>
   </div>
</section>
<?php
$this->load->view('website/include/footer'); 
?>