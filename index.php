<?php
include "codes/header.php";
include "desktop.php";
?>
<meta name="viewport" content="width=device-width, user-scalable=no" />


<title>Gamma Boys - Home</title>

<style>
.bio{
	background:#dedede;
	margin:7px 7px 17px 7px;
	box-shadow:0 0 10px rgba(0,0,0,0.5);
	border-radius:10px;
	padding-top:6px;
	padding-left:5px;
}
</style>
	

	
	
	

<?php
if(isset($_SESSION['logged'])){
    if($_SESSION['logged']==true){
	echo "<div style='box-shadow:0 0 3px rgba(0,0,0,0.5); color:green; padding: 10px 0px 10px 0px; margin:4px 9px 11px 9px; background:white;' align='center'>Welcome, ".ucwords($_SESSION['display_name'])."</div>";
    }
}
include "codes/notice.php";
include "slide.php";
include "detrive_data.php";

//echo "<h2 align='center'>Information</h2>";
for($j=0; $j<$stu; $j=$j+1){
echo "<div class='bio'>
<table border='0' width='100%'>
<td align='center' width='10'><img src='images/students/".$info[$j] -> pic."' width='108px' alt='".$info[$j] -> nickname."'/><br/>
<b>".ucwords($info[$j] -> nickname)."</b>
<br/>".$info[$j] -> id."<br>
<table><td><img src='images/blood.png' width='18px' alt='blood logo'/></td><td>
<font style='font-size:19px; color:#ff0000;'>".$info[$j] -> blood_group."</font></td></table>
</td>
<td style='padding-left:5px;'>
<font style='font-size:20px; font-weight:bold; color:darkblue;'>".ucwords($info[$j] -> name)."</font><br>
<b>Phone: </b>".$info[$j] -> phone."<br>
<b>Hometown: </b>".ucwords($info[$j] -> address)."<br>
<b>Birthday: </b>".$info[$j] -> birthday."
<br>
<a href='".$info[$j] -> fb."'><img src='images/fb.png' width='30'></a>
<a href='mailto:".$info[$j] -> email."'><img src='images/gmail.png' width='30'></a>

</td>
</table>
<div style='border-radius:0px 0px 10px 10px; padding:5px; background:#cacaca;'>
<b>Subject: </b>".ucwords($info[$j] -> department)."<br>
<b>University: </b>".ucwords($info[$j] -> varsity)."
</div></div>";

}
?>
<center>----------------------- Data End -----------------------</center><br>
	
<div class="utsorgo" align="center">
	<img style='margin-bottom:8px' src="images/college-pic/mainul.jpg" width="100%"/><br>
<b>MAINUL HOSSAIN PRANTO</b><br>
(3 November 1998 - 16 June 2017)<br>
<div style='padding:10px'>

This website is dedicated to Mainul Pranto. We lost him in 2017. We will miss him. May allah grant him Jannah (Ameen).</div>
</div>


<hr><hr><hr>
<?php
include "codes/footer.php";
?>
	
	
	
	
	
	






