```php
<?php

session_start();

if(!isset($_SESSION['login'])){
    header("Location: login.php");
    exit;
}

include 'koneksi.php';

/* =========================
   PROFIL USAHA
========================= */

$profilQuery = mysqli_query(
$koneksi,
"SELECT * FROM profil_usaha LIMIT 1"
);

$profil = mysqli_fetch_assoc($profilQuery);

$namaUsaha = $profil['nama_usaha'] ?? 'OmsetKu';

/* =========================
   TOTAL OMSET
========================= */

$omsetQuery = mysqli_query(
$koneksi,
"SELECT SUM(total_harga) as total_omset FROM transaksi"
);

$omsetData = mysqli_fetch_assoc($omsetQuery);

$totalOmset = $omsetData['total_omset'];

if($totalOmset == null){
    $totalOmset = 0;
}

/* =========================
   TOTAL PROFIT
========================= */

$profitQuery = mysqli_query(
$koneksi,
"SELECT SUM(profit) as total_profit FROM transaksi"
);

$profitData = mysqli_fetch_assoc($profitQuery);

$totalProfit = $profitData['total_profit'];

if($totalProfit == null){
    $totalProfit = 0;
}

/* =========================
   TOTAL TRANSAKSI
========================= */

$transaksiQuery = mysqli_query(
$koneksi,
"SELECT COUNT(*) as total_transaksi FROM transaksi"
);

$transaksiData = mysqli_fetch_assoc($transaksiQuery);

$totalTransaksi = $transaksiData['total_transaksi'];

?>

<!DOCTYPE html>
<html>

<head>

    <title>Dashboard OmsetKu</title>

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

        /* SIDEBAR */

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
            transition:0.3s;
        }

        .sidebar-menu li:hover{
            background:rgba(255,255,255,0.15);
        }

        .sidebar-menu a{
            color:white;
            text-decoration:none;
            font-size:15px;
            display:block;
        }

        .sidebar-menu i{
            margin-right:10px;
        }

        /* MAIN */

        .main{
            margin-left:260px;
            padding:30px;
        }

        /* TOPBAR */

        .topbar{
            background:white;
            padding:18px 30px;
            border-radius:16px;
            display:flex;
            justify-content:space-between;
            align-items:center;
            box-shadow:0 4px 15px rgba(0,0,0,0.05);
            margin-bottom:30px;
        }

        .topbar h2{
            margin:0;
            font-size:24px;
            font-weight:700;
        }

        .profile{
            font-weight:600;
            color:#334155;
            margin-right:15px;
        }

        /* CARDS */

        .dashboard-cards{
            display:grid;
            grid-template-columns:repeat(auto-fit,minmax(250px,1fr));
            gap:20px;
            margin-bottom:30px;
        }

        .card-box{
            background:white;
            padding:30px;
            border-radius:20px;
            box-shadow:0 4px 15px rgba(0,0,0,0.05);
        }

        .card-box h3{
            font-size:18px;
            color:#64748b;
            margin-bottom:15px;
        }

        .card-box p{
            font-size:34px;
            font-weight:700;
            color:#10b981;
            margin:0;
        }

        /* MENU BUTTON */

        .menu-grid{
            display:grid;
            grid-template-columns:repeat(auto-fit,minmax(220px,1fr));
            gap:20px;
        }

        .menu-item{
            background:white;
            border-radius:20px;
            padding:25px;
            text-align:center;
            box-shadow:0 4px 15px rgba(0,0,0,0.05);
            transition:0.3s;
        }

        .menu-item:hover{
            transform:translateY(-5px);
        }

        .menu-item i{
            font-size:38px;
            color:#10b981;
            margin-bottom:15px;
        }

        .menu-item h4{
            margin-bottom:10px;
            font-size:20px;
        }

        .menu-item a{
            text-decoration:none;
            color:#0f172a;
        }

        /* LOGOUT */

        .logout{
            background:#ef4444;
            color:white;
            padding:10px 20px;
            border:none;
            border-radius:12px;
            text-decoration:none;
        }

        .logout:hover{
            background:#dc2626;
            color:white;
        }

    </style>

</head>

<body>

<!-- SIDEBAR -->

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

        <li>
            <a href="reset.php">
                <i class="fa fa-rotate-left"></i>
                Reset Data
            </a>
        </li>

    </ul>

</div>

<!-- MAIN -->

<div class="main">

    <!-- TOPBAR -->

    <div class="topbar">

        <h2>Dashboard Keuangan</h2>

        <div>

            <span class="profile">
                <?php echo $namaUsaha; ?>
            </span>

            <a
            href="logout.php"
            class="logout">

                Logout

            </a>

        </div>

    </div>

    <!-- CARDS -->

    <div class="dashboard-cards">

        <div class="card-box">

            <h3>Total Omset</h3>

            <p>
                Rp <?php echo number_format($totalOmset,0,',','.'); ?>
            </p>

        </div>

        <div class="card-box">

            <h3>Total Profit</h3>

            <p>
                Rp <?php echo number_format($totalProfit,0,',','.'); ?>
            </p>

        </div>

        <div class="card-box">

            <h3>Total Transaksi</h3>

            <p>
                <?php echo $totalTransaksi; ?>
            </p>

        </div>

    </div>

    <!-- MENU -->

    <div class="menu-grid">

        <div class="menu-item">

            <a href="menu.php">

                <i class="fa fa-plus"></i>

                <h4>Tambah Menu</h4>

            </a>

        </div>

        <div class="menu-item">

            <a href="menu_list.php">

                <i class="fa fa-box"></i>

                <h4>Data Menu</h4>

            </a>

        </div>

        <div class="menu-item">

            <a href="transaksi.php">

                <i class="fa fa-cart-shopping"></i>

                <h4>POS Transaksi</h4>

            </a>

        </div>

        <div class="menu-item">

            <a href="riwayat.php">

                <i class="fa fa-file-lines"></i>

                <h4>Riwayat</h4>

            </a>

        </div>

        <div class="menu-item">

            <a href="profit_alert.php">

                <i class="fa fa-chart-column"></i>

                <h4>Profit Alert</h4>

            </a>

        </div>

        <div class="menu-item">

            <a href="profil.php">

                <i class="fa fa-store"></i>

                <h4>Profil Usaha</h4>

            </a>

        </div>

    </div>

</div>

</body>

</html>
```
