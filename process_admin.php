<?php 
require_once 'Admin.php';

//proses login admin
if (isset($_POST['submit_login_admin'])) {
    $admin = new Admin($pdo);
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if (!empty($username) && !empty($password)) {
        // Check if the user exists
        $authenticated_admin = $admin->authenticateAdmin($username, $password);
        if ($authenticated_admin) {
            $_SESSION['loggedin_admin'] = true;
            $_SESSION['username'] = $authenticated_admin['username'];
            setcookie('username', $authenticated_admin['username'], time() + 3600);
            header("Location: admin/index.php");
            exit();
        } else {
            // Login failed
            $error = "Your username/password combination was incorrect";
        }
    }
}

//process add admin
if (isset($_POST['add_admin'])) 
{
    $add_admin = new Admin($pdo);
    $nama_admin = $_POST['nama_admin'] ?? '';
    $no_telp = $_POST['no_telp'] ?? '';
    $alamat = $_POST['alamat'] ?? '';
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    if (!empty($username) && !empty($password)) 
    {
        $add_admin->addAdmin($nama_admin, $no_telp, $alamat, $username, $password);
        header("Location: admin/data_admin.php");
        exit();
    }
} else if (isset($_POST['cancel_add']))
{
    header("Location: admin/data_admin.php");
    exit();
}

//process update admin
if (isset($_GET['id_admin'])) {
    $id_admin_to_update = $_GET['id_admin'];
    // Create an instance of the admin class
    $admin = new Admin($pdo);
    // Retrieve existing customer data
    $existing_admin_data = $admin->getAdminById($id_admin_to_update);
    // Check if the form is submitted for updating
    if (isset($_POST['update_admin'])) {
        $id_admin = $_POST['id_admin'];
        $nama_admin = $_POST['nama_admin'];
        $no_telp = $_POST['no_telp'];
        $alamat = $_POST['alamat'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        // Perform the update operation
        $admin->updateAdmin($id_admin, $nama_admin, $no_telp, $alamat, $username, $password);
        // Redirect to the customer list or any other desired page after updating
        header("Location: admin/data_admin.php");
        exit();
    } else if (isset($_POST['cancel_update']))
    {
        header("Location: admin/data_admin.php");
        exit();
    }
} else if (isset($_GET['id_admin']) === 4)
{
    header("Location: admin/data_admin.php");
        exit();
}