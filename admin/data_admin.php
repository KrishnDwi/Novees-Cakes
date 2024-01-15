<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: ../login_admin.php");
    exit();
}

//view admin
require_once '../add_admin.php';
$view_admin = new Admin($pdo);
$admin = $view_admin->getAllAdmin();
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
            <button id="show-pop-up">
                    Add Admin
                </button>
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
                foreach ($admin as $view_admin) 
                {
                    echo "<tr>";
                        echo "<td>" . htmlspecialchars($view_admin['id_admin']) . "</td>";
                        echo "<td>" . htmlspecialchars($view_admin['nama_admin']) . "</td >";
                        echo "<td>" . htmlspecialchars($view_admin['no_telp']) . "</td >";
                        echo "<td>" . htmlspecialchars($view_admin['alamat']) . "</td >";
                        echo "<td>" . htmlspecialchars($view_admin['username']) . "</td >";
                        echo "<td>" . htmlspecialchars($view_admin['password']) . "</td >";
                        echo "<td>" . htmlspecialchars($view_admin['password']) . "</td >";
                    echo "</tr>";
                }
            ?>
                </table>
                <div class="pop-up-menu">
            <div class="close-btn">
                <button>
                &times;
                </button>
            </div>
            <h2>Add Admin</h2>
            <hr>
            <form method="POST" >
                <label for="nama_admin">Nama Admin</label>
                <input type="text" name="nama_admin" required>
                
                <label for="no_telp">Telepon</label>
                <input type="text" name="no_telp" required>
                
                <label for="alamat">Alamat</label>
                <input type="text" name="alamat" required>

                <label for="username">Username</label>
                <input type="text" name="username" required>

                <label for="password">Password</label>
                <input type="text" name="password" required>

                
                <input type="submit" name="add_admin" value="Add">
            </form>
        </div>
            </div>
        </div>
    </div>
</body>
<script>
    // pop up modal form menu
document.querySelector("#show-pop-up").addEventListener("click",function(){
    document.querySelector(".pop-up-menu").classList.add("active");
});
document.querySelector(".pop-up-menu .close-btn").addEventListener("click",function(){
    document.querySelector(".pop-up-menu").classList.remove("active");
});
</script>

</html>