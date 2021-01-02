<?php namespace App\Controllers;
use CodeIgniter\Controllers;
use App\Models\ProdukModel;
use App\Models\KategoriModel;
use TCPDF;

class Produk extends BaseController
{
	function __construct()
	{
		helper('form');
		$this->ProdukModel   = new ProdukModel();
		$this->KategoriModel = new KategoriModel();
	}
		public function index()
	{
		$data = [

			'title' 	=> 'List Data Produk',
			'produk' 	=> $this->ProdukModel->all_data(),
			'kategori' 	=> $this->KategoriModel->get_kategori(),
			'isi'   	=> 'produk/list'
		];
		echo view('layout/wrapper', $data);
	}
	public function excel(){
		$data = [
			'produk' => $this->ProdukModel->all_data()
		];
		echo view('produk/excel', $data);

	}
		public function pdf(){
		$data = [
			'produk' => $this->ProdukModel->all_data()
		];
		$html = view('produk/pdf', $data);

		// create new PDF document
		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'F4', true, 'UTF-8', false);
		$pdf->setPrintHeader(false);
		$pdf->setPrintFooter(false);
		$pdf->AddPage();
		$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
		$this->response->setContentType('application/pdf');
		$pdf->Output('Data-Produk.pdf', 'I');

	}
	public function tambah()
	{
		$data = [

			'title' 		=> 'Tambah Data Produk',
			'validation' 	=> $this->validator,
			'kategori' 		=> $this->KategoriModel->get_kategori(),
			'isi'   		=> 'produk/tambah'
		];
		echo view('layout/wrapper', $data);
	}
	public function save()
	{
		if ($this->validate([
			'nama_produk' => [
				'label' => 'Nama Produk',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Wajib Di Isi'
				]
			],
			'id_kategori' => [
				'label' => 'Kategori',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Wajib Di Isi'
				]
			],
			'kode_produk' => [
				'label' => 'Kode Produk',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Wajib Di Isi'
				]
			],
			'foto_produk' => [
				'label' => 'foto_produk',
				'rules' => 'uploaded[foto_produk]|max_size[foto_produk,1024]|mime_in[foto_produk,image/jpg,image/png,image/jpeg]',
				'errors' => [
					'uploaded' => '{field} Wajib Di Isi',
					'max_size' => '{field} Maksimal 1024 KB',
					'mime_in' => '{field} Hanya PNG,JPG dan JPEG',
				]
			],
			'tgl_register' => [
				'label' => 'Tanggal Regsiter',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Wajib Di Isi'
				]
			],
		])) {
			$foto_produk = $this->request->getFile('foto_produk');

			$nama_file = $foto_produk->getRandomName();

			$data = array(

				'nama_produk' => $this->request->getPost('nama_produk'),
				'id_kategori' => $this->request->getPost('id_kategori'),
				'kode_produk' => $this->request->getPost('kode_produk'),
				'foto_produk' => $nama_file,
				'tgl_register' => $this->request->getPost('tgl_register'),
			);

			$foto_produk->move('foto_produk', $nama_file); //tempat simpan

			$this->ProdukModel->add($data);

			session()->setFlashdata('message', 'Added');
			return redirect()->to(base_url('produk'));
		} else {
			// jika tidak valid
			session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
			return redirect()->to(base_url('produk/tambah'));
		}
	}
	public function delete($id_produk)
	{

		$produk = $this->ProdukModel->detail_data($id_produk);
				if ($produk['foto_produk'] != "") {
					unlink('foto_produk/' . $produk['foto_produk']);
				}
		$data = array(
			'id_produk' => $id_produk,
		);

		$this->ProdukModel->delete_data($data);

		session()->setFlashdata('message', 'Deleted');
		return redirect()->to(base_url('produk'));
	}
		public function edit($id_produk)
	{
		$data = [

			'title' => 'Edit Data Produk',
			'produk' => $this->ProdukModel->detail_data($id_produk),
			'kategori' 	=> $this->KategoriModel->get_kategori(),
			'isi'   => 'produk/edit'
		];
		echo view('layout/wrapper', $data);
	}
	public function update($id_produk)
	{
		if ($this->validate([
			'nama_produk' => [
				'label' => 'Nama Produk',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Wajib Di Isi'
				]
			],
			'id_kategori' => [
				'label' => 'Kategori',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Wajib Di Isi'
				]
			],
			'kode_produk' => [
				'label' => 'Kode Produk',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Wajib Di Isi'
				]
			],
			'foto_produk' => [
				'rules' => 'max_size[foto_produk,1024]|mime_in[foto_produk,image/jpg,image/png,image/jpeg]',
				'errors' => [
					'max_size' => '{field} Maksimal 1024 KB',
					'mime_in' => '{field} Hanya PNG,JPG dan JPEG',
				]
			],
			'tgl_register' => [
				'label' => 'Tanggal Regsiter',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Wajib Di Isi'
				]
			],
		])) {
			$foto_produk = $this->request->getFile('foto_produk');
			if ($foto_produk->getError() == 4) {

				$data = array(
					'id_produk' => $id_produk,
					'nama_produk' => $this->request->getPost('nama_produk'),
					'kode_produk' => $this->request->getPost('kode_produk'),
					'tgl_register' => $this->request->getPost('tgl_register'),
					'id_kategori' => $this->request->getPost('id_kategori'),

				);

				$this->ProdukModel->edit($data);

			} else {

				$produk = $this->ProdukModel->detail_data($id_produk);
				if ($produk['foto_produk'] != "") {
					unlink('foto_produk/' . $produk['foto_produk']);
				}


				$nama_file = $foto_produk->getRandomName();
				$data = array(
					'id_produk' => $id_produk,
					'nama_produk' => $this->request->getPost('nama_produk'),
					'kode_produk' => $this->request->getPost('kode_produk'),
					'foto_produk' => $nama_file,
					'tgl_register' => $this->request->getPost('tgl_register'),
					'id_kategori' => $this->request->getPost('id_kategori'),
				);

				$foto_produk->move('foto_produk', $nama_file); //tempat simpan
				$this->ProdukModel->edit($data);
			}

			session()->setFlashdata('message', 'Updated');
			return redirect()->to(base_url('produk'));

		} else {
			// jika tidak valid
			session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
			return redirect()->to(base_url('produk/edit/' . $id_produk));
		}
	}
}
