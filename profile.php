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
    require_once("pages.php");
    include_once "config.php";
    if ($_SERVER['REQUEST_METHOD'] === "POST"){

        if(isset($_POST['new_email'])){
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

        if(isset($_POST['new_password'])){
            $inputPassword = mysqli_real_escape_string($conn, $_POST["current_password"]);
            $idUser = $_SESSION["id"];
            $newpassword = $_POST['new_password'];

            // Ambil data pengguna dari database
            $sql = "SELECT * FROM users WHERE id='$idUser'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $hashedPassword = $row["password"]; 

                // Verifikasi kata sandi
                if (password_verify($inputPassword, $hashedPassword)) {

                    $newpassword = password_hash($newpassword, PASSWORD_BCRYPT);


                    $query = "UPDATE users SET password = '$newpassword' WHERE id = '$idUser'";
                    $data = $conn -> query($query);

                    if ($data) {
                        echo "<script>alert('Password berhasil diubah!')</script>";
                        echo "<script>window.location.replace('profile.php')</script>";
                    } else {
                        echo "<script>alert('Password gagal diubah!')</script>";
                        echo "<script>window.location.replace('profile.php')</script>";
                    }

                } else {
                    echo "<script>alert('Current Password Salah')</script>";
                }
            } else {
                echo "<script>alert('Current Password Salah')</script>";
            }
        }
        
    }
?>
<nav class="navbar navbar-dark bg-dark">
    <!-- Navbar Content -->
    <a class="navbar-brand" href="#">Secure Programming</a>
    <!-- Navbar Element -->
    <ul class="nav justify-content-center">
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="<?php echo $dashboard; ?>">Dashboard</a>
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