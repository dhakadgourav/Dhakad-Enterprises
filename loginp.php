<?php 

$username=$_POST['username'];
$password= $_POST['password'];

if($username && $password)
{
	$connect=mysql_connect("localhost","root","") or die("not connected");
	mysql_select_db("phplogin") or die("can't find one");
}

else 
 die("Please enter username and password");
 ?>
