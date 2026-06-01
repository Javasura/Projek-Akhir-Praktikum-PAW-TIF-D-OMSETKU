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
        $koneksi,
        "SELECT * FROM users
        WHERE email='$email'"
    );

    if(mysqli_num_rows($query) > 0){

        $user = mysqli_fetch_assoc($query);

        if($user['password'] == $password){

            $_SESSION['login'] = true;
            $_SESSION['email'] = $email;

            header("Location: dashboard.php");
            exit;

        }else{

            $error = "Email atau Password salah!";

        }

    }else{

        $error = "Email atau Password salah!";

    }

}

?>

<!DOCTYPE html>
<html>

<head>

    <title>Login OmsetKu</title>

    <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet">

    <link rel="stylesheet" href="css/style.css">

</head>

<body>

<div class="container">

    <div class="card login-card">

        <h1>Login</h1>

        <p class="subtitle">
            Silakan login ke aplikasi OmsetKu
        </p>

        <?php if(isset($error)){ ?>

            <div class="alert alert-danger">

                <?php echo $error; ?>

            </div>

        <?php } ?>

        <form method="POST">

            <input
            type="email"
            name="email"
            placeholder="Masukkan Email"
            required>

            <input
            type="password"
            name="password"
            placeholder="Masukkan Password"
            required>

            <br><br>

            <button
            type="submit"
            name="login">

                Login

            </button>

        </form>

        <div style="margin-top:25px;">

            <a href="register.php">

                <button
                type="button">

                    Sign In

                </button>

            </a>

        </div>

    </div>

</div>

</body>

</html>