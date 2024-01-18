<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: ../login_admin.php");
    exit();
}

require_once 'Pelanggan.php';


// Check if customer ID is provided in the query string
if (isset($_GET['id_pelanggan'])) {
    $id_pelanggan_to_update = $_GET['id_pelanggan'];

    // Create an instance of the Pelanggan class
    $pelanggan = new Pelanggan($pdo);

    // Retrieve existing customer data
    $existing_pelanggan_data = $pelanggan->getPelangganById($id_pelanggan_to_update);

    // Check if the form is submitted for updating
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_pelanggan'])) {
        $id_pelanggan = $_POST['id_pelanggan'];
        $nama_pelanggan = $_POST['nama_pelanggan'];
        $no_telp = $_POST['no_telp'];
        $alamat = $_POST['alamat'];
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Perform the update operation
        $pelanggan->updatePelanggan($id_pelanggan, $nama_pelanggan, $no_telp, $alamat, $username, $password);

        // Redirect to the customer list or any other desired page after updating
        header("Location: admin/data_pelanggan.php");
        exit();
    }
} else {
    // Redirect to the customer list if no customer ID is provided
    header("Location: admin/data_pelanggan.php");    
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Admin | Update Pelanggan</title>
</head>

<body>
    <div class="admin">
        <div class="header">
            <h1>Update Pelanggan</h1>
        </div>
        <div class="container">
            <div class="content">
                <form method="POST">
                    <input type="hidden" name="id_pelanggan" value="<?php echo $existing_pelanggan_data['id_pelanggan']; ?>">
                    <label for="nama_pelanggan">Nama Pelanggan</label>
                    <input type="text" name="nama_pelanggan" value="<?php echo htmlspecialchars($existing_pelanggan_data['nama_pelanggan']); ?>" required>

                    <label for="no_telp">Telepon</label>
                    <input type="text" name="no_telp" value="<?php echo htmlspecialchars($existing_pelanggan_data['no_telp']); ?>" required>

                    <label for="alamat">Alamat</label>
                    <input type="text" name="alamat" value="<?php echo htmlspecialchars($existing_pelanggan_data['alamat']); ?>" required>

                    <label for="username">Username</label>
                    <input type="text" name="username" value="<?php echo htmlspecialchars($existing_pelanggan_data['username']); ?>" required>

                    <label for="password">Password</label>
                    <input type="text" name="password" value="<?php echo htmlspecialchars($existing_pelanggan_data['password']); ?>" required>

                    <input type="submit" name="update_pelanggan" value="Update">
                </form>
            </div>
        </div>
    </div>
</body>

</html>
