<?php
require_once 'dbconfig.php';

class Menu 
{
    private $pdo;

    public function __construct($pdo) 
	{
        $this->pdo = $pdo;
    }

    public function getAllMenu() 
	{
        $stmt = $this->pdo->query("SELECT * FROM menu");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addMenu($nama_menu, $harga_menu, $newImageName, $deskripsi) 
	{
        $stmt = $this->pdo->prepare("INSERT INTO menu (nama_menu, harga_menu, image, deskripsi) VALUES (:nama_menu, :harga_menu, :image, :deskripsi)");
        $stmt->execute(['nama_menu' => $nama_menu,
        'harga_menu' => $harga_menu,
        'image' => $newImageName,
        'deskripsi' => $deskripsi
        ]);
    }
}