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
                    <h1>Data Orders</h1>
                    <hr>
                </div>
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Nama Pelanggan</th>
                        <th>Nama Menu</th>
                        <th>Total Harga</th>
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