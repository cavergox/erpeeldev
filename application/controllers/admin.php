<?php

class Admin extends CI_Controller{
	public $data		= array();
	public $page_config	= array();

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
		$this->load->model('user_model');
		$this->user_model->check_role();
		/*
		if($this->session->userdata('admin_area') == 0){
			redirect('thread');
		}
		*/
	}

	public function set_pagination()
	{
		$this->page_config['first_link']		= '&lsquo; First';
		$this->page_config['first_tag_open']	= '<li>';
		$this->page_config['first_tag_close']	= '</li>';
		$this->page_config['last_link']			= 'Last $raquo;';
		$this->page_config['last_tag_open']		= '<li>';
		$this->page_config['last_tag_close']	= '</li>';
		$this->page_config['next_link']			= 'Next $rsaquo;';
		$this->page_config['next_tag_open']		= '<li>';
		$this->page_config['next_tag_close']	= '</li>';
		$this->page_config['prev_link']			= '&lsquo; Prev';
		$this->page_config['prev_tag_open']		= '<li>';
		$this->page_config['prev_tag_close'] 	= '</li>';
		$this->page_config['cur_tag_open']		= '<li class="active"><a href="javascript://">';
		$this->page_config['cur_tag_close']		= '</a></li>';
		$this->page_config['num_tag_open']		= '<li>';
		$this->page_config['num_tag_close']		= '</li>';
	}

	public function index()
	{
		$this->data['title'] = 'ErpeelDev :: Admin Index';
		$this->load->view('layout/header',$this->data);
		$this->load->view('layout/blank');
		$this->load->view('layout/footer');
	}

	public function user_view()
	{
		$tmp_success = $this->session->userdata('tmp_success');
		if($tmp_success != NULL){
			$this->session->unset_userdata('tmp_success');
			$this->data['tmp_success'] = 1;
		}

		$tmp_success_del = $this->session->userdata('tmp_success_del');
		if($tmp_success_del != NULL){
			$this->session->unset_userdata('tmp_success_del');
			$this->data['tmp_success_del'] = 1;
		}

		$this->db->order_by('username','asc');
		$this->data['users'] = $this->db->get('rpl_users')->result();
		$this->data['title'] = 'ErpeelDev :: User View';
		$this->load->view('layout/header',$this->data);
		$this->load->view('admin/user_view');
		$this->load->view('layout/footer');
	}

	public function user_add()
	{
		if($this->input->server('REQUEST_METHOD') === 'POST')
		{
			$this->user_model->user_add();
			if($this->user_model->error_count != 0){
				$this->data['error'] = $this->user_model->error;
			} else {
				$this->session->set_userdata('tmp_success',1);
				redirect('admin/user_add');
			}

		}

		$tmp_success = $this->session->userdata('tmp_success',1);
		if($tmp_success != NULL){
			// new user created
			$this->session->unset_userdata('tmp_success');
			$this->data['tmp_success'] = 1;
		}

		$this->data['title'] = 'ErpeelDev :: Add User';
		$this->load->view('layout/header',$this->data);
		$this->load->view('admin/user_add');
		$this->load->view('layout/footer');
	}

	public function user_edit($user_id)
	{
		if($this->input->server('REQUEST_METHOD') === 'POST')
		{
			$this->user_model->user_edit();
			if($this->user_model->error_count != 0){
				$this->data['error'] = $this->user_model->error;				
			} else {
				$this->session->set_userdata('tmp_success',1);
				redirect('admin/user_view');
			}
		}
		$tmp_success = $this->session->userdata('tmp_success',1);
		if($tmp_success != NULL){
			$this->session->unset_userdata('tmp_success');
			$this->data['tmp_success'] = 1;
		}
		$this->db->order_by('rule','ASC');
		$this->data['rules'] = $this->db->get('rpl_rule')->result();
		$this->data['user'] = $this->db->get_where('rpl_users',array('id_user' => $user_id))->row();
		$this->data['title'] = 'ErpeelDev :: Edit User';
		$this->load->view('layout/header',$this->data);
		$this->load->view('admin/user_edit');
		$this->load->view('layout/footer');
	}

	public function user_delete($user_id)
	{
		$this->db->delete('rpl_users',array('id_user' => $user_id));
		$this->session->set_userdata('tmp_success_del',1);
		redirect('admin/user_view');
	}

}