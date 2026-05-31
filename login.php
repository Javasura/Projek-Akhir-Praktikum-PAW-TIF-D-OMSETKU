<?php

session_start();

include 'koneksi.php';

/* =========================
   PROSES LOGIN
========================= */

if(isset($_POST['login'])){

    $email = $_POST['email'];

    $password = $_POST['password'];

    $query = mysqli_query(
        $conn,
        "SELECT * FROM users
        WHERE email='$email'
        AND password='$password'"
    );

    $cek = mysqli_num_rows($query);

    if($cek > 0){

        $_SESSION['login'] = true;

        header("Location: dashboard.php");

        exit;

    } else {

        $error = "Email atau Password salah!";

    }

}

?>

<!DOCTYPE html>
<html>

<head>

    <title>Login OmsetKu</title>

    <!-- BOOTSTRAP -->

    <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet">

    <!-- CSS -->

    <link rel="stylesheet" href="css/style.css">

</head>

<body>

<div class="container">

    <div class="card login-card">

        <!-- TITLE -->

        <h1>Login</h1>

        <p class="subtitle">
            Silakan login ke aplikasi OmsetKu
        </p>

        <!-- ERROR -->

        <?php if(isset($error)){ ?>

            <div class="alert alert-danger">

                <?php echo $error; ?>

            </div>

        <?php } ?>

        <!-- FORM LOGIN -->

        <form method="POST">

            <!-- EMAIL -->

            <input
            type="email"
            name="email"
            placeholder="Masukkan Email"
            required>

            <!-- PASSWORD -->

            <input
            type="password"
            name="password"
            placeholder="Masukkan Password"
            required>

            <br><br>

            <!-- BUTTON LOGIN -->

            <button
            type="submit"
            name="login">

                Login

            </button>

        </form>

        <!-- BUTTON SIGN IN -->

        <div style="margin-top:25px;">

            <a href="register.php">

                <button
                type="button"
                class="back-button">

                    Sign In

                </button>

            </a>

        </div>

    </div>

</div>

</body>

</html>