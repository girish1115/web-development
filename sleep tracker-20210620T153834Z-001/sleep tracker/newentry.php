<?php

$db=new mysqli("localhost","root","","sleep");
if(isset($_POST['sf'])){
    $date=$_POST['date'];
    $start=$_POST['start'];
    $end=$_POST['end'];
    $duration=date_diff($start, $end);
    
    
   

    $q=$db->query("INSERT INTO `sleeptable`(`date`,`start`,`end`) VALUES ('$date','$start','$end')");
    if($q>0){
      header('Location:olduserdata.php');
    }
   
    
}
 
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/newentry.css">
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <title>JQuery</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body > <br><br>
 <h1 align="center" class="show" style="color:black"> You haven't added any entries yet, you can add one by clicking the button below</h1>
<div class="openBtn">
 <button class="openButton" onclick="newentry()" ><strong>New Entry</strong></button>
</div>
<div class="container" style="visibility: hidden;">
  <div class="popup">
  <div class="formPopup" id="popupForm">
    <form action="newentry.php" onsubmit="formSubmit()"  method="post">
      <div align="center">
    <label>
      <b>Date:</b><input type="date" id="dat" name="date" required>
    </label>
    <br>
    <br>
    <label for="appt-time"><b>SleepTime:</b> </label>
  <input id="appt-time1" type="time" name="start" value="00:00">
  <br><br>
  <label for="appt-time"><b>WakeUpTime:</b> </label>
  <input id="appt-time2" type="time" name="end" value="00:00">
    <br><br>
    <button type="Reset" class="btn">Reset</button> 
    <button type="submit"class="submit1" name="sf">Submit</button> 
    <button type="Cancel" class="btn cancel" onclick="closebox()">Cancel</button>
    <br>
    <center> <h5 id="result"></h5></center>
  </div>
</div>
  </div>
  
  </div>

<script type="text/javascript">
 function newentry() {
  document.querySelector(".show").style.visibility = "hidden";
      document.querySelector(".container").style.visibility = "visible";
        document.getElementById("popupForm").style.display = "block";
      }
      function closebox() {
        document.querySelector(".show").style.visibility = "visible";
        document.querySelector(".container").style.visibility = "hidden";
        document.getElementById("popupForm").style.display = "none";
      }
   
    
  function formSubmit()
 {
   var date=document.getElementById("dat").value;
 var start=document.getElementById("appt-time1").value;
 var end=document.getElementById("appt-time2").value;
 console.log(start+":"+end);
  start = start.split(":");
  end = end.split(":");
  var startDate = new Date(0, 0, 0, start[0], start[1], 0);
  var endDate = new Date(0, 0, 0, end[0], end[1], 0);
  var diff = endDate.getTime() - startDate.getTime();
  var hours = Math.floor(diff / 1000 / 60 / 60);
  diff -= hours * 1000 * 60 * 60;
  var minutes = Math.floor(diff / 1000 / 60);
  

  // If using time pickers with 24 hours format, add the below line get exact hours
  if (hours < 0)
     hours = hours + 24;

 document.getElementById("result").innerHTML= date+"<br>"+(hours <= 9 ? "0" : "") + hours + ":" + (minutes <= 9 ? "0" : "") + minutes;
}

</script>
</body>
</html>
