<!DOCTYPE html>
<html>

<head>

<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
  
  
  
  
  
  
  
  
  
  
  
 
<script>
  (function (global) { 

    if(typeof (global) === "undefined") {
        throw new Error("window is undefined");
    }

    var _hash = "!";
    var noBackPlease = function () {
        global.location.href += "#";

        // making sure we have the fruit available for juice (^__^)
        global.setTimeout(function () {
            global.location.href += "!";
        }, 50);
    };

    global.onhashchange = function () {
        if (global.location.hash !== _hash) {
            global.location.hash = _hash;
        }
    };

    global.onload = function () {            
        noBackPlease();

        // disables backspace on page except on input fields and textarea..
        document.body.onkeydown = function (e) {
            var elm = e.target.nodeName.toLowerCase();
            if (e.which === 8 && (elm !== 'input' && elm  !== 'textarea')) {
                e.preventDefault();
            }
            // stopping event bubbling up the DOM tree..
            e.stopPropagation();
        };          
    }

})(window);
  
  </script>
  <script>
   function CountDown(duration, display) {
            if (!isNaN(duration)) {
                var timer = duration, minutes, seconds,timer1;
                
              var interVal=  setInterval(function () {
                    minutes = parseInt(timer / 60, 10);
                    seconds = parseInt(timer % 60, 10);

                    minutes = minutes < 10 ? "0" + minutes : minutes;
                    seconds = seconds < 10 ? "0" + seconds : seconds;

                   timer1= $(display).html("<b>" + minutes + "m : " + seconds + "s" + "</b>");
                    
					 // window.location.href = "check.php?name=" + timer1;
					
					if (--timer < 0) {
                        timer = duration;
						  $('#display').empty();
                   clearInterval(interVal)
				   SubmitFunction();
						document.getElementById("mcq").click();
                     
                    }
                    },1000);
            }
        }
        
        function SubmitFunction(){
   $('#display').html('Times up!');
     $('form') .submit();
    }
    
        
      
  
  
  </script>
  <style>
  .btn {
    background-color: green;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
	 margin-left:250px;
	  margin-right:250px;
    cursor: pointer;
    width: 20%;
}

#display{
	text-align:right;
}


  
  </style>
  
</head>
<body>



<body onload="noBack();">

<script type="text/javascript">
    window.onbeforeunload = function() {
        return "Dude, are you sure you want to leave? Think of the kittens!";
    }

</script>

<script type="text/javascript">
function disableF5(e) { if ((e.which || e.keyCode) == 116 || (e.which || e.keyCode) == 82) e.preventDefault(); };

$(document).ready(function(){
     $(document).on("keydown", disableF5);
});
</script>

<script type="text/javascript">
$(document).ready(function () {
  
    $('body').bind('cut copy paste', function (e) {
        e.preventDefault();
    });
   
  
    $("body").on("contextmenu",function(e){
        return false;
    });
});
</script>


<div id="display">
<script type="text/javascript">
    CountDown(1200,$('#display'));
</script>
</div>
<div class="container">



<form action="check.php" method="POST" id="mcQuestion" >
<div class="col-lg-8 m-auto d-block> 
<?php
require_once("dbcon.php");
$n=range(1,10);
shuffle($n);
for($i=0;$i<10;$i++){
	
	$random= $n[$i];


	$c=((4*$random)-3);
$sql="SELECT DISTINCT * FROM question WHERE Qid=$random";
$result=mysqli_query($con,$sql);
while ($row = mysqli_fetch_array($result)) {
	
?>


 
<div class="card">

<h4 class="card-header"><label><b><?php $k=$i+1; echo $k."&nbsp" ?></b></label><?php echo $row['Question']?></h4>

<?php


for($j=$c;$j<$c+4;$j++){
	
	
$sql="SELECT * FROM answer WHERE Aid=$j";
$result=mysqli_query($con,$sql);
while ($row = mysqli_fetch_array($result)) {
?>


<div class="card-body">
<input type="radio" name="quizcheck[<?php echo $row['ans_id']?>]" value="<?php echo $row['Aid']; ?>">

<?php echo  $row['Answers'];




?>
</div>

<?php
}
}
}
}
?>
<br><br>

<input type="submit" name="submit" class="btn" id="mcq">
<div class="card-footer">

<div >
<br><br>
<h3 class="text-center">©CALICWIZ 2K18</h3><br><br>
 </div>

</form>
</div>


</body>

</html>


