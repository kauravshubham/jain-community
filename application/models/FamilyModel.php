<?php
class FamilyModel extends CI_Model
{
    function __construct()
	{
		$this->load->database();
    }
    public function newFamily($family_data,$member_data)
    {
        //insert record into member
        $this->db->insert('member',$member_data);
        //get last inserted member id
        $head_id=$this->db->insert_id();
        //merge head_id into family data
        $family_data=array_merge($family_data,array('head_id'=>$head_id));
        //insert record into family
        $this->db->insert('family',$family_data);
        //get last inserted family id
        $family_id=$this->db->insert_id();
        // add family_id into member
        $this->db->where('member_id', $head_id);
        $this->db->update('member', array('family_id'=>$family_id,'member_relation_to'=>$head_id));
        $this->db->select("family_id,member_id,member_state,member_city,member_ward,member_colony,member_cast,member_subcast,member_gotra");
        $this->db->where("member.family_id",$family_id);
        $query=$this->db->get('member');
        
        return $query->row_array();
    }
    //check login for family
    public function checkPassword($mobile)
    {
        $query="SELECT F.*,M.* from Family F, Member M where F.head_id=M.member_id AND M.member_ac_status='Activate' AND member_status='Available' AND F.username=$mobile";
        $query=$this->db->query($query);
        return $query->row_array();
        
    }
    //single User Data
    public function SelfData($id)
    {
        $this->db->where('member_id',$id);
        $query=$this->db->get('Member');
        return $query->row_array();
    }
    public function FamilyData($family_id,$member_id)
    { $relation=array('Son' ,'wife','Daughter');
     $this->db->where('member.family_id',$family_id);
     $this->db->where('member.member_relation_to',$member_id);
     $this->db->where_in('member.member_relation',$relation);
     $this->db->order_by('member.member_relation', 'DESC');
     $query=$this->db->get('member');
    
     return $query->result_array();
    }
    public function MemberList($family_id)
    {
        $query="SELECT M.member_name,M.member_dob,M.member_gender,M.member_occupation,M.member_relation,(SELECT R.member_name FROM member R WHERE R.member_id=M.member_relation_to ) AS member_relation_to,(SELECT G.gotra_name from gotra G WHERE G.gotra_id=M.member_gotra) AS member_gotra, M.member_mobile, M.member_image FROM Member M WHERE M.family_id=$family_id AND M.member_ac_status='Activate'";
            // echo $query;
        // $this->db->where('member.family_id',$family_id);
        // $this->db->where('member.member_ac_status','Activate');
        $query=$this->db->query($query);
        return $query->result_array();
    }
}   
?>