<?php
class City extends CI_Controller{
    public function index()
    {
         $data['title']="City";
        $this->load->view('Admin/headerHome');
		$this->load->view('Admin/City/showCity',$data);	
		$this->load->view('Admin/footer');
    }
    public function FetchAllStateCity()
    {
        echo json_encode($this->CityModel->FetchAllStateCity());
    }
    public function AddCity()
    {
        $data['state_id']=$_POST['state'];
        $data['city_name']=$_POST['city'];
        $this->CityModel->AddCity($data);
    }
    public function DeleteCity()
    {
        $this->CityModel->DeleteCity($_POST);
    }
    public function EditCity()
    {
        $data['state_id']=$_POST['state'];
        $data['city_name']=$_POST['city'];
        $city_id=$_POST['city_id'];
        $this->CityModel->EditCity($data,$city_id);
    }

}
?>