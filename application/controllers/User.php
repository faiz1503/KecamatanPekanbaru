<?php

/**
* 
*/
class User extends CI_Controller
{
	
	// function __construct(argument)
	// {
	// 	# code...
	// }

	public function index()
	{
		$this->load->view('user/user');
	}
}

?>