<?php

include 'koneksi.php';

if(isset($_POST['register'])){

    $email = $_POST['email'];

    $password = $_POST['password'];

    /* CEK EMAIL */

    $cek = mysqli_query(
        $koneksi,
        "SELECT * FROM users
        WHERE email='$email'"
    );

    if(mysqli_num_rows($cek) > 0){

        $error = "Email sudah digunakan!";

    } else {

        mysqli_query(
            $koneksi,
            "INSERT INTO users(email,password)
            VALUES(
            '$email',
            '$password'
            )"
        );

        $success = "Register berhasil!";

    }

}

?>

<!DOCTYPE html>
<html>

<head>

    <title>Sign In OmsetKu</title>

    <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet">

    <link rel="stylesheet" href="css/style.css">

</head>

<body>

<div class="container">

    <div class="card login-card">

        <h1>Sign In</h1>

        <p class="subtitle">
            Buat akun baru OmsetKu
        </p>

        <?php if(isset($error)){ ?>

            <div class="alert alert-danger">

                <?php echo $error; ?>

            </div>

        <?php } ?>

        <?php if(isset($success)){ ?>

            <div class="alert alert-success">

                <?php echo $success; ?>

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
            name="register">

                Sign In

            </button>

        </form>

        <p style="margin-top:25px;">

            Sudah punya akun?

            <a href="login.php">
                Login disini
            </a>

        </p>

    </div>

</div>

</body>

</html>