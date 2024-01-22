<?php
require_once 'dbconfig.php';

class Orders
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAllJoinOrders()
    {
        $stmt = $this->pdo->query("SELECT * FROM orders 
            INNER JOIN pelanggan ON orders.id_pelanggan = pelanggan.id_pelanggan 
            INNER JOIN menu ON orders.id_menu = menu.id_menu");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function countTotal($dipilih)
    {
        $stmt = $this->pdo->prepare("SELECT SUM(harga_menu) AS total_harga FROM menu WHERE id_menu IN (" . implode(',', $dipilih) . ")");
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result['total_harga'];
    }

    public function addOrder($id_pelanggan, $id_menu_array, $dipilih)
    {
        // Calculate the total price based on the selected menu items
        $total_harga = $this->countTotal($dipilih);
    
        // Loop through each selected menu and insert an order for each
        foreach ($id_menu_array as $id_menu) {
            // Insert the order into the 'orders' table
            $stmt = $this->pdo->prepare("INSERT INTO orders (id_pelanggan, id_menu, total_harga) VALUES (:id_pelanggan, :id_menu, :total_harga)");
            $stmt->execute([
                'id_pelanggan' => $id_pelanggan,
                'id_menu' => $id_menu,
                'total_harga' => $total_harga
            ]);
        }
    }
    

}