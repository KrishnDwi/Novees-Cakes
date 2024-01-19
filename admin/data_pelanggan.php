<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: ../login_admin.php");
    exit();
}
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
            <h1>Data Pelanggan</h1>
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
                <a href="../add_pelanggan.php">
                    <button class="btn">
                        Add Pelanggan
                    </button>
                </a>
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>No Telepon</th>
                        <th>Alamat</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Action</th>
                    </tr>
                    <?php
                    require_once '../process_pelanggan.php';
                    $view_pelanggan = new Pelanggan($pdo);
                    $pelanggan = $view_pelanggan->getAllPelanggan();
                    foreach ($pelanggan as $view_pelanggan) {
                    ?>
                        <tr>
                            <td>
                                <?php echo $view_pelanggan['id_pelanggan'] ?>
                            </td>
                            <td>
                                <?php echo $view_pelanggan['nama_pelanggan'] ?>
                            </td>
                            <td>
                                <?php echo $view_pelanggan['no_telp'] ?>
                            </td>
                            <td>
                                <?php echo $view_pelanggan['alamat'] ?>
                            </td>
                            <td>
                                <?php echo $view_pelanggan['username'] ?>
                            </td>
                            <td>
                                <?php echo $view_pelanggan['password'] ?>
                            </td>
                            <td>
                                <a href="../update_pelanggan.php?id_pelanggan=<?php echo $view_pelanggan['id_pelanggan']; ?>">Update</a>
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