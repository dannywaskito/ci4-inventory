<?php namespace App\Models;
use CodeIgniter\Model;
class Model_Auth extends Model
{
	public function get_akun()
	{
		return $this->db->table('tbl_user')->get()->getResultArray();
	}
	public function save_register($data)
	{
		$this->db->table('tbl_user')->insert($data);
	}
	public function login($nama_user, $password)
	{
		return $this->db->table('tbl_user')->where([
			'nama_user' => $nama_user,
			'password' => $password,
		])->get()->getRowArray();
	}
}