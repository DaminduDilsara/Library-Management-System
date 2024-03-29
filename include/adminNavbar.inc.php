<!doctype html>

<html lang="en">
<!-- Add icon library -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<div class="navbar">
      <a class="active" href="../view/admin.view.php">Home</a>
      <a href="../view/adminSearch.view.php">Search</a>
      <div class="dropdown">
      <button class="dropbtn"> 
        Notifications
      </button>
      <div class="dropdown-content">
      <a href="../view/creationApprove.view.php" class="notification">
        <span>Creation</span>
        <span class="badge"><i class="" id="noti_number"></i></span></a>

      <script type="text/javascript">
        function loadDoc() {

          setInterval(function(){
          var xhttp = new XMLHttpRequest();
          xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById("noti_number").innerHTML = this.responseText;
        }
      };
      xhttp.open("GET", "../controller/creationController.controller.php", true);
      xhttp.send();


      },1000);
  
    }
    loadDoc();
    </script>

      <a href="../view/donationApprove.view.php" class="notification">
        <span>Donation</span>
        <span class="badge"><i class="" id="donnoti_number"></i></span></a>

      <script type="text/javascript">
        function loadDoc() {

          setInterval(function(){
          var xhttp = new XMLHttpRequest();
          xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById("donnoti_number").innerHTML = this.responseText;
        }
      };
      xhttp.open("GET", "../controller/donationController.controller.php", true);
      xhttp.send();


      },1000);
  
    }
    loadDoc();
    </script>
      </div>
      </div> 
      <!--<a href="#"><i class="fa fa-envelope" id="noti_number"></i></a> -->
      <a href="../mainPageView/ContactUsSecondPage.php">Contact Us</a>
      <a href="../view/info.view.php">Information</a>
      <a href="logout.view.php">Logout</a>
</div>
<style>
  

 .navbar {
    overflow: hidden;
    background-color: #8B0000;
    font-family: Arial;
    margin: 3px;
}

/* Links inside the navbar */
.navbar a {

    float: left;
    font-size: 20px;
    color: white;
    text-align: center;
    padding: 20px 60px;
    text-decoration: none;
}

/* The dropdown container */
.dropdown {
    float: left;
    overflow: hidden;
}

/* Dropdown button */
.dropdown .dropbtn {
    font-size: 20px;
    border: none;
    outline: none;
    color: white;
    padding: 20px 60px;
    background-color: inherit;
    font-family: inherit; /* Important for vertical align on mobile phones */
    margin: 0; /* Important for vertical align on mobile phones */
}

/* Add a red background color to navbar links on hover */
.navbar a:hover, .dropdown:hover .dropbtn {
    background-color: red;
}

/* Dropdown content (hidden by default) */
.dropdown-content {
    display: none;
    position: absolute;
    background-color: #F9BDB4;
    min-width: 253px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
    text-align: center;

}

/* Links inside the dropdown */
.dropdown-content a {
    float: none;
    color: #8B0000;
    padding: 12px 50px;
    text-decoration: none;
    display: block;
    text-align: left;
}

/* Add a grey background color to dropdown links on hover */
.dropdown-content a:hover {
    background-color: #8B0000;
    color: #ffffff;
}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {
    display: block;
}

.notification {
  
  color: white;
  text-decoration: none;
  padding: 15px 26px;
  position: relative;
  display: inline-block;
  border-radius: 2px;
}

.notification:hover {
  background: red;
}

.notification .badge {
  position: absolute;
  top: -10px;
  right: -10px;
  padding: 5px 10px;
  border-radius: 50%;
  background: red;
  color: white;
}

</style>
</html>