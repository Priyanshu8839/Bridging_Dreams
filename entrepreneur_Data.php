<?php
require 'Connection.php';
$Name=$_POST["Name"];
$Email=$_POST["Email"];
$Mobile=$_POST["Mobile"];
$Password=$_POST["Password"];
$ConfirmPassword=$_POST["ConfirmPassword"];
$about=$_POST["about"];

$file=$_FILES['file']['tmp_name'];
	list($width,$height)=getimagesize($file);
	$nwidth=250;
	$nheight=250;
	$newimage=imagecreatetruecolor($nwidth,$nheight);
	if($_FILES['file']['type']=='image/jpeg'){
		$source=imagecreatefromjpeg($file);
		imagecopyresized($newimage,$source,0,0,0,0,$nwidth,$nheight,$width,$height);
		$file_name=time().'.jpg';
		imagejpeg($newimage,'entrepreneur_Image/'.$file_name);
	}elseif($_FILES['file']['type']=='image/png'){
		$source=imagecreatefrompng($file);
		imagecopyresized($newimage,$source,0,0,0,0,$nwidth,$nheight,$width,$height);
		$file_name=time().'.png';
		imagepng($newimage,'entrepreneur_Image/'.$file_name);
	}else{
		echo "Please select only jpg, png and gif image";
	}


$duplicate = mysqli_query($con, "SELECT * FROM entrepreneur WHERE Email = '$Email' OR Mobile = '$Mobile'");
if(mysqli_num_rows($duplicate) > 0){
    echo "<script> alert('Email or Mobile Number Has Already Taken'); </script>";
}
else{
if($Password == $ConfirmPassword){
    $query = "INSERT INTO entrepreneur VALUES('','".$Name."','".$Email."',".$Mobile.",'".$Password."','".$about."','".$file_name."')";
mysqli_query($con,$query);
echo "<script>
            alert('Registration Successful');
            window.location.href='entrepreneur_login.php';
            </script>";
}
else{
    echo "<script> alert('Password Does Not Match'); </script>";
}
}
?>