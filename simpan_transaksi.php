<?php

include 'koneksi.php';

$menu_id = $_POST['menu_id'];

$jumlah = (int) $_POST['jumlah'];

/* =========================
   AMBIL DATA MENU
========================= */

$query = mysqli_query(
$conn,
"SELECT * FROM menu WHERE id='$menu_id'"
);

$data = mysqli_fetch_assoc($query);

$nama_menu = $data['nama_menu'];

$harga = (int) $data['harga'];

$modal = (int) $data['modal'];

/* =========================
   HITUNG
========================= */

$total_harga = $harga * $jumlah;

$profit = ($harga - $modal) * $jumlah;

/* =========================
   SIMPAN TRANSAKSI
========================= */

mysqli_query(
$conn,
"INSERT INTO transaksi(

menu_id,
nama_menu,
jumlah,
total_harga,
profit

)

VALUES(

'$menu_id',
'$nama_menu',
'$jumlah',
'$total_harga',
'$profit'

)"
);

/* =========================
   UPDATE STOK
========================= */

mysqli_query(
$conn,
"UPDATE menu SET

stok = stok - $jumlah

WHERE id='$menu_id'
");

header("Location: transaksi.php");

?>