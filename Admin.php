<?php
require_once 'dbconfig.php';

class Admin 
{
    private $pdo;

    public function __construct($pdo) 
	{
        $this->pdo = $pdo;
    }

    public function getAllAdmin() 
	{
        $stmt = $this->pdo->query("SELECT * FROM admin");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addAdmin($nama_admin, $no_telp, $alamat, $username, $password) 
	{
        $stmt = $this->pdo->prepare("INSERT INTO admin (nama_admin, no_telp, alamat, username, password) VALUES (:nama_admin, :no_telp, :alamat, :username, :password)");
        $stmt->execute(['nama_admin' => $nama_admin,
        'no_telp' => $no_telp,
        'alamat' => $alamat,
        'username' => $username,
        'password' => $password
        ]);
    }

    public function getAdminById($id) 
    {
        $stmt = $this->pdo->prepare("SELECT * FROM admin WHERE id_admin = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateAdmin($id, $nama_admin, $no_telp, $alamat, $username, $password) 
    {
        $stmt = $this->pdo->prepare("UPDATE admin SET  nama_admin = :nama_admin, no_telp = :no_telp, alamat = :alamat, username = :username, password = :password WHERE id_admin = :id");
        $stmt->execute([
            'id' => $id,
            'nama_admin' => $nama_admin,
            'no_telp' => $no_telp,
            'alamat' => $alamat,
            'username' => $username,
            'password' => $password
        ]);
}

	public function authenticateAdmin($username, $password)
	{
		$stmt = $this->pdo->prepare("SELECT * FROM admin WHERE username = :username AND password = :password");
		$stmt->execute(['username' => $username, 'password' => $password]);
		$admin = $stmt->fetch();

		if ($admin)
		{
			return $admin;
		} 
		else 
		{
			return false;
		}
	}
}