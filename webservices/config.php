<?php 
    $host="localhost";
    $db_user="learnquix";
    $db_pass="Learn@21";
    $db_name="learnquix";

    $link=new PDO("mysql:host=$host;dbname=$db_name;charset=utf8",$db_user,$db_pass);
    $link->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
    
?>