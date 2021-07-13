<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_Barang extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		if ($this->session->userdata('role_id') != '1') {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				Anda Belum Login!
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>');
			redirect('auth/login');
		}
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['barang'] = $this->M_Barang->tampil_data()->result();

		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/data_barang', $data);
		$this->load->view('templates_admin/footer');
	}

	public function tambah_aksi()
	{
		$nama = $this->input->post('nama');
		$keterangan = $this->input->post('keterangan');
		$kategori = $this->input->post('kategori');
		$harga = $this->input->post('harga');
		$stok = $this->input->post('stok');
		$gambar = $_FILES['gambar']['name'];
		if ($gambar = '') {
		} else {
			$config['upload_path'] = './uploads';
			$config['allowed_types'] = 'jpg|jpeg|png|gif';

			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('gambar')) {
				echo "Gambar Gagal Diupload";
			} else {
				$gambar = $this->upload->data('file_name');
			}
		}

		$data = array(
			'nama'			=> $nama,
			'keterangan' 	=> $keterangan,
			'kategori' 		=> $kategori,
			'harga' 		=> $harga,
			'stok' 			=> $stok,
			'gambar' 		=> $gambar
		);

		$this->M_Barang->tambah_barang($data, 'tbl_barang');
		redirect('admin/data_barang/index');
	}

	public function edit($id)
	{
		$where = array('id' => $id);
		$data['barang'] = $this->M_Barang->edit_barang($where, 'tbl_barang')->result();

		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/edit_barang', $data);
		$this->load->view('templates_admin/footer');
	}

	public function update()
	{
		$id			= $this->input->post('id');
		$nama		= $this->input->post('nama');
		$keterangan	= $this->input->post('keterangan');
		$kategori	= $this->input->post('kategori');
		$harga		= $this->input->post('harga');
		$stok		= $this->input->post('stok');

		$data = array(
			'nama'			=> $nama,
			'keterangan' 	=> $keterangan,
			'kategori' 		=> $kategori,
			'harga' 		=> $harga,
			'stok' 			=> $stok
		);

		$where = array(
			'id' => $id
		);
		$this->M_Barang->update_data($where, $data, 'tbl_barang');
		redirect('admin/data_barang/index');
	}

	public function hapus($id)
	{
		$where = array('id' => $id);
		$this->M_Barang->hapus_data($where, 'tbl_barang');
		redirect('admin/data_barang/index');
	}
}
