  <?php
  $this->load->view('website/include/header'); 
  ?>
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

<!-- shedule inner page section start -->
      <section class="shedule-inner-section">
        <div class="container">
          <div class="row">
              <h4 class="cust-heading2">Hence 445</h4>
            <div class="shedule-inner-main-box">
              <div class="col-md-7 col-sm-7">
                <div class="shedule-inner-img">
                  <img src="<?=base_url()?>yatch_web/image/shedule1.jpg" class="img-responsive">
                </div>
              </div>
              <div class="col-md-5 col-sm-5">
                <div class="shedule-inner-price-box">
                  <h1>$595.00</h1>
                  <p class="some-golf-tour-location"><i><img src="<?=base_url()?>yatch_web/image/icons/location-icon.png"></i> Lorem Ipsum is simply</p>
                  <div class="off-tour">
                    <img src="<?=base_url()?>yatch_web/image/35_off.png" >
                  </div>

                  <form class="shedule-inner-form" action="">
                    <div class="form-group">
                      <input type="text" class="form-control" id="days" placeholder="Days">
                    </div>
                    <div class="form-group">
                      <input type="date" class="form-control" id="date">
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control" id="passengers" placeholder="Passengers">
                    </div>
                    <button type="submit" class="">Book Now</button>
                    <span><a href="#">Search Other Boats & Location</a></span>
                  </form>
                </div>
              </div>
            </div>
           
          </div>
        </div>
      </section>
<!-- shedule inner page section start -->
      <section class="shedule-details-section">
       <div class="container">
        <hr>
         <div class="row">
           <div class="shedule-details-main-box">
             <div class="col-md-4 col-sm-4">
               <div class="shedule-details-box1">
                 <h5>The Boat</h5>
                 <p><strong>Model:</strong> Islander Isllander 36</p>
                 <p><strong>Type:</strong> Sail</p>
                 <p><strong>Sleeps:</strong> 6</p>
                 <p><strong>Fuel Type:</strong> Diesel</p>
                 <p><strong>Horsepower:</strong> 29</p>
                 <p><strong>Passenger Capacity:</strong> Up to 8</p>
                 <p><strong>Rooms:</strong> 1</p>
               </div>
             </div>

             <div class="col-md-4 col-sm-4">
               <div class="shedule-details-box2">
                 <h5>Features</h5>
                 <div class="row">
                   <div class="col-md-6 col-sm-6">
                      <ul>
                       <li>Anchor</li>
                       <li>Anchor</li>
                       <li>Anchor</li>
                       <li>Anchor</li>
                       <li>Anchor</li>
                       <li>Anchor</li>
                       <li>Anchor</li>
                     </ul>
                   </div>
                   <div class="col-md-6 col-sm-6">
                      <ul>
                       <li>Anchor</li>
                       <li>Anchor</li>
                       <li>Anchor</li>
                       <li>Anchor</li>
                       <li>Anchor</li>
                       <li>Anchor</li>
                       <li>Anchor</li>
                     </ul>
                   </div>
                 </div>
                
               </div>
             </div>

             <div class="col-md-4 col-sm-4">
               <div class="shedule-details-box3">
                 <h5>Boat Rules</h5>
                 <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
               </div>
             </div>

              <div class="col-md-12 col-sm-12">
              <div class="cancellation-policy">
                <h4>Cancellation Policy</h4>
                <p>Free cancellation up to 24 hours from trip start.</p>
              </div>
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