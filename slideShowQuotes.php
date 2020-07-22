<!-- Slideshow container -->
<div class="slideshow-container">

  <!-- Full-width images with number and caption text -->
  <div class="mySlides fade">
    <img src="images/slide1.jpg" style="width:275px; height:275px;">
  </div>

  <div class="mySlides fade">
    <img src="images/slide2.jpg" style="width:275px; height:275px;">
  </div>

  <div class="mySlides fade">
    <img src="images/slide3.jpg" style="width:275px; height:275px;">
  </div>
  
  <div class="mySlides fade">
    <img src="images/slide4.jpg" style="width:275px; height:275px;">
  </div>
  
  <div class="mySlides fade">
    <img src="images/slide5.jpg" style="width:275px; height:275px;">
  </div>
  
  <div class="mySlides fade">
    <img src="images/slide6.jpg" style="width:275px; height:275px;">
  </div>
</div>
<br>



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
	  setTimeout(showSlides, 20000); // Change image every 10 seconds
	}

</script>