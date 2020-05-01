<?php
$this->load->view('website/include/header'); 
?>
<section class="home-slide-sec">
         <div class="top-main-slider">
          <?php foreach ($slide_list as $slider) { ?>
            <div class="slide">
               <div class="main-slider">
                  <div class="width-50 float-left mob-100">
                     <div class="slide-con">
                        <h1><?=$slider->title?></h1>
                        <h3 class="cust-heading"><?=$slider->short_description?></h3>
                        <p><?=$slider->description?></p>
                        <a href="#" class="boat-btn">Book Now<i class="fa fa-caret-right" aria-hidden="true"></i> </a>
                     </div>
                  </div>
                  <div class="width-50 main-home-banner-box float-left mob-100">
                     <!-- <div class="boat-overlay"></div> -->
                     <div class="boat-img">
                        <img src="<?=base_url()?>uploads/slide/<?=$slider->image?>" class="img-responsive">
                        <!-- <iframe width="100%" height="80vh" src="https://www.youtube.com/embed/5ndHoWMXwUE" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> -->
                     </div>
                     <div class="play-icon">
                        <img src="<?=base_url()?>yatch_web/image/paly-icon.png" class="img-responsive">
                     </div>
                     <div class="home-banner-brochure" style="background-image: url(<?=base_url()?>yatch_web/image/icons/free-pdf-button.png);">
                        <h5>FREE</h5>
                        <h6>PDF</h6>
                        <p>Brochure</p>
                        <span class="brochure-downl-icon"><img src="<?=base_url()?>yatch_web/image/download-icon.png" class="img-responsive"></span>
                     </div>
                  </div>
               </div>
            </div>
            <?php } ?>
           
         </div>
      </section>
      <section class="vission-sec">
         <div class="container">
            <div class="row">
               <div class="col-md-4 col-sm-4 text-right">
                  <div class="mission-img ">
                     <img src="<?=base_url()?>yatch_web/image/vision-mission-img.png" class="img-responsive">
                     <!-- <img src="http://vridhisoftech.in/yatch/uploads/vision/vision-and-mission.png" class="img-responsive"> -->
                  </div>
               </div>
               <div class="col-md-8 col-sm-8">
                  <div class="mis-vis-con">
                     <h4>Our</h4>
                     <h2 class="cust-heading">Vission & Mission</h2>
                     <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                  </div>
               </div>
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
      <section class="home-idia-sec" style="background-image: url('<?=base_url()?>yatch_web/image/IDEA-...-IRRESISTIBLE!.jpg'); background-size: cover; padding: 60px 0;">
         <div class="container">
            <div class="row">
               <div class="col-md-7 col-sm-7">
                  <h4 class="color-white">The</h4>
                  <h2 class="cust-heading">IDIAS... IRRESISTIBLE!</h2>
                  <P>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry.</P>
                  <button class="custom-btn">Read More</button>
               </div>
               <div class="col-md-5 col-sm-5">
                  <div class="home-idia-icon">
                     <ul class="list-inline">
                        <li>
                           <i><img src="<?=base_url()?>yatch_web/image/icons/fishing-icon.png" class="img-responsive"></i>
                           <p>Fishing</p>
                        </li>
                        <li>
                           <i><img src="<?=base_url()?>yatch_web/image/icons/Celebration-icon.png" class="img-responsive"></i>
                           <p>Celebration</p>
                        </li>
                        <li>
                           <i><img src="<?=base_url()?>yatch_web/image/icons/sailing-icon.png" class="img-responsive"></i>
                           <p>Sailing</p>
                        </li>
                        <li>
                           <i><img src="<?=base_url()?>yatch_web/image/icons/water-sport-icon.png" class="img-responsive"></i>
                           <p>Water Sports</p>
                        </li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <div class="clearfix"></div>
      <section class="tour-package-sec padding-50-0">
         <div class="container">
            <div class="row">
               <div class="col-md-4">
                  <div class="pack-box1">
                     <?php $i=0; foreach ($category_list as $category) {   $i++; if ($i < 2 ) { ?>
                     <p>Our</p>
                     <h2 class="cust-heading"><?=$category->title ?></h2>
                     <p><?=$category->description ?></p>
                  </div>
               </div>
               <?php } } ?>
               <div class="col-md-8">
                  <div class="packge-slide">
                     <?php foreach ($package_list as $package) { if($package->category_id ==1 ) { ?>
                     <div class="slide">
                        <div class="pack-box">
                           <div class="pack-overlay"></div>
                           <img src="<?=base_url()?>uploads/tour_package/<?=$package->image?>" class="img-responsive">
                           <div class="pack-discount">
                              <h3>35<span>%</span></h3>
                              <p>Off</p>
                           </div>
                           <div class="pack-tittle">
                              <h3><?=$package->title?></h3>
                              <p><i><img src="<?=base_url()?>yatch_web/image/icons/location-icon.png" class="img-responsive"></i> <?=$package->short_description?></p>
                           </div>
                        </div>
                     </div>
                     <?php } } ?>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <section class="best-gol padding-30-0">
         <div class="container">
            <div class="row">
               <div class="col-md-12 text-center">
                  <h4>The Best Goals of The</h4>
                  <h2 class="cust-heading1">Tours</h2>
               </div>
            </div>
            <div class="row padding-top-50">
              <?php $i=0; foreach ($package_list as $package) { $i++; if ($package->category_id !=1 && $package->status == 1) { ?>
               <div class="col-md-4 col-sm-6">
                  <div class="best-gol-box text-center">
                     <img src="<?=base_url()?>uploads/tour_package/<?=$package->image?>" class="img-responsive">
                     <div class="best-gol-tittle">
                        <h3><?=$package->title?></h3>
                        <p><?=$package->short_description?></p>
                        <button>Experience It</button>
                     </div>
                  </div>
               </div>
                <?php }  } ?>
               </div>
            </div>
         </div>
      </section>
      <section class="home-gallery padding-50-0">
         <div class="container">
            <div class="row">
               <div class="col-md-12 text-center">
                  <h4 class="custom-h4">RIDERE</h4>
                  <h2 class="cust-heading1">CUP TOURNAMENT</h2>
               </div>
            </div>
            <!-- MAIN (Center website) -->
            <div class="main">
               <!-- Portfolio Gallery Grid -->
               <div class="row">
                <?php $i; foreach ($category_list as $category ) { $i++; ?>
                  <div class="column nature">
                     <div class="content">
                        <img src="<?=base_url()?>uploads/category/<?=$category->image?>" alt="Mountains" style="width:100%">
                        <h4><?=$category->title?></h4>
                        <div class="play-icon inner-pay-icon">
                          <?php  if(($category->ID != 2) && ($category->ID !=4) && ($category->ID !=6) && ($category->ID !=7) && ($category->ID !=9)) { ?>
                           <img src="<?=base_url()?>yatch_web/image/paly-icon.png" class="img-responsive">
                         <?php } ?>
                        </div>
                     </div>
                  </div>
                <?php  } ?>
                  <!-- END GRID -->
               </div>
             <!--   <div class="filter-title-garly">
                  <p>Other</p>
                  <h4>Destination</h4>
               </div> -->
             <!--   <div id="myBtnContainer">
                  <button class="btn active" onclick="filterSelection('all')"> Show all</button>
                  <button class="btn" onclick="filterSelection('nature')"> Nature</button>
                  <button class="btn" onclick="filterSelection('cars')"> Cars</button>
                  <button class="btn" onclick="filterSelection('people')"> People</button>
               </div> -->
               <!-- END MAIN -->
            </div>
         </div>
      </section>
      <section class="testi-sec padding-50-0" style="background: #f3f3f3;">
         <div class="container">
            <div class="row">
               <div class="col-md-6 col-sm-6">
                <div class="testimonial-box">
                 <?php foreach ($testimonial_value as $testimonial ) { ?>
                  <div class="slide">
                    <p>What</p>
                    <h2 class="cust-heading">Peoples says</h2>

                    <div class="user-icon">
                      <img src="<?=base_url()?>uploads/testimonial/<?=$testimonial->image ?>">
                    </div>
                    <div class="test-cont">
                      <div class="cot-icon"><i class="fa fa-quote-right" aria-hidden="true"></i></div>
                      <p><?=$testimonial->description?></p>
                    </div>
                    <div class="text-user-tittle">
                      <h4><?=$testimonial->name?></h4>
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
                  </div>
               </div>
               <div class="col-md-6 col-sm-6">
                  <div class="home-blog-box">
                     <h4 class="custom-h4">Our</h4>
                     <h2 class="cust-heading">Blog</h2>
                      <?php $i = 0; foreach ($blog_value as $blog ) { $i++; if ($i < 3) { ?>
                     <div class="row">
                        <div class="col-md-6 ">
                           <div class="blog-img"><img src="<?=base_url()?>uploads/blog/<?=$blog->image?>" class="img-responsive"></div>
                        </div>
                        <div class="col-md-6">
                           <div class="home-blog-con">
                              <h4><?=$blog->title?></h4>
                              <p><?=$blog->description?></p>
                              <a href="#">Read More</a>
                           </div>
                        </div>
                     </div>
                    <?php } } ?>
                    <!--  <div class="row">
                        <div class="col-md-6 ">
                           <div class="blog-img"><img src="http://vridhisoftech.in/yatch/uploads/blog/blog2.jpg" class="img-responsive">
                              <a href="#">Read More</a>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="home-blog-con">
                              <h4>Why & Why People Says</h4>
                              <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,"""</p>
                              <a href="#">Read More</a>
                           </div>
                        </div>
                     </div> -->
                  </div>
               </div>
            </div>
         </div>
      </section>
<?php
$this->load->view('website/include/footer'); 
?>