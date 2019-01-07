<?php
class MemberModel extends CI_Model{
    function __construct()
	{
		$this->load->database();
    }
    public function Fetch_Members_Json($family_id=0){
        $query="Select member_id,member_name from member where family_id=".$family_id;
        $query=$this->db->query($query);
        return $query->result_array();
    }
    public function addFamily($member_data)
    {
       $this->db->insert('member',$member_data);
       $this->db->select("head_id");
       $this->db->from("family");
       $this->db->where("family.family_id",$member_data['family_id']);
       $result=$this->db->get()->row_array();
       $this->db->where("member.member_id",$result['head_id']);
       $this->db->update('member', array('member_ac_status'=>'Activate'));
       return true;
    }
   public function addMember($member_data,$loged_member_id){
        $this->db->select("family_id,member_state,member_city,member_ward,member_colony,member_cast,member_subcast,member_gotra");
        $this->db->where("member.member_id",$loged_member_id);
        $query=$this->db->get('member')->row_array();

        $data=array_merge($member_data,$query);
       $this->db->insert('member',$data);
        return true;
    }
}
?>