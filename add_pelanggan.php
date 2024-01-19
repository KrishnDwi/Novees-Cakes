<?php
require_once 'process_pelanggan.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Admin | Add Pelanggan</title>
</head>

<body>
    <div class="form-body">
        <div class="form-container">
            <div class="header">
                <h1>Add Pelanggan</h1>
            </div>
            <div class="content">
                <form method="POST">
                    <div class="row">
                        <div class="form-element">
                            <input type="hidden" name="id_pelanggan">
                            <label for="nama_pelanggan">Nama Pelanggan</label>
                            <input type="text" name="nama_pelanggan">
                        </div>
                        <div class="form-element">
                            <label for="no_telp">Telepon</label>
                            <input type="text" name="no_telp">
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
                            <input class="cancel-btn" type="submit" name="cancel_add" value="Cancel">
                        </div>
                        <div class="form-element">
                            <input type="submit" name="add_pelanggan" value="Add">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>