<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['loggedin_admin']) || $_SESSION['loggedin_admin'] !== true) {
    header("Location: ../login_admin.php");
    exit();
}
require_once 'process_menu.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>

<body>
    <div class="form-body">
        <div class="form-container">
            <div class="header">
                <h1>Add Menu</h1>
            </div>
            <div class="content">
                <form method="POST" autocomplete="off" enctype="multipart/form-data">
                    <div class="form-element">
                        <label for="nama_menu">Nama Menu</label>
                        <input type="text" name="nama_menu">
                    </div>
                    <div class="form-element">
                        <label for="harga_menu">Harga Menu</label>
                        <input type="text" name="harga_menu">
                    </div>
                    <div class="form-element">
                        <label for="image">Gambar</label>
                        <input type="file" name="image" id="image" accept=".jpg, .jpeg, .png">
                    </div>
                    <div class="form-element">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea class="deskripsi" name="deskripsi" rows="10" maxlength="500"></textarea>
                    </div>
                    <div class="row">
                        <div class="form-element">
                            <input class="cancel-btn" type="submit" name="cancel_add" value="Cancel">
                        </div>
                        <div class="form-element">
                                <input type="submit" name="add_menu" value="Add">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>