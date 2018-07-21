<?php

require_once("dbcon.php");
$Aid1 = $_POST['Aid'];
$Answer1 = $_POST['Answers'];
$Answerid1 = $_POST['ans_id'];
$sql="insert into answer (Aid,Answers,ans_id) values ('$Aid1','$Answer1','$Answerid1')";
$query=mysqli_query($con,$sql);
if($query){
	
}
   
else{
echo 'data not inserted';
}
?>
