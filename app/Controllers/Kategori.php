<?php namespace App\Controllers;
use CodeIgniter\Controllers;
use App\Models\KategoriModel;

class Kategori extends BaseController
{
	function __construct()
	{
		helper('form');
		$this->KategoriModel = new KategoriModel();
	}
		public function index()
	{
		$data = [

			'title' 	=> 'List Data Kategori',
			'kategori' 	=> $this->KategoriModel->get_kategori(),
			'isi'   	=> 'kategori/list'
		];
		echo view('layout/wrapper', $data);
	}
	public function tambah()
	{
		$data = [

			'title' => 'Tambah Data Kategori',
			'isi'   => 'kategori/tambah'
		];
		echo view('layout/wrapper', $data);
	}
	public function save()
	{
		$data = [

			'nama_kategori'=> $this->request->getPost('nama_kategori'),
		];
		$this->KategoriModel->insert_kategori($data);
		session()->setFlashdata('message','added');
		return redirect()->to(base_url('kategori'));
	}
	// public function edit($id_kategori)
	// {
	// 	$data = [

	// 		'title' => 'Edit Data kategori',
	// 		'kategori' => $this->KategoriModel->edit_kategori($id_kategori),
	// 		'isi'   => 'kategori/edit'
	// 	];
	// 	echo view('layout/wrapper', $data);
	// }
	public function edit($id_kategori)
	{
		$data = [
			'id_kategori' => $id_kategori,
			'nama_kategori'=> $this->request->getPost('nama_kategori'),
		];
		$this->KategoriModel->update_kategori($data, $id_kategori);
		session()->setFlashdata('message','Edited');
		return redirect()->to(base_url('kategori'));
	}
	public function delete($id_kategori)
	{
		$data = array(
			'id_kategori' => $id_kategori,
		);
		$this->KategoriModel->delete_kategori($id_kategori);
		session()->setFlashdata('message','Deleted');
		return redirect()->to(base_url('kategori'));

	}

}