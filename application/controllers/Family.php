<?php
class Family extends CI_Controller{
	public function index()
	{  
			$this->main();
	}
	public function logout()
	{
		$this->native_session->destroy();
		$this->login();
	}
	public function main()
	{ 
		 $session=$this->native_session->get('Family');
		if(empty($session))
		{
			$this->load->view('Family/headerLogin');
			$this->load->view('index.php');	
			$this->load->view('Family/footer');	
		}
		else{
			
			echo "<br>";
			
			$this->MemberProfile($session['member_id'],$session['family_id']);
		}
	}
	// Login for family
	public function login()
	{
		$data['title']='Family Login';

		$this->form_validation->set_rules('mobile','Username','required');
		$this->form_validation->set_rules('password','Password','required');

		if($this->form_validation->run()==FALSE){
			$data['page_type']='family_login';
			// load header,view,footer pages and if login page return headerLogin 
			$this->load->view('Family/headerLogin',$data);
			$this->load->view('Family/Login',$data);	
			$this->load->view('Family/footer');	
			}
			else{
				$mobile=$_POST['mobile'];
				$password=$_POST['password'];
				$result=$this->FamilyModel->checkPassword($mobile);
				$login_check=$this->bcrypt->check_password($password, $result['password']);
				if($login_check)
				{ 
						$this->native_session->set('Family',$result);
						$this->MemberProfile($result['head_id'],$result['family_id']);
				}
				else{
					 $this->native_session->set_flashdata('Login_failed','Invalid Username Or Password');
					 redirect('/login');
				}
			}
	}
	public function MemberProfile($member_id=0,$family_id=0)
	{ 
		$data['Self']=$this->FamilyModel->SelfData($member_id);
		$data['Family']=$this->FamilyModel->FamilyData($family_id,$member_id);
		
		if($data['Family']){
		$this->load->view('Family/headerHome');
		$this->load->view('Family/index',$data);	
		$this->load->view('Family/footer');	}
		else
		{ 
			echo "<h2>Record Not Found</h2>";
		}

	}
	//Register new family
	public function register(){
	
		$config['family']= array(
			array(
					'field' => 'membername',
					'label' => 'Name',
					'rules' => 'trim|required'
			),
			array(
					'field' => 'dob',
					'label' => 'Date of Birth',
					'rules' => 'trim|required|regex_match[/^[0-9]{4}-[0-1][0-9]-[0-3][0-9]$/]'
			),
			array(
					'field' => 'landmark',
					'label' => 'Landmark',
					'rules' => 'trim|required'
			),
			array(
					'field' => 'state',
					'label' => 'State',
					'rules' => 'trim'
			),
			array(
					'field' => 'city',
					'label' => 'City',
					'rules' => 'trim|required'
			),
			array(
					'field' => 'ward',
					'label' => 'Ward',
					'rules' => 'trim|required'
			),
			array(
					'field' => 'colony',
					'label' => 'Colony',
					'rules' => 'trim|required'
			),
			array(
					'field' => 'subcast',
					'label' => 'Subcast',
					'rules' => 'trim|required'
			),
			array(
					'field' => 'gotra',
					'label' => 'Gotra',
					'rules' => 'trim|required'
			),
			array(
					'field' => 'occupation',
					'label' => 'Occupation',
					'rules' => 'trim|required'
			),
			array(
					'field' => 'mobile',
					'label' => 'Mobile No.',
					'rules' => 'trim|required'
			),
			array(
					'field' => 'email',
					'label' => 'Email',
					'rules' => 'trim|required|valid_email'
			),
			array(
					'field' => 'password',
					'label' => 'Password',
					'rules' => 'trim|required|min_length[6]|max_length[25]'
			),
			array(
					'field' => 'conf_password',
					'label' => 'Confirm Password',
					'rules' => 'trim|required|min_length[6]|max_length[25]|matches[password]'
			),
		);
		$this->form_validation->set_rules($config['family']);

		if($this->form_validation->run('family')==FALSE){
			$data['title']='Jain Patrika';
			$data['page_type']='family_register';
			// load header,view,footer pages and if login page return headerLogin 
			$this->load->view('Family/headerLogin',$data);
			$this->load->view('Family/Register',$data);	
			$this->load->view('Family/footer');	
			}
			else{
				$member_data['member_name']=$_POST['membername'];
				$member_data['member_dob']=$_POST['dob'];
				$member_data['member_gender']='Male';
				$member_data['member_landmark']=$_POST['landmark'];
				$member_data['member_state']=$_POST['state'];
				$member_data['member_city']=$_POST['city'];
				$member_data['member_ward']=$_POST['ward'];
				$member_data['member_colony']=$_POST['colony'];
				$member_data['member_mobile']=$_POST['mobile'];
				$member_data['member_email']=$_POST['email'];
				$member_data['member_subcast']=$_POST['subcast'];
				$member_data['member_gotra']=$_POST['gotra'];
				$member_data['member_occupation']=$_POST['occupation'];
				$file=date('Ymdhisa', time()).'.jpg';
				$member_data['member_image']=$file;
				$family_data['username']=$_POST['mobile'];
				$family_data['password'] = $this->bcrypt->hash_password($_POST['password']);
				$some_member_data=$this->FamilyModel->newFamily($family_data,$member_data);
				move_uploaded_file($_FILES['image']['tmp_name'],"assets/images/members/$file");
			    $this->native_session->set('some_member_data', $some_member_data);
				$this->add_first_member();
			}
	}
	 function add_first_member()
	{ 
			
		$config['member']= array(
			array(
					'field' => 'member_name',
					'label' => 'Name',
					'rules' => 'trim|required'
			),
			array(
					'field' => 'Birth_date',
					'label' => 'Date of Birth',
					'rules' => 'trim|required|regex_match[/^[0-9]{4}-[0-1][0-9]-[0-3][0-9]$/]'
			),
			array(
					'field' => 'member_occupation',
					'label' => 'Occupation',
					'rules' => 'trim|required'
			)
		);
		$this->form_validation->set_rules($config['member']);
				$data['title']='Add Member';
				
				(isset($_POST['error']))?$data['error']=TRUE :$data['error']=FALSE; 
				if($this->form_validation->run('member')==FALSE)
				{ 
					$data['page_type']='family_register';
					$this->load->view('Family/headerLogin',$data);
					$this->load->view('Family/Register_Member',$data);	
					$this->load->view('Family/footer');	
				}
				else{  
					$member_data['member_name']=$_POST['member_name'];
					$member_data['member_dob']=$_POST['Birth_date'];
					$member_data['member_gender']='Female';
					$member_data['member_relation']='Wife';
					$member_data['member_mobile']=$_POST['member_mobile'];
					$member_data['member_occupation']=$_POST['member_occupation'];
					$member_data['member_ac_status']='Activate';
					$file=date('Ymdhisa', time()).'.jpg';
					$member_data['member_image']=$file;
					$some_member_data = $this->native_session->get('some_member_data');
					$member_id=$some_member_data['member_id'];
					unset($some_member_data['member_id']);
					$member_data=array_merge($member_data,$some_member_data,array('member_relation_to'=>$member_id));
					$this->MemberModel->addFamily($member_data);
					move_uploaded_file($_FILES['member_image']['tmp_name'],"assets/images/members/$file");
					$this->native_session->set_flashdata('Family_Created','Family Account Created');
				
				   //change first later to upper case
					
					// load header,view,footer pages
					$this->load->view('Family/headerLogin');
					$this->load->view('index');	
					$this->load->view('Family/footer');
				}
	}
	public function FamilyMembers(){
		$this->load->view('Family/headerHome');
		$this->load->view('Family/FamilyMembers');	
		$this->load->view('Family/footer');	
	}
	//for json list view of family members
	public function MemberList()
	{
		$Family=$this->native_session->get('Family');
		$family_id=$Family['family_id'];
		echo json_encode($this->FamilyModel->MemberList($family_id));
	}
	// for json member relation to
	public function Fetch_Members()
	{
		$Family=$this->native_session->get('Family');
		$family_id=$Family['family_id'];
		echo json_encode($this->FamilyModel->Fetch_Members($family_id));
	}
	// public function MyNewFamily()
	// {
	// 	$rules['NewFamily']=array(
	// 		array(
	// 				'field' => 'mobile',
	// 				'label' => 'Mobile No.',
	// 				'rules' => 'trim|required'
	// 		),
	// 		array(
	// 				'field' => 'password',
	// 				'label' => 'Password',
	// 				'rules' => 'trim|required|min_length[6]|max_length[25]'
	// 		),
	// 		array(
	// 				'field' => 'conf_password',
	// 				'label' => 'Confirm Password',
	// 				'rules' => 'trim|required|min_length[6]|max_length[25]|matches[password]'
	// 		),
	// 	);
		
	// }
}