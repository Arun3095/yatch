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

<!-- Schedile Your Boats section start -->
      <section class="golf-tour-section">
        <div class="container">
          <div class="row">
            <div class="golf-tour-main-box">
              <h2 class="cust-heading1">Schedule Your Boats</h2>
               <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
            </div>
          </div>
        </div>
  
      </section>
<!-- Schedile Your Boats section close -->

<!-- shedule form section start -->
      <section class="shedule-form-section">
        <div class="container">
          <div class="row">
            <div class="shedule-form-main-box">
                <form class="shedule-form form-inline" action="">
                  <div class="form-group">

                    <select class="form-control" id="location-tour">
                       <span><i class="fa fa-calendar" aria-hidden="true"></i></span>
                      <option class="fa fa-calendar">Ibiza,Croatia,Sardinia...</option>
                      <option>2</option>
                      <option>3</option>
                      <option>4</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <select class="form-control" id="location-tour">
                      <option>Check-in</option>
                      <option>2</option>
                      <option>3</option>
                      <option>4</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <select class="form-control" id="location-tour">
                      <option>Check-out</option>
                      <option>2</option>
                      <option>3</option>
                      <option>4</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <select class="form-control" id="location-tour">
                      <option>Boat's Types</option>
                      <option>2</option>
                      <option>3</option>
                      <option>4</option>
                    </select>
                  </div>
                  <button type="submit" class="btn">Search</button>
                </form>
            </div>
          </div>
        </div>
      </section>
<!-- shedule form section start -->

<!-- Featured Yachts for Rent section start -->
      <section class="some-golf-tour-section">
        <div class="container">
          <div class="row">
            <div class="some-golf-tour-main-box">
              <h3>Featured Yachts for Rent</h3>
              <div class="col-md-6">
                <div class="some-golf-tour-img">
                  <img src="<?=base_url()?>yatch_web/image/shedule1.jpg">
                </div>

                 <div class="some-golf-tour-contant-box">
                  <h5>Hance 445</h5>
                  <p class="some-golf-tour-location"><i><img src="<?=base_url()?>yatch_web/image/location.png"></i> Lorem Ipsum is simply</p>
                   <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                   <a href="<?=base_url()?>Web/book"><button class="cust-btn ">Book Now</button></a>
                   <div class="some-golf-tour-offer">
                     <img src="<?=base_url()?>yatch_web/image/35_off.png">
                   </div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="some-golf-tour-img">
                  <img src="<?=base_url()?>yatch_web/image/shedule2.jpg">
                </div>

                 <div class="some-golf-tour-contant-box">
                  <h5>Hance 445</h5>
                  <p class="some-golf-tour-location"><i><img src="<?=base_url()?>yatch_web/image/location.png"></i> Lorem Ipsum is simply</p>
                   <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                   <a href="<?=base_url()?>Web/book"><button class="cust-btn ">Book Now</button></a>
                   <div class="some-golf-tour-offer">
                     <img src="<?=base_url()?>yatch_web/image/35_off.png">
                   </div>
                </div>
              </div>
            </div>
          </div>
       
          <div class="row">
            <div class="col-md-12">
              <div class="see-more-golf-tour">
                <a href="">See More<br/><i><img src="<?=base_url()?>yatch_web/image/icons/dropdown-icon.png"></i></a>
              </div>
            </div>
          </div>

        </div>
      </section>
<!-- Featured Yachts for Rent section close -->
      <section class="your-own-section" style="background-image: url('<?=base_url()?>yatch_web/image/Boat-of-your-own.jpg');">
        <div class="container">
          <div class="row">
            <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="your-own-main-box">
              <h3>Boat of your own?</h3>
              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>
              <button class="your-own-button1">OUR BOATS</button>
              <button class="your-own-button2">BOOK NOW</button>
            </div>
            </div>
          </div>
        </div>
      </section>


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