<?php
   $this->load->view('website/include/header'); 
   ?>
<section class="golf-tour-banner-section">
   <div class="container-fluid">
      <div class="row">
         <div class="banner-box">
            <img src="<?=base_url()?>yatch_web/image/about-banner.jpg" class="img-responsive">
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
<!-- banner about page section close -->
<!-- A Littel about-us section start -->
<section class="litte-about-section">
   <div class="container">
      <div class="row">
         <div class="litte-about-main-box">
            <h2 class="cust-heading1">A Little About-Us</h2>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
         </div>
      </div>
   </div>
</section>
<!-- A Littel about-us section close -->
<!-- Tyap of water section start -->
<section class="type-water-section">
   <div class="container">
      <div class="type-water-main-box">
         <h3>Types od Water Experience</h3>
      </div>
      <?php foreach ($about_value as $about) { if ($about->ID % 2 !=0 ) {  ?>
      <div class="row">
         <div class="col-md-6">
            <div class="type-water-img">
               <img src="<?=base_url()?>uploads/about/<?=$about->image?>">
            </div>
         </div>
         <div class="col-md-6">
            <div class="type-water-contant-box">
               <h5><?=$about->title ?></h5>
               <p><?=$about->description ?></p>
               <button class="cust-btn ">Book Now</button>
            </div>
         </div>
      </div>
      <?php } else { ?>
      <div class="row">
         <div class="type-water-main-box">
            <div class="col-md-6">
               <div class="type-water-contant-box">
                  <h5><?=$about->title ?></h5>
                  <p><?=$about->description ?></p>
                  <button class="cust-btn ">Book Now</button>
               </div>
            </div>
            <div class="col-md-6">
               <div class="type-water-img">
                  <img src="<?=base_url()?>uploads/about/<?=$about->image?>">
               </div>
            </div>
         </div>
      </div>
      <?php } } ?>
   </div>
   </div>
</section>
<!-- Tyap of water section close -->
<!-- what Peoples say  section start -->
<!-- what Peoples say  section start -->
<section class="what-people-section">
   <div class="container">
      <div class="row">
         <h4 class="">What</h4>
         <h2 class="cust-heading1">Peoples Say</h2>
         <div class="what-people-main-box">
           <?php foreach ($testimonial_value as $testimonial ) { ?>
            <div class="slide">
               <p><?=$testimonial->description?></p>
               <div class="about-pg-Peoples-name">
                  <h4>-<?=$testimonial->name?></h4>
                  <p><?=$testimonial->designation?></p>
                  <ul class="list-inline">
                     <li><i class="fa fa-star" aria-hidden="true"></i></li>
                     <li><i class="fa fa-star" aria-hidden="true"></i></li>
                     <li><i class="fa fa-star" aria-hidden="true"></i></li>
                     <li><i class="fa fa-star" aria-hidden="true"></i></li>
                     <li><i class="fa fa-star" aria-hidden="true"></i></li>
                  </ul>
               </div>
            </div>
          <?php } ?>
           <!--  <div class="slide">
               <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,</p>
               <div class="about-pg-Peoples-name">
                  <h4>-Martin</h4>
                  <p>School Business Manager,London</p>
                  <ul class="list-inline">
                     <li><i class="fa fa-star" aria-hidden="true"></i></li>
                     <li><i class="fa fa-star" aria-hidden="true"></i></li>
                     <li><i class="fa fa-star" aria-hidden="true"></i></li>
                     <li><i class="fa fa-star" aria-hidden="true"></i></li>
                     <li><i class="fa fa-star" aria-hidden="true"></i></li>
                  </ul>
               </div>
            </div> -->
         </div>
      </div>
   </div>
</section>
<!-- what Peoples say  section close -->
<!-- what Peoples say  section close -->
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