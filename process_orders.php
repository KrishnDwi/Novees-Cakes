<?php
require_once 'Orders.php';

// Create an instance of the Orders class
$orders = new Orders($pdo);

// Add Order
if (isset($_POST['add_orders'])) {
    $id_pelanggan = $_POST['id_pelanggan'] ?? '';
    $id_menu = $_POST['id_menu'] ?? [];

    // Validate and sanitize the form data as needed

    try {
        // Ensure $id_menu is an array
        if (!is_array($id_menu)) {
            throw new InvalidArgumentException('$id_menu must be an array.');
        }

        // Call countTotal to calculate the total price
        $total_harga = $orders->countTotal($id_menu);

        // Call addOrder method to insert data into the database
        $orders->addOrder($id_pelanggan, $id_menu, $id_menu);

        // Redirect to a success page or the previous page
        header("Location: index.php");
        exit();
    } catch (Exception $e) {
        // Handle the exception (e.g., log the error, display an error message)
        echo "An error occurred: " . $e->getMessage();
    }
}

if (isset($_POST['cancel_add'])) 
{
    // Redirect to the previous page
    header("Location: ./");
    exit();
}
