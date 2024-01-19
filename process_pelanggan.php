<?php 
require_once 'Pelanggan.php';

//proses login pelanggan
if (isset($_POST['submit_login'])) {
    $pelanggan = new Pelanggan($pdo);
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if (!empty($username) && !empty($password)) {
        // Check if the user exists
        $authenticated_pelanggan = $pelanggan->authenticate($username, $password);
        if ($authenticated_pelanggan) {
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $authenticated_pelanggan['username'];
            setcookie('username', $authenticated_pelanggan['username'], time() + 3600);
            header("Location: index.php");
            exit();
        } else {
            // Login failed
            $error = "Your username/password combination was incorrect";
        }
    }
}

//proses add pelanggan dari register dan admin
if (isset($_POST['submit_register']) || isset($_POST['add_pelanggan'])) 
{
    $add_pelanggan = new Pelanggan($pdo);
    $nama_pelanggan = $_POST['nama_pelanggan'] ?? '';
    $no_telp = $_POST['no_telp'] ?? '';
    $alamat = $_POST['alamat'] ?? '';
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    if (!empty($username) && !empty($password) && isset($_POST['submit_register'])) 
    {
        $add_pelanggan->addPelanggan($nama_pelanggan, $no_telp, $alamat, $username, $password);
        header("Location: login.php");
		exit();
    } else if (!empty($username) && !empty($password) && isset($_POST['add_pelanggan']))
    {
        $add_pelanggan->addPelanggan($nama_pelanggan, $no_telp, $alamat, $username, $password);
        header("Location: admin/data_pelanggan.php");
		exit();
    } 
} else if (isset($_POST['cancel_add']))
{
    header("Location: admin/data_pelanggan.php");
    exit();
}

//proses update pelanggan oleh admin
if (isset($_GET['id_pelanggan'])) {
    $id_pelanggan_to_update = $_GET['id_pelanggan'];
    // Create an instance of the Pelanggan class
    $pelanggan = new Pelanggan($pdo);
    // Retrieve existing customer data
    $existing_pelanggan_data = $pelanggan->getPelangganById($id_pelanggan_to_update);
    // Check if the form is submitted for updating
    if (isset($_POST['update_pelanggan'])) {
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
    } else if (isset($_POST['cancel_update']))
    {
        header("Location: admin/data_pelanggan.php");
        exit();
    }
} else if (isset($_GET['id_pelanggan']) === 4)
{
    header("Location: admin/data_pelanggan.php");
        exit();
}