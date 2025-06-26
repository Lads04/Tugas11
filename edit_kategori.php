<?php
include 'koneksi.php';

$category_id = '';
$category_name = '';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $category_id = $_GET['id'];
    $sql = "SELECT name FROM categories WHERE category_id = $category_id";
    $result = mysqli_query($link, $sql);
    if ($row = mysqli_fetch_assoc($result)) {
        $category_name = $row['name'];
    } else {
        header("Location: categories.php");
        exit();
    }
} else if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    header("Location: categories.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Kategori</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Edit Kategori</h2>
    <div class="card p-4">
        <form action="update_kategori.php" method="POST">
            <input type="hidden" name="category_id" value="<?php echo $category_id; ?>">
            <div class="mb-3">
                <label for="name" class="form-label">Nama Kategori</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo htmlspecialchars($category_name); ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="categories.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
<?php mysqli_close($link); ?>
</body>
</html>
