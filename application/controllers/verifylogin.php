<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class VerifyLogin extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('user','',TRUE);
 }

 function index()
 {
   //This method will have the credentials validation
   $this->load->library('form_validation');

   $this->form_validation->set_rules('emailaddress', 'Email Address', 'trim|required|xss_clean');
   $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');

   if($this->form_validation->run() == FALSE)
   {
     //Field validation failed.&nbsp; User redirected to login page
     $this->load->view('common/header');
     $this->load->view('login_view');
     $this->load->view('common/footer');
   }
   else
   {
     //Go to private area
     redirect('home', 'refresh');
   }

 }

 function check_database($password)
 {
   //Field validation succeeded.&nbsp; Validate against database
   $email = $this->input->post('emailaddress');

   //query the database
   $result = $this->user->login($email, $password);

   if($result)
   {
     $sess_array = array();
     foreach($result as $row)
     {
       $sess_array = array(
         'idUser' => $row->idUser,
         'email' => $row->email,
         'first' => $row->first,
         'last' => $row->last
       );
       $this->session->set_userdata('logged_in', $sess_array);
     }
     return TRUE;
   }
   else
   {
     $this->form_validation->set_message('check_database', 'Invalid username or password');
     return false;
   }
 }
 
 function register_user()
 {
   //This method will have the credentials validation
   $this->load->library('form_validation');

   $this->form_validation->set_rules('newemailaddress', 'email address', 'max_length[45]|valid_email|xss_clean|callback_unique_email');
   $this->form_validation->set_rules('newpassword', 'Password Field', 'max_length[45]|trim|required|xss_clean|md5');
   $this->form_validation->set_rules('confirmpassword', 'Confirmed Password Field', 'max_length[45]|matches[newpassword]|trim|required|xss_clean');   
   $this->form_validation->set_rules('newfirstname', 'first name', 'max_length[45]|trim|required|xss_clean');
   $this->form_validation->set_rules('newlastname', 'last name', 'max_length[45]|trim|required|xss_clean');

	if ($this->form_validation->run() == FALSE)
		{
     //Field validation failed.&nbsp; User redirected to login page
     $this->load->view('common/header');
     $this->load->view('login_view');
	 $this->load->view('common/footer');
   }
   else
   {
   		$this->user->register();
     //Go to private area
     redirect('home', 'refresh');
   }
	
 }
 
 function unique_email($email)
 {
 	$valid_email = $this->user->email_exists($email);
	return $valid_email;
 }
}
?>
