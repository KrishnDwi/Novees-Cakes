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
            <h1>Data Admin</h1>
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
            <a href="../add_admin.php">
                    <button class="btn">
                        Add Admin
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
                require_once '../process_admin.php';
                $view_admin = new Admin($pdo);
                $admin = $view_admin->getAllAdmin();
                foreach ($admin as $view_admin) 
                {
                ?>
                    <tr>
                        <td> <?php echo htmlspecialchars($view_admin['id_admin']) ?> </td>
                        <td> <?php echo htmlspecialchars($view_admin['nama_admin']) ?> </td >
                        <td> <?php echo htmlspecialchars($view_admin['no_telp']) ?> </td >
                        <td> <?php echo htmlspecialchars($view_admin['alamat']) ?> </td >
                        <td> <?php echo htmlspecialchars($view_admin['username']) ?> </td >
                        <td> <?php echo htmlspecialchars($view_admin['password']) ?> </td >
                        <td> <a href="../update_admin.php?id_admin=<?php echo $view_admin['id_admin']; ?>">Update</a> </td >
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