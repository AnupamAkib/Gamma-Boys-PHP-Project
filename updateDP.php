<?php
include "codes/header.php";
if($_SESSION['logged']==false){
	echo "<script type='text/javascript'>
    window.location.href = 'login.php';
</script>";
}

include "detrive_data.php";



//upload code start
if(isset($_POST['submit'])){

$target_dir = "images/students/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
//echo $target_file;
//echo "<br>";

// Check if file already exists
if (file_exists($target_file)) {
    echo "<div align='center' style='color:red; font-weight:bold; padding:10px; margin:5px;'>Picture already exist. Rename file or try another.</div>";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 2500000) {
    echo "<div align='center' style='color:red; font-weight:bold; padding:10px; margin:5px;'>Sorry, your file is too large. Max size 1MB</div>";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
    echo "<div align='center' style='color:red; font-weight:bold; padding:10px; margin:5px;'>File is not an image</div>";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {	
        echo "<div align='center' style='color:green; font-weight:bold; padding:10px; margin:5px;'>Your profile picture is updated</div>";	
        //$pos = $_SESSION['index'];
        
        for($i=2; $i<$cnt; $i=$i+14){
        	$c_id=$all[$i]+0;
            if($c_id==$_SESSION['gammaID']){
            	$newPP=basename($_FILES["fileToUpload"]["name"]);
            	$_SESSION['pp'] = $newPP;
            	$newPP[strlen($newPP)]="\n";
            	$all[$i+10]=$newPP;
            
                $fp=fopen("data.txt", "w");
                for($i=0; $i<$cnt; $i++){
                	fwrite($fp, $all[$i]);
                }
                fclose($fp);
                echo "<script type='text/javascript'>
    window.location.href = 'updateDP.php';
</script>";
            }
        }
        
        
    } else {	
        echo "<div align='center' style='color:red; font-weight:bold; padding:10px; margin:5px;'>Image is not uploaded. Try again</div>";
    }
}
}
//upload code end


echo "<h2 align='center'>Change Profile Picture</h2><center>
<img src='images/students/".$_SESSION['pp']."' width='160px'/><br><font size='5'>".$_SESSION['display_name']."</font>
</center>";
?>
<style>
.btn{
	width:97%;
	padding:14px;
	font-size:large;
	border:0px;
	background:#2B4CC1;
	outline:none;
	color:white;
	font-weight:bold;
	margin-top:5px;
	border-radius:5px;
	font-family: 'Noto Sans', sans-serif;
}
.bod{
	background:#dedede;
	margin:15px;
	box-shadow:0 0 10px rgba(0,0,0,0.5);
	border-radius:10px;
	padding:20px;
}
.txt{
	width:97%;
	padding:14px;
	font-size:large;
	border:0px;
	outline:none;
	margin-bottom:1px;
	font-family: 'Noto Sans', sans-serif;
	background:#fff;
}
</style>

	<title>Gamma Boys - Upload image</title>
<center>
	<div style='color:red; padding:10px; margin:5px;'>Please try to upload a <b>square image</b> or almost square image (Highly Recommended)<br>
   Photo size should not be greater than <b>1MB</b>
</div>
<div class='bod'>
<form method='POST' enctype="multipart/form-data">
    <h2>Select an image</h2>
	<input class='txt' type='file' name='fileToUpload' id='fileToUpload' required/><br>
	<input class='btn' type='submit' name='submit' value='Change Profile Picture'/>
</form>
</div>
</center>
<br>
	
	
<br>
<?php
include "codes/footer.php";
?>
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
