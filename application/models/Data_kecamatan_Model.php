<?php
/**
* 
*/
class Data_kecamatan_Model extends CI_Model
{
	
	public function select_data_kecamatan()
	{
		$this->db->join('kecamatan', 'kecamatan.id_kecamatan=data_kecamatan.id_kecamatan');
		return $this->db->get('data_kecamatan')->result();
	}
	public function tambah_data_kecamatan($data)
	{
		return $this->db->insert('data_kecamatan', $data);
	}
	public function hapus_data_kecamatan($id)
	{
		$this->db->where('id_data_kecamatan', $id);
		return $this->db->delete('data_kecamatan');
	}
	public function select_by_id_data_kecamatan($id)
	{
		$this->db->where('id_data_kecamatan', $id);
		return $this->db->get('data_kecamatan')->row();
	}
	public function edit_data_kecamatan($id, $data)
	{
		$this->db->where('id_data_kecamatan', $id);
		return $this->db->update('data_kecamatan', $data);
	}
}

?>