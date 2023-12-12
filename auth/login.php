<?php
require_once "../config.php";

session_start();

// Generate CSRF token and store it in the session
if (!isset($_SESSION['csrf_token_login'])) {
    $_SESSION['csrf_token_login'] = bin2hex(random_bytes(32));
}

// Setelah login berhasil
$_SESSION["username"] = $username; 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Member</title>
    <!-- Bootstrap CSS -->
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
                                // Validate CSRF token
                                if (!empty($_POST['csrf_token_login']) && hash_equals($_SESSION['csrf_token_login'], $_POST['csrf_token_login'])) {
                                    // CSRF token is valid
                                    $inputUsername = mysqli_real_escape_string($conn, $_POST["username"]);
                                    $inputPassword = mysqli_real_escape_string($conn, $_POST["password"]);

                                    // Rest of your existing login logic...

                                    // After processing the form, regenerate CSRF token
                                    $_SESSION['csrf_token_login'] = bin2hex(random_bytes(32));
                                } else {
                                    // CSRF token is not valid
                                    echo "<p class='text-danger text-center'>Invalid CSRF token. Please try again.</p>";
                                }
                            }
                        ?>

                        <form action="login.php" method="post">
                            <!-- Include CSRF token in the form -->
                            <input type="hidden" name="csrf_token_login" value="<?php echo $_SESSION['csrf_token_login']; ?>">
                            <div class="form-group">
                                <label for="username">Username:</label>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Login</button>
                            <p class="text-center">Belum punya akun? Silakan <a href="register.php">Daftar</a>.</p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS dan jQuery -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
