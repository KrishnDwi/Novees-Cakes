<?php
require_once 'process_admin.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Admin | Add Admin</title>
</head>

<body>
    <div class="form-body">
        <div class="form-container">
            <div class="header">
                <h1>Add Admin</h1>
            </div>
            <div class="content">
                <form method="POST">
                    <div class="row">
                        <div class="form-element">
                            <input type="hidden" name="id_admin">
                            <label for="nama_admin">Nama Admin</label>
                            <input type="text" name="nama_admin">
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
                            <input class="confirm-btn" type="submit" name="add_admin" value="Add">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>