<?php

include 'koneksi.php';

$id = $_POST['id'];
$nama = $_POST['nama_menu'];
$harga = $_POST['harga'];

mysqli_query(
$conn,
"UPDATE menu SET
nama_menu='$nama',
harga='$harga'
WHERE id='$id'"
);

header("Location: menu_list.php");

?>