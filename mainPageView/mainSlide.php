<!-- Slideshow container -->
<div class="slideshow-container">

  <!-- Full-width images with number and caption text -->
  <div class="mySlides fade">
    <img src="../images/MainSlide1.jpg" style="width:100%; height:100%;">
  </div>

  <div class="mySlides fade">
    <img src="../images/MainSlide2.jpg" style="width:100%; height:100%;">
  </div>

  <div class="mySlides fade">
    <img src="../images/MainSlide3.jpg" style="width:100%; height:100%;">
  </div>
  
  <div class="mySlides fade">
    <img src="../images/MainSlide4.jpg" style="width:100%; height:100%;">
  </div>
  
  <div class="mySlides fade">
    <img src="../images/MainSlide5.jpg" style="width:100%; height:100%;">
  </div>
  
  <div class="mySlides fade">
    <img src="../images/MainSlide6.jpg" style="width:100%; height:100%;">
  </div>
  
<!--  <div class="mySlides fade">-->
<!--    <img src="../images/MainSlide6.jpg" style="width:100%; height:100%;">-->
<!--  </div>-->
</div>


<script>
    var slideIndex = 0;
    showSlides();

    function showSlides() {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        slideIndex++;
        if (slideIndex > slides.length) {slideIndex = 1}
        slides[slideIndex-1].style.display = "block";
        setTimeout(showSlides, 200); // Change image every 10 seconds
    }

</script>
