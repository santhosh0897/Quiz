<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
  <script>
function goBack() {
    window.history.back();
}
</script>
  <style>
  .card{
	   box-shadow: 0 19px 38px rgba(0,0,0,0.30), 0 15px 12px rgba(0,0,0,0.22);
	 margin-left: 150px;
    margin-right: 150px;
    margin-top:95px;
	height:50%;
	  
	  
  }
  
  
  
  
  .card-body{
	text-align:center;
	
	margin-top:20px;
	  
	  
  }
  .bt1 {
    background-color: blue;
    color: white;
    padding: 14px 20px;
    margin: 8px 0px;
    border: none;
    cursor: pointer;
	
    width: 30%;
	font-weight:bold;
}
.bt2 {
    background-color: green;
    color: white;
    padding: 14px 20px;
    margin: 8px 0px;
    border: none;
	
    cursor: pointer;
    width: 30%;
	font-weight:bold;
}
  
  
  
  </style>
  
  
  </head>



<?php
require_once("dbcon.php");
session_start();
mysqli_select_db($con,'quiz');

if(isset($_POST['submit'])){
	if(empty($_POST['quizcheck'])){
		$count=count($_POST['quizcheck']);
		
		$message= "You have not even answered single question";
		?>
		<div class="container">
		<h2><b><center> Alert</center></b></h2>
		<div class="card bg-dark text-white">
		<div class="card-body">
		<h3><b>OOPS!!!!!!</b></h3>
		<?php
		echo "<br>".$message."</br>";
		
		?>
		
		<br><br>
		<button onclick="goBack()" type="submit" name="submit" class="bt1" ><b>GO BACK</b></button>&nbsp&nbsp&nbsp
		<button type="submit" name="submit" class="bt2"><b>LOGOUT</b></button>
		
		
		</div>
		</div><?php
	}
	
	
	else if(!empty($_POST['quizcheck']))
	{
		$count=count($_POST['quizcheck']);
		if($count<10){
		$message= "Out of 10, You have selected only ".$count." options";
		?>
		<div class="container">
		<h2><b><center> Alert</center></b></h2>
		<div class="card bg-dark text-white">
		<div class="card-body">
		<h3><b>OOPS!!!!!!</b></h3>
		<?php
		echo "<br>".$message."</br>";
		
		?>
		
		<br><br>
		<button onclick="goBack()" type="submit" name="submit" class="bt1" ><b>GO BACK</b></button>&nbsp&nbsp&nbsp
		<button type="submit" name="submit" class="bt2"><b>LOGOUT</b></button>
		
		
		</div>
		</div>
		<?php
		}
	    else if($count==10){
			$suc= "You have Successfully attended all 10 questions";
		$dount="If You wish to change the answer please click Go back button"
		?>
		<div class="container">
		<div class="card bg-dark text-white">
		<div class="card-body">
		<h3><b>SUCESSFULLY COMPLETED!!!!!!</b></h3>
		<?php
		echo "<br>".$suc."</br>";
		
		echo "<br>".$dount."<br>";
		
		?>
		
		<br><br>
		<button onclick="goBack()" type="submit" name="submit" class="bt1" >GO BACK</button>&nbsp&nbsp&nbsp&nbsp&nbsp
		<button type="submit" name="submit" class="bt2">LOGOUT</button>
		
		
		</div>
		</div>
		<?php
		}
		?>
		<?php
		$result=0;
		$selected=$_POST['quizcheck'];
		//echo " ";
		//print_r($selected);
		
		$sql=" SELECT * FROM question";
		$query=mysqli_query($con,$sql);
		while($row=mysqli_fetch_array($query)){
			
			//$s=$_POST($row['quizcheck']);
			
		//print_r($row['ans_id']);
		//$checked=$row['ans_id']==$selected;
		$contain=array($selected);
		if(in_array($row['ans_id'],$selected,TRUE))
		{
			
			$result++;
		}
		
		
		
		}
		echo "Your score is ".$result;
	}
}
?>