<?php 
include 'koneksi.php'; 

$title         = $_POST['title']; 
$description   = $_POST['description']; 
$category_id   = $_POST['category_id']; 
$status        = $_POST['status']; 

$sql = "INSERT INTO tasks (`title`, `description`, `category_id`, `status`) VALUES ('$title', '$description', '$category_id', '$status')"; 

if (mysqli_query($link, $sql)) { 
    header("location:index.php"); 
    exit(); 
} 
