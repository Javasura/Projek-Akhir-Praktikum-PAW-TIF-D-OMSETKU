<?php

include 'koneksi.php';

mysqli_query(
$conn,
"DELETE FROM transaksi"
);

mysqli_query(
$conn,
"ALTER TABLE transaksi AUTO_INCREMENT = 1"
);

header("Location: dashboard.php");

?>