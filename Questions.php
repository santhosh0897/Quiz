<?php

require_once("dbcon.php");
$Qid1 = $_POST['Qid'];
$Question1 = $_POST['Question'];
$Answerid1 = $_POST['ans_id'];
$sql="insert into question (Qid,Question,ans_id) values ('$Qid1','$Question1','$Answerid1')";
$query=mysqli_query($con,$sql);
if($query)
    echo 'data_inserted';
else{
echo 'data not inserted';
}
?>
