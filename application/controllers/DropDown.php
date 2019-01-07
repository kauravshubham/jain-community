<?php
class DropDown extends CI_Controller{
    public function index(){
        
        echo json_encode($this->DropDownModel->AllData());
    }
}
?>