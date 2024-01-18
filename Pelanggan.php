<?php
require_once 'dbconfig.php';

class Pelanggan 
{
    private $pdo;

    public function __construct($pdo) 
	{
        $this->pdo = $pdo;
    }

    public function getAllPelanggan() 
	{
        $stmt = $this->pdo->query("SELECT * FROM pelanggan");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addPelanggan($nama_pelanggan, $no_telp, $alamat, $username, $password) 
	{
        $stmt = $this->pdo->prepare("INSERT INTO pelanggan (nama_pelanggan, no_telp, alamat, username, password) VALUES (:nama_pelanggan, :no_telp, :alamat, :username, :password)");
        $stmt->execute(['nama_pelanggan' => $nama_pelanggan,
        'no_telp' => $no_telp,
        'alamat' => $alamat,
        'username' => $username,
        'password' => $password
        ]);
    }

    // Inside Pelanggan.php
    public function getPelangganById($id) 
    {
        $stmt = $this->pdo->prepare("SELECT * FROM pelanggan WHERE id_pelanggan = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updatePelanggan($id, $nama_pelanggan, $no_telp, $alamat, $username, $password) 
    {
        $stmt = $this->pdo->prepare("UPDATE pelanggan SET  nama_pelanggan = :nama_pelanggan, no_telp = :no_telp, alamat = :alamat, username = :username, password = :password WHERE id_pelanggan = :id");
        $stmt->execute([
            'id' => $id,
            'nama_pelanggan' => $nama_pelanggan,
            'no_telp' => $no_telp,
            'alamat' => $alamat,
            'username' => $username,
            'password' => $password
        ]);
}


	public function authenticate($username, $password)
	{
		$stmt = $this->pdo->prepare("SELECT * FROM pelanggan WHERE username = :username AND password = :password");
		$stmt->execute(['username' => $username, 'password' => $password]);
		$pelanggan = $stmt->fetch();

		if ($pelanggan)
		{
			return $pelanggan;
		} 
		else 
		{
			return false;
		}
	}
}