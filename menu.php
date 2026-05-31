<?php

session_start();

if(!isset($_SESSION['login'])){
    header("Location: login.php");
    exit;
}

include 'koneksi.php';

if(isset($_POST['simpan'])){

    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    mysqli_query(
    $koneksi,
    "INSERT INTO menu(nama_menu,harga,stok)
    VALUES('$nama','$harga','$stok')"
    );

    echo "
    <script>
        alert('Menu berhasil ditambahkan');
        window.location='menu.php';
    </script>
    ";
}

?>

<!DOCTYPE html>
<html>

<head>

    <title>Tambah Menu</title>

    <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet">

    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>

        body{
            margin:0;
            font-family:'Poppins',sans-serif;
            background:#f5f7fb;
        }

        .sidebar{
            width:260px;
            height:100vh;
            background:#10c9a7;
            position:fixed;
            left:0;
            top:0;
            color:white;
            padding-top:20px;
        }

        .logo{
            font-size:32px;
            font-weight:700;
            padding-left:25px;
            margin-bottom:30px;
        }

        .sidebar-menu{
            padding:0;
            list-style:none;
        }

        .sidebar-menu li{
            padding:15px 25px;
        }

        .sidebar-menu li:hover{
            background:rgba(255,255,255,0.15);
        }

        .sidebar-menu a{
            color:white;
            text-decoration:none;
        }

        .sidebar-menu i{
            margin-right:10px;
        }

        .main{
            margin-left:260px;
            padding:30px;
        }

        .topbar{
            background:white;
            padding:20px;
            border-radius:16px;
            margin-bottom:30px;
            box-shadow:0 4px 15px rgba(0,0,0,0.05);
        }

        .card-box{
            background:white;
            padding:30px;
            border-radius:20px;
            box-shadow:0 4px 15px rgba(0,0,0,0.05);
        }

        input{
            width:100%;
            padding:14px;
            border:1px solid #cbd5e1;
            border-radius:12px;
            margin-bottom:20px;
        }

        button{
            background:#10b981;
            color:white;
            border:none;
            padding:12px 20px;
            border-radius:12px;
        }

        .kembali{
            background:#64748b;
            text-decoration:none;
            color:white;
            padding:12px 20px;
            border-radius:12px;
            margin-left:10px;
        }

    </style>

</head>

<body>

<div class="sidebar">

    <div class="logo">
        OmsetKu
    </div>

    <ul class="sidebar-menu">

        <li>
            <a href="dashboard.php">
                <i class="fa fa-chart-line"></i>
                Dashboard
            </a>
        </li>

        <li>
            <a href="menu.php">
                <i class="fa fa-burger"></i>
                Tambah Menu
            </a>
        </li>

        <li>
            <a href="menu_list.php">
                <i class="fa fa-list"></i>
                Data Menu
            </a>
        </li>

        <li>
            <a href="transaksi.php">
                <i class="fa fa-cash-register"></i>
                POS Transaksi
            </a>
        </li>

        <li>
            <a href="riwayat.php">
                <i class="fa fa-clock-rotate-left"></i>
                Riwayat
            </a>
        </li>

        <li>
            <a href="profit_alert.php">
                <i class="fa fa-triangle-exclamation"></i>
                Profit Alert
            </a>
        </li>

        <li>
            <a href="profil.php">
                <i class="fa fa-user"></i>
                Profil Usaha
            </a>
        </li>

    </ul>

</div>

<div class="main">

    <div class="topbar">
        <h2>Tambah Menu</h2>
    </div>

    <div class="card-box">

        <form method="POST">

            <label>Nama Menu</label>

            <input
            type="text"
            name="nama"
            required>

            <label>Harga</label>

            <input
            type="number"
            name="harga"
            required>

            <label>Stok</label>

            <input
            type="number"
            name="stok"
            required>

            <button
            type="submit"
            name="simpan">

                Simpan Menu

            </button>

            <a
            href="dashboard.php"
            class="kembali">

                Kembali

            </a>

        </form>

    </div>

</div>

</body>
</html>