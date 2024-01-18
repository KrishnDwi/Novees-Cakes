<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: ../login_admin.php");
    exit();
}
//view menu
require_once '../add_menu.php';
$view_menu = new Menu($pdo);
$menu = $view_menu->getAllMenu();
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
                <button id="show-pop-up">
                    Add Menu
                </button>

                <table>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Harga</th>
                        <th>Gambar</th>
                        <th>Deskripsi</th>

                    </tr>
            <?php
                foreach ($menu as $view_menu) 
                {
                    echo "<tr>";
                        echo "<td>" . htmlspecialchars($view_menu['id_menu']) . "</td>";
                        echo "<td>" . htmlspecialchars($view_menu['nama_menu']) . "</td >";
                        echo "<td>" . htmlspecialchars($view_menu['harga_menu']) . "</td >";
                        echo "<td>" . "<img class='menu-image' src='../img/menu/" . htmlspecialchars($view_menu['image']) . "'>" .  "</td >";
                        echo "<td>" . htmlspecialchars($view_menu['deskripsi']) . "</td >";
                    echo "</tr>";
                }
            ?>
                </table>
            </div>
        </div>
        <div class="pop-up-menu">
            <div class="close-btn">
                <button>
                &times;
                </button>
            </div>
            <h2>Add Menu</h2>
            <hr>
            <form method="POST" autocomplete="off" enctype="multipart/form-data">
                <label for="nama_menu">Nama Menu</label>
                <input type="text" name="nama_menu" required>
                
                <label for="harga_menu">Harga Menu</label>
                <input type="text" name="harga_menu" required>
                
                <label for="image">Gambar</label>
                <input type="file" name="image" id="image" accept=".jpg, .jpeg, .png">

                <label for="deskripsi">Deskripsi</label>
                <textarea name="deskripsi" id="" cols="30" rows="10" maxlength="255"></textarea>
                
                <input type="submit" name="add_menu" value="Add">
            </form>
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