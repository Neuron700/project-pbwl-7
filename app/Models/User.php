<?php

namespace App\Models;

use App\Core\Model;

class User extends Model
{
	public function login()
	{
		$user_email = $_POST['user_email'];
		$user_password = $_POST['user_password'];

		$sql = "SELECT * FROM tb_users WHERE user_email=:user_email AND user_password=PASSWORD(:user_password)";
		$stmt = $this->db->prepare($sql);
		$stmt->bindParam(":user_email", $user_email);
		$stmt->bindParam(":user_password", $user_password);
		$stmt->execute();

		return $this->select($stmt);
	}

	public function tampil()
	{
		$sql = "SELECT * FROM tb_users";
		$stmt = $this->db->prepare($sql);
		$stmt->execute();

		return $this->selects($stmt);
	}

	public function simpan()
	{
		$user_email = $_POST['user_email'];
		$user_password = $_POST['user_password'];
		$user_namalengkap = $_POST['user_namalengkap'];

		$sql = "INSERT INTO tb_users SET user_email=:user_email, user_password=PASSWORD(:user_password), user_namalengkap=:user_namalengkap";
		$stmt = $this->db->prepare($sql);
		$stmt->bindParam(":user_email", $user_email);
		$stmt->bindParam(":user_password", $user_password);
		$stmt->bindParam(":user_namalengkap", $user_namalengkap);
		$stmt->execute();
	}

	public function edit($id)
	{
		$sql = "SELECT * FROM tb_users WHERE user_id=:user_id";
		$stmt = $this->db->prepare($sql);
		$stmt->bindParam(":user_id", $id);
		$stmt->execute();

		return $this->select($stmt);
	}

	public function update()
	{
		$user_email = $_POST['user_email'];
		$user_password = $_POST['user_password'];
		$user_namalengkap = $_POST['user_namalengkap'];
		$user_id = $_POST['user_id'];

		$sql = "UPDATE tb_users SET user_email=:user_email, user_password=PASSWORD(:user_password), user_namalengkap=:user_namalengkap, updated_at=NOW() WHERE user_id=:user_id";
		$stmt = $this->db->prepare($sql);
		$stmt->bindParam(":user_email", $user_email);
		$stmt->bindParam(":user_password", $user_password);
		$stmt->bindParam(":user_namalengkap", $user_namalengkap);
		$stmt->bindParam(":user_id", $user_id);
		$stmt->execute();
	}

	public function delete($id)
	{
		$sql = "DELETE FROM tb_users WHERE user_id=:user_id";
		$stmt = $this->db->prepare($sql);
		$stmt->bindParam(":user_id", $id);
		$stmt->execute();
	}
}
