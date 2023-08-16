<?php 
    $host='localhost';
    $user='root';
    $password='';
    $db=new mysqli($host,$user,$password) or die("unable to connect");
    $sql='create database db3';
    $result=mysqli_query($db,$sql);
    if(!$result) echo "unable to create database";
    else echo "database successfully created";
?>