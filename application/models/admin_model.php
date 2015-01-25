<?php

class Admin_model extends CI_Model {
	public $error		= array();
	public $error_count	= 0;
	public $data		= array();

	public function __construct()
	{
		parent::__construct();
	}

	public function user_register()
	{
		$row = $this->input->post('row');

		$check_username = $this->db->get_where('rpl_users',array('username' => $row['username']))->num_rows();

		// check username 
		if($check_username > 0)
		{
			$this->error['username'] = 'Username cannot use';
		}
		if(strlen($num_rows['username']) < 5){
			$this->error['username'] = 'Username minimum 5 character';
		}

		// check password 
		if($row['password'] != $this->input->post('password2')){
			$this->error['password'] = 'Password does not match';
		} else if(strlen($row['password']) < 5){
			$this->error['password'] = 'Password minimum 5 character';
		}

		if(count($this->error) == 0){
			$key = $this->config->item('encryption_key');
			$row['password'] = $this->encrypt->encode($row['password'],$key);
			$this->db->insert('rpl_users',$row);
		} else {
			$this->error_count = count($this->error);
		}
	}
}