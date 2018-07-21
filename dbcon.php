<?php
error_reporting(0);
define(HOST,'localhost');
define(USER,'root');
define(PASS,'');
define(DB,'Quiz');
$con = mysqli_connect(HOST,USER,PASS,DB);
if($con){


}else{
	echo "not connected";
}
?>

