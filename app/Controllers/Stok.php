<?php namespace App\Controllers;
use CodeIgniter\Controllers;
use App\Models\StokModel;
use App\Models\ProdukModel;

class Stok extends BaseController
{
	function __construct()
	{
		helper('form');
		$this->StokModel	 = new StokModel();
		$this->ProdukModel   = new ProdukModel();
	}
		public function index()
	{
		$data = [

			'title'  	 => 'List Data Stok',
			'validation' => $this->validator,
			'stok' 	 	 => $this->StokModel->all_data(),
			'produk' 	 => $this->ProdukModel->all_data(),
			'isi'    	 => 'stok/list'
		];
		return view('layout/wrapper', $data);
	}
	// public function tambah()
	// {
	// 	$data = [

	// 		'title' => 'Tambah Data Produk',
	// 		'validation' => $this->validator,
	// 		'kategori' => $this->KategoriModel->get_kategori(),
	// 		'isi'   => 'produk/tambah'
	// 	];
	// 	echo view('layout/wrapper', $data);
	// }
	public function save()
	{
			$data = [
			'id_produk' => $this->request->getPost('id_produk'),
			'jumlah_barang' => $this->request->getPost('jumlah_barang'),
			'tgl_update'=> $this->request->getPost('tgl_update'),
		];
		
		
		$this->StokModel->add($data);
		session()->setFlashdata('message','added');
		return redirect()->to(base_url('stok'));
	}

	public function edit($id_stok)
	{
		$data = [
			'id_stok' => $id_stok,
			'id_produk' 	=> $this->request->getPost('id_produk'),
			'jumlah_barang' => $this->request->getPost('jumlah_barang'),
			'tgl_update'	=> $this->request->getPost('tgl_update'),
		];
		$this->StokModel->edit($data, $id_stok);
		session()->setFlashdata('message','Edited');
		return redirect()->to(base_url('stok'));

}
	public function delete($id_stok)
	{
		$data = array(
			'id_stok' => $id_stok,
		);
		$this->StokModel->delete_data($id_stok);
		session()->setFlashdata('message','Deleted');
		return redirect()->to(base_url('stok'));

	}

}