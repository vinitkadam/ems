<?php
  session_start();
  include 'config.php';
  $results_per_page = 10;
?>
<!DOCTYPE html>
<html>
<title>College Buddy</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="assets/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-teal.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"><style>
body {font-family: "Roboto", sans-serif}
.w3-bar-block .w3-bar-item{padding:16px;font-weight:bold}
.max-width{max-width: 700px}
.top {
  position: sticky;
  top: 0;
  z-index: 1;
  width: 100%;
}
@media (min-width:993px){
  .hide-large{display:none!important}
}
.card {
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    transition: 0.3s;
}
.card:hover {
    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}
.center{ margin: 0 auto; }
.curPage{font-size: 20pt;}
</style>
<body>

<nav class="w3-sidebar w3-bar-block w3-collapse card" style="width:250px;z-index:6;" id="mySidebar">
  <a class="w3-bar-item w3-button w3-border-bottom w3-large" href="#"><img src="images/entirelogo.png" style="width:100%;"></a>
  <a class="w3-bar-item w3-button w3-hide-large w3-large" href="javascript:void(0)" onclick="w3_close()">Close <i class="fa fa-remove"></i></a>
  <a class="w3-bar-item w3-button w3-teal" href="#">Home</a>
  <a class="w3-bar-item w3-button" href="#">Upcoming Events</a>
  <a class="w3-bar-item w3-button" href="#">Events successfully conducted</a>

</nav>

<div class="w3-overlay hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" id="myOverlay"></div>

<div class="w3-main" style="margin-left:250px;">

<!-- top header starts-->
<div class="w3-theme w3-container top w3-row">
  <div class=" w3-padding w3-twothird">
    <p><i class="fa fa-bars w3-button w3-theme hide-large w3-xlarge" onclick="w3_open()"></i>
    <span class="w3-xlarge" >College Buddy: Homepage</span>
    </p>
  </div>
  <div class="w3-third  w3-margin-top w3-padding" style="text-align: right;">

    <button id="login" class=" w3-medium w3-btn w3-round-large w3-light-grey " onclick="document.getElementById('loginmodal').style.display='block'" >Login</button>
    <button id="register" class="w3-btn w3-round-large w3-light-grey w3-medium " onclick="document.getElementById('registermodal').style.display='block'" >Register</button>
  </div>
</div>
<!-- top header ends-->

<!-- events container starts-->
<div class="w3-container " style="padding:32px;background-color: #f7f7f7;">
<?php
  if (isset($_GET["page"])) { $page = mysqli_real_escape_string($con,$_GET["page"]); } else { $page=1; };
  $start_from = ($page-1) * $results_per_page;
  $sql = "SELECT * FROM events ORDER BY s_date ASC LIMIT $start_from, $results_per_page";
//  $result = $con->query($sql);
  
//  $query = "select * from events order by s_date";
  $result = mysqli_query($con,$sql);
  while($row=mysqli_fetch_assoc($result))
  {
    echo "
    <div class='card w3-section max-width center'>
      <img src='images/".$row["e_id"].".jpg' width='100%'>
      <div class='w3-padding'>
      <h3>".$row["name"]."</h3>
      <p style='text-align: justify'>
        ".$row["short_desc"]."
      </p>

      <a href='events.php?id=".$row["e_id"]."'class='w3-btn w3-round w3-theme-d3' >READ MORE >></a>
      </div>
    </div>
    <br>";
  }
?>
	<!-- template of each event starts
    <div class="card w3-section max-width center">
      <img src="images/event1.jpg" width="100%">
      <div class="w3-padding">
      <h3>Event 1 heading</h3>
      <p>
        this is event 1 short description containing less then 1000 characters
        this is event 1 short description containing less then 1000 characters
        this is event 1 short description containing less then 1000 characters
        this is event 1 short description containing less then 1000 characters
        this is event 1 short description containing less then 1000 characters
        this is event 1 short description containing less then 1000 characters
        this is event 1 short description containing less then 1000 characters
      </p>

      <button class="w3-btn w3-round w3-theme-d3">READ MORE >></button>
      </div>
    </div>
    <br>
	     template of each event ends-->


