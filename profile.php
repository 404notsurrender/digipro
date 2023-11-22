<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengaturan Akun</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
<?php // update email
    session_start();
    include_once "config.php";
    if ($_SERVER['REQUEST_METHOD'] === "POST"){
        $new_email = $_POST['new_email'];
        
        $id = $_SESSION['id'];
        global $conn;

        $query = "UPDATE users SET email = '$new_email' WHERE id = '$id'";
        $data = $conn -> query($query);

        if ($data) {
            echo "<script>alert('Email berhasil diubah!')</script>";
            echo "<script>window.location.replace('profile.php')</script>";
        } else {
            echo "<script>alert('Email gagal diubah!')</script>";
            echo "<script>window.location.replace('profile.php')</script>";
        }
    }
?>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h1 class="text-center">Pengaturan Akun</h1>
                </div>
                <div class="card-body">
                    <form action="profile.php" method="post">
                        <div class="form-group">
                            <label for="change_password">Ganti Kata Sandi:</label>
                            <input type="password" class="form-control" id="current_password" name="current_password" placeholder="Kata Sandi Saat Ini" required>
                            <input type="password" class="form-control" id="new_password" name="new_password" placeholder="Kata Sandi Baru" required>
                            <button type="submit" class="btn btn-primary" name="change_password">Simpan Perubahan</button>
                        </div>
                    </form>

                    <hr>

                    <form action="profile.php" method="post">
                        <div class="form-group">
                            <label for="change_email">Ganti Email:</label>
                            <input type="email" class="form-control" id="new_email" name="new_email" placeholder="Email Baru" required>
                            <button type="submit" class="btn btn-primary" name="change_email">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min
