<?php 
include "codes/header.php";
?>
<?php
if(isset($_SESSION['logged']) && $_SESSION['logged']==true){
	echo "<script type='text/javascript'>
    window.location.href = 'profile.php';
</script>";
}
function profile(){
	echo "<script type='text/javascript'>
    window.location.href = 'profile.php';
</script>";
}

?>
<meta name="viewport" content="width=device-width, user-scalable=no" />


<title>Gamma Boys - Login</title>

<style>
.txt{
	width:97%;
	padding:14px;
	font-size:large;
	border:0px;
	outline:none;
	margin-bottom:1px;
	font-family: 'Noto Sans', sans-serif;
}
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
</style>

<?php

include "detrive_data.php";


$flag=0;
if(isset($_POST['submit'])){
	$userID=$_POST['user'];
	$userID=$userID+0;
	$pass=$_POST['password'];
	$pass[strlen($pass)]="\0";
	
	//echo $_SESSION['user']."         ".$pass."<br>";
	
    for($i=0; $i<$stu; $i=$i+1){
    	$current_id=(int)$info[$i]->id;
        $current_pass=$info[$i]->password;
        $current_pass[strlen($current_pass)-1]="\0";
    	//echo $current_pass."      ".$pass."<br>";
        //echo strlen($current_pass)."      ".strlen($pass)."<br>";
        //echo strcmp($pass, $current_pass)."<br><br>";
      
	    if($current_id == $userID && strcmp($pass, $current_pass)==0){
		    $_SESSION['logged']=true;
		    $_SESSION['gammaID']=$userID;
		    $_SESSION['index']=$i;
		    $_SESSION['pp'] = $info[$i] -> pic;
		    $_SESSION['password']=$pass;
		    if($userID==160724){
			    $_SESSION['akib']=true;
			}
			else{
				$_SESSION['akib']=false;
			}
            profile();
            echo "<center><font color='green'><b>Welcome ".$info[$i]->name.". You are logged in</b></font></center>";
            $flag=1;
            break;
		}
    }
    if($flag==0){
    	echo "<center><div style='border:0px solid red; margin:7px; padding:5px; color:red;'><b>Sorry, wrong GammaID or Password.<br>Please Try Again!</b></div></center>";
    }
}
?>
	


<form method="POST" autocomplete="off">
	<div class="bod" align="center">
		<img src="images/user.png" alt="User Profile" width="90" style="border-radius:50%"/><hr/>
		<font size="5" align="center">USER LOGIN</font><br>Login with your college ID number and password.<br><br>
	<input class="txt" style="border-radius:8px 8px 0px 0px;" name="user" placeholder="Gamma ID" type="number" required/><br>
	<input class="txt" style="border-radius:0px 0px 8px 8px;" name="password" type="password" placeholder="Password" required/><br>
	<input class="btn" name="submit" type="submit" value="LOGIN"/><br><br>
    <a href="signup.php">Create Account</a>  |  <a href="recovery.php">Forgot password?</a>
    </div>
</form>
<br>
<?php
include "codes/footer.php";
?>
	
	
	
	
	
	
	
	






