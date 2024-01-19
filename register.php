<?php
    require_once 'process_pelanggan.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Novee's Cakes</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <div class="form-body">
        <div class="form-container">
            <div class="header">
                <h1>Register</h1>
            </div>
            <div class="content">
                <form method="POST">
                    <div class="row">
                        <div class="form-element">
                            <label for="nama_pelanggan">Nama Pelanggan</label>
                            <input type="text" name="nama_pelanggan">
                        </div>
                        <div class="form-element">
                            <label for="no_telp">Telepon</label>
                            <input type="text" name="no_telp"">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-element">
                            <label for="alamat">Alamat</label>
                            <input type="text" name="alamat">
                        </div>
                        <div class="form-element">
                            <label for="username">Username</label>
                            <input type="text" name="username">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-element">
                            <label for="password">Password</label>
                            <input type="text" name="password">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-element">
                            <input type="submit" name="submit_register" value="Register">
                            Kembali ke Halaman <a href="login.php">Login</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>