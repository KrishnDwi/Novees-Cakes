<?php
require_once 'Admin.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_admin'])) 
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
    }
}