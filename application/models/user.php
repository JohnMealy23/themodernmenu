<?php
Class User extends CI_Model
{
 function login($email, $password)
 {
   $this -> db -> select('idUser, email, password, first, last');
   $this -> db -> from('users');
   $this -> db -> where('email', $email);
   $this -> db -> where('password', MD5($password));
   $this -> db -> limit(1);

   $query = $this -> db -> get();

   if($query -> num_rows() == 1)
   {
     return $query->result();
   }
   else
   {
     return false;
   }
 }
 
 function register() 
 {
 	$email = $this->input->post('newemailaddress');
	
	$newuser = array(
		'first'=>$this->input->post('newfirstname'),
		'last'=>$this->input->post('newlastname'),
		'email'=>$this->input->post('newemailaddress'),
		'password'=>$this->input->post('newpassword'),
	);
	
	$this->db->insert('users', $newuser); 
	
	$this->session->set_userdata('logged_in', $newuser);
	
	if($newuser['email'] != null) {
		echo $newuser['email'];
	};
 }
	
	function email_exists($email) 
		{
	    $this->db->where('email',$email);
	    $this->db->from('users');
	    $query = $this->db->get();
		$this -> db -> limit(1);
	    if ($query->num_rows() > 0){
			 $this->form_validation->set_message('unique_email', 'This email already exists in the system, bitches.');	
	        return FALSE;
	    } else {	
	        return TRUE;
	    }
			
	}
}
?>
