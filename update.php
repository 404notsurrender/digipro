<?php
include_once "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $nama = $_POST["nama"];
    $harga = $_POST["harga"];
    $stok = $_POST["stok"];

    $sql = "UPDATE barang SET nama='$nama', harga=$harga, stok=$stok WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Barang berhasil diubah.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
