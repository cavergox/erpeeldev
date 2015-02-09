<?php

class Thread_model extends CI_Model {
	public $error		= array();
	public $error_count	= 0;
	public $data		= array();
	public $fields		= array();

	public function __construct()
	{
		parent::__construct();
	}

	public function get_all($start,$limit)
	{
		$sql = "SELECT a.*, b.name as category_name, b.url as category_url, c.date_add 
				FROM rpl_thread a, rpl_category b, rpl_post c 
				WHERE a.category_id = b.id_category AND a.id_thread = c.thread_id AND c.date_add = (SELECT MAX(date_add) FROM rpl_post WHERE thread_id = a.id_thread LIMIT 1)
				ORDER BY c.date_add DESC LIMIT ".$start.",".$limit;
		return $this->db->query($sql)->result();
	}

	public function get_total_thread($category)
	{
		$sql = "SELECT a.category_id  
				FROM rpl_thread a,rpl_category b
				WHERE a.category_id = b.id_category AND b.id_category = '".$category."'";
		return $this->db->query($sql)->num_rows();
	}

	public function get_thread($category,$start,$limit)
	{
		$sql = "SELECT a.*, b.name as category_name, b.url as category_url  
				FROM rpl_thread a,rpl_category b
				WHERE a.category_id = b.id_category AND b.id_category = '".$category."'
				ORDER BY date_last_post 
				DESC LIMIT ".$start.",".$limit;
		return $this->db->query($sql)->result();	
	}

	public function get_stage_category($category,$start,$limit,$stage)
	{
		$sql = "SELECT * FROM rpl_category 
		WHERE parent_id = ".$stage."
		ORDER BY name
		DESC LIMIT ".$start.",".$limit;
		return $this->db->query($sql)->result();
	}

	// model talk / interaction forum

	public function get_thread_talk($url)
	{
		$sql = "SELECT a.*, b.name as username,c.name
				FROM rpl_thread a,rpl_users b,rpl_category c
				WHERE a.url_title = '".$url."' AND b.id_user = a.user_id AND a.category_id = c.id_category"; 
		return $this->db->query($sql)->result();
	}

	public function get_post($thread_id,$start,$limit)
	{
		$sql = "SELECT a.*, b.username, b.id_user as user_id
				FROM rpl_post a,rpl_users b
				WHERE a.thread_id = ".$thread_id." AND a.user_id = b.id_user
				ORDER BY a.date_add ASC LIMIT ".$start.",".$limit;
		return $this->db->query($sql)->result();
	}

	public function reply()
	{
		$row = $this->input->post('row');
		if(strlen($row['post']) == 0)
		{
			$this->error['post'] ='Post cannot be empty';
		}

		if(count($this->error) == 0){
			$this->db->insert('rpl_post',$row);
		} else {
			$this->error_count = count($this->error);
		}
	}

	public function thread_create()
	{
		$thread = $this->input->post('row');
		$this->fields = $thread;

		$title_check = $this->db->get_where('rpl_thread',array('title' => $thread['title']));
		if($title_check->num_rows() > 0){
			$this->error['title'] = 'Title "'.$thread['title'].'" already in use';
		}

		if(strlen($thread['content']) == 0){
			$this->error['content'] = 'Content cannot be empty';
		}

		if(count($this->error) == 0){
			// insert into rpl_thread;
			
			$thread['url_title'] = underscore($thread['title']);
			$thread['date_add'] = date("Y-m-d H:i:s");
			$thread['date_last_post'] = date("Y-m-d H:i:s");
			$thread['user_id'] = $this->session->userdata('rpl_user_id');
			$this->db->insert('rpl_thread',$thread);

		} else {
			$this->error_count = count($this->error);
		}
	}
}