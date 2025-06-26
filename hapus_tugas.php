<?php
include 'koneksi.php';

$task_id_to_delete = $_GET['id'];

$sql = "DELETE FROM tasks WHERE task_id = $task_id_to_delete";

if (mysqli_query($link, $sql)) {
    header("location:index.php");
    exit();
}
