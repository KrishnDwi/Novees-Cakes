<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: ../login_admin.php");
    exit();
}
require_once 'process_admin.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Admin | Update Admin</title>
</head>

<body>
    <div class="form-body">
        <div class="form-container">
            <div class="header">
                <h1>Update Admin</h1>
            </div>
            <div class="content">
                <form method="POST">
                    <div class="row">
                        <div class="form-element">
                            <input type="hidden" name="id_admin" value="<?php echo $existing_admin_data['id_admin']; ?>">
                            <label for="nama_admin">Nama Admin</label>
                            <input type="text" name="nama_admin" value="<?php echo htmlspecialchars($existing_admin_data['nama_admin']); ?>" required>
                        </div>
                        <div class="form-element">
                            <label for="no_telp">Telepon</label>
                            <input type="text" name="no_telp" value="<?php echo htmlspecialchars($existing_admin_data['no_telp']); ?>" required>
                        </div>
                    </div>
                        
                    <div class="row">
                        <div class="form-element">
                            <label for="alamat">Alamat</label>
                            <input type="text" name="alamat" value="<?php echo htmlspecialchars($existing_admin_data['alamat']); ?>" required>
                        </div>
                        <div class="form-element">
                            <label for="username">Username</label>
                            <input type="text" name="username" value="<?php echo htmlspecialchars($existing_admin_data['username']); ?>" required>
                        </div>
                    </div>
                        
                    <div class="row">
                        <div class="form-element">
                            <label for="password">Password</label>
                            <input type="text" name="password" value="<?php echo htmlspecialchars($existing_admin_data['password']); ?>" required>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="form-element">
                            <input class="cancel-btn" type="submit" name="cancel" value="Cancel">
                        </div>
                        <div class="form-element">
                            <input type="submit" name="update_admin" value="Update">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
