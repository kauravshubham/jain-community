<?php
class Ward extends CI_Controller{
    public function index()
    {
         $data['title']="Ward";
        $this->load->view('Admin/headerHome');
		$this->load->view('Admin/Ward/showWard',$data);	
		$this->load->view('Admin/footer');
    }
    public function FetchAllStateCityWard()
    {
        echo json_encode($this->WardModel->FetchAllStateCityWard());
    }
    public function AddWard()
    {
        $data['city_id']=$_POST['city'];
        $data['ward_name']=$_POST['ward'];
        $this->WardModel->AddWard($data);
    }
    public function DeleteWard()
    {
        $this->WardModel->DeleteWard($_POST);
    }
    public function EditWard()
    {
        $data['city_id']=$_POST['city'];
        $data['ward_name']=$_POST['ward'];
        $ward_id=$_POST['ward_id'];
        $this->WardModel->EditWard($data,$ward_id);
    }
}
?>