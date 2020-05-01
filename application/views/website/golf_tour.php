<?php
$this->load->view('website/include/header'); 
?>
<!-- banner about page section start -->
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
<!-- banner about page section close -->
<!-- A Littel about-us section start -->
<section class="golf-tour-section">
 <div class="container">
  <div class="row">
   <div class="golf-tour-main-box">
    <h2 class="cust-heading1">Golf Tours</h2>
    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
  </div>
</div>
</div>
</section>
<!-- A Littel about-us section close -->
<!-- Tyap of water section start -->
<section class="some-golf-tour-section">
 <div class="container">
  <div class="some-golf-tour-main-box">
   <h3>Here are some Golf Tours</h3>
 </div>
 <div class="get_append">
   <?php foreach ($golf_tour as $golf) { if ($golf->category_id == 1 && $golf->ID >= 3) { if ($golf->ID % 2 !=0 ) { ?>
     <div class="row">
       <div class="col-md-7">
         <div class="type-water-img">
           <img src="<?=base_url()?>uploads/tour_package/<?=$golf->image?>" width="555px" height="387">
         </div>
       </div>
       <div class="col-md-5">
         <div class="some-golf-tour-contant-box">
           <h5><?=$golf->title?></h5>
           <p class="some-golf-tour-location"><i><img src="<?=base_url()?>yatch_web/image/location.png"></i> Lorem Ipsum is simply</p>
           <p><?=$golf->description?></p>
           <div class="some-golf-tour-btn"><button class="cust-btn">Book Now</button></div>
           <div class="some-golf-tour-offer">
             <img src="<?=base_url()?>yatch_web/image/35_off.png">
           </div>
         </div>
       </div>
     </div>
     <?php
   }
   else 
   { 
    ?>
    <div class="type-water-main-box">
     <div class="col-md-5">
       <div class="some-golf-tour-contant-box">
         <h5><?=$golf->title?></h5>
         <p class="some-golf-tour-location"><i><img src="<?=base_url()?>yatch_web/image/location.png"></i> Lorem Ipsum is simply</p>
         <p><?=$golf->description?></p>
         <div class="some-golf-tour-btn"><button class="cust-btn ">Book Now</button></div>
         <div class="some-golf-tour-offer">
           <img src="<?=base_url()?>yatch_web/image/25_off.png">
         </div>
       </div>
     </div>
     <div class="col-md-7">
       <div class="type-water-img">
         <img src="<?=base_url()?>uploads/tour_package/<?=$golf->image?>" width="555px" height="387">
       </div>
     </div>
   </div>
 <?php } } }  ?>
</div>
<div id="more_golf_tour">

</div>

<div class="row">
 <div class="col-md-12">
  <div class="see-more-golf-tour">
   <a href="#" onclick="all_golf_tour()"> See More Golf Tours</a>
 </div>
</div>
</div>
</div>
</section>
<!-- Tyap of water section close -->
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


<script type="text/javascript">
  function all_golf_tour() 
  {
    $.ajax({
      url : "<?php echo base_url()?>Web/golf",
      method : "POST",
      success:function(result)
      {
        /*alert(result);*/
        $("#more_golf_tour").html(`'<?php foreach ($golf_tour as $golf) { if ($golf->ID > 3) { if ($golf->ID % 2 !=0 ) { ?>
          <div class="row">
          <div class="col-md-7">
          <div class="type-water-img">
          <img src="<?=base_url()?>uploads/tour_package/<?=$golf->image?>" width="555px" height="387">
          </div>
          </div>
          <div class="col-md-5">
          <div class="some-golf-tour-contant-box">
          <h5><?=$golf->title?></h5>
          <p class="some-golf-tour-location"><i><img src="<?=base_url()?>yatch_web/image/location.png"></i> Lorem Ipsum is simply</p>
          <p><?=$golf->description?></p>
          <button class="cust-btn">Book Now</button>
          <div class="some-golf-tour-offer">
          <img src="<?=base_url()?>yatch_web/image/35_off.png">
          </div>
          </div>
          </div>
          </div>
          <?php
        }
        else 
        { 
          ?>
          <div class="type-water-main-box">
          <div class="col-md-5">
          <div class="some-golf-tour-contant-box">
          <h5><?=$golf->title?></h5>
          <p class="some-golf-tour-location"><i><img src="<?=base_url()?>yatch_web/image/location.png"></i> Lorem Ipsum is simply</p>
          <p><?=$golf->description?></p>
          <button class="cust-btn ">Book Now</button>
          <div class="some-golf-tour-offer">
          <img src="<?=base_url()?>yatch_web/image/25_off.png">
          </div>
          </div>
          </div>
          <div class="col-md-7">
          <div class="type-water-img">
          <img src="<?=base_url()?>uploads/tour_package/<?=$golf->image?>" width="555px" height="387">
          </div>
          </div>
          </div>
        <?php } } }  ?>

        '`);
      }
    });
  }
</script>