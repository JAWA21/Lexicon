<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		$this->load->model('gallery_model');
	}

	public function index()
	{
		$photoArr['photoArr']=$this->gallery_model->read_photos();
		$data['title']= 'Home';
		$data = array_merge($data, $photoArr);
		
		$this->load->view('includes/header',$data);
		$this->load->view('pages/home', $data);
		$this->load->view('includes/footer');
	}

	public function login_view()
	{
		if(($this->session->userdata('user_name')!=""))
		{
			$this->login();
		}
		else{
			$data['title']= 'Login';
			$this->load->view('includes/header',$data);
			$this->load->view('registration_view.php', $data);
			$this->load->view('includes/footer');
		}
	}

	public function login()
	{
		$email=$this->input->post('email');
		$password=md5($this->input->post('pass'));

		$result['user']=$this->user_model->login($email,$password);
		if($result) $this->welcome($result);
		else        $this->index();
	}

	public function registration()
	{
		$this->load->library('form_validation');
		// field name, error message, validation rules
		$this->form_validation->set_rules('user_name', 'User Name', 'trim|required|min_length[4]|xss_clean');
		$this->form_validation->set_rules('email_address', 'Your Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
		$this->form_validation->set_rules('con_password', 'Password Confirmation', 'trim|required|matches[password]');

		if($this->form_validation->run() == FALSE)
		{
			$this->index();
		}
		else
		{
			$this->user_model->add_user();
			$this->thank();
		}
	}

	public function thank()
	{
		$data['title']= 'Thank';
		$this->load->view('includes/header',$data);
		$this->load->view('thank_view.php', $data);
		$this->load->view('includes/footer');
	}

	public function welcome($result=null)
	{
		$data['title']= 'Welcome';
		if($this->session->userdata('user_name')!="")
		{
			if($result != null)
			{
				$result['userPhotos']=$this->gallery_model->read_onePhoto($this->session->userdata('user_id'));
				$data = array_merge($data, $result);
			}

			$this->load->view('includes/header',$data);
			$this->load->view('welcome_view.php', $data);
			$this->load->view('includes/footer');
		}else{
			$this->login_view();
		}
	}
	public function profile()
	{
		if($this->session->userdata('user_name')!="")
		{
			$data['title']= 'Profile';
			$this->load->view('includes/header',$data);
			$this->load->view('pages/profile_view.php', $data);
			$this->load->view('includes/footer');
		}else{
			$this->login_view();
		}
	}

	// public function orderStat()
	// {
	// 	if($this->session->userdata('user_name')!="")
	// 	{
	// 		$data['title']= 'Orders';
	// 		$this->load->view('includes/header',$data);
	// 		$this->load->view('pages/orders_view.php', $data);
	// 		$this->load->view('includes/footer');
	// 	}else{
	// 		$this->login_view();
	// 	}
	// }

	public function photosUp()
	{
		if($this->session->userdata('user_name')!="")
		{
			$data['title']= 'Your Photos';
			$result['userPhotos']=$this->gallery_model->read_onePhoto($this->session->userdata('user_id'));
			
			$data = array_merge($data, $result);
			$this->load->view('includes/header',$data);
			$this->load->view('pages/yPhotos.php', $data);
			$this->load->view('includes/footer');
		}else{
			$this->login_view();
		}
	}

	public function update()
	{
		$data['title']= 'Profile';
		if($this->session->userdata('user_name')!="")
		{
			$ID = $this->session->userdata('user_id');
			$user=$this->input->post('user_name');
			$email=$this->input->post('email_address');
			$oldpass=md5($this->input->post('old_password'));
			$newpass=md5($this->input->post('password'));
			$conpass=md5($this->input->post('con_password'));

			if($newpass == $conpass){
				$result['user']=$this->user_model->update_user($user,$email,$newpass, $oldpass,$ID);
			}
			
			$data = array_merge($data, $result);
			$this->load->view('includes/header',$data);
			$this->load->view('pages/profile_view.php', $data);
			$this->load->view('includes/footer');
		}else{
			$this->login_view();
		}
	}

	public function logout()
	{
		$newdata = array(
		'user_id'   =>'',
		'user_name'  =>'',
		'user_email'     => '',
		'logged_in' => FALSE,
		);
		$this->session->unset_userdata($newdata);
		$this->session->sess_destroy();
		$this->index();
	}
}
?>