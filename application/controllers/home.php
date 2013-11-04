
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class Home extends CI_Controller {

 function __construct()
 {
   parent::__construct();
 }

 function index()
 {
   if($this->session->userdata('logged_in'))
   {
     $session_data = $this->session->userdata('logged_in');
     
     $data['email'] = $session_data['email'];
	 $data['first'] = $session_data['first'];
	 $data['last'] = $session_data['last'];
	 $data['idUser'] = $session_data['idUser'];
	 
     $this->load->view('common/header', $data);
     $this->load->view('home_view', $data);
     $this->load->view('common/footer', $data);
	 
   }
   else
   {
     //If no session, redirect to login page
     redirect('login', 'refresh');
   }
 }

 function logout()
 {
   $this->session->unset_userdata('logged_in');
   session_destroy();
   redirect('home', 'refresh');
 }

}

?>

