<?php

class Admin extends CI_Controller{
	public $data		= array();
	public $page_config	= array();

	public function __construct()
	{
		parent::__construct();
		$this->load->model('category_model');
		$this->load->model('user_model');
		$this->load->model('admin_model');
		$this->user_model->check_rule();

		if(!$this->session->userdata('rpl_user_id')){
			redirect('user/index');
		}

		if($this->session->userdata('admin_area') == 0){
			redirect('thread/category/lounge');
		}
		
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
		$this->data['title'] = 'Admin Index - ErpeelDev ';
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
		$this->data['title'] = 'User View - ErpeelDev ';
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

		$this->data['title'] = 'Add User - ErpeelDev ';
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
		$this->data['title'] = 'Edit User - ErpeelDev';
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

	public function category_add()
	{
		if($this->input->server('REQUEST_METHOD') === 'POST')
		{
			$this->category_model->category_create();
			if($this->category_model->error_count != 0){
				$this->data['error'] = $this->category_model->error;
			} else {
				$this->session->set_userdata('tmp_success',1);
				redirect('admin/category_add');
			}
		}

		$tmp_success = $this->session->userdata('tmp_success');
		if($tmp_success != NULL){
			$this->session->unset_userdata('tmp_success');
			$this->data['tmp_success'] = 1;
		}

		$this->data['categories'] = $this->category_model->category_get_all();
		$this->data['title'] = 'Add Category - ErpeelDev ';
		$this->load->view('layout/header',$this->data);
		$this->load->view('admin/category_add');
		$this->load->view('layout/footer');
	}

	public function category_view()
	{
		$tmp_success = $this->session->userdata('tmp_success');
		if($tmp_success != NULL){
			$this->session->unset_userdata('tmp_success_del');
			$this->data['tmp_success_del'] = 1;
		}
		$this->data['categories'] = $this->category_model->category_get_all();
		$this->data['title'] = 'View Category - ErpeelDev ';
		$this->load->view('layout/header',$this->data);
		$this->load->view('admin/category_view');
		$this->load->view('layout/footer');
	}

	public function category_edit($category_id)
	{
		if($this->input->server('REQUEST_METHOD') === 'POST'){
			$this->category_model->category_edit();
			if($this->category_model->error_count != 0){
				$this->data['error'] = $this->category_model->error;
			} else {
				$this->session->set_userdata('tmp_success',1);
				redirect('admin/category_edit/'.$category_id);
			}
		}
		$tmp_success = $this->session->userdata('tmp_success');
		if($tmp_success != NULL){
			// new category created
			$this->session->unset_userdata('tmp_success');
			$this->data['tmp_success'] =1 ;
		}
		$this->data['category'] = $this->db->get_where('rpl_category',array('id_category' => $category_id))->row();
		$this->data['categories'] = $this->category_model->category_get_all();
		$this->data['title'] = 'Edit Category - ErpeelDev ';
		$this->load->view('layout/header',$this->data);
		$this->load->view('admin/category_edit');
		$this->load->view('layout/footer');
	}

	public function category_delete($category_id)
	{
		$this->db->delete('tbl_category', array('id_category' => $category_id));
		$this->session->set_userdata('tmp_success_del',1);
		redirect('admin/category_view');
	}

	// start thread function
	public function thread_view()
	{

		$tmp_success = $this->session->userdata('tmp_success');
		if($tmp_success != NULL){
			// thread updated
			$this->session->unset_userdata('tmp_success');
			$this->data['tmp_success'] = 1;
		}

		$tmp_success_del = $this->session->userdata('tmp_success_del');
		if($tmp_success_del != NULL){
			// thread deleted
			$this->session->unset_userdata('tmp_success_del');
			$this->data['tmp_success_del'] = 1;
		} 

		$this->data['threads']	= $this->admin_model->thread_get_all();
		$this->data['title']	= 'Admin Thread View - ErpeelDev';
		$this->load->view('layout/header',$this->data);
		$this->load->view('admin/thread_view');
		$this->load->view('layout/footer');
	}

	public function thread_edit($thread_id)
	{
		if($this->session->userdata('thread_edit') == 0){
			redirect('admin');
		}
		if($this->input->server('REQUEST_METHOD') === POST){
			$this->admin_model->thread_edit();
			if($this->admin_model->error_count != 0){
				$this->data['error']	= $this->admin_model->error;
			} else {
				$this->session->set_userdata('tmp_success',1);
				redirect('admin/thread_view');
			}
		}
		$this->data['title']		= 'Admin thread edit - ErpeelDev';
		$this->data['thread']		= $this->db->get_where('rpl_thread',array('id_thread' => $thread_id))->row();
		$this->data['categories']	= $this->admin_model->category_get_all();
		$this->load->view('layout/header',$this->data);
		$this->load->view('admin/thread_edit');
		$this->load->view('layout/footer');
	}

	public function thread_delete($thread_id)
	{
		if($this->session->userdata('thread_delete') == 0){
			redirect('admin');
		}
		// delete thread
		$this->db->delete('rpl_thread', array('id_thread' => $thread_id));

		// delete all posts on this thread
		$this->db->delete('rpl_thread', array('thread_id' => $thread_id));
		$this->session->set_userdata('tmp_success_del',1);
		redirect('admin/thread?view');
	}

	public function role_create()
	{
		if($this->session->userdata('role_create') == 0) {
			redirect('admin');
		}
		if($this->input->server('REQUEST_METHOD') === POST)
		{
			$this->admin_model->role_create();
			if($this->admin_model->error_count != 0){
				$this->data['error']	= $this->admin_model->error;
			} else{
				$this->session->set_userdata('tmp_success',1);
				redirect('admin/role_create');
			}
		}

		$tmp_success = $this->session->userdata('tmp_success');
		if($tmp_success != NULL){
			// new role created
			$this->session->unset_userdata('tmp_success');
			$this->data['tmp_success'] = 1;
		}

		$this->data['title']	= 'Admin rule create - ErpeelDev';
		$this->load->view('layout/header',$this->data);
		$this->load->view('admin/rule_create');
		$this->load->view('layout/footer');
	}

	public function rule_view()
	{
		$tmp_success_del = $this->session->userdata('tmp_success_del');
		if($tmp_success_del != NULl){
			// rule deleted
			$this->session->unset_userdata('tmp_success_del');
			$this->data['tmp_success_del'] = 1;
		}

		$this->load->model('admin_model');
		$this->data['rules']		= $this->admin_model->role_get_all();
		$this->data['column_width']	= floor(100 / count($this->data['rules']));
		$this->data['title']		= 'Admin rule view - ErpeelDev';
		$this->load->view('layout/header',$this->data);
		$this->load->view('admin/rule_view');
		$this->load->view('layout/footer');
	}
}