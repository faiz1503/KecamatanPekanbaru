<?php
/**
* 
*/
class Kecamatan_Model extends CI_Model
{
	
	public function select_kecamatan()
	{
		return $this->db->get('kecamatan')->result();
	}
	public function tambah_kecamatan($data)
	{
		return $this->db->insert('kecamatan', $data);
	}
	public function hapus_kecamatan($id)
	{
		$this->db->where('id_kecamatan', $id);
		return $this->db->delete('kecamatan');
	}
	public function select_by_id_kecamatan($id)
	{
		$this->db->where('id_kecamatan', $id);
		return $this->db->get('kecamatan')->row();
	}
	public function edit_kecamatan($id, $data)
	{
		$this->db->where('id_kecamatan', $id);
		return $this->db->update('kecamatan', $data);
	}
}

?>