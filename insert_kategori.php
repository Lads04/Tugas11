<?php 
include 'koneksi.php'; 

$name = $_POST['name'];

$sql = "INSERT INTO categories (`name`) VALUES ('$name')"; 

if (mysqli_query($link, $sql)) { 
    header("location:categories.php"); 
    exit(); 
} 
