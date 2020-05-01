<section class="footer">
  <div class="container">
    <div class="row">
      <div class="col-md-4 col-sm-4">
      <div class="footer-link1">
        <h4>Destinations</h4>
        <ul>
          <li><a href="#">Malra</a></li>
          <li><a href="#">Croatia</a></li>
          <li><a href="#">Greece</a></li>
          <li><a href="#">Italy</a></li>
          <li><a href="#">ibiza</a></li>
          
        </ul>
        <ul>
          <li><a href="#">Malra</a></li>
          <li><a href="#">Croatia</a></li>
          <li><a href="#">Greece</a></li>
          <li><a href="#">Italy</a></li>
          <li><a href="#">ibiza</a></li>
          
        </ul>
        <ul>
          <li><a href="#">Malra</a></li>
          <li><a href="#">Croatia</a></li>
          <li><a href="#">Greece</a></li>
          <li><a href="#">Italy</a></li>
          <li><a href="#">ibiza</a></li>
          
        </ul>
      </div>
    </div>
    <div class="col-md-2 col-sm-2">
      <div class="footer-link">
        <h4>Quick Link</h4>
        <ul>
          <li><a href="#">Malra</a></li>
          <li><a href="#">Croatia</a></li>
          <li><a href="#">Greece</a></li>
          <li><a href="#">Italy</a></li>
          <li><a href="#">ibiza</a></li>
          
        </ul>

      </div>
    </div>
    <div class="col-md-3 col-sm-3">
      <div class="footer-link">
        <h4>Expriance</h4>
        <ul>
          <li><a href="#">Malra</a></li>
          <li><a href="#">Croatia</a></li>
          <li><a href="#">Greece</a></li>
          <li><a href="#">Italy</a></li>
          <li><a href="#">ibiza</a></li>
          
        </ul>

      </div>
    </div>
    <div class="col-md-3 col-sm-3">
      <div class="footer-link">
        <h4>For Information</h4>
        <ul>
          <li><i class="fa fa-map-marker" aria-hidden="true"></i> 866-942-3464</li>
            <li><i class="fa fa-phone" aria-hidden="true"></i> 866-942-3464</li>
            <li><i class="fa fa-envelope-o" aria-hidden="true"></i> info@dummy.com</li>
          </ul>

      </div>
    </div>
    </div>
    <hr>
    <div class="row">
      <div class="col-md-4 col-sm-4">
        <div class="copyright">
          <p>Copyright 2020 Sito itlcharter Ltd</p>
        </div>
      </div>
      <div class="col-md-4 col-sm-4 text-center">
        <div class="copyright">
          <p>All Right Reseved by | VSS</p>
        </div>
      </div>
      <div class="col-md-4 col-sm-4">
        <div class="copyright text-right">
          <ul class="list-inline top-social-icon">
            <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
            <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
            <li><a href="#"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>yatch_web/js/bootstrap.min.js"></script>
<!-- <script type="text/javascript" src="<?=base_url()?>yatch_web/js/custom.js"></script> -->
<script type="text/javascript" src="<?=base_url()?>yatch_web/js/slick.js"></script>
<script type="text/javascript" src="<?=base_url()?>yatch_web/js/custom.js"></script>
<!-- <script type="text/javascript" src="<?=base_url()?>yatch_web/js/aos.js"></script> -->

<script>
filterSelection("all")
function filterSelection(c) {
  var x, i;
  x = document.getElementsByClassName("column");
  if (c == "all") c = "";
  for (i = 0; i < x.length; i++) {
    w3RemoveClass(x[i], "show");
    if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
  }
}

function w3AddClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    if (arr1.indexOf(arr2[i]) == -1) {element.className += " " + arr2[i];}
  }
}

function w3RemoveClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    while (arr1.indexOf(arr2[i]) > -1) {
      arr1.splice(arr1.indexOf(arr2[i]), 1);     
    }
  }
  element.className = arr1.join(" ");
}


// Add active class to the current button (highlight it)
var btnContainer = document.getElementById("myBtnContainer");
var btns = btnContainer.getElementsByClassName("btn");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function(){
    var current = document.getElementsByClassName("active");
    current[0].className = current[0].className.replace(" active", "");
    this.className += " active";
  });
}
</script>


<script>
  $(".mobile-ser-box .fa-search").click(function(){
  $(".top-form").show();
  $(".mobile-ser-box .fa-search").hide();
  $(".mobile-ser-box .fa-times").show();
  });

  $(".mobile-ser-box .fa-times").click(function(){
  $(".top-form").hide();
  $(".mobile-ser-box .fa-search").show();
  $(".mobile-ser-box .fa-times").hide();
  });

  $(".mobile-menu-br .fa-bars").click(function(){
  $(".home-menu").toggle();
  
  });
</script>

</body>
</html>
