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

<!-- blog page section start -->
      <section class="bolg-pg-section">
        <div class="container">
          <div class="row">
            <div class="blog-pg-main-box">
              <h2 class="cust-heading1">Blog</h2>
              <div class="col-md-8 col-sm-8">
                <?php foreach ($blog_value as $blogs) { ?>
                <div class="blog-pg-box">
                 
                  <h4><?=$blogs->title?></h4>
                  <p><?=$blogs->created_at?></p>
                  <img src="<?=base_url()?>uploads/blog/<?=$blogs->image?>">
                  <p><?=$blogs->description?></p>
                  <a href="<?=base_url()?>Web/blogs">Read More</a>
                </div>
                <hr>
                <?php } ?>
              <!--    <div class="blog-pg-box">
                  <h4>Cape Town To Malanga</h4>
                  <p>Thursday,October 29 2015 | No Comments</p>
                  <img src="<?=base_url()?>yatch_web/image/blog2.jpg">
                  <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                  <a href="<?=base_url()?>Web/blogs">Read More</a>
                </div>
                <hr>
                 <div class="blog-pg-box">
                  <h4>Cape Town To Malanga</h4>
                  <p>Thursday,October 29 2015 | No Comments</p>
                  <img src="<?=base_url()?>yatch_web/image/blog3.jpg">
                  <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                  <a href="<?=base_url()?>Web/blogs">Read More</a>
                </div>
                <hr> -->
               
                <div class="blog-pg-pagination">
                	<ul class="pagination pagination-sm pagination-blog">
                    <li>
                    <?=$this->pagination->create_links(); ?>
                  </li>
                		<!-- <li><a href="#">1 of 98</a></li>
                   <li class="active"><a href="#">1</a></li>
                   <li><a href="#">2</a></li>
                   <li><a href="#">3</a></li>
                   <li><a href="#">4</a></li>
                   <li><a href="#">>></a></li>
                   <li><a href="#">Last >></a></li> -->
                 </ul>
               </div>
              </div>
              <div class="col-md-4 col-sm-4">
                <div class="blog-topic">
                  <h3>Blog Topics</h3>
                  <ul>
                    <?php foreach ($blog_value as $blogs) { ?>
                    <li><?=$blogs->title?></li>
                  <?php } ?>
                   <!--  <li>Lorem Ipsum is simply dummy</li>
                    <li>Lorem Ipsum is simply dummy</li>
                    <li>Lorem Ipsum is simply dummy</li>
                    <li>Lorem Ipsum is simply dummy</li>
                    <li>Lorem Ipsum is simply dummy</li>
                    <li>Lorem Ipsum is simply dummy</li> -->
                  </ul>
                </div>
                <div class="blog-search">
                  <h3>Search</h3>
                  <form class="blog-pg-form">
                    <ul>
                      <li><input type="text" class="form-control" name="blog-search" placeholder="Search Post"></li>
                      <li><button>Search</button></li>
                    </ul>
                  </form>
                </div>

                <div class="blog-topic-image">
                  <img src="<?=base_url()?>yatch_web/image/image002.png">
                </div>

              </div>
            </div>
          </div>
        </div>
      </section>
<!-- blog page section close -->


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
<!-- call email  section close -->
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