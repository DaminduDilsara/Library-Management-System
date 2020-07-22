<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<style>
  * {
  box-sizing: border-box;
}

img {
  vertical-align: middle;
  height: 145px;
}

/* Position the image container (needed to position the left and right arrows) */
.container1 {
  position: relative;

}

/* Hide the images by default */
.mySlides {
  
  display: none;
  width: 1100px;

}

/* Add a pointer when hovering over the thumbnail images */
.cursor1 {
  cursor: pointer;
}

/* Next & previous buttons */
.prev,
.next {
  cursor: pointer;
  position: absolute;
  top: 40%;
  width: auto;
  padding: 16px;
  margin-top: -50px;
  color: white;
  font-weight: bold;
  font-size: 20px;
  border-radius: 0 3px 3px 0;
  user-select: none;
  -webkit-user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover,
.next:hover {
  background-color: rgba(0, 0, 0, 0.8);
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* Container for image text */
.caption-container1 {
  text-align: center;
  background:linear-gradient(to left, #8B0000 0%, #F9BDB4 100%);
  
  color: black;
  height: 40px;
  font-family: 'Shadows Into Light', cursive;
  font-size: 20px;
}

.row1:after {
  content: "";
  display: table;
  clear: both;

}

/* Six columns side by side */
.column1 {
  float: left;
  width: 16.66%;
  height: 50px
}

/* Add a transparency effect for thumnbail images */
.demo {
  opacity: 0.6;
}

.active,
.demo:hover {
  opacity: 1;
}
</style>
<body>

<section class="header-section">
    <div class="header-2">
      Justin Wijewardhana Public Library <br> Godagama - Matara
    </div>
    <div class="header-4">
      <div class="medium-text">Library</div>
      <div class="small-text">Management System</div>
    </div>
    <div class="header-1">
      <img src="images/emblem.png" style="float:left;width:100px;height:90px;"/>
    </div>
    <div class="header-3">
      <img src="images/management.png" style="float:left;width:130px;height:90px;"/>
    </div>
</section>

  <section class="footer-section">
    <div class="col-md-12">
    <img src="images/book.gif" style="float:left;width:100px;height:70px;"/>
    
    <div class="quote-text">
    “Think before you speak. Read before you think.”<br>-------- Fran Lebowitz --------
    </div>
    </div>
    <div class="left-allign">
       &copy; Library Management System for Justin Wijewardhana Public Library - Godagama |<a href="team.php" target="_blank"> Designed by : Team Errors @ Mora CSE</a> 
    </div>
  </section>
  
 
  <div class="navbar">
    <a class="active" href="#"><i class="fa fa-fw fa-home"></i> Home</a>
    <a href="#"><i class="fa fa-fw fa-envelope"></i> Contact Us</a>
    <a href="#"> Advanced search</a> 
  </div>  
</body>
</html>


 <div class="row" >
  <div class="leftcolumn">
    
      
      <div class="fakeimg" style="height:400px;">
        <div class="container1">
  <div class="mySlides">
    <div class="numbertext">1 / 6</div>
    <img src="images/capture22.png" style="width:30%">
  </div>

  <div class="mySlides">
    <div class="numbertext">2 / 6</div>
    <img src="images/capture23.png" >
  </div>

  <div class="mySlides">
    <div class="numbertext">3 / 6</div>
    <img src="images/capture24.png" >
  </div>
    
  <div class="mySlides">
    <div class="numbertext">4 / 6</div>
    <img src="images/capture25.png" >
  </div>

  <div class="mySlides">
    <div class="numbertext">5 / 6</div>
    <img src="images/capture.png">
  </div>
    
  <div class="mySlides">
    <div class="numbertext">6 / 6</div>
    <img src="images/capture3.png" >
  </div>
    
  <a class="prev" onclick="plusSlides(-1)">❮</a>
  <a class="next" onclick="plusSlides(1)">❯</a>

  <div class="caption-container1">
    <p id="caption"></p>
  </div>

  <div class="row1">
    <div class="column1">
      <img class="demo cursor" src="images/capture22.png" style="width:100%" onclick="currentSlide(1)" alt="Created by: Sasini Himaya">
    </div>
    <div class="column1">
      <img class="demo cursor" src="images/capture23.png" style="width:100%" onclick="currentSlide(2)" alt="Cinque Terre">
    </div>
    <div class="column1">
      <img class="demo cursor" src="images/capture24.png" style="width:100%" onclick="currentSlide(3)" alt="Mountains and fjords">
    </div>
    <div class="column1">
      <img class="demo cursor" src="images/capture25.png" style="width:100%" onclick="currentSlide(4)" alt="Northern Lights">
    </div>
    <div class="column1">
      <img class="demo cursor" src="images/capture.png" style="width:100%" onclick="currentSlide(5)" alt="Nature and sunrise">
    </div>    
    <div class="column1">
      <img class="demo cursor" src="images/capture3.png" style="width:100%" onclick="currentSlide(6)" alt="Snowy Mountains">
    </div>
  </div>
</div>

<script>
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  var captionText = document.getElementById("caption");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  captionText.innerHTML = dots[slideIndex-1].alt;
}
</script>
      </div>
  </div>
</div>
</div>

<div class="rightcolumn" style="float: left; margin-top: -420px;">
    <div class="card" style="height:400px;" >
      
      <div class="fakeimg" style="height:360px;  ">
          
  
    
    <div class="medium-text" style="font-size: 25px;">Drop file to upload</div>
    <div class="dropzone">
      
        <img src="images/capture29.png" width="200px" >
        <span class="filename"></span>
        <input type="file" class="input">
      
    </div>
    
    <div class="upload-btn">Upload file</div>
  

      </div>
  </div>
</div>