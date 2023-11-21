<?php
include_once "../config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Member</title>
    <!-- Sertakan pustaka Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h1 class="text-center">Login Member</h1>
                    </div>
                    <div class="card-body">
                        <?php
                            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                // Gantilah ini dengan validasi login sesuai kebutuhan Anda
                                $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
                                $inputUsername = $_POST["username"];
                                $inputPassword = $_POST["password"];
                                // Contoh: Ambil data pengguna dari database
                                $sql = "SELECT * FROM users WHERE username='$inputUsername'";
                                $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                $row = $result->fetch_assoc();
                                $hashedPassword = $row["password"];
                            }
                                // Verifikasi kata sandi
                            if (password_verify($inputPassword, $hashedPassword)) {
                            // Login berhasil, arahkan ke halaman index.php
                                header("Location: ../dashboard.php");
                                exit(); // Pastikan untuk keluar setelah melakukan redirect
                            } else {
                            echo "<p class='text-danger text-center'>Login gagal. Silakan coba lagi.</p>";
                            }
                        }
                        ?>

                        <form action="login.php" method="post">
                            <div class="form-group">
                                <label for="username">Username:</label>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Login</button>
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
