<?php

Class User_model extends CI_Model{
	public $error		= array();
	public $error_count	= 0;

	public function __construct()
	{
		parent::__construct();
	}

	public function check_rule()
	{
		$user_id = $this->session->userdata('rpl_user_id');
		// get rules
		if($user_id){
			$row = $this->db->get_where('rpl_users', array('id_user' => $user_id))->row();
			$rules = $this->db->get_where('rpl_rule', array('id_rule' => $row->rule_id))->row_array();
			foreach($rules as $key => $value){
				$this->session->set_userdata($key,$value);
			}
		}
	}

	public function check_login()
	{
        $row = $this->input->post('row');
        $key = $this->config->item('encryption_key');
        
        $data = array('username' => $row['username']);

        $query = $this->db->get_where('rpl_users', $data);
        
        $plain_password = '';

        if ( ($query->num_rows() == 1) ) {
            $user = $query->row();
            $plain_password = $this->encrypt->decode($user->password, $key);
        }
        
       
        if (($query->num_rows() == 0) && ($plain_password != $row['password'])) {
        	$this->error['login'] = 'Login failed';
			$this->error_count = 1;
		} 
		else if ($plain_password != $row['password']){
			$this->error['password'] = 'Password wrong';
			$this->error_count = 1;
		}
		else {
			 // if user found
			$row = $query->row();
			$this->session->set_userdata('rpl_logged_in',1);
			$this->session->set_userdata('rpl_user_id',$row->id_user);
			$this->session->set_userdata('rpl_username',$row->username);
			$this->session->set_userdata('rpl_user_rule',$row->rule_id);

			/* get rules*/
			$rules = $this->db->get_where('rpl_rule', array('id_rule' => $row->rule_id))->row_array();
			foreach($rules as $key => $value){
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
			$this->error['username'] = 'Username "'.$row['username'].'" already used';
		}
		// check email
		$check_email = $this->db->get_where('rpl_users',array('email' => $row['email']))->num_rows();
		if($check_email > 0)
		{
			$this->error['email'] = 'email "'.$row['email'].'" already used';
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

		if($row['username'] != $row['username_user'])
		{
			$check_username = $this->db->get_where('rpl_users',array('username' => $row['username']));
			if($check_username->num_rows() > 0)
			{
				$this->error['username'] = 'Username "'.$row['username'].'" already used';
			}
		}
		// check email
		if($row['email'] != $row['email_user'])
		{
			$check_email = $this->db->get_where('rpl_users',array('email' => $row['email']));
			if($check_email->num_rows() > 0)
			{
				$this->error['email'] = 'email "'.$row['email'].'" already used';
			}
		}	

		if(count($this->error) == 0){
			unset($row['username_user']);
			unset($row['email_user']);
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