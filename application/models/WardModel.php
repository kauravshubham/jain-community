<?php
class WardModel extends CI_Model{
    function __construct()
	{
		$this->load->database();
    }

    public function FetchAllStateCityWard()
    {
       $this->db->order_by('state_name','ASC');
        $state=$this->db->get('state');
        //city
        $this->db->order_by('city_name','ASC');
        $city=$this->db->get('city');
        //ward
        $this->db->order_by('ward_name','ASC');
        $ward=$this->db->get('ward');
        $result=array('state'=>$state->result_array(),'city'=>$city->result_array(),'ward'=>$ward->result_array());
        return $result;
    }
    public function AddWard($ward)
    {
        $this->db->insert('ward',$ward);
        return true;
    }
    public function DeleteWard($ward_id)
    { 
        $this->db->where('ward_id', $ward_id['ward_id']);
        $this->db->delete('ward');
        return true;
    }
    public function EditWard($data,$ward_id)
    {
        $this->db->where('ward_id', $ward_id);
        $this->db->update('ward', $data); 
        return true;   
    }
}
?>