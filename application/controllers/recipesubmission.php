<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Recipesubmission extends CI_Controller {

	public function __construct()
	{ 	
		parent::__construct();	
		$this->params = $this->input->get();
		$this->CI =&get_instance();
		$this->load->library('session');
		//$this->load->model('Users_model');
		//$this->load->model('Nav_model');
		$this->load->model('Recipe_submission_model');
        $this->load->helper('form');
	}

	public function index()
	{
		if($this->input->post('recipesubmit'))
            {
				$data['pgtitle'] = "Recipe Entered";
				
				$posted = $this->input->post();
				foreach ($posted as $key => $value) {
				  echo "Key: " . $key . "; Value: " . $value . "<br>";
				}

				$this->Recipe_submission_model->input_recipe($posted); 
				
                // $data['Title'] = $this->input->post('Title');
                // $data['Description'] = $this->input->post('Description');
				// $data['Days'] = $this->input->post('Days');
				// $data['Hours'] = $this->input->post('Hours');
				// $data['Minutes'] = $this->input->post('Minutes');
				$data['Ingredient1'] = $this->input->post('Ingredient1');
				$data['Ingredient2'] = $this->input->post('Ingredient2');
				$data['Ingredient3'] = $this->input->post('Ingredient3');
				// $data['Direction1'] = $this->input->post('Direction1');
				// $data['Gluten'] = $this->input->post('Gluten');
				// $data['Soy'] = $this->input->post('Soy');
				// $data['Dairy'] = $this->input->post('Dairy');
                //$last_inserted_id = $this->Users_model->add_recipe($data);                
                $data['msg'] = "User registered.";
				//$this->Users_model->update_fe_visibility($data['event_id']);
				
				$this->load->view('common/header.php',$data);
				$this->load->view('recipe_submission_display.php',$data);
				$this->load->view('common/footer.php',$data);
            }
            else
            {    
				$data['pgtitle'] = "Recipe Entry";
			
				$this->load->view('common/header.php',$data);
				$this->load->view('recipe_submission.php',$data);
				$this->load->view('common/footer.php',$data);
            } 
			
		
	}
}

/* End of file recipesubmission.php */
/* Location: ./application/controllers/recipesubmission.php */