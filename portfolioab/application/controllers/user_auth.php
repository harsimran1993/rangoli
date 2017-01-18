<?php


class user_auth extends CI_Controller {

public function __construct() {
	
parent::__construct();

// Load form helper library
$this->load->helper('form');

//load url helper library
$this->load->helper('url_helper');

// Load form validation library
$this->load->library('form_validation');

// Load session library
$this->load->library('session');

// Load database
$this->load->model('login_database');

}
	
	// Check for user login process
public function user_login_process() {
	$this->form_validation->set_rules('login_username', 'Username', 'trim|required');
	$this->form_validation->set_rules('login_password', 'Password', 'trim|required');
	if ($this->form_validation->run() == FALSE) {
	if(isset($this->session->userdata['logged_in'])){
		//$this->load->view('pages/index5.php');
		echo "YES";
	}else{
		echo validation_errors();//."\nuser:".$this->input->post('login_username')."\npass:".$this->input->post('login_password');
	}
	} else {
		$data = array(
		'username' => $this->input->post('login_username'),
		'password' => $this->input->post('login_password')
		);
		$result = $this->login_database->login($data);
		if ($result == TRUE ) {
			$username = $this->input->post('login_username');
			$result = $this->login_database->read_user_information($username);
			
			if ($result != false) {
				$session_data = array(
				'username' => $this->security->xss_clean($result[0]->user_name),
				'email' => $this->security->xss_clean($result[0]->user_email),
				);
				// Add user data in session
				$this->session->set_userdata('logged_in', $session_data);
				//$this->load->view('admin_page');	
				echo "YES";
				//echo "<script type='text/javascript'>alert(".$session_data['username'].");</script>";
			}
		} else {
			$data = array(
			'error_message' => 'Invalid Username or Password'
			);
			//$this->load->view('pages/index5.php', $data);
			echo "NO";
		}
	}
}
public function logout() {

// Removing session data
$sess_array = array(
'username' => ''
);
$this->session->unset_userdata('logged_in', $sess_array);
$data['message_display'] = 'Successfully Logout';
sleep(3);
redirect('/');
//$this->load->view('pages/index5.php');
}

public function register_user()
{
	$this->form_validation->set_rules('register_username', 'Username', 'trim|required');
	$this->form_validation->set_rules('register_password', 'Password', 'trim|required');
	$this->form_validation->set_rules('register_email', 'Email', 'trim|required');
	if ($this->form_validation->run() == FALSE) {
		echo validation_errors();
	}
	else
	{
		$data = array(
				'user_name' => $this->input->post('register_username'),
				'user_email' => $this->input->post('register_email'),
				'user_password' => $this->input->post('register_password')
		);
		$result = $this->login_database->registration_insert($data);
		if($result == TRUE)
			echo "success";
		else 
			echo "failure";
	}
}

}

?>
