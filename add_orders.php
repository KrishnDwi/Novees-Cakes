<?php
require_once 'process_orders.php';
require_once 'Menu.php';
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit();
}
$view_menu = new Menu($pdo);
$menu = $view_menu->getAllMenu();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Admin | Add orders</title>
</head>

<body>
    <div class="form-body">
        <div class="form-container">
            <div class="header">
                <h1>Add orders</h1>
            </div>
            <div class="content">
                <form method="POST">
                    <div class="row">
                        <div class="form-element">
                            <label>Nama Pelanggan</label>
                            <input type="text" name="id_pelanggan" value="<?= $_SESSION['id_pelanggan'] ?>" hidden>
                            <input type="text" value="<?= $_SESSION['nama_pelanggan'] ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-element">
                            <label for="nama_menu">Pilihan menu</label>
                            <div class="checkbox">
                                <?php foreach ($menu as $view_menu): ?>
                                    <div class="checkbox-element">
                                        <!-- Use an array for multiple selections -->
                                        <input type="checkbox" name="id_menu[]" value="<?= $view_menu['id_menu']; ?>"
                                            id="<?= $view_menu['id_menu']; ?>">
                                        <label for="<?= $view_menu['id_menu']; ?>">
                                            <?= $view_menu['nama_menu'] . ' - Rp.' . $view_menu['harga_menu'] ?>
                                        </label>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-element">
                            <label for="alamat">Alamat</label>
                            <input type="text" name="alamat" value="<?= $_SESSION['alamat'] ?>">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-element">
                            <input class="cancel-btn" type="submit" name="cancel_add" value="Cancel">
                        </div>
                        <div class="form-element">
                            <input type="submit" name="add_orders" value="Add">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>