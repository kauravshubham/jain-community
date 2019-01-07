<?php
class Member extends CI_Controller{
    //add member by family head
    public function AddMember()
    {
        $member_data['member_name']=$_POST['member_name'];
        $member_data['member_dob']=$_POST['member_dob'];
        $member_data['member_gender']=$_POST['member_gender'];
        $member_data['member_relation'] = ($_POST['member_gender']==='Male') ? 'Son' : 'Daughter' ;
        $member_data['member_mobile']=$_POST['member_mobile'];
        $member_data['member_occupation']=$_POST['member_occupation'];
        $member_data['member_ac_status']='Activate';
        $file=date('Ymdhisa', time()).'.jpg';
        $member_data['member_image']=$file;
        $some_member_data = $this->native_session->get('Family');
        $loged_member_id=$some_member_data['member_id'];
        
        $member_data=array_merge($member_data,array('member_relation_to'=>$loged_member_id));
        $this->MemberModel->addMember($member_data,$loged_member_id);
        move_uploaded_file($_FILES['member_image']['tmp_name'],"assets/images/members/$file");
       echo json_encode(true);
    }
    
    // public function Fetch_Members_Json(){
    //     $result=$this->MemberModel->Fetch_Members_Json();
    //     if(!$this->session->userdata('family_head_data'))
    //     {
    //        $session_data= $this->session->userdata('family_head_data');
    //         // $result=array($result,"member_id"=>)
    //     }
    //     else{

    //     }
    
}
?>