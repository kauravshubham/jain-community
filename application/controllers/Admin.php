<?php
class Admin extends CI_Controller{
	//login page
	public function index()
	{
			$data['title']='Admin Login';
			//set validation rules
			$this->form_validation->set_rules('username','Username','required');
			$this->form_validation->set_rules('password','Password','required');

			//check from validation run or not
			if($this->form_validation->run()==FALSE){
			$data['page_type']='admin_login';
			// load header,view,footer pages and if login page return headerLogin
			$this->load->view('Admin/headerLogin',$data);
			$this->load->view('Admin/Login',$data);
			$this->load->view('Admin/footer');
			}
			else{
				// fetch hashed password from database
				$result=$this->admin_model->Login();
				if($result==false){
				$this->native_session->	set_flashdata('login_failed','Invalid Login');
					redirect('Admin/');
				}
				else{
				//check hashed password
				if ($this->bcrypt->check_password($_POST['password'], $result->password) )
					{
						$this->native_session->set_flashdata('login_success','Successfuly Login');
							$this->Dashboard();
					 }
				else
				   {
					$this->session->native_set_flashdata('login_failed','Invalid Login');
					redirect('Admin/');
				  }
				  }
			}
	}
	// DashBoard
	public function Dashboard(){
		$data['title']='Admin Dashboard';
			$this->load->view('Admin/headerHome');
			$this->load->view('Admin/Dashboard',$data);
			$this->load->view('Admin/footer');

	}

}
?>