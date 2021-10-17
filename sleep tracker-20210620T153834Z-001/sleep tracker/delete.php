<?php

$db=new mysqli("localhost","root","","sleep");

// error_reporting (0);

$id=$_GET['rn'];

$query="DELETE FROM sleeptable WHERE id = '$id'";

$data=mysqli_query($db, $query);

if ($data)
{
header("Location:olduserdata.php");
}

else
{

echo "<font color='red'>Failed to delete Record from Database";
}
?>