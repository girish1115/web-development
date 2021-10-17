<?php

$servername="localhost"; $username = "root";

$password = "";

$dbname ="sleep";

$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error)
{ 
  die("connection failed");
}
if(isset($_POST['sf']))
{
$email = $_POST["mail"];

$password = $_POST["password"];
 $salt = "codeflix";

// $password_encrypted = sha1($password. $salt);
$res = mysqli_query($conn,"select * from signup where mail='$email'and password='$password'");
$result=mysqli_fetch_array($res);
if($result)
{
  
header("location:newentry.php");   
	
}
else
{
	echo "<script>alert('Login Failed')</script>";
}

}


?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="login.css">
     <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@300;400&family=Work+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@500&family=Noto+Sans+TC&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
</head>
<body>
  <nav>
    <div class="logo"> Sleep Tracker</div>
    <input type="checkbox" id="click">
    <label for="click" class="menu-btn">
        <i class="fas fa-bars"></i>
    </label>
     <ul> <li><a  href="index.html">Home</a></li>
         <li><a  href="signup.php">SignUp</a></li>
         <li><a  href="about.html">About Us</a></li>
     </ul>
 </nav><br><br>

  <div class="log">
    <div class="row">
      <div class="text-center col-lg-5 col-md-12">
          <form action="login.php" class="text-center" method="post">
              <h2  class="mb-3 login">Login</h2>
              <label for="emailAddress" class="sr-only">Email Address</label>
              <input type="email" id="emailAddress" class="form-control mb-3" placeholder="Email Address" autofocus name="mail" required>
              <label for="password" class="sr-only">Password</label>
              <input type="password" placeholder="Password" id="password" class="form-control mb-3" name="password" required>
              <div class="checkbox">
                  <label class="pb-2">
                      <input type="checkbox" value="remember-me">
                      Remember-me
                  </label>
              </div>
              <span class="mt-5">
                <button class="letsgo btn btn-outline-light" type="submit" name="sf"><a class="p" ><span class="fas fa-sign-in-alt dark"></span> Sign In</a></button>
              </span>
              <span class="mt-5 ms-3">
                <button class="signup btn btn-outline-light"><a class="up" href="signup.php"><span class="fas fa-user-plus"></span> Sign up</a></button>
              </span>
          </form>
      </div>
  </div>
 
  
<!-- <script>
  var bt=document.querySelector(".letsgo");
// var cemail="user@gmail.com";
// var cpss="Password@123";
bt.addEventListener("click",function(){
    var eml=document.getElementById("emailAddress").value;
    var pas=document.getElementById("password").value;
    
        var anc=document.querySelector(".p");
        anc.target = "_self";
        window.open("http://localhost/sleep%20tracker/newentry.php",anc.target);
   
});

</script> -->
</body>
</html>
