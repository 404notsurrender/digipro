<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-dark bg-dark">
    <!-- Navbar Content -->
    <a class="navbar-brand" href="<?php echo $websitename; ?>">Secure Programming</a>
    <!-- Navbar Element -->
    <ul class="nav justify-content-center">
  <li class="nav-item">
    <a class="nav-link" href="./auth/login.php">Login</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="./auth/register.php">Register</a>
  </li>
</ul>
</nav>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
        <div class="alert alert-success" role="alert">Selamat Datang</div>
        </div>
    </div>
<!-- Bootstrap JS dan jQuery -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>