</div>
<div style="width: 100%">
	<div style="text-align:center;">
		<?php 
			$sql = "SELECT COUNT(e_id) AS total FROM events";
			$result = $con->query($sql);
			$row = $result->fetch_assoc();
			$total_pages = ceil($row["total"] / $results_per_page); // calculate total pages with results
			  
			for ($i=1; $i<=$total_pages; $i++) {  // print links for all pages
						echo "<a href='index.php?page=".$i."'";
						if ($i==$page)  echo " class='curPage'";
						echo ">".$i."</a>&nbsp; "; 
			} 
		?>
	</div>
<div>
<!-- events container ends-->
<footer class="w3-container w3-theme" style="padding:10px">
  <p class="w3-right">Copyright <i class="fa fa-copyright"></i>  2017 All rights reserved</p>
</footer>

</div>

<script>
// Open and close the sidebar on medium and small screens
function w3_open() {
    document.getElementById("mySidebar").style.display = "block";
    document.getElementById("myOverlay").style.display = "block";
}
function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
    document.getElementById("myOverlay").style.display = "none";
}

// Change style of top container on scroll
window.onscroll = function() {myFunction()};
function myFunction() {
    if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
        document.getElementById("myTop").classList.add("w3-card-4", "w3-animate-opacity");
        document.getElementById("myIntro").classList.add("w3-show-inline-block");
    } else {
        document.getElementById("myIntro").classList.remove("w3-show-inline-block");
        document.getElementById("myTop").classList.remove("w3-card-4", "w3-animate-opacity");
    }
}


</script>
<!--login modal start-->
<div id="loginmodal" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-round-large" style="max-width: 500px">
      <div class="w3-container ">
        <span onclick="document.getElementById('loginmodal').style.display='none'" class="w3-button w3-display-topright w3-round-large w3-text-red">&times;</span>

      <h2 class="w3-center">Login</h2>
      <form action="#" method="post">


        <label><b>User Name</b></label>
        <input class="w3-input" "type="text" placeholder="Enter User Name" name="roll_no" style="margin-bottom:10px;" required>
        <label><b>Password</b></label>
        <input class="w3-input" type="password" placeholder="Enter Password" name="password" style="margin-bottom:10px;" required>
        <button class="w3-btn w3-teal w3-round-xlarge " style="width:100%; margin-bottom:15px;" name="login" type="submit">Login</button>
      </form>

      </div>
    </div>
  </div>
<!--login modal end-->

<!--register modal start-->
<div id="registermodal" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-round-large" style="max-width: 500px">
      <div class="w3-container ">
        <span onclick="document.getElementById('registermodal').style.display='none'" class="w3-button w3-display-topright w3-round-large w3-text-red">&times;</span>

      <form action="#" method="post">
        <h2 class="w3-center">Register</h2>

        <label><b>User Name</b></label>
        <input class="w3-input" "type="text" placeholder="Enter User Name" name="roll_no" id="roll_no" style="margin-bottom:10px;" onchange="uppercase(this.value);"required>
        <label><b>Name</b></label>
        <input class="w3-input" type="text" placeholder="Enter your name" name="name" style="margin-bottom:10px;" required>
        <label><b>Password</b></label>
        <input class="w3-input" type="password" placeholder="Enter Password" name="password" style="margin-bottom:10px;" required>
        <label><b>Confirm password</b></label>
        <input class="w3-input" type="password" placeholder="Confirm Password" name="cpassword" style="margin-bottom:10px;" required>
        <label><b>Email-Id</b></label>
        <input class="w3-input" type="email" placeholder="Enter your email" name="email" style="margin-bottom:10px;" required>
        <label><b>College</b></label>
        <input class="w3-input" type="text" placeholder="Enter your College Name" name="colname" style="margin-bottom:10px;" required>
        <br>
        <br>
        <button class="w3-btn w3-teal w3-round-xlarge " style="width:100%; margin-bottom:15px;" name="register" type="submit">Register</button>
      </form>

      </div>
    </div>
  </div>
<!--register modal end-->
</body>
</html>