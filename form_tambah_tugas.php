<?php 
// Include file koneksi database 
include 'koneksi.php'; 

// Query untuk mengambil semua kategori dari database 
$sql = "SELECT * FROM categories ORDER BY category_id DESC"; 
$result = mysqli_query($link, $sql); 
$categories = []; 
if ($result) {  
    while ($row = mysqli_fetch_assoc($result)) { 
        $categories[] = $row; 
    } 
} 
?> 

<!DOCTYPE html>
<html lang="id"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Tambah Tugas</title> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> 
    <style> 
        body { background-color: #f8f9fa; } 
        .container { margin-top: 30px; margin-bottom: 30px; } 
        .card { background-color: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); } 
    </style> 
</head> 

<body> 
    <div class="container"> 
        <h2 class="mb-4 text-center text-primary">Tambah Tugas Baru</h2> 
        <div class="card"> 
            <form action="tambah_tugas.php" method="POST"> 
                <div class="mb-3"> 
                    <label for="title" class="form-label">Judul</label> 
                    <input type="text" class="form-control" id="title" name="title" required> 
                </div> 
                <div class="mb-3"> 
                    <label for="description" class="form-label">Deskripsi</label> 
                    <textarea class="form-control" id="description" name="description" rows="3"></textarea> 
                </div> 
                <div class="mb-3"> 
                    <label for="category" class="form-label">Kategori</label> 
                    <select class="form-select" id="category" name="category_id"> 
                        <option value="">-- Pilih Kategori --</option> 
                        <?php foreach ($categories as $cat): ?> 
                            <option value="<?php echo $cat['category_id']; ?>"> 
                                <?=($cat['name']); ?> 
                            </option> 
                        <?php endforeach; ?> 
                    </select> 
                </div> 
                <div class="mb-3"> 
                    <label for="status" class="form-label">Status</label> 
                    <select class="form-select" id="status" name="status" disabled> 
                        <option value="pending" selected>Pending</option> 
                        <option value="onprogress">Sedang Dikerjakan</option> 
                        <option value="completed">Selesai</option> 
                    </select> 
                    <input type="hidden" name="status" value="pending"> 
                </div> 
                <button type="submit" class="btn btn-primary">Simpan</button> 
                <a href="index.php" class="btn btn-secondary">Kembali</a> 
            </form> 
        </div> 
    </div> 

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eQcbzTf1f" crossorigin="anonymous"></script> 
</body> 
</html>
