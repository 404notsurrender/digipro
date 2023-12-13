<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikai Stok Barang</title>
    <!-- Sertakan pustaka Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <!-- Daftar Barang -->
    <h2 class="mt-5">Daftar Barang</h2>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php include "view.php"; ?>
        </tbody>
    </table>

    <!-- Form Ubah Barang -->
    <h2 class="mt-5">Ubah Barang</h2>
    <form action="update.php" method="post">
        <div class="form-group">
            <label for="id">ID Barang:</label>
            <input type="text" class="form-control" name="id" required>
        </div>
        <div class="form-group">
            <label for="nama">Nama:</label>
            <input type="text" class="form-control" name="nama" required>
        </div>
        <div class="form-group">
            <label for="harga">Harga:</label>
            <input type="text" class="form-control" name="harga" required>
        </div>
        <div class="form-group">
            <label for="stok">Stok:</label>
            <input type="text" class="form-control" name="stok" required>
        </div>
        <button type="submit" class="btn btn-warning">Ubah Barang</button>
    </form>

    <!-- Form Hapus Barang -->
    <h2 class="mt-5">Hapus Barang</h2>
    <form action="delete.php" method="post">
        <div class="form-group">
            <label for="id">ID Barang:</label>
            <input type="text" class="form-control" name="id" required>
        </div>
        <button type="submit" class="btn btn-danger">Hapus Barang</button>
    </form>

</div>

<!-- Sertakan pustaka Bootstrap JS dan jQuery (jika diperlukan) -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>
