<?php
   
    $dbhost="localhost";
    $dbuser="root";
    $dbpass="";
    $dbname="treasurehunt_db";
    $con=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
    if(!$con)
    {
     echo 'not connected';
     die("failed to connect");
    }
    
  
?>
