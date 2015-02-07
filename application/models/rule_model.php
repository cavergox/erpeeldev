<?php

class rule_model extends CI_Model{
	public $data 		= array();
	public $error_count = 0;
	public $error 		= array();

	public function __construct()
	{
		parent::__construct();
	}

	public function rule_create()
	{
		// rules function
		$row = $this->input->post('row');

		//check rule
		$rule_check = $this->db->get_where('rpl_rule',array('rule'=>$row['rule']));
		if($rule_check->num_rows() > 0)
		{
			$this->error['rule'] = 'rule name "'.$row['rule'].'" alredy in use';
		}

		if(!isset($row['rules'])){
			$this->error['rules'] = 'Choose minimum 1 rule';
		}

		if(count($this->error) == 0){
			$data = array();
			$data['rule'] = $row['rule'];
			foreach($row['rules'] as $key => $value)
				{
					$data[$key] = 1;
				}
			$this->db->insert('rpl_rule',$data);
		} else {
			$this->error_count = count($this->error);
		}
	}

	public function rule_edit()
	{
		$row = $this->input->post('row');

		// check rule name
		if($row['rule'] != $row['rule_check']){
			$rule_check = $this->db->get_where('rpl_rule',array('rule' => $row['rule']));
			if($rule_check->num_rows() > 0){
				$this->error['rule'] = 'Rule name "'.$row['rule'].'" already in use';
			}
		}

		if(!isset($row['rules'])){
			$this->error['rules'] = 'Chooset minimun 1 rule'; 
		}

		if(count($this->error) == 0){
			unset($row['rule_check']);

			$row_reset = $row['rules'];
			foreach($row_reset as $key => $value){
				$row_reset[$key] = 0;
			}

			$this->db->where('id_rule',$row['id_rule']);
			$this->db->update('rpl_rule',$row_reset);

			// update rule
			$data = array();
			$data['rule']  = $row['rule'];
			foreach ($row['rules'] as $key => $value){
				$data[$key] = 1;
			}
			$this->db->where('id_rule',$row['id_rule']);
			$this->db->update('rpl_rule',$data);
		} else {
			$this->error_count = count($this->error);
		}
	}

	public function rule_get_all()
	{
		$this->db->order_by('rule','asc');
		$data = $this->db->get('rpl_rule')->result_array();
		$data_return = array();
		$loop = 0;
		foreach($data as $rule)
		{
			foreach($rule as $key => $value)
			{
				$data_return[$loop][$key] = $value;
			}
			$loop++;
		}
		return $data_return;
	}



}