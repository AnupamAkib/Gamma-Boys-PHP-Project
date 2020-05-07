<?php
include "codes/header.php";
if(isset($_SESSION['ok'])==false || $_SESSION['ok']==false){
	echo "<script type='text/javascript'>
    window.location.href = 'signup.php';
</script>";
}

?>
<title>Gamma Boys - Account Created</title>
<div style='margin:12px'>
<h1 align='center' style='color:green'>Account Created!</h1>
<center>
Congratulations! Your Gamma Account is successfully created.<br>
Your GammaID is <b><?php echo $_SESSION['gID']; ?>
</b><br><br>
To upload your profile picture, <a href='login.php'>Login to your account</a> then click on 'Change Profile Picture' and upload picture. You can update your information as well.<br>
<h2>Thank You</h2>
</center>
</div>

<?php
$_SESSION['ok']=false;
?>

<br>
<?php
include "codes/footer.php";
?>





