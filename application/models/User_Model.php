<?php
/**
* 
*/
class User_Model extends CI_Model
{
	
	public function select_user()
	{
		return $this->db->get('user')->result();
	}
	public function tambah_user($data)
	{
		return $this->db->insert('user', $data);
	}
	public function hapus_user($id)
	{
		$this->db->where('id_user', $id);
		return $this->db->delete('user');
	}
	public function select_by_id_user($id)
	{
		$this->db->where('id_user', $id);
		return $this->db->get('user')->row();
	}
	public function edit_user($id, $data)
	{
		$this->db->where('id_user', $id);
		return $this->db->update('user', $data);
	}
	public function cek_login($username_user, $password_user)
	{
		$this->db->where('username_user', $username_user);
		$this->db->where('password_user', $password_user);
		return $this->db->get('user')->row();
	}
}

?>