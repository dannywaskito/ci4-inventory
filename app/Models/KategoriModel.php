<?php namespace App\Models;
use CodeIgniter\Model;

class KategoriModel extends Model
{
	public function get_kategori()
	{
		return $this->db->table('tbl_kategori')->get()->getResultArray();
	}
	public function insert_kategori($data)
	{
		return $this->db->table('tbl_kategori')->insert($data);
	}
	public function edit_kategori($id_kategori)
	{
		return $this->db->table('tbl_kategori')->where('id_kategori', $id_kategori)->get()->getRowArray();
	}
	public function update_kategori($data, $id_kategori)
	{
		return $this->db->table('tbl_kategori')->update($data, array('id_kategori' => $id_kategori));
	}
	public function delete_kategori($id_kategori)
	{
		return $this->db->table('tbl_kategori')->delete(array('id_kategori' => $id_kategori));
	}
}