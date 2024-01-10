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
            <h1>Novee's Cakes</h1>
        </div>
        <div class="container">
            <div class="side-bar">
                <div class="navbar-nav">
                    <a href="#">Data Pelanggan</a>
                    <a href="#">Data Admin</a>
                    <a href="#">Data Order</a>
                    <a href="../logout.php">Logout</a>
                </div>
            </div>

            <div class="content">
            <?php
                require_once '../Pelanggan.php';
                $view_pelanggan = new Pelanggan($pdo);
                $pelanggan = $view_pelanggan->getAllPelanggan();
            ?>
                <table>
                    <tr>
                        <th>Id Pelanggan</th>
                        <th>Nama Pelanggan</th>
                        <th>No Telepon</th>
                        <th>Alamat</th>
                        <th>Username</th>
                        <th>Password</th>
                    </tr>
            <?php
                foreach ($pelanggan as $view_pelanggan) 
                {
                    echo "<tr>";
                        echo "<td>" . htmlspecialchars($view_pelanggan['id_pelanggan']) . "</td>";
                        echo "<td>" . htmlspecialchars($view_pelanggan['nama_pelanggan']) . "</td >";
                        echo "<td>" . htmlspecialchars($view_pelanggan['no_telp']) . "</td >";
                        echo "<td>" . htmlspecialchars($view_pelanggan['alamat']) . "</td >";
                        echo "<td>" . htmlspecialchars($view_pelanggan['username']) . "</td >";
                        echo "<td>" . htmlspecialchars($view_pelanggan['password']) . "</td >";
                    echo "</tr>";
                }
            ?>
                </table>
            </div>
        </div>
    </div>
</body>

</html>