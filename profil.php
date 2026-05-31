<?php

session_start();

if(!isset($_SESSION['login'])){
    header("Location: login.php");
    exit;
}

include 'koneksi.php';

/* =========================
   CEK TABEL PROFIL
========================= */

mysqli_query(
$koneksi,
"CREATE TABLE IF NOT EXISTS profil_usaha(
id INT AUTO_INCREMENT PRIMARY KEY,
nama_usaha VARCHAR(100),
alamat TEXT,
telepon VARCHAR(30)
)"
);

/* =========================
   SIMPAN PROFIL
========================= */

if(isset($_POST['simpan'])){

    $nama = $_POST['nama_usaha'];
    $alamat = $_POST['alamat'];
    $telepon = $_POST['telepon'];

    $cek = mysqli_query(
    $koneksi,
    "SELECT * FROM profil_usaha"
    );

    if(mysqli_num_rows($cek) > 0){

        mysqli_query(
        $koneksi,
        "UPDATE profil_usaha SET
        nama_usaha='$nama',
        alamat='$alamat',
        telepon='$telepon'"
        );

    }
    else{

        mysqli_query(
        $koneksi,
        "INSERT INTO profil_usaha(
        nama_usaha,
        alamat,
        telepon
        )
        VALUES(
        '$nama',
        '$alamat',
        '$telepon'
        )"
        );

    }

    echo "
    <script>
        alert('Profil berhasil disimpan');
        window.location='profil.php';
    </script>
    ";

}

/* =========================
   AMBIL DATA PROFIL
========================= */

$query = mysqli_query(
$koneksi,
"SELECT * FROM profil_usaha LIMIT 1"
);

$data = mysqli_fetch_assoc($query);

?>

<!DOCTYPE html>
<html>

<head>

    <title>Profil Usaha</title>

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

        /* FORM */

        label{
            display:block;
            margin-bottom:10px;
            font-weight:600;
        }

        input,
        textarea{
            width:100%;
            padding:14px;
            border:1px solid #cbd5e1;
            border-radius:12px;
            margin-bottom:20px;
            outline:none;
        }

        textarea{
            min-height:120px;
            resize:none;
        }

        /* BUTTON */

        button{
            background:#10b981;
            color:white;
            border:none;
            padding:12px 20px;
            border-radius:12px;
        }

        button:hover{
            background:#059669;
        }

        .kembali{
            background:#64748b;
            color:white;
            padding:12px 20px;
            border-radius:12px;
            text-decoration:none;
            margin-left:10px;
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

        <h2>Profil Usaha</h2>

    </div>

    <div class="card-box">

        <form method="POST">

            <label>Nama Usaha</label>

            <input
            type="text"
            name="nama_usaha"
            value="<?php echo $data['nama_usaha'] ?? ''; ?>"
            required>

            <label>Alamat Usaha</label>

            <textarea
            name="alamat"
            required><?php echo $data['alamat'] ?? ''; ?></textarea>

            <label>No Telepon</label>

            <input
            type="text"
            name="telepon"
            value="<?php echo $data['telepon'] ?? ''; ?>"
            required>

            <button
            type="submit"
            name="simpan">

                Simpan Profil

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