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
            <h1>Data Order</h1>
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
                <a href="../add_orders.php">
                    <button class="btn">
                        Add Orders
                    </button>
                </a>
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Nama Pelanggan</th>
                        <th>Nama Menu</th>
                        <th>Total Harga</th>
                        <th>Action</th>
                    </tr>
                    <?php
                    require_once '../process_orders.php';
                    $view_orders = new Orders($pdo);
                    $orders = $view_orders->getAllJoinOrders();
                    foreach ($orders as $view_orders) {
                    ?>
                        <tr>
                            <td>
                                <?php echo $view_orders['id_orders'] ?>
                            </td>
                            <td>
                                <?php echo $view_orders['nama_pelanggan'] ?>
                            </td>
                            <td>
                                <?php echo $view_orders['nama_menu'] ?>
                            </td>
                            <td>
                                <?php echo $view_orders['total_harga'] ?>
                            </td>
                            <td>
                                <a href="../update_orders.php?id_orders=<?php echo $view_orders['id_orders']; ?>">Update</a>
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