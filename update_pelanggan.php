<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: ../login_admin.php");
    exit();
}
require_once 'process_pelanggan.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Admin | Update Pelanggan</title>
</head>

<body>
    <div class="form-body">
        <div class="form-container">
            <div class="header">
                <h1>Update Pelanggan</h1>
            </div>
            <div class="content">
                <form method="POST">
                    <div class="row">
                        <div class="form-element">
                            <input type="hidden" name="id_pelanggan" value="<?php echo $existing_pelanggan_data['id_pelanggan']; ?>">
                            <label for="nama_pelanggan">Nama Pelanggan</label>
                            <input type="text" name="nama_pelanggan" value="<?php echo htmlspecialchars($existing_pelanggan_data['nama_pelanggan']); ?>" required>
                        </div>
                        <div class="form-element">
                            <label for="no_telp">Telepon</label>
                            <input type="text" name="no_telp" value="<?php echo htmlspecialchars($existing_pelanggan_data['no_telp']); ?>" required>
                        </div>
                    </div>
                        
                    <div class="row">
                        <div class="form-element">
                            <label for="alamat">Alamat</label>
                            <input type="text" name="alamat" value="<?php echo htmlspecialchars($existing_pelanggan_data['alamat']); ?>" required>
                        </div>
                        <div class="form-element">
                            <label for="username">Username</label>
                            <input type="text" name="username" value="<?php echo htmlspecialchars($existing_pelanggan_data['username']); ?>" required>
                        </div>
                    </div>
                        
                    <div class="row">
                        <div class="form-element">
                            <label for="password">Password</label>
                            <input type="text" name="password" value="<?php echo htmlspecialchars($existing_pelanggan_data['password']); ?>" required>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="form-element">
                            <input class="cancel-btn" type="submit" name="cancel" value="Cancel">
                        </div>
                        <div class="form-element">
                            <input type="submit" name="update_pelanggan" value="Update">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
