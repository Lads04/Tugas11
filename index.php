<?php 
// Include file koneksi database 
include 'koneksi.php'; 

// Query untuk mengambil data tugas beserta nama kategorinya 
$sql = "SELECT t.task_id, t.title, t.description, c.name AS category_name, t.status 
        FROM tasks t 
        LEFT JOIN categories c ON t.category_id = c.category_id 
        ORDER BY t.task_id DESC"; 

$result = mysqli_query($link, $sql); 
?> 

<!DOCTYPE html> 
<html lang="id"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Daftar Tugas</title> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> 
    <style> 
        body { background-color: #f8f9fa; } 
        .container { margin-top: 30px; margin-bottom: 30px; } 
        .table th, .table td { vertical-align: middle; } 
        .no-data { text-align: center; padding: 20px; font-style: italic; color: #6c757d; } 
        .status-pending { background-color: #6c757d; color: white; } 
        .status-onprogress { background-color: #0d6efd; color: white; } 
        .status-completed { background-color: #198754; color: white; } 
        .btn:disabled { pointer-events: none; opacity: 0.65; } 
    </style> 
</head> 

<body> 
    <div class="container"> 
        <h2 class="mb-4 text-center text-primary">Daftar Tugas</h2> 
        <div class="d-flex justify-content-end mb-3"> 
            <a href="form_tambah_tugas.php" class="btn btn-success me-2">Tambah Tugas</a> 
            <a href="categories.php" class="btn btn-primary">Kelola Kategori</a> 
        </div> 

        <?php if ($result->num_rows > 0): ?> 
            <div class="table-responsive"> 
                <table class="table table-bordered table-hover align-middle"> 
                    <thead class="table-primary"> 
                        <tr> 
                            <th>Judul</th> 
                            <th>Deskripsi</th> 
                            <th>Kategori</th> 
                            <th>Status</th> 
                            <th>Aksi</th> 
                        </tr> 
                    </thead> 
                    <tbody> 
                        <?php while($row = $result->fetch_assoc()): ?> 
                        <tr> 
                            <td><?php echo htmlspecialchars($row['title']); ?></td> 
                            <td><?php echo htmlspecialchars($row['description']); ?></td> 
                            <td><?php echo htmlspecialchars($row['category_name'] ? $row['category_name'] : '-'); ?></td> 
                            <td> 
                                <span class="badge rounded-pill status-<?php echo strtolower($row['status']); ?>"> 
                                    <?php echo htmlspecialchars(ucwords(str_replace('onprogress', 'Sedang Dikerjakan', $row['status']))); ?> 
                                </span> 
                            </td> 
                            <td> 
                                <a href="edit_task.php?id=<?php echo $row['task_id']; ?>" class="btn btn-warning btn-sm <?php if ($row['status'] == 'completed') echo 'disabled'; ?>">Edit</a> 
                                <a class="btn btn-danger btn-sm" href="hapus_tugas.php?id=<?php echo $row['task_id']; ?>" onclick="return confirm('hapus tugas ini?');">Hapus</a> 
                            </td> 
                        </tr> 
                        <?php endwhile; ?> 
                    </tbody> 
                </table> 
            </div> 
        <?php else: ?> 
            <div class="alert alert-info text-center no-data" role="alert"> 
                Tidak ada tugas 
            </div> 
        <?php endif; ?> 
    </div> 

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eQcbzTf1f" crossorigin="anonymous"></script> 
</body> 
</html>
