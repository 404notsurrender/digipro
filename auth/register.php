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
                                // Proses registrasi
                                $username = $_POST["username"];
                                $password = password_hash($_POST["password"], PASSWORD_BCRYPT);
                                $email = $_POST["email"];

                                // Validasi input dan proses registrasi

                                // Fungsi untuk menyimpan pengguna baru ke database
                                $checkUserQuery = "SELECT * FROM users WHERE username='$username' OR email='$email'";
                                $result = $conn->query($checkUserQuery);
                            
                                if ($result->num_rows > 0) {
                                    echo "<p class='text-danger text-center'>Username atau email sudah terdaftar. Silakan gunakan yang lain.</p>";
                                } else {
                                    // Jika username dan email belum terdaftar, lakukan registrasi
                                    $registerQuery = "INSERT INTO users (username, password, email) VALUES ('$username', '$password', '$email')";
                            
                                    if ($conn->query($registerQuery) === TRUE) {
                                        echo "<p class='text-success text-center'>Registrasi berhasil. Silakan login.</p>";
                                    } else {
                                        echo "<p class='text-danger text-center'>Error: " . $registerQuery . "<br>" . $conn->error . "</p>";
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
