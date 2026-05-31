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

/* CARD */

.card-box{
    background:white;
    padding:30px;
    border-radius:20px;
    box-shadow:0 4px 15px rgba(0,0,0,0.05);
}

/* INPUT */

input,
select{
    width:100%;
    padding:14px;
    margin-top:12px;
    border-radius:12px;
    border:1px solid #cbd5e1;
    font-size:15px;
}

/* BUTTON */

button{
    background:#10b981;
    color:white;
    border:none;
    padding:12px 20px;
    border-radius:12px;
    cursor:pointer;
    font-weight:600;
}

button:hover{
    opacity:0.9;
}

/* TABLE */

table{
    width:100%;
    border-collapse:collapse;
}

table th{
    background:#10b981;
    color:white;
    padding:14px;
}

table td{
    padding:14px;
    border-bottom:1px solid #e2e8f0;
}

</style>

<!-- SIDEBAR -->

<div class="sidebar">

    <div class="logo">
        OmsetKu
    </div>

    <ul class="sidebar-menu">

        <li>
            <a href="dashboard.php">
                Dashboard
            </a>
        </li>

        <li>
            <a href="menu.php">
                Tambah Menu
            </a>
        </li>

        <li>
            <a href="menu_list.php">
                Data Menu
            </a>
        </li>

        <li>
            <a href="transaksi.php">
                POS Transaksi
            </a>
        </li>

        <li>
            <a href="riwayat.php">
                Riwayat
            </a>
        </li>

        <li>
            <a href="profit_alert.php">
                Profit Alert
            </a>
        </li>

        <li>
            <a href="profil.php">
                Profil Usaha
            </a>
        </li>

        <li>
            <a href="logout.php">
                Logout
            </a>
        </li>

    </ul>

</div>