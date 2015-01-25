<?php

Class User_model extends CI_Model{
	public $error		= array();
	public $error_count	= 0;

	public function __construct()
	{
		parent::__construct();
	}

	public function check_role()
	{
		$user_id = $this->session->userdata('rpl_user_id');
		//get rules
		if($user_id){
			$row = $this->db->get_where('rpl_users',array('id' => $user_id))->row();
			$roles = $this->db->get_where('rpl_rules',array('id' => $row->role_id))->row_array();
			foreach($roles as $key => $value){
				$this->session->set_userdata($key,$value);

			}
		}
	}

	public function user_add()
	{
		$row = $this->input->post('row');
		// check username
		$check_username = $this->db->get_where('rpl_users',array('username' => $row['username']))->num_rows();
		if($check_username > 0)
		{
			$this->error['username'] = 'Username has registered';
		}
		$check_email = $this->db->get_where('rpl_users',array('email' => $row['email']))->num_rows();
		if($check_email > 0)
		{
			$this->error['email'] = 'email has registered';
		}

		if(count($this->error) == 0){
			$key = $this->config->item('encryption_key');
			$row['password'] = $this->encrypt->encode($row['password'],$key);
			$this->db->insert('rpl_users',$row);
		} else {
			$this->error_count = count($this->error);
		}
	}

	public function user_edit()
	{
		$row = $this->input->post('row');

		if(count($this->error) == 0){
			if($row['password'] != "")
			{
			$key = $this->config->item('encryption_key');
			$row['password'] = $this->encrypt->encode($row['password'],$key);
			}
			else{
				unset($row['password']);
			}
			
			$this->db->where('id_user',$row['id_user']);
			$this->db->update('rpl_users',$row);
		} else {
			$this->error_count = count($this->error);
		}	
	}


}