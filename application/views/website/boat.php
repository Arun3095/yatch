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

<section class="our-boats-section">
        <div class="container">
          <div class="row">
            <div class="our-boats-main-box">
              <h2 class="cust-heading1">Our Boats</h2>
              <hr>
              <?php foreach ($trasnport_value as $transport) { if ($transport->status == 1) { ?>
            
              <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="our-boats-box">
                   <img src="<?=base_url()?>uploads/transport/<?=$transport->image?>" class="img-responsive">
                   <h4><?=$transport->name?></h4>
                   <a href="#">See Prices</a>
                </div>
              </div>
               <?php } } ?>
             
     

            </div>
          </div>
        </div>
      </section>
<!-- bour boats page section close -->



<!-- call email  section start -->
      <section class="about-pg-call-email-section">
        <div class="container">
          <div class="row">
            <div class="about-pg-call-email-box">
              <div class="col-md-6 col-sm-6">
                <div class="about-pg-call-box">
                  <h3><span>Call </span> 866-942-3464</h3>
                </div>
              </div>
               <div class="col-md-6 col-sm-6">
                <div class="about-pg-email-box">
                  <h3><span>Email:</span>info@kalosgolf.com</h3>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- chat Section -->
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
<!-- End Here -->

  <?php
  $this->load->view('website/include/footer'); 
  ?>