<?php namespace App\Controllers;
use App\Models\Model_Auth;
use App\Models\ModelHome;
class Home extends BaseController
{
	public function __construct()
	{
		$this->Model_Auth = new Model_Auth();
		$this->ModelHome = new ModelHome();
	}
	public function index()
	{
		$data = array(
			'title' 			=> 'Dashboard',
			'total_kategori'	=> $this->ModelHome->total_kategori(),
			'total_produk'		=> $this->ModelHome->total_produk(),
			'total_stok'		=> $this->ModelHome->total_stok(),
			'isi'				=> 'home'
		);
		return view('layout/wrapper', $data);
	}
}