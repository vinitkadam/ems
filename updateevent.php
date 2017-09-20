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
</style>

<body>

<!-- side nav starts-->
<nav class="w3-sidebar w3-bar-block w3-collapse card animateLeft" style="width:250px;z-index:6;" id="mySidebar">
  <a class="w3-bar-item w3-button w3-border-bottom w3-large" href="#"><img src="images/entirelogo.png" style="width:100%;"></a>
  <a class="w3-bar-item w3-button w3-hide-large w3-large" href="javascript:void(0)" onclick="w3_close()">Close <i class="fa fa-remove"></i></a>
  <a class="w3-bar-item w3-button " href="admin.php">Home</a>
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
<div class="w3-theme w3-container top ">
  <div class=" w3-padding">
    <p><i class="fa fa-bars w3-button w3-theme hide-large w3-xlarge" onclick="w3_open()"></i>
    <span class="w3-xlarge" >College Buddy: Add New Events</span>
    </p>
  </div>
</div>
<!-- top header ends-->
<!--get the event details-->
<?php
	$id = mysqli_real_escape_string($con,$_GET["id"]);
	$query = "SELECT * FROM events WHERE e_id=$id";
	if($result = mysqli_query($con,$query))
	{
		$row = mysqli_fetch_array($result);
		$name = $row["name"];
		$s_date = $row["s_date"];
		$e_date = $row["e_date"];
		$s_time = $row["s_time"];
		$e_time = $row["e_time"];
		$place = $row["place"];
		$short_desc = $row["short_desc"];
		$long_desc = $row["long_desc"];
		$c_no1 = $row["c_no1"];
		$c_no2 = $row["c_no2"];
	}
?>
<!--action section starts-->
<div class="w3-container" >

	<form action="updateeventdb.php?id=<?php echo $id; ?>" method="post" class="w3-input" enctype="multipart/form-data" >
        <div style="padding:10px; align-content:center" class="border">
            Event Name :<span style='color: red;'> *</span> <br>
            <input id="evtname" name="evtname" class="w3-input" type="text" style="margin-bottom:10px;width:100%" required value="<?php echo $name; ?>" /><br><br>
            Event Start Date:<span style='color: red;'> *</span> <br>
            <input id="evtdate" name="s_date" class="w3-input" type="date" style="margin-bottom:10px;width:100%" required value="<?php echo $s_date; ?>" /><br><br>
			      Event End Date:<span style='color: red;'> *</span> <br>
            <input id="evtdate" name="e_date" class="w3-input" type="date" style="margin-bottom:10px;width:100%" required value="<?php echo $e_date ?>" /><br><br>
            Event Start Time: <span style='color: red;'> *</span><br>
            <input id="evttime" name="s_time" class="w3-input" type="time" style="margin-bottom:10px;width:100%" required value="<?php echo $s_time ?>" /><br><br>
			      Event End Time: <span style='color: red;'> *</span><br>
            <input id="evttime" name="e_time" class="w3-input" type="time" style="margin-bottom:10px;width:100%" required value="<?php echo $e_time ?>" /><br><br>
            Place:<span style='color: red;'> *</span><br>
            <textarea id="place" name="place" rows="2" cols="50" style="margin-bottom:10px;width:100%" maxlength="2000" required ><?php echo $place ?></textarea><br><br>
            Short Description:<span style='color: red;'> *</span>(max 1000 characters. Displayed in the list of events)<br>
            <textarea id="Sdesc" name="Sdesc" rows="2" cols="50" style="margin-bottom:10px;width:100%" maxlength="1000" reuired ><?php echo $short_desc ?></textarea><br><br>
            Detailed Descrition:<span style='color: red;'> *</span><br>
            <textarea id="Ddesc" name="Ddesc" rows="10" cols="50" style="margin-bottom:10px;width:100%" minlength = "100" required ><?php echo $long_desc ?></textarea><br><br>
            Contact number 1:<span style='color: red;'> *</span><br>
            <input id="c_no1" name="c_no1" class="w3-input" type="text" style="margin-bottom:10px;width:100%" required value="<?php echo $c_no1 ?>" /><br><br>
            Contact number 2:(optional) <br>
            <input id="c_no2" name="c_no2" class="w3-input" type="text" style="margin-bottom:10px;width:100%" value="<?php echo $c_no2 ?>" /><br><br>
			<input id="submit" type="submit" value="Submit" class="w3-btn w3-teal w3-round-xlarge "/>
        </div>
    </form>

</div>
<!--action section ends-->

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
