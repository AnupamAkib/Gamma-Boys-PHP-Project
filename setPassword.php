<?php
include "codes/header.php";
if(isset($_SESSION['ok'])==false || $_SESSION['ok']==false){
	echo "<script type='text/javascript'>
    window.location.href = 'signup.php';
</script>";
}

?>
<title>Gamma Boys - Set Password</title>
<style>
.txt{
	width:100%;
	background:#fff;
	padding:14px;
	font-size:large;
	border:0px;
	outline:none;
	margin-bottom:7px;
	font-family: 'Noto Sans', sans-serif;
}
.btn{
	width:100%;
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
</style>

<div style='margin:12px'>
<h1 align='center'>Set Password</h1>
<center><b>
<?php
echo $_SESSION['name'];
?>
</b>, you are all set for signing up. Please make a password to complete the registration process. Remember, you will need this password to login to your Gamma account.</center>
</div>

<?php
if(isset($_POST['submit'])){
	$pw1=$_POST['pass1'];
	$pw2=$_POST['pass2'];
	if(strcmp($pw1, $pw2)==0){
		settype($pw1, "string");
		$pw1[strlen($pw1)]="\n";
		$gID=$_SESSION['gID'];
		settype($gID, "string");
		$gID[strlen($gID)]="\n";
        $nam=$_SESSION['name'];
        $nam[strlen($nam)]="\n";
        $nick=$_SESSION['nickname'];
        $nick[strlen($nick)]="\n";
        $bday=$_SESSION['birthday'];
        $bday[strlen($bday)]="\n";
        $blood=$_SESSION['blood'];
        $blood[strlen($blood)]="\n";
        $phn=$_SESSION['phone'];
        $phn[strlen($phn)]="\n";
        $home=$_SESSION['hometown'];
        $home[strlen($home)]="\n";
        $subject=$_SESSION['subject'];
        $subject[strlen($subject)]="\n";
        $university=$_SESSION['varsity'];
        $university[strlen($university)]="\n";
        $fb=$_SESSION['fb'];
        $fb[strlen($fb)]="\n";
        $email=$_SESSION['email'];
        $email[strlen($email)]="\n";
        
		
		
		$db=fopen("data.txt", "a");
		fwrite($db, $nam);
		fwrite($db, $nick);
		fwrite($db, $gID);
		fwrite($db, $phn);
		fwrite($db, $bday);
		fwrite($db, $home);
		fwrite($db, $subject);
		fwrite($db, $university);
		fwrite($db, $blood);
		fwrite($db, $pw1);
		fwrite($db, $fb);
		fwrite($db, $email);
		fwrite($db, "user.png");
		fwrite($db, "\n\n");
		
		fclose($db);
		echo "<script type='text/javascript'>
    window.location.href = 'success.php';
</script>";
	}
	else{
        echo "<div style='border:2px solid red; margin:12px; padding:5px; color:red;'><center>Sorry, Password didn't match. Try again!</center></div>";
	}
}
?>

<div class='bod'>
	<form method='POST'>
	Enter Password:<br>
	<input type='password' class='txt' placeholder='Enter Password' name='pass1' required/><br>
	Re-enter Password:<br>
	<input type='password' class='txt' placeholder='Re-enter Password' name='pass2' required/><br>
	
	<input type='submit' name='submit' value='SIGN UP' class='btn'/>
	</form>
</div>


<br>
<?php
include "codes/footer.php";
?>








