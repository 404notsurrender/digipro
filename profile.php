<?php
if (isset($_POST['profile'])) {
    $username = $conn->real_escape_string(trim(filter($_POST['username'])));
    $email = $conn->real_escape_string(trim(filter($_POST['email'])));
    $password = $conn->real_escape_string(trim(filter($_POST['password'])));

            $cek_email = $conn->query("SELECT * FROM users WHERE email = '$email'");
            $cek_email_ulang = mysqli_num_rows($cek_email);
            $data_email = mysqli_fetch_assoc($cek_email);

            $error = array();
            if (empty($username)) {
		        $error ['username'] = '*Tidak Boleh Kosong.';
            }
            if (empty($email)) {
                $error ['email'] = '*Tidak Boleh Kosong.';
            } else if ($cek_email_ulang > 0) {
                $error ['email'] = '*Email Sudah Terdaftar.';
            }
            if (empty($password)) {
                $error ['password'] = '*Tidak Boleh Kosong.';
            }
            if ($conn->query("UPDATE users SET username = '$username', email = '$email' WHERE username = '$sess_username'") == true) {
                $_SESSION['hasil'] = array('alert' => 'success', 'judul' => 'Berhasil', 'pesan' => 'Yeah, Data Profil Kamu Berhasil Diubah.<script>swal("Berhasil!", "Data Profil Kamu Berhasil Diubah.", "success");</script>');
         } else {
                $_SESSION['hasil'] = array('alert' => 'danger', 'judul' => 'Gagal', 'pesan' => 'Ups, Gagal! Sistem Kami Sedang Mengalami Gangguan.<script>swal("Ups Gagal!", "Sistem Kami Sedang Mengalami Gangguan.", "error");</script>');
            }

     } else if (isset($_POST['ganti_password'])) {
        $password = $conn->real_escape_string(trim(filter($_POST['password_lama'])));
        $password_baru = $conn->real_escape_string(trim(filter($_POST['password_baru'])));
        $konf_pass_baru = $conn->real_escape_string(trim(filter($_POST['konf_pass_baru'])));

        $cek_passwordnya = password_verify($password, $data_user['password']);
        $hash_passwordnya = password_hash($password_baru, PASSWORD_DEFAULT);

        $error = array();
        if (empty($password)) {
            $error ['password_lama'] = '*Tidak Boleh Kosong.';
        }
        if (empty($password_baru)) {
            $error ['password_baru'] = '*Tidak Boleh Kosong.';
        } else if (strlen($password_baru) < 6 ){
            $error ['password_baru'] = '*Kata Sandi Minimal 6 Karakter.';
        }
        if (empty($konf_pass_baru)) {
            $error ['konf_pass_baru'] = '*Tidak Boleh Kosong.';
        } else if (strlen($konf_pass_baru) < 6 ){
            $error ['konf_pass_baru'] = '*Kata Sandi Minimal 6 Karakter.';
        } else if ($password_baru <> $konf_pass_baru){
            $error ['konf_pass_baru'] = '*Konfirmasi Kata Sandi Baru Tidak Sesuai.';
        } else {

        if ($cek_passwordnya <> $data_user['password']) {
            $_SESSION['hasil'] = array('alert' => 'danger', 'pesan' => 'Ups, Kata Sandi Lama Yang Kamu Masukkan Tidak Sesuai.<script>swal("Gagal!", "Kata Sandi Lama Yang Kamu Masukkan Tidak Sesuai.", "error");</script>');
        } else {

           if ($conn->query("UPDATE users SET password = '$hash_passwordnya' WHERE username = '$sess_username'") == true) {
               $_SESSION['hasil'] = array('alert' => 'success', 'pesan' => 'Sip! Kata Sandi Kamu Berhasil Diubah.<script>swal("Berhasil!", "Kata Sandi Kamu Berhasil Diubah.", "success");</script>');
        } else {
               $_SESSION['hasil'] = array('alert' => 'danger', 'pesan' => 'Ups, Gagal! Sistem Kami Sedang Mengalami Gangguan.<script>swal("Ups Gagal!", "Sistem Kami Sedang Mengalami Gangguan.", "error");</script>');
           }

        }
    
    }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengaturan Akun</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>

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
