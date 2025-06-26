<?php
include 'koneksi.php';

$category = $_GET['id'];

$sql = "DELETE FROM categories WHERE category_id = $category";

if (mysqli_query($link, $sql)) {
    header("location:categories.php");
    exit();
}
