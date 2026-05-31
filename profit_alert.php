<?php

session_start();

if(!isset($_SESSION['login'])){
    header("Location: login.php");
    exit;
}

include 'koneksi.php';

/* =========================
   TOTAL PROFIT
========================= */

$query = mysqli_query(
$koneksi,
"SELECT SUM(profit) as total_profit FROM transaksi"
);

$data = mysqli_fetch_assoc($query);

$totalProfit = $data['total_profit'];

if($totalProfit == null){
    $totalProfit = 0;
}

/* =========================
   STATUS PROFIT
========================= */

if($totalProfit >= 500000){

    $status = "Profit Sangat Bagus";
    $warna = "#10b981";

}
elseif($totalProfit >= 100000){

    $status = "Profit Cukup Stabil";
    $warna = "#f59e0b";

}
else{

    $status = "Profit Masih Rendah";
    $warna = "#ef4444";

}

?>

<!DOCTYPE html>
<html>

<head>

    <title>Profit Alert</title>

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
            padding:20px 30px;
            border-radius:16px;
            box-shadow:0 4px 15px rgba(0,0,0,0.05);
            margin-bottom:30px;
        }

        .topbar h2{
            margin:0;
            font-size:24px;
            font-weight:700;
        }

        /* CARD */

        .card-box{
            background:white;
            padding:40px;
            border-radius:20px;
            box-shadow:0 4px 15px rgba(0,0,0,0.05);
        }

        .profit-box{
            text-align:center;
        }

        .profit-box i{
            font-size:70px;
            color:#10b981;
            margin-bottom:20px;
        }

        .profit-box h1{
            font-size:48px;
            color:#10b981;
            margin-bottom:20px;
            font-weight:700;
        }

        .status{
            padding:18px;
            border-radius:14px;
            color:white;
            font-size:20px;
            font-weight:600;
            background:<?php echo $warna; ?>;
        }

        /* BUTTON */

        .kembali{
            display:inline-block;
            margin-top:25px;
            background:#64748b;
            color:white;
            padding:12px 20px;
            border-radius:12px;
            text-decoration:none;
        }

        .kembali:hover{
            background:#475569;
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

    <div class="topbar">

        <h2>Profit Alert</h2>

    </div>

    <div class="card-box">

        <div class="profit-box">

            <i class="fa fa-chart-line"></i>

            <h1>

                Rp <?php echo number_format($totalProfit,0,',','.'); ?>

            </h1>

            <div class="status">

                <?php echo $status; ?>

            </div>

            <a
            href="dashboard.php"
            class="kembali">

                Kembali Dashboard

            </a>

        </div>

    </div>

</div>

</body>
</html>