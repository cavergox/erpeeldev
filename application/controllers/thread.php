<?php

class Thread extends CI_Controller{
	public $data		= array();
	public $page_config	= array();
	public function __construct()
	{
		parent::__construct();
		$this->load->model('thread_model');
		$this->load->model('user_model');
		$this->load->model('category_model');
		$this->user_model->check_rule();
		// navigation left
		$this->data['navigations'] = $this->category_model->category_get_parent();

		if(!$this->session->userdata('rpl_user_id')){
			redirect('user/index');
		}		
	}

	public function set_pagination()
	{
		$this->page_config['first_link']         = '&lsaquo; First';
        $this->page_config['first_tag_open']     = '<li>';
        $this->page_config['first_tag_close']    = '</li>';
        $this->page_config['last_link']          = 'Last &raquo;';
        $this->page_config['last_tag_open']      = '<li>';
        $this->page_config['last_tag_close']     = '</li>';
        $this->page_config['next_link']          = 'Next &rsaquo;';
        $this->page_config['next_tag_open']      = '<li>';
        $this->page_config['next_tag_close']     = '</li>';
        $this->page_config['prev_link']          = '&lsaquo; Prev';
        $this->page_config['prev_tag_open']      = '<li>';
        $this->page_config['prev_tag_close']     = '</li>';
        $this->page_config['cur_tag_open']       = '<li class="active"><a href="javascript://">';
        $this->page_config['cur_tag_close']      = '</a></li>';
        $this->page_config['num_tag_open']       = '<li>';
        $this->page_config['num_tag_close']      = '</li>';
	}

	public function category($cat,$start = 0)
	{
		// set pagination
		$category = $cat;
		$this->load->library('pagination');
		$this->page_config['base_url']		= site_url('thread/category/'.$category.'/');
		$this->page_config['uri_segment'] 	= 4;
		$this->page_config['total_rows']	= $this->thread_model->get_total_thread($category);
		$this->page_config['per_page']		= 10;
		$this->set_pagination();
		$this->pagination->initialize($this->page_config);
		$this->data['type']		= 'index';
		$this->data['page']		= $this->pagination->create_links();
		$this->data['title']	= ' ErpeelDev';
		$this->data['category'] = $category;
		$this->data['total']	= $this->page_config['total_rows'];
		$this->data['current']  = $this->page_config['total_rows']/10;
		// stage layout
		if($category=='3'){
		$stage = 3;
		$this->data['stages']	= $this->thread_model->get_stage_category($category,$start,$this->page_config['per_page'],$stage);
		$this->load->view('layout/header',$this->data);
		$this->load->view('thread/stage');
		$this->load->view('layout/footer');
		}
		// library layout
		else if($category=='5'){
		$this->load->view('layout/header',$this->data);
		$this->load->view('thread/library');
		$this->load->view('layout/footer');
		}
		// studio layout
		else if($category=='10'){
		$this->load->view('layout/header',$this->data);
		$this->load->view('thread/studio');
		$this->load->view('layout/footer');
		}
		else {

		// category variabel for breadcumb
		$categories = $this->db->get_where('rpl_category',array('id_category'=>$cat))->row();

		// load layout 
		$this->data['category'] = $categories;
		$this->data['threads']	= $this->thread_model->get_thread($category,$start,$this->page_config['per_page']);
		$this->load->view('layout/header',$this->data);
		$this->load->view('thread/thread_list');
		$this->load->view('layout/footer');
		}
		
	}

	public function talk($url, $start = 0)
	{
		// notification
		$tmp_success = $this->session->userdata('tmp_success');
		if($tmp_success != NULL){
			// notification for new post on thread
			$this->session->unset_userdata('tmp_success');
			$this->data['tmp_success'] = 1;
		}

		// load thread for pagination
		$thread = $this->db->get_where('rpl_thread',array('url_title'=>$url))->row();
		$this->load->library('pagination');
		$this->page_config['base_url'] = site_url('thread/talk/'.$url.'/');
		$this->page_config['uri_segment'] = 4;
		$this->page_config['total_rows'] = $this->db->get_where('rpl_post',array('thread_id' => $thread->id_thread))->num_rows();
		$this->page_config['per_page'] = 5;
		$this->set_pagination();
		$this->pagination->initialize($this->page_config);

		// load data layout
		$this->data['title'] = humanize($this->uri->segment(3)).' - ErpeelDev';
		$this->data['page'] = $this->pagination->create_links();
		$this->data['threads'] = $this->thread_model->get_thread_talk($url);
		$this->data['posts'] = $this->thread_model->get_post($thread->id_thread,$start,$this->page_config['per_page']);
		
		// load layout
		$this->load->view('layout/header',$this->data);
		$this->load->view('thread/thread_view');
		$this->load->view('layout/footer');
	}

	public function reply($url)
	{
			if($this->input->server('REQUEST_METHOD') === 'POST'){
			$this->thread_model->reply();
			if($this->thread_model->error_count != 0){
				$this->data['error'] = $this->thread_model->error;
			} else {
				$this->session->set_userdata('tmp_success',1);
				redirect('thread/talk/'.$url.'/');
			}
			}
			$thread = $this->db->get_where('rpl_thread',array('url_title'=>$url))->row();
			$this->data['thread'] = $thread;
			$this->load->view('layout/header',$this->data);
			$this->load->view('thread/thread_reply');
			$this->load->view('layout/footer');
	}

	public function thread_create()
	{
		if($this->input->server('REQUEST_METHOD') === 'POST'){
			$this->thread_model->thread_create();
			if($this->thread_model->error_count != 0){
				$this->data['error'] = $this->thread_model->error();
			} else {
				$this->session->set_userdata('tmp_success_new',1);
				redirect('thread/talk/'.underscore($this->thread_model->fields['title']));
			}
		}
		$this->data['categories'] = $this->category_model->category_get_all();
		$this->data['title'] = 'Post New Thread';
		$this->load->view('layout/header',$this->data);
		$this->load->view('thread/thread_create');
		$this->load->view('layout/footer');
	}

	public function error404()
	{
		$this->load->view('layout/404error');
	}

}