<?php

include 'koneksi.php';

/* AMBIL DATA FORM */

$nama = $_POST['nama_menu'];

$harga = $_POST['harga'];

$stok = $_POST['stok'];

$modal = $_POST['modal'];

/* QUERY SIMPAN */

mysqli_query(
$conn,
"INSERT INTO menu
VALUES(
'',
'$nama',
'$harga',
'$stok',
'$modal'
)"
);

/* KEMBALI */

header("Location: menu_list.php");

?>