<?php
include 'config.php';
$e_id = mysqli_real_escape_string($con,$_GET['id']);
$evtname = mysqli_real_escape_string($con,$_POST['evtname']);
$s_date = mysqli_real_escape_string($con,$_POST['s_date']);
$e_date = mysqli_real_escape_string($con,$_POST['e_date']);
$s_time = mysqli_real_escape_string($con,$_POST['s_time']);
$e_time = mysqli_real_escape_string($con,$_POST['e_time']);
$Sdesc = mysqli_real_escape_string($con,$_POST['Sdesc']);
$Ddesc = mysqli_real_escape_string($con,$_POST['Ddesc']);
$place = mysqli_real_escape_string($con,$_POST['place']);
$c_no1 = mysqli_real_escape_string($con,$_POST['c_no1']);
$c_no2 = mysqli_real_escape_string($con,$_POST['c_no2']);




date_default_timezone_set('asia/kolkata');
$query = "UPDATE events set name='$evtname',short_desc='$Sdesc',long_desc='$Ddesc',s_date='$s_date',e_date='$e_date',s_time='$s_time',e_time='$e_time',c_no1='$c_no1',c_no2='$c_no2' where e_id='$e_id'";
$result = mysqli_query($con,$query);
if($result)
{
	header( "refresh:2;url=displayevents.php" );
	echo"<script>alert('event updated successfully')</script>";
}
else{
	echo $con->error;
}
?>
