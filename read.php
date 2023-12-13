<?php
include_once "config.php";

$sql = "SELECT * FROM barang";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"] . " - Nama: " . $row["nama"] . " - Harga: " . $row["harga"] . " - Stok: " . $row["stok"] . "<br>";
    }
} else {
    echo "Tidak ada barang.";
}

$conn->close();
?>
