<?php 
include 'koneksi.php'; 

$id   = $_POST['category_id'];
$name = $_POST['name'];

$sql = "UPDATE categories SET name = '$name' WHERE category_id = $id"; 

if (mysqli_query($link, $sql)) { 
    header("location:categories.php"); 
    exit(); 
} 
