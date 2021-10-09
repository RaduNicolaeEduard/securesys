<?php
$host = 'localhost';
$user = 'root';
$password = 'example';
$db ='secure';

$connection = mysqli_connect($host,$user,$password,$db);// you can select db separately as you did already
if($connection){
     // do all your stuff that you want
}else{
   echo "db connection error because of".mysqli_connect_error();
}

$result = mysqli_query($connection,"SELECT * FROM mytable");

while($row = mysqli_fetch_array($result))
  {
  echo $row['myfield']; //these are the fields that you have stored in your database table employee
  echo "<br />";
  }

mysqli_close($connection);