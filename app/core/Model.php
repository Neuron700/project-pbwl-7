<?php

namespace App\Core;

use PDO;

class Model
{

	protected object $db;

	public function __construct()
	{
		$this->db = new PDO("mysql:host=127.0.0.1;port=3307;dbname=pbwl_samples_7", "root", "");
		$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$this->db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
	}

	public function select($stmt)
	{
		//Menampilkan satu data
		return $stmt->fetch();
	}

	public function selects($stmt)
	{
		//Menampilkan semua data
		$data = [];

		while ($rows = $stmt->fetch()) {
			$data[] = $rows;
		}

		return $data;
	}
}
