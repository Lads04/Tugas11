<?php 
include 'koneksi.php'; 

$sql = "SELECT category_id, name FROM categories ORDER BY category_id DESC"; 
$result = mysqli_query($link, $sql); 
?> 

<!DOCTYPE html> 
<html lang="id"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Kelola Kategori</title> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> 
</head> 

<body> 
    <div class="container"> 
        <h2 class="mb-4">Kelola Kategori</h2> 

        <div class="list-section"> 
            <h3 class="mb-3">Daftar Kategori</h3> 
            <?php if ($result->num_rows > 0): ?> 
                <div class="table-responsive"> 
                    <table class="table table-bordered table-hover align-middle"> 
                        <thead class="table-primary"> 
                            <tr> 
                                <th>ID</th> 
                                <th>Nama</th> 
                                <th>aksi</th> 
                            </tr> 
                        </thead> 
                        <tbody> 
                            <?php while ($row = $result->fetch_assoc()): ?> 
                                <tr> 
                                    <td><?php echo htmlspecialchars($row['category_id']); ?></td> 
                                    <td><?php echo htmlspecialchars($row['name']); ?></td> 
                                    <td> 
                                        <a href="edit_kategori.php?id=<?php echo $row['category_id']; ?>"class="btn btn-primary">edit</a> 
                                        <a href="hapus_kategori.php?id=<?php echo $row['category_id']; ?>"class="btn btn-danger">hapus</a> 
                                    </td> 
                                </tr> 
                            <?php endwhile; ?> 
                        </tbody> 
                    </table> 
                </div> 
            <?php else: ?> 
                <div class="alert alert-info text-center no-data" role="alert"> 
                    Belum ada kategori 
                </div> 
            <?php endif; ?> 
        </div> 

        <div class="form-section"> 
            <h3 class="mb-3">Tambah Kategori Baru</h3> 
            <form action="insert_kategori.php" method="POST"> 
                <div class="mb-3"> 
                    <label for="categoryName" class="form-label">Nama Kategori</label> 
                    <input type="text" class="form-control" id="categoryName" name="name" required> 
                </div> 
                <button type="submit" class="btn btn-primary">Simpan</button> 
                <a href="index.php" class="btn btn-secondary">Kembali</a> 
            </form> 
        </div> 
    </div> 

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eQcbzTf1f" crossorigin="anonymous"></script> 
</body> 
</html>
