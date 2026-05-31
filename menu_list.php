# FULL `menu_list.php`

```php
<?php

session_start();

if(!isset($_SESSION['login'])){
    header("Location: login.php");
    exit;
}

include 'koneksi.php';

/* =========================
   HAPUS MENU
========================= */

if(isset($_GET['hapus'])){

    $id = $_GET['hapus'];

    mysqli_query(
    $koneksi,
    "DELETE FROM menu WHERE id='$id'"
    );

    header("Location: menu_list.php");

}

/* =========================
   AMBIL DATA MENU
========================= */

$data = mysqli_query(
$koneksi,
"SELECT * FROM menu ORDER BY id DESC"
);

?>

<!DOCTYPE html>
<html>

<head>

    <title>Data Menu</title>

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
            padding:30px;
            border-radius:20px;
            box-shadow:0 4px 15px rgba(0,0,0,0.05);
        }

        /* TABLE */

        table{
            width:100%;
            border-collapse:collapse;
        }

        table th{
            background:#10b981;
            color:white;
            padding:15px;
            text-align:left;
        }

        table td{
            padding:15px;
            border-bottom:1px solid #e2e8f0;
        }

        table tr:hover{
            background:#f8fafc;
        }

        /* BUTTON */

        .hapus{
            background:#ef4444;
            color:white;
            padding:8px 14px;
            border-radius:10px;
            text-decoration:none;
        }

        .hapus:hover{
            background:#dc2626;
            color:white;
        }

        .kembali{
            display:inline-block;
            margin-top:20px;
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

        <h2>Data Menu</h2>

    </div>

    <div class="card-box">

        <table>

            <tr>

                <th>No</th>
                <th>Nama Menu</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Aksi</th>

            </tr>

            <?php

            $no = 1;

            while($d = mysqli_fetch_assoc($data)){

            ?>

            <tr>

                <td>
                    <?php echo $no++; ?>
                </td>

                <td>
                    <?php echo $d['nama_menu']; ?>
                </td>

                <td>
                    Rp <?php echo number_format($d['harga'],0,',','.'); ?>
                </td>

                <td>
                    <?php echo $d['stok']; ?>
                </td>

                <td>

                    <a
                    href="menu_list.php?hapus=<?php echo $d['id']; ?>"
                    class="hapus"
                    onclick="return confirm('Yakin ingin hapus menu?')">

                        Hapus

                    </a>

                </td>

            </tr>

            <?php } ?>

        </table>

        <a
        href="dashboard.php"
        class="kembali">

            Kembali Dashboard

        </a>

    </div>

</div>

</body>
</html>
```
