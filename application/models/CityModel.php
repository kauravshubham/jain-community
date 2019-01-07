<?php
class CityModel extends CI_Model{
    function __construct()
	{
		$this->load->database();
    }
    public function FetchAllStateCity()
    {
       $this->db->order_by('state_name','ASC');
        $state=$this->db->get('state');
        //city
        $this->db->order_by('city_name','ASC');
        $city=$this->db->get('city');
        $result=array('state'=>$state->result_array(),'city'=>$city->result_array());
        return $result;
    }
    public function AddCity($city)
    {
        $this->db->insert('city',$city);
        return true;
    }
    public function DeleteCity($city_id)
    { 
        $this->db->where('city_id', $city_id['city_id']);
        $this->db->delete('city');
        return true;
    }
    public function EditCity($data,$city_id)
    {
        $this->db->where('city_id', $city_id);
        $this->db->update('city', $data); 
        return true;   
    }
}
?>