<?php
include "codes/header.php";
if(isset($_SESSION['akib'])==false || $_SESSION['akib']==false){
	echo "<script type='text/javascript'>
    window.location.href = 'login.php';
</script>";
}

include "detrive_data.php";
?>
<?php
if(isset($_POST['del_pressed'])){
	$key=$_POST['del_id'];
	$key[strlen($key)]="\0";
	
	$q=0;
	for($i=0; $i<$cnt; $i++){
		$idNow=(int)$all[$i+2];
		//$idNow[strlen($idNow)-1]="\0";
		
		
		if($idNow==$key && $key!=160724){
			$i=$i+13;
			//echo "<b>matched</b>";
		}
		else{
			//echo "appended\n";
			$arr[$q]=$all[$i];
			$q++;
		}
	}
	$ff=fopen("data.txt", "w");
	for($i=0; $i<$q; $i++){
		fwrite($ff, $arr[$i]);
	}
	fclose($ff);
	echo "<script type='text/javascript'>
    window.location.href = 'editdata.php';
</script>";
}

?>

<div align='center' style='padding-top:10px;'>
	<form method='POST'>
		<input style='border:0px; font-size:large; padding:7px' type='number' name='del_id' class='del_id' placeholder='Enter Delete ID' required/>
		<input style='background:#2B4CC1; padding:7px; font-size:large; color:white; font-weight:bold; border:0px' type='submit' value='DELETE' name='del_pressed'/>
	</form>
</div>

<?php
for($i=0; $i<$cnt; $i++){
	echo "<font color='darkred'><b>Line ".$i;
	echo ": </b></font> ";
	if(strlen($all[$i])==1){
		echo "<font color='green'>--------------------------------------------</font><br>";
	}
	else{
	    echo $all[$i]."<br>";
	}
}

if(isset($_POST['submit'])){
	$newln=$_POST['line'];
	$newdata=$_POST['newtxt'];
	$newdata[strlen($newdata)]="\n";
	$all[$newln]=$newdata;
	$fp=fopen("data.txt", "w");
            for($i=0; $i<$cnt; $i++){
            	fwrite($fp, $all[$i]);
            }
     fclose($fp);
     echo "<script type='text/javascript'>
    window.location.href = 'editdata.php';
</script>";
}
?>
	
	
<style>
.rem{
	width:100%;
	position:fixed;
	bottom:0px; left:0px;
	padding:10px 0px 0px 0px;
	background:#dedede;
	box-shadow:0 0 10px rgba(0,0,0,0.5);
}
.txtbar{
	border:0px;
	padding:10px;
	width:47%;
	font-family: 'Noto Sans', sans-serif;
	font-size:large;
}
.btn{
	width:96%;
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
</style>
	
	
<div class='rem' align='center'>
	<form method='POST'>
		<b>Enter targeted line & text to replace:<br><b>
		<input type='number' class='txtbar' name='line' placeholder='Targeted Line' required />
		<input type='text' class='txtbar' name='newtxt' placeholder='Text to Replace' required />
		<br><input class='btn' type='submit' name='submit' value='REPLACE'/>
	</form>
</div>
	
<?php
include "codes/footer.php";
?>
	
	
	
	
	
