<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['loggedin_admin']) || $_SESSION['loggedin_admin'] !== true) {
    header("Location: ../login_admin.php");
    exit();
}
require_once '../process_menu.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Admin | Dashboard</title>
</head>

<body>
    <div class="admin">
        <div class="header">
            <h1>Data Menu</h1>
        </div>
        <div class="container">
            <div class="side-bar">
                <div class="navbar-nav">
                    <a href="./index.php">Beranda</a>
                    <a href="./data_pelanggan.php">Data Pelanggan</a>
                    <a href="./data_menu.php">Data Menu</a>
                    <a href="./data_admin.php">Data Admin</a>
                    <a href="./data_order.php">Data Order</a>
                    <a href="../logout.php">Logout</a>
                </div>
            </div>

            <div class="content">
                <a href="../add_menu.php">
                    <button class="btn">
                        Add Menu
                    </button>
                </a>

                <table>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Harga</th>
                        <th>Gambar</th>
                        <th>Deskripsi</th>
                        <th>Action</th>

                    </tr>
                    <?php
                    $view_menu = new Menu($pdo);
                    $menu = $view_menu->getAllMenu();
                    foreach ($menu as $view_menu) {
                        ?>
                        <tr>
                            <td>
                                <?php echo htmlspecialchars($view_menu['id_menu']) ?>
                            </td>
                            <td>
                                <?php echo htmlspecialchars($view_menu['nama_menu']) ?>
                            </td>
                            <td>
                                <?php echo htmlspecialchars($view_menu['harga_menu']) ?>
                            </td>
                            <td> <img class='menu-image'
                                    src='../img/menu/<?php echo htmlspecialchars($view_menu['image']) ?>' alt="ga kebaca">
                            </td>
                            <td>
                                <?php echo htmlspecialchars($view_menu['deskripsi']) ?>
                            </td>
                            <td>
                                <a href="../update_menu.php?id_menu=<?php echo $view_menu['id_menu']; ?>">Update</a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
</body>

</html>