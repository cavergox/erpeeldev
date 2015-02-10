<?php

class User extends CI_Controller{
	public $data = array();

	public function __construct(){
		parent::__construct();
		$this->load->model('user_model');
		$this->load->model('category_model');
		$this->user_model->check_rule();
		$this->data['navigations'] = $this->category_model->category_get_parent();
	}

	public function index()
	{	
		if($this->input->server('REQUEST_METHOD') === 'POST'){
			$this->user_model->check_login();
			if($this->user_model->error_count != 0){
			$this->data['error'] = $this->user_model->error;
			} else {
			redirect('thread/category/discuss');
			}
		}
		$this->data['title']	= 'Login - ErpeelDev';
		$this->load->view('user/login',$this->data);
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('user/index');
	}

	// same function @ admin controller but will redirect to user
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
		$this->data['title'] = 'Edit User - ErpeelDev';
		$this->load->view('layout/header',$this->data);
		$this->load->view('admin/user_edit');
		$this->load->view('layout/footer');
	}

}
?>