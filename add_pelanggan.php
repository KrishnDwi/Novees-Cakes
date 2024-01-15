<?php
require_once 'Pelanggan.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") 
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
    } 
    if (!empty($username) && !empty($password) && isset($_POST['add_pelanggan']))
    {
        $add_pelanggan->addPelanggan($nama_pelanggan, $no_telp, $alamat, $username, $password);
    }
}