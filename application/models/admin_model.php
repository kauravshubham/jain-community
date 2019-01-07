<?php
class admin_model extends CI_Model
{
	function __construct()
	{
		$this->load->database();
	}
	public function Login(){
			$result = $this->db->get_where('Admin',array('username' =>$this->input->post('username')));

			if($result->num_rows() > 0){
				return $result->row(0);
			} else {
				return false;
			}
	}
}
?>