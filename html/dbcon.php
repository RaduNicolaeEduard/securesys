<?php

$db = mysqli_connect("localhost","root","example","secure");

if(!$db)
{
    die("Connection failed: " . mysqli_connect_error());
}

?>