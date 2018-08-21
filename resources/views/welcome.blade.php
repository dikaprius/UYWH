<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>UisYouWereHere</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <script src="{{ URL::asset('js/my.js') }}"></script>
    <link rel="stylesheet" href={!! asset('/css/style.css') !!}>
    <link rel="stylesheet" href={!! asset('/css/app.css') !!}>
    <meta name="csrf-token" content="{{ csrf_token() }}">


  </head>
      @include('navs.nav')
  <body>

  <div class="slideshow-container">

  <div class="mySlides fading">
  <img src="https://danwoog.files.wordpress.com/2018/02/pic-saugatuck-river-mark-molesworth.jpg" style="width:100%">
  <div class="text">Caption Text</div>
  </div>

  <div class="mySlides fading">
  <img src="http://static.dnaindia.com/sites/default/files/styles/full/public/2017/12/16/633584-pexels-photo-368893.jpg" style="width:100%">
  <div class="text">Caption Two</div>
  </div>

  <div class="mySlides fading">
  <img src="http://www.thirdeye-photoblog.com/wp-content/uploads/2017/10/Four-Reasons-To-Hire-A-Professional-Photographer-1300x680.jpg" style="width:100%">
  <div class="text">Caption Three</div>
  </div>


    <div style="text-align:center">
    <span class="dot"></span>
    <span class="dot"></span>
    <span class="dot"></span>
    </div>
  </div>
  <br>



<script type="text/javascript">
var slideIndex = 0;
showSlides();

function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    for (i = 0; i < slides.length; i++) {
       slides[i].style.display = "none";
    }
    slideIndex++;
    if (slideIndex > slides.length) {slideIndex = 1}
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";
    dots[slideIndex-1].className += " active";
    setTimeout(showSlides,10000); // Change image every 2 seconds
}
</script>


  </body>
</html>
