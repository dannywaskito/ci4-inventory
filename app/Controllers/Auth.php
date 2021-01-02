<?php namespace App\Controllers;
use App\Models\Model_Auth;
class Auth extends BaseController
{
	public function __construct()
	{
		helper('form');
		$this->Model_Auth = new Model_Auth();
	}
	public function login()
	{
		$data = array(
			'title' => 'login', 
		);
		return view('login', $data);
	}
	public function cek_login()
	{
		if ($this->validate([
            'nama_user' => [
			'label' => 'nama_user',
			'rules' => 'required',
			'errors' => [
                'required' => '{field} Wajib diisi dan tidak boleh kosong'
            ]
			],
			'password' => [
			'label' => 'Password',
			'rules' => 'required',
			'errors' => [
                'required' => '{field} Wajib diisi dan tidak boleh kosong'
            ]
			]
		])) {
			// Jika Valid
				$nama_user		= $this->request->getPost('nama_user');
				$password	= $this->request->getPost('password');
			$cek = $this->Model_Auth->login($nama_user, $password);
			if ($cek) {
				// jika berhasil
				session()->set('log', true);
				session()->set('nama_user', $cek['nama_user']);
				// login
				return redirect()->to(base_url('home'));
			}else{
				// gagal login
				session()->setFlashdata('pesan','username atau password tidak cocok');
				return redirect()->to(base_url('auth/login'));

			}
			session()->setFlashdata('pesan','berhasil');
			return redirect()->to(base_url('auth/login'));
		}else{
			// Jika Tidak Valid
			session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
			return redirect()->to(base_url('auth/login'));
		}
	}
	public function logout()
	{
		session()->remove('log');
		session()->remove('nama_user');;
		session()->setFlashdata('pesan','berhasil logout');
		return redirect()->to(base_url('auth/login'));
	}
}
