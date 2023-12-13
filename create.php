<?php
include_once "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST["nama"];
    $harga = $_POST["harga"];
    $stok = $_POST["stok"];

    $sql = "INSERT INTO barang (nama, harga, stok) VALUES ('$nama', $harga, $stok)";

    if ($conn->query($sql) === TRUE) {
        echo "Barang berhasil ditambahkan.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
