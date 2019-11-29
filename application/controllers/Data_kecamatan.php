<?php

/**
* 
*/
class Data_kecamatan extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('data_kecamatan_Model');
		if (empty($this->session->userdata('status'))) {
			redirect(base_url());
		}
	}

	public function index()
	{
		$data_kecamatan = $this->data_kecamatan_Model->select_data_kecamatan();
		$data['data_kecamatan'] = $data_kecamatan;		
		$data['judul'] = "Halaman data kecamatan"; 
		$data['isi'] = "Halaman Isi data kecamatan"; 
		$this->load->view('data_kecamatan/data_kecamatan', $data);
	}
	
	public function form_data_kecamatan()
	{
		$data['judul'] = "Halaman Data kecamatan"; 
		$data['isi'] = "Ini Halaman data_kecamatan";
		$data['button'] ="Simpan";
		$data['id_data_kecamatan'] = '';
		$data['id_kecamatan'] = '';
		$data['jumlah_penduduk'] = '';		
		$data['action'] = site_url('data_kecamatan/tambah_data_kecamatan');
		$this->load->view('data_kecamatan/form_data_kecamatan', $data);
	}

	public function form_edit_data_kecamatan($id)
	{
		$data_kecamatan = $this->data_kecamatan_Model->select_by_id_data_kecamatan($id);
		$data['judul'] = "Halaman Edit Data kecamatan"; 
		$data['isi'] = "Ini Halaman Update Isi Data kecamatan";
		$data['button'] ="Update";
		$data['id_data_kecamatan'] = $data_kecamatan->id_data_kecamatan;
		$data['id_kecamatan'] = $data_kecamatan->id_data_kecamatan;
		$data['jumlah_penduduk'] = $data_kecamatan->jumlah_penduduk;
		$data['action'] = site_url('data_kecamatan/edit_data_kecamatan');
		$this->load->view('data_kecamatan/form_data_kecamatan', $data);
	}
	public function edit_data_kecamatan()
	{
		$id_data_kecamatan = $this->input->post('id_data_kecamatan');
		$data = array('id_kecamatan' => $this->input->post('id_kecamatan'), 'jumlah_penduduk' => $this->input->post('jumlah_penduduk'), );
		$this->data_kecamatan_Model->edit_data_kecamatan($id_data_kecamatan, $data);
		$this->session->set_flashdata('pesan','data berhasil di edit');
		redirect(site_url('data_kecamatan'));
	}
	public function tambah_data_kecamatan()
	{
		$data = array('id_kecamatan' => $this->input->post('id_kecamatan'), 'jumlah_penduduk' => $this->input->post('jumlah_penduduk'), );
		$this->data_kecamatan_Model->tambah_data_kecamatan($data);
		$this->session->set_flashdata('pesan','data berhasil disimpan');
		redirect(site_url('data_kecamatan'));
	}
	public function hapus_data_kecamatan($id)
	{
		$this->data_kecamatan_Model->hapus_data_kecamatan($id);
		$this->session->set_flashdata('pesan','data berhasil dihapus');
		redirect(site_url('data_kecamatan'));
	}
}

?>