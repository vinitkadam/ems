<?php
include 'config.php';

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


$extension = end(explode(".", $_FILES["evtimg"]["name"]));
if ((($_FILES["evtimg"]["type"] == "image/gif") || ($_FILES["evtimg"]["type"] == "image/jpeg") || ($_FILES["evtimg"]["type"] == "image/jpg") || ($_FILES["evtimg"]["type"] == "image/png")))
{
	if ($_FILES["evtimg"]["error"] > 0)
	{
		echo "Return Code: " . $_FILES["evtimg"]["error"] . "<br>";
		echo "click <a href='addnewevent.php'>here</a> to go back ";
	}
	else
	{

		date_default_timezone_set('asia/kolkata');
		$query = "INSERT INTO events(name,short_desc,long_desc,place,s_date,e_date,s_time,e_time,published_date,c_no1,c_no2)
		VALUES ('$evtname','$Sdesc','$Ddesc','$place','$s_date','$e_date','$s_time','$e_time',CURDATE(),'$c_no1','$c_no2')";
		$result = mysqli_query($con,$query);
		if($result)
		{
			$id = mysqli_insert_id($con);
			$imgname = $id.".".$extension;
			$img_update="UPDATE events set img_name='$imgname' where e_id='$id'";
			mysqli_query($con,$img_update);
			move_uploaded_file($_FILES["evtimg"]["tmp_name"], "images/".$id.".".$extension);

			header( "refresh:2;url=addnewevent.php" );
			echo"<script>alert('event uploaded successfully')</script>";
		}
		else{
			echo $con->error;
		}
	}
}
else
{
	echo "Invalid file";
	echo $_FILES["evtimg"]["type"] ;
}
?>
