<?php
session_start(); // Memulai sesi 
require_once("pages.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Welcome To Dashboard</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-dark bg-dark">
    <!-- Navbar Content -->
    <a class="navbar-brand" href="#">Fortnine</a>
    <!-- Navbar Element -->
    <ul class="nav justify-content-center">
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="<?php echo $dashboard; ?>">Dashboard</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="<?php echo $product; ?>">Daftar Produk</a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="<?php echo $profile; ?>">Profile</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="<?php echo $logout; ?>">Logout</a>
  </li>
</ul>
</nav>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
        <div class="alert alert-success" role="alert">Selamat Datang <?php echo $_SESSION['username']; ?></div>
        </div>
    </div>
    <div class="container mt-5">

<!-- Form Tambah Barang -->
<h2>Tambah Barang</h2>
<form action="create.php" method="post">
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
    <button type="submit" class="btn btn-primary">Tambah Barang</button>
</form>

<!-- Bootstrap JS dan jQuery -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>