<?php
$cnt=0;
class student{
    public $name;
    public $nickname;
    public $id;
    public $phone;
    public $address;
    public $birthday;
    public $department;
    public $varsity;
    public $blood_group;
    public $fb;
    public $email;
    public $pic;
    public $password;
}
$all = array_fill(0, 900, 0);


$file = fopen("data.txt", "r");
while(! feof($file)) {
  $x=fgets($file);
  $all[$cnt]=$x;
  $cnt=$cnt+1;
 }
fclose($file);

$info[] = new student();
$stu=0;

for($i=0, $j=0; $i<$cnt; $i=$i+14, $j=$j+1){
	$info[$j] = new student();
	//$info[$j] -> success = false;
	
	$info[$j] -> name = $all[$i];
	$info[$j] -> nickname = $all[$i+1];
	$info[$j] -> id = $all[$i+2];
	$info[$j] -> phone = $all[$i+3];
	$info[$j] -> birthday = $all[$i+4];
	$info[$j] -> address = $all[$i+5];
	$info[$j] -> department = $all[$i+6];
	$info[$j] -> varsity = $all[$i+7];
	$info[$j] -> blood_group = $all[$i+8];
	$info[$j] -> password = $all[$i+9];
	$info[$j] -> fb = $all[$i+10];
	$info[$j] -> email = $all[$i+11];
	$info[$j] -> pic = $all[$i+12];
	$stu=$j;
}


for($i=0; $i<$stu; $i++){
	for($j=$i+1; $j<$stu; $j++){
		if($info[$i] -> id > $info[$j] -> id){
			//swaping
			$tmp = new student();
			$tmp = $info[$i];
			$info[$i] = $info[$j];
			$info[$j] = $tmp;
		}
	}
}
?>