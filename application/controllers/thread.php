<?php

class Thread extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('thread_model');
		$this->load->model('user_model');
		$this->user_model->check_rule();

		if(!$this->session->userdata('rpl_user_id')){
			redirect('user/index');
		}
		/*
		if($this->session->userdata('admin_area') == 0){
			redirect('thread/category/lounge');
		}
		*/
				
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
		$this->page_config['per_page']		= 5;
		$this->set_pagination();
		$this->pagination->initialize($this->page_config);
		$this->data['type']		= 'index';
		$this->data['page']		= $this->pagination->create_links();
		$this->data['threads']	= $this->thread_model->get_thread($category,$start,$this->page_config['per_page']);
		$this->data['title']	= ucfirst($category).' ErpeelDev';
		$this->data['category'] = $category;
		$this->load->view('layout/header',$this->data);
		$this->load->view('thread/'.$category);
		$this->load->view('layout/footer');
	}

	public function talk($url, $start = 0)
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
		$tmp_success = $this->session->userdata('tmp_success');
		if($tmp_success != NULL){
			// notification for new post on thread
			$this->session->unset_userdata('tmp_success');
			$this->data['tmp_success'] = 1;
		}

		$thread = $this->db->get_where('rpl_thread',array('url_title'=>$url))->row();
		$this->load->library('pagination');
		$this->page_config['base_url'] = site_url('thread/talk/'.$url.'/');
		$this->page_config['uri_segment'] = 4;
		$this->page_config['total_rows'] = $this->db->get_where('rpl_post',array('thread_id' => $thread->id_thread))->num_rows();
		$this->page_config['per_page'] = 5;
		$this->set_pagination();
		$this->pagination->initialize($this->page_config);
		$this->data['title'] = $this->uri->segment(3).' - ErpeelDev';
		$this->data['page'] = $this->pagination->create_links();
		$this->data['thread'] = $thread;
		$this->data['posts'] = $this->thread_model->get_post($thread->id_thread,$start,$this->page_config['per_page']);
		$this->load->view('layout/header',$this->data);
		$this->load->view('thread/thread_view');
		$this->load->view('layout/footer');
	}

}