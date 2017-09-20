<?php
  session_start();
  include 'config.php';
?>
<!DOCTYPE html>
<html>
<title>College Buddy</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="assets/w3.css">
<link rel="stylesheet" href="assets/theme.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {font-family: "Roboto", sans-serif}
.w3-bar-block .w3-bar-item{padding:16px;font-weight:bold}
.max-width{max-width: 700px}
.top {
  position: sticky;
  top: 0;
  z-index: 1;
  width: 100%;
  animation:animatetop 0.4s
}@keyframes animatetop{from{top:-300px;opacity:0} to{top:0;opacity:1}}

@media (min-width:993px){
  .hide-large{display:none!important}
}
.card {
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    transition: 0.3s;
}
.card:hover {
    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
	max-width: 720px;
}
.center{ margin: 0 auto; }
.curPage{font-size: 20pt;}
.animateTop{animation:animatetop 0.4s}@keyframes animatetop{from{top:-300px;opacity:0} to{top:0;opacity:1}}
.animateLeft{ animation:animateleft 0.4s}@keyframes animateleft{from{left: -300px; opacity: 0} to {left: 0px; opacity: 1;}}

table { font-family: arial, sans-serif;border-collapse: collapse;width: 100%;}

td, th { text-align: left;padding: 8px; }

tr:nth-child(even) { background-color: #ededed; }
</style>

<body>

<!-- side nav starts-->
<nav class="w3-sidebar w3-bar-block w3-collapse card animateLeft " style="width:250px;z-index:6;" id="mySidebar">
  <a class="w3-bar-item w3-button w3-border-bottom w3-large" href="#"><img src="images/entirelogo.png" style="width:100%;"></a>
  <a class="w3-bar-item w3-button w3-hide-large w3-large" href="javascript:void(0)" onclick="w3_close()">Close <i class="fa fa-remove"></i></a>
  <a class="w3-bar-item w3-button" href="admin.php">Home</a>
  <a class="w3-bar-item w3-button" href="addnewevent.php">Add New Events</a>
  <a class="w3-bar-item w3-button w3-theme" href="displayevents.php">Update Event</a>
</nav>
<!-- side nav ends-->

<!--overlay div after opening the side nav starts-->
<div class="w3-overlay hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" id="myOverlay"></div>
<!--overlay div after opening the side nav ends-->


<!--main website container starts-->
<div class="w3-main" style="margin-left:250px;">


<!-- top header starts-->
<div class="w3-theme w3-container top w3-row">
  <div class=" w3-padding w3-twothird">
    <p><i class="fa fa-bars w3-button w3-theme hide-large w3-xlarge" onclick="w3_open()"></i>
    <span class="w3-xlarge" >College Buddy: Update Events</span>
    </p>
  </div>
  <div class="w3-third  w3-margin-top w3-padding" style="text-align: right;">

    <button id="logout" class=" w3-medium w3-btn w3-round-large w3-light-grey " >Logout</button>
  </div>
</div>
<!-- top header ends-->


<!--action section starts-->
  <table>
    <tr><th>ID</th><th>NAME</th><th>PUBLISHED DATE</th></tr>
<?php
  $query = "SELECT e_id,name,published_date FROM events ORDER BY published_date DESC";

  if($result = mysqli_query($con,$query))
  {
    while($row=mysqli_fetch_array($result))
    {
      $id=$row["e_id"];
      echo"
        <tr>

          <td><a style='text-decoration:none;'   href='updateevent.php?id=$id'>".$row['e_id']."</a></td>
          <td><a href='updateevent.php?id=$id'>".$row['name']."</a></td>
          <td>".$row['published_date']."</td>
        </tr>

      ";
    }
  }else{
    echo "no events to displat some error occured";
  }
?>
</table>
<!--action section ends-->


<div>


</div>
<!--main website container ends-->


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
</script>







</body>
</html>
