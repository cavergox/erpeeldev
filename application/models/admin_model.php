<?php

class Admin_model extends CI_Model {
	public $error		= array();
	public $error_count	= 0;
	public $data		= array();

	public function __construct()
	{
		parent::__construct();
	}

	public function thread_get_all()
    {
        $sql = "SELECT a.*, b.name as category_name FROM rpl_thread a, rpl_category b 
                WHERE a. category_id = b.id_category ORDER BY a.date_add DESC";
        return $this->db->query($sql)->result();
    }

}