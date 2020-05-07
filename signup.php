<?php
include "codes/header.php";
if(isset($_SESSION['logged']) && $_SESSION['logged']==true){
	echo "<script type='text/javascript'>
    window.location.href = 'profile.php';
</script>";
}
?>
	
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
.sel{
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
<title>Gamma Boys - SignUp</title>
<h1 align='center'>Registration</h1>

<?php
include "detrive_data.php";

$ok=0;
if(isset($_POST['submit'])){
	$dob=$_POST['day']." ".$_POST['month'].", ".$_POST['year'];
	$gID=$_POST['gID'];
	$gID=$gID+0;
    for($i=2; $i<$cnt; $i=$i+14){
        if($gID==$all[$i]){
            echo "<div style='border:2px solid red; margin:12px; padding:5px; color:red;'><center>Sorry The ID you have provided is already registered.<br><a href='login.php'>Please login to your account.</a></center></div>";
            $ok=1;
            break;
        }
    }
    if($ok==0){
    	//id is ok to register
        $_SESSION['gID']=$gID;
        $_SESSION['name']=$_POST['name'];
        $_SESSION['nickname']=$_POST['nickname'];
        $_SESSION['birthday']=$dob;
        $_SESSION['blood']=$_POST['blood'];
        $_SESSION['phone']=$_POST['phone'];
        $_SESSION['hometown']=$_POST['hometown'];
        $_SESSION['subject']=$_POST['subject'];
        $_SESSION['varsity']=$_POST['varsity'];
        $_SESSION['fb']=$_POST['fb'];
        $_SESSION['email']=$_POST['email'];
        
        $_SESSION['ok']=true;
        echo "<script type='text/javascript'>
    window.location.href = 'setPassword.php';
</script>";
    }
}
?>



<div class='bod'>
	<i><font color='blue'>*</font> says you can't change these information later. <b>So, be careful while providing these info.</b></i><br>
    <br>Please maintain the format which is given as example (Ex:)<br>
    <br>All information must be in English<br><br>
	<form method='POST'>
		Your Name:<br>
		<input type='text' name='name' placeholder='Ex: Mir Anupam Hossain Akib' class='txt' required/><br>
		Your Nickname:<br>
		<input type='text' name='nickname' placeholder='Ex: Anupam' class='txt' required/><br>
		Gamma ID: <font color='blue'>*</font><br>
		<input type='number' name='gID' placeholder='Ex: 160724' class='txt' required/><br>
		Birthday: <font color='blue'>*</font><br>
		
<select style='width:30%;' class='sel' name='day' required>
<option disabled selected value>Day</option>
<option value='01'>1</option>
<option value='02'>2</option>
<option value='03'>3</option>
<option value='04'>4</option>
<option value='05'>5</option>
<option value='06'>6</option>
<option value='07'>7</option>
<option value='08'>8</option>
<option value='09'>9</option>
<option value='10'>10</option>
<option value='11'>11</option>
<option value='12'>12</option>
<option value='13'>13</option>
<option value='14'>14</option>
<option value='15'>15</option>
<option value='16'>16</option>
<option value='17'>17</option>
<option value='18'>18</option>
<option value='19'>19</option>
<option value='20'>20</option>
<option value='21'>21</option>
<option value='22'>22</option>
<option value='23'>23</option>
<option value='24'>24</option>
<option value='25'>25</option>
<option value='26'>26</option>
<option value='27'>27</option>
<option value='28'>28</option>
<option value='29'>29</option>
<option value='30'>30</option>
<option value='31'>31</option>
</select>

<select style='width:37%;' class='sel' name='month' required>
<option disabled selected value>Month</option>
<option value='January'>January</option>
<option value='February'>February</option>
<option value='March'>March</option>
<option value='April'>April</option>
<option value='May'>May</option>
<option value='June'>June</option>
<option value='July'>July</option>
<option value='August'>August</option>
<option value='September'>September</option>
<option value='October'>October</option>
<option value='November'>November</option>
<option value='December'>December</option>
</select>

<select style='width:30%;' class='sel' name='year' required>
<option disabled selected value>Year</option>
<option value='1997'>1997</option>
<option value='1998'>1998</option>
<option value='1999'>1999</option>
<option value='2000'>2000</option>
<option value='2001'>2001</option>
<option value='2002'>2002</option>
</select>
<br>
		
		
		Blood Group: <font color='blue'>*</font><br>
		<select name='blood' class='txt' required>
		<option disabled selected value>Select Blood Group</option>
		<option value='IDK'>I Don't Know</option>
		<option value='A+'>A+</option>
		<option value='A-'>A-</option>
		<option value='B+'>B+</option>
		<option value='B-'>B-</option>
		<option value='O+'>O+</option>
		<option value='O-'>O-</option>
		<option value='AB+'>AB+</option>
		<option value='AB-'>AB-</option>
		
		</select><br>
		
        Phone Number: <i>(If more than 1 then use comma (,) to separate)</i><br>
		<input type='text' name='phone' placeholder='Ex: 01875945443' class='txt' required/><br>
		
        Hometown: <font color='blue'>*</font><br>
		<input type='text' name='hometown' placeholder='Ex: Tangail' class='txt' required/><br>
		Current Subject: <font color='blue'>*</font><br>
		<input type='text' name='subject' placeholder='Ex: Software Engineering' class='txt' required/><br>
		University: <font color='blue'>*</font><br>
		<input type='text' name='varsity' placeholder='Ex: Daffodil International University' class='txt' required/><br>
		Facebook Profile Link: (with <b>http://</b>)<br>
		<input type='text' name='fb' placeholder='Ex: http://facebook.com/anupam.akib' class='txt' /><br>
		Email Address:<br>
		<input type='text' name='email' placeholder='Ex: mirakib25@gmail.com' class='txt' /><br>
		
		<input type='submit' name='submit' class='btn' value='NEXT'/>
		<br>
	</form>
</div><br>
	
	<?php
include "codes/footer.php";
?>
	
	
	
	
	
	
	
	
	
