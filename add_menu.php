<?php
require_once 'Menu.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_menu'])) 
{
    $add_menu = new Menu($pdo);
    $nama_menu = $_POST['nama_menu'] ?? '';
    $harga_menu = $_POST['harga_menu'] ?? '';
    $deskripsi = $_POST['deskripsi'] ?? '';
    if ($_FILES['image']['error'] === 4)
    {
        echo 
        "<script> alert('image does not exist'); </script>"
        ;
    }
    else
    {
        $fileName = $_FILES['image']['name'];
        $fileSize = $_FILES['image']['size'];
        $tmpName = $_FILES['image']['tmp_name'];

        $validImageExtention = ['jpg', 'jpeg', 'png'];
        $imageExtention = explode('.', $fileName);
        $imageExtention = strtolower(end($imageExtention));
        if(!in_array($imageExtention, $validImageExtention))
        {
            echo 
        "<script> alert('invalid image extention'); </script>"
        ;
        }
        elseif($fileSize > 1000000)
        {
            echo 
        "<script> alert('image size too large'); </script>"
        ;
        }
        else
        {
            $newImageName = uniqid();
            $newImageName .= '.' . $imageExtention;

            move_uploaded_file($tmpName, '../img/menu/'. $newImageName);
            $add_menu->addMenu($nama_menu, $harga_menu, $newImageName, $deskripsi);
        }
    }
}