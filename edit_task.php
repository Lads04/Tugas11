<?php 
include 'koneksi.php'; 

$task_id = null; 
$task_title = ''; 
$task_description = ''; 
$task_category_id = ''; 
$task_status = ''; 

// Ambil daftar kategori (sederhana) 
$categories_sql = "SELECT category_id, name FROM categories ORDER BY name ASC"; 
$categories_result = mysqli_query($link, $categories_sql); 
$categories = []; 
while ($row = mysqli_fetch_assoc($categories_result)) { 
    $categories[] = $row; 
} 

if (isset($_GET['id'])) { 
    $task_id = $_GET['id']; 

    $sql_get_task = "SELECT title, description, category_id, status FROM tasks WHERE task_id = $task_id"; 
    $result_get_task = mysqli_query($link, $sql_get_task); 

    if (mysqli_num_rows($result_get_task) > 0) { 
        $task_data = mysqli_fetch_assoc($result_get_task); 
        $task_title = $task_data['title']; 
        $task_description = $task_data['description']; 
        $task_category_id = $task_data['category_id']; 
        $task_status = $task_data['status']; 
    } else { 
        header("Location: index.php"); // Langsung redirect jika tidak ditemukan 
        exit(); 
    } 
} else if ($_SERVER['REQUEST_METHOD'] != 'POST') { 
    header("Location: index.php"); // Langsung redirect jika tidak ada ID 
    exit(); 
} 
?> 

<!DOCTYPE html> 
<html lang="id"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Edit Tugas</title> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> 
    <style> 
        body { background-color: #f8f9fa; } 
        .container { margin-top: 30px; margin-bottom: 30px; } 
        .card { background-color: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); } 
    </style> 
</head> 
<body> 
    <div class="container"> 
        <h2 class="mb-4 text-center text-primary">Edit Tugas</h2> 

        <div class="card"> 
            <form action="edit_tugas.php" method="POST"> 
                <input type="hidden" name="task_id" value="<?php echo $task_id; ?>"> 

                <div class="mb-3"> 
                    <label for="title" class="form-label">Judul</label> 
                    <input type="text" class="form-control" id="title" name="title" value="<?php echo $task_title; ?>" required> 
                </div> 

                <div class="mb-3"> 
                    <label for="description" class="form-label">Deskripsi</label> 
                    <textarea class="form-control" id="description" name="description" rows="3"><?php echo $task_description; ?></textarea> 
                </div> 

                <div class="mb-3"> 
                    <label for="category" class="form-label">Kategori</label> 
                    <select class="form-select" id="category" name="category_id"> 
                        <option value="">-- Pilih Kategori --</option> 
                        <?php foreach ($categories as $cat): ?> 
                            <option value="<?php echo $cat['category_id']; ?>" 
                                <?php if ($task_category_id == $cat['category_id']) echo 'selected'; ?>> 
                                <?php echo $cat['name']; ?> 
                            </option> 
                        <?php endforeach; ?> 
                    </select> 
                </div> 

                <div class="mb-3"> 
                    <label for="status" class="form-label">Status</label> 
                    <select class="form-select" id="status" name="status"> 
                        <option value="pending" <?php if ($task_status == 'pending') echo 'selected'; ?>>Pending</option> 
                        <option value="onprogress" <?php if ($task_status == 'onprogress') echo 'selected'; ?>>Sedang Dikerjakan</option> 
                        <option value="completed" <?php if ($task_status == 'completed') echo 'selected'; ?>>Selesai</option> 
                    </select> 
                </div> 

                <button type="submit" class="btn btn-primary">Simpan</button> 
                <a href="index.php" class="btn btn-secondary">Kembali</a> 
            </form> 
        </div> 
    </div> 

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eQcbzTf1f" crossorigin="anonymous"></script> 

    <?php 
    mysqli_close($link); 
    ?> 
</body> 
</html>
