<?php

// $db = mysqli_connect("localhost","root","","secure");
$db = mysqli_connect("securesql","root","example","notsecure");

if(!$db)
{
    die("Connection failed: " . mysqli_connect_error());
}

?>