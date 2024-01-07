<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Novee's Cakes</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <div class="login">
        <div class="container">
            <h1>Register</h1>
            <form action="" method="POST">
                <input type="text" name="nama_pelanggan" placeholder="Nama">
                <input type="text" name="telp" placeholder="Telepon">
                <input type="text" name="alamat" placeholder="Alamat">
                <input type="text" name="username" placeholder="Username">
                <input type="password" name="password" placeholder="Password">
                <input type="submit" name="submit_register" value="Register">
            </form>
            <?php include_once 'add_pelanggan.php'; ?>

            <p>Sudah punya akun? <a href="login.php">Login</a></p>
        </div>
    </div>
</body>
</html>