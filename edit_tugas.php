<?php 
include 'koneksi.php'; 

$task_id_to_update = $_POST['task_id']; 
$new_title         = $_POST['title']; 
$new_description   = $_POST['description']; 
$new_category_id   = $_POST['category_id']; 
$new_status        = $_POST['status']; 

$sql = "UPDATE tasks SET title = '$new_title',description = '$new_description',category_id = $new_category_id,status = '$new_status'WHERE task_id = $task_id_to_update"; 

if (mysqli_query($link, $sql)) { 
    header("location:index.php"); 
    exit(); 
} 
