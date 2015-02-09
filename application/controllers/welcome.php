<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public $data = array();

	public function index()
	{
		$data['title'] = 'ErpeelDev :: Home';
		$this->load->view('layout/header',$data);
		$this->load->view('layout/blank');
		$this->load->view('layout/footer');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */