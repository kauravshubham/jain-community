<?php
class DropDownModel extends CI_Model{
    function __construct()
	{
		$this->load->database();
    }
    //fetch All state city,ward, colony,sub_cast,gotra
    public function AllData(){
        //state
        $this->db->order_by('state_name','ASC');
        $state=$this->db->get('state');
        //city
        $this->db->order_by('city_name','ASC');
        $city=$this->db->get('city');
        //ward
        $this->db->order_by('ward_name','ASC');
        $ward=$this->db->get('ward');
        //colony
        $this->db->order_by('colony_name','ASC');
        $colony=$this->db->get('colony');
        //suubcast
        $this->db->order_by('subcast_name','ASC');
        $subcast=$this->db->get('subcast');
        //gotra
        $this->db->order_by('gotra_name','ASC');
        $gotra=$this->db->get('gotra');
        
        $result=array(0=>$state->result_array(),1=>$city->result_array(),2=>$ward->result_array(),3=>$colony->result_array(),4=>$subcast->result_array(),5=>$gotra->result_array());
        return $result;

    }
}
?>