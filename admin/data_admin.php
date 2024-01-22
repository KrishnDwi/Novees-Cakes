<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['loggedin_admin']) || $_SESSION['loggedin_admin'] !== true) {
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
        <div class="side-bar">
            <div class="navbar-nav">
                <h2>Hi,
                    <?= $_SESSION['nama_admin'] ?>
                </h2>
                <a href="./data_pelanggan.php">Data Pelanggan</a>
                <a href="./data_menu.php">Data Menu</a>
                <a href="./data_admin.php">Data Admin</a>
                <a href="./data_order.php">Data Order</a>
                <a href="../logout.php">Logout</a>
            </div>
        </div>
        <div class="container">
            <div class="content">
                <div class="header">
                    <h1>Data Admin</h1>
                    <hr>
                </div>
                <a href="../add_admin.php">
                    <button class="primary-btn">
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
                        <th colspan=2>Action</th>
                    </tr>
                    <?php
                    require_once '../process_admin.php';
                    $view_admin = new Admin($pdo);
                    $admin = $view_admin->getAllAdmin();
                    foreach ($admin as $view_admin) {
                        ?>
                        <tr>
                            <td>
                                <?php echo htmlspecialchars($view_admin['id_admin']) ?>
                            </td>
                            <td>
                                <?php echo htmlspecialchars($view_admin['nama_admin']) ?>
                            </td>
                            <td>
                                <?php echo htmlspecialchars($view_admin['no_telp']) ?>
                            </td>
                            <td>
                                <?php echo htmlspecialchars($view_admin['alamat']) ?>
                            </td>
                            <td>
                                <?php echo htmlspecialchars($view_admin['username']) ?>
                            </td>
                            <td>
                                <?php echo htmlspecialchars($view_admin['password']) ?>
                            </td>
                            <td> <a href="../update_admin.php?id_admin=<?php echo $view_admin['id_admin']; ?>">
                                    <button class="confirm-btn">Update</button>
                                </a>
                            </td>
                            <td>
                                <form method="post">
                                    <input type="hidden" name="id_admin_to_delete"
                                        value="<?php echo $view_admin['id_admin']; ?>">
                                    <button class="cancel-btn" type="submit" name="delete_admin">Delete</button>
                                </form>
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