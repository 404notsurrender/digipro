<?php
include_once "../config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Member</title>
    <!-- Sertakan pustaka Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h1 class="text-center">Registrasi Member</h1>
                    </div>
                    <div class="card-body">
                    <?php

                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $username = $_POST["username"];
                    $password = $_POST["password"];
                    $email = $_POST["email"];

                    // Validasi minimal karakter, campuran huruf besar, huruf kecil, angka, dan karakter khusus
                    if (strlen($password) < 8 || !preg_match('/[A-Z]/', $password) || !preg_match('/[a-z]/', $password) || !preg_match('/[0-9]/', $password) || !preg_match('/[^A-Za-z0-9]/', $password)) {
                    echo "<div class='alert alert-danger' role='alert'>Password harus memiliki minimal 8 karakter dan mengandung campuran huruf besar, huruf kecil, angka, dan karakter khusus.</div>";
                    
                    } else {
                    // Lanjutkan dengan proses registrasi
                    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

                    // Fungsi untuk menyimpan pengguna baru ke database
                    $checkUserQuery = "SELECT * FROM users WHERE username='$username' OR email='$email'";
                    $result = $conn->query($checkUserQuery);

                    if ($result->num_rows > 0) {
                    echo "<div class='alert alert-danger' role='alert'>Username atau email sudah terdaftar. Silakan gunakan yang lain.</div";
                    } else {
                    // Jika username dan email belum terdaftar, lakukan registrasi
                    $registerQuery = "INSERT INTO users (username, password, email) VALUES ('$username', '$hashedPassword', '$email')";

                    if ($conn->query($registerQuery) === TRUE) {
                    echo "<div class='alert alert-success' role='alert'>Registrasi berhasil. Silakan login.</div>";
                    } else {
                    echo "<div class='alert alert-danger' role='alert'>Error: " . $registerQuery . "<br>" . $conn->error . "</div>";
                    }
                }
            }
        }
    ?>

                        <form action="register.php" method="post">
                            <div class="form-group">
                                <label for="username">Username:</label>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Registrasi</button>
                            <a href="login.php" class="btn btn-link">Login</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Sertakan pustaka Bootstrap JS dan jQuery (jika diperlukan) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
