<?php 
require_once 'Menu.php';

//add menu
if (isset($_POST['add_menu'])) 
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

            move_uploaded_file($tmpName, 'img/menu/'. $newImageName);
            $add_menu->addMenu($nama_menu, $harga_menu, $newImageName, $deskripsi);
            header("Location: admin/data_menu.php");
            exit();
        }
    }
} 
else if (isset($_POST['cancel_add']))
{
    header("Location: admin/data_menu.php");
    exit();
}

//process update
if (isset($_GET['id_menu'])) {
    $id_menu_to_update = $_GET['id_menu'];
    // Create an instance of the menu class
    $menu = new Menu($pdo);
    // Retrieve existing customer data
    $existing_menu_data = $menu->getMenuById($id_menu_to_update);
    // Check if the form is submitted for updating
    if (isset($_POST['update_menu'])) 
    {
        $id_menu = $_POST['id_menu'];
        $nama_menu = $_POST['nama_menu'];
        $harga_menu = $_POST['harga_menu'];
        $deskripsi = $_POST['deskripsi'];

        // Check if a new image is uploaded
        if ($_FILES['image']['error'] !== 4) 
        {
            // Hapus gambar lama jika ada
            $oldImagePath = 'img/menu/' . $existing_menu_data['image'];
            if (file_exists($oldImagePath)) 
            {
                unlink($oldImagePath);
            }

            // Upload gambar baru
            $fileName = $_FILES['image']['name'];
            $fileSize = $_FILES['image']['size'];
            $tmpName = $_FILES['image']['tmp_name'];
            $validImageExtention = ['jpg', 'jpeg', 'png'];
            $imageExtention = explode('.', $fileName);
            $imageExtention = strtolower(end($imageExtention));

            // Validasi gambar
            if (!in_array($imageExtention, $validImageExtention) || $fileSize > 1000000) 
            {
                echo "<script>alert('Invalid image extension or size. Image not updated.');</script>";
            } 
            else 
            {
                $newImageName = uniqid() . '.' . $imageExtention;
                move_uploaded_file($tmpName, 'img/menu/' . $newImageName);

                // Perbarui informasi gambar dalam database
                $menu->updateMenu($id_menu, $nama_menu, $harga_menu, $newImageName, $deskripsi);
                header("Location: admin/data_menu.php");
                exit();
            }
        } 
        else 
        {
            // Jika tidak ada gambar baru, perbarui informasi lainnya
            $menu->updateMenu($id_menu, $nama_menu, $harga_menu, $existing_menu_data['image'], $deskripsi);
            header("Location: admin/data_menu.php");
            exit();
        }
    } 
    else if (isset($_POST['cancel_update']))
    {
        header("Location: admin/data_menu.php");
        exit();
    }
} 
else if (isset($_GET['id_menu']) === 4)
{
    header("Location: admin/data_menu.php");
        exit();
}

//proses delete menu oleh admin
if (isset($_POST['delete_menu'])) {
    $id_menu_to_delete = $_POST['id_menu_to_delete'];
    
    // Create an instance of the menu class
    $menu = new Menu($pdo);

    // Retrieve existing menu data
    $existing_menu_data = $menu->getMenuById($id_menu_to_delete);

    // Perform the delete operation
    $menu->deleteMenu($id_menu_to_delete);

    // Hapus gambar terkait dari sistem file
    $imageToDelete = '/img/menu/' . $existing_menu_data['image'];
    if (file_exists($imageToDelete)) {
        unlink($imageToDelete);
    }

    // Redirect to the menu list or any other desired page after deleting
    header("Location: ./data_menu.php");
    exit();
}