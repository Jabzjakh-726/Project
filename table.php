<?php 
    $host='localhost';
    $user='root';
    $password='';
    $database='db3';
    $db=new mysqli($host,$user,$password,$database) or die("unable to connect".mysqli_connect_error());
    echo('Connected successfully');
    $sql="create table tenth(id int auto_increment primary key,name varchar(30),email varchar(40),pass varchar(50),repass varchar(50),exam varchar(20),phno varchar(13),gender varchar(6),birthdate varchar(20),address varchar(200))";
    $result=mysqli_query($db,$sql) or die('unable to create table');
    echo('Table Created Successfully');
?>