<?php

/**
* 
*/
class Kecamatan extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Kecamatan_Model');
		if (empty($this->session->userdata('status'))) {
			redirect(base_url());
		}
	}

	public function index()
	{
		$data_Kecamatan = $this->Kecamatan_Model->select_kecamatan();
		$data['kecamatan'] = $data_Kecamatan;		
		$data['judul'] = "Halaman Kecamatan"; 
		$data['isi'] = "Halaman Isi Kecamatan"; 
		$this->load->view('kecamatan/kecamatan', $data);
	}
	
	public function form_kecamatan()
	{
		$data['judul'] = "Halaman Kecamatan"; 
		$data['isi'] = "Ini Halaman Isi Kecamatan";
		$data['button'] ="Simpan";
		$data['id_kecamatan'] = '';
		$data['nama_kecamatan'] = '';
		$data['action'] = site_url('kecamatan/tambah_kecamatan');
		$this->load->view('kecamatan/form_kecamatan', $data);
	}

	public function form_edit_kecamatan($id)
	{
		$kecamatan = $this->Kecamatan_Model->select_by_id_kecamatan($id);
		$data['judul'] = "Halaman Edit Kecamatan"; 
		$data['isi'] = "Ini Halaman Update Isi Kecamatan";
		$data['button'] ="Update";
		$data['id_kecamatan'] = $kecamatan->id_kecamatan;
		$data['nama_kecamatan'] = $kecamatan->nama_kecamatan;
		$data['action'] = site_url('kecamatan/edit_kecamatan');
		$this->load->view('kecamatan/form_kecamatan', $data);
	}
	public function tambah_kecamatan()
	{
		$data = array('nama_kecamatan' => $this->input->post('nama_kecamatan'), );
		$this->Kecamatan_Model->tambah_kecamatan($data);
		$this->session->set_flashdata('pesan','data berhasil disimpan');
		redirect(site_url('kecamatan'));
	}
	public function hapus_kecamatan($id)
	{
		$this->Kecamatan_Model->hapus_kecamatan($id);
		$this->session->set_flashdata('pesan','data berhasil dihapus');
		redirect(site_url('kecamatan'));
	}
	public function edit_kecamatan()
	{
		$id_kecamatan = $this->input->post('id_kecamatan');
		$nama_kecamatan = $this->input->post('nama_kecamatan');
		$data = array('nama_kecamatan' => $nama_kecamatan );
		$this->Kecamatan_Model->edit_kecamatan($id_kecamatan, $data);
		$this->session->set_flashdata('pesan','data berhasil di edit');
		redirect(site_url('kecamatan'));
	}
}

?>