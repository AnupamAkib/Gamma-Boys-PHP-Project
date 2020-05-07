<?php
include "codes/header.php";
?>
<?php
if(isset($_SESSION['logged'])==false || $_SESSION['logged']==false){
	echo "<script type='text/javascript'>
    window.location.href = 'login.php';
</script>";
}

?>
<title>Gamma Boys - Profile</title>
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
.cng{
	width:100%;
	padding:10px 5px 10px 8px;
	border:0px;
	font-size:large;
	font-family: 'Noto Sans', sans-serif;
	outline:none;
	margin-top:5px;
}
.uncng{
	width:100%;
	padding:10px;
	border:0px;
	font-size:large;
	font-family: 'Noto Sans', sans-serif;
	outline:none;
	margin-top:5px;
	background:#fff;

}
.bod{
	background:#f0f0f0;
	margin:7px;
	box-shadow:0 0 10px rgba(0,0,0,0.5);
	border-radius:10px;
	padding:6px;
}
.logout{
	font-size:large;
	border:2px solid red;
	border-radius:5px;
	background:gray;
	color:white;
	font-weight:bold;
	padding:5px;
	outline:none;
}
</style>

<?php
include "detrive_data.php";

$pos = $_SESSION['index'];
$gammaID = $_SESSION['gammaID'];
//$_SESSION['pp'] = $info[$pos] -> pic;
//$_SESSION['display_name'] = $info[$pos] -> name;


if(isset($_POST['saveBtn'])){
	$new_name=$_POST['c_name'];
	$new_name[strlen($new_name)]="\n";
	
	$new_nick=$_POST['c_nick'];
	$new_nick[strlen($new_nick)]="\n";
	
	$new_phone=$_POST['c_phone'];
	$new_phone[strlen($new_phone)]="\n";
	
	$new_password=$_POST['c_pass'];
	$new_password[strlen($new_password)]="\n";
	
	$new_fb=$_POST['c_fb'];
	$new_fb[strlen($new_fb)]="\n";
	
	$new_email=$_POST['c_email'];
	$new_email[strlen($new_email)]="\n";
	
	
	for($i=0; $i<$cnt; $i++){
		$Line=$all[$i];
		//echo $Line." ".$gammaID;
		//echo "<br>";
		
		if($Line==$gammaID){
			echo "<center><br><br><br><br><font style='font-size:25px; color:green;'>Profile updating</font></center>";
			$all[$i-1]=$new_nick;
			$all[$i-2]=$new_name;
			$all[$i+1]=$new_phone;
			$all[$i+8]=$new_fb;
			$all[$i+9]=$new_email;
			if(strlen($new_password)>2){
				$all[$i+7]=$new_password;
			}
			$fp=fopen("data.txt", "w");
		    for($i=0; $i<$cnt; $i++){
			    fwrite($fp, $all[$i]);
		    }
		    fclose($fp);
		    echo "<script type='text/javascript'>
    window.location.href = 'profile.php';
</script>";
			break;
		}
	}
}


if(isset($_POST['logout'])){
	unset($_SESSION['gammaID']);
	unset($_SESSION['password']);
	unset($_SESSION['index']);
	$_SESSION['logged']=false;
	$_SESSION['akib']=false;
	echo "<script type='text/javascript'>
    window.location.href = 'login.php';
</script>";
}


for($p=0; $p<$stu; $p++){
$check=(int)$info[$p]->id;

//$check=$check+0;
if($check==$gammaID){
$_SESSION['display_name'] = $info[$p] -> name;

echo "<center><div style='margin:10px; border:1px solid darkgreen; padding:7px;'><font color='green'>Logged in as 
<b>".$info[$p] -> name."</b></font></div>
<form method='POST'><button class='logout' name='logout' onclick='logout()'>LOGOUT</button>
</form>";
if($_SESSION['akib']==true){
	echo "<a href='editdata.php'>Edit Database</a>";
}

echo "</center>
<center>
<h1>Gamma Profile</h1>
<img style='border:5px solid #fff; box-shadow:0 0 10px rgba(0,0,0,0.34);' src='images/students/".$info[$p] -> pic."' width='120px' alt='USER'/><br>
<a href='updateDP.php'>Change Profile Picture</a><br><br>
<div class='bod'>
<form method='POST'>
<table>
<tr><td><b>Name: </b></td><td><input type='text' class='cng' name='c_name' value='".$info[$p] -> name."' placeholder='Your Name'></input></td></tr>
<tr><td><b>Nick Name: </b></td><td><input type='text' class='cng' name='c_nick' value='".$info[$p] -> nickname."' placeholder='Nickname'></input></td></tr>
<tr><td><b>Phone: </b></td><td><input type='text' class='cng' name='c_phone' value='".$info[$p] -> phone."' placeholder='Phone'></input></td></tr>
<tr><td><b>Change Pass: </b></td><td><input type='text' class='cng' name='c_pass' value='' placeholder='New Password'></input></td></tr>
<tr><td><b>Facebook: </b></td><td><input type='text' class='cng' name='c_fb' value='".$info[$p] -> fb."' placeholder='FB Link (with http://)'></input></td></tr>
<tr><td><b>Email: </b></td><td><input type='text' class='cng' name='c_email' value='".$info[$p] -> email."' placeholder='Email'></input></td></tr>
<tr><td><b>Birthday: </b></td><td><button class='uncng' disabled>".$info[$p] -> birthday."</button></td></tr>
<tr><td><b>Blood: </b></td><td><button class='uncng' disabled><font color='red'>".$info[$p] -> blood_group."</font></button></td></tr>
<tr><td><b>Gamma ID: </b></td><td><button class='uncng' disabled>".$info[$p] -> id."</button></td></tr>
<tr><td><b>Hometown: </b></td><td><button class='uncng' disabled>".$info[$p] -> address."</button></td></tr>
<tr><td><b>Subject: </b></td><td><button class='uncng' disabled>".$info[$p] -> department."</button></td></tr>
<tr><td><b>University: </b></td><td><button class='uncng' disabled>".$info[$p] -> varsity."</button></td></tr>

</table>
<input type='submit' name='saveBtn' class='btn' value='SAVE CHANGES'></input>
</center></form></div>";

break;
}
}
?>

<br>
<br>

<?php
include "codes/footer.php";
?>











