<?php

include 'koneksi.php';

$id = $_GET['id'];

$data = mysqli_query(
$conn,
"SELECT * FROM menu WHERE id='$id'"
);

$d = mysqli_fetch_array($data);

?>

<!DOCTYPE html>
<html>
<head>

<title>Edit Menu</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-5">

<a href="menu_list.php" class="btn btn-secondary mb-3">
← Kembali
</a>

<div class="card p-4">

<h2>Edit Menu</h2>

<form action="update_menu.php" method="POST">

<input type="hidden" name="id" value="<?php echo $d['id']; ?>">

<input
type="text"
name="nama_menu"
class="form-control mb-3"
value="<?php echo $d['nama_menu']; ?>"
>

<input
type="number"
name="harga"
class="form-control mb-3"
value="<?php echo $d['harga']; ?>"
>

<button class="btn btn-warning">
Update
</button>

</form>

</div>

</div>

</body>
</html>