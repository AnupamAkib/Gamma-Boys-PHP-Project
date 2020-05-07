<?php
$isNoticeBoardOpen = false;
$NOTICE = "সবাইকে ছবি আপলোড করতে বলা হচ্ছে। ইতিমধ্যে ছবি আপ্লোড করার লিমিটেশন ১ মেগাবাইট থেকে ২.৫ মেগাবাইটে উন্নত করা হয়েছে। ধন্যবাদ";



if($isNoticeBoardOpen == true){
	echo "<div style='box-shadow:0 0 3px rgba(0,0,0,0.5); color:red; padding: 10px 0px 10px 0px; margin:4px 9px 11px 9px; font-weight:bold; background:white; ' align='center'><div style='padding:3px;'>".$NOTICE."</div></div>";
}
?>
	
	
	
	
