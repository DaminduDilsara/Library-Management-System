<div class="slideshow-container" data-cycle="5000">
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
    <div class="mySlides fade">
        <img src="../images/MainSlide7.jpg" style="width:100%; height:100%;">
    </div>
</div>

<script>
    /* Find all slideshow containers */
    var slideshowContainers = document.getElementsByClassName("slideshow-container");
    /* For each container get starting variables */
    for(let s = 0; s < slideshowContainers.length; s++) {
        /* Read the new data attribute */
        var cycle = slideshowContainers[s].dataset.cycle;
        /* Find all the child nodes with class mySlides */
        var slides = slideshowContainers[s].querySelectorAll('.mySlides');
        var slideIndex = 0;
        /* Now we can cycle slides, but this recursive function must have parameters */
        /* slides and cycle never change, those are unique for each slide container */
        /* slideIndex will increase during each iteration */
        showSlides(slides, slideIndex, cycle);
    };

    /* Function is alsmost same, but now it uses 3 new parameters */
    function showSlides(slides, slideIndex, cycle) {
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        };
        slideIndex++;
        if (slideIndex > slides.length) {
            slideIndex = 1
        };
        slides[slideIndex - 1].style.display = "block";
        /* Calling same function, but with new parameters and cycle time */
        setTimeout(function() {
            showSlides(slides, slideIndex, cycle)
        }, cycle);
    };
</script>



