<?php

	class Database
	{
		private $dsn = "mysql:host=localhost;dbname=crud_php_poo";
		private $user = "root";
		private $pass = "";

		public $conn;

		public function __construct()
		{
			try {
				$this->conn = new PDO($this->dsn,$this->user,$this->pass);
				//echo "successfully connected";
			} catch (PDOException $e) {
				echo $e->getMessage();
			}
		}

		public function insert($nom,$prenom,$email,$phone)
		{
			$sql = "INSERT INTO utilisateur (nom,prenom,email,phone) VALUES(:nom,:prenom,:email,:phone)";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute(['nom'=>$nom,'prenom'=>$prenom,'email'=>$email,'phone'=>$phone]);

			return true;
		}

		public function read()
		{
			$data = array();

			$sql = "SELECT * FROM utilisateur ORDER BY id DESC";
			$stmt= $this->conn->prepare($sql);
			$stmt->execute();

			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
			foreach ($result as $row) {
				$data[] = $row;
			}

			return $data;
		}

		public function getUserById($id)
		{
			$sql = "SELECT * FROM utilisateur WHERE id =:id";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute(['id'=>$id]);

			$result = $stmt->fetch(PDO::FETCH_ASSOC);
			return $result;
		}

		public function update($id,$nom,$prenom,$email,$phone)
		{
			$sql = "UPDATE utilisateur SET nom =:nom,prenom =:prenom,email =:email,phone =:phone WHERE id=:id";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute(['nom'=>$nom,'prenom'=>$prenom,'email'=>$email,'phone'=>$phone,'id'=>$id]);
			return true;
		}

		public function delete($id)
		{
			$sql = "DELETE FROM utilisateur WHERE id =:id";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute(['id'=>$id]);

			return true;
		}

		public function totalRowCount()
		{
			$sql = "SELECT * FROM utilisateur";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute();
			$t_rows = $stmt->rowCount();

			return $t_rows;
		}

		public function ExportExcel()
		{
			$data = array();

			$sql = "SELECT * FROM utilisateur ORDER BY id ASC";
			$stmt= $this->conn->prepare($sql);
			$stmt->execute();

			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
			foreach ($result as $row) {
				$data[] = $row;
			}

			return $data;
		}
	}

	//$ob = new Database();pour afficher tous les donnees dans la classe Database()
	//print_r($ob->read());afficher les donnees dans la methohodes read()
	//echo $ob->totalRowCount();
?>