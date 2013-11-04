<?php
/*
------------------------------------------------
-		USER MODEL 1.0						   -
-		Developed By: John Meay				   -
-		List of Functions					   -
-			1-               -
------------------------------------------------
*/

class Recipe_submission_model extends CI_Model 
{
	public function __construct()
    {
        parent::__construct();       
    }
	
	function input_recipe($posted) {
		
		//Retrieve latest recipe index 

		$this->load->database();
		
		// foreach ($query->result() as $row)
		// {
			// echo $row->title;
			// echo $row->name;
			// echo $row->email;
		// }
		// echo 'Total Results: ' . $query->num_rows();
		
		$recipe = array(
			'Title'=>$this->input->post('Title'),
			'Description'=>$this->input->post('Description'),
			//'Days'=>$this->input->post('Days'),
			//'Hours'=>$this->input->post('Hours'),
			//'Minutes'=>$this->input->post('Minutes'),
			//'Ingredients'=>$this->input->post('Ingredient1'),
	//Directions eventually need to be compiled in a JSON array, prior to DB insertion
			//Directions'=>$this->input->post('Direction1'),
			// 'Gluten'=>$this->input->post('Gluten'),
			// 'Soy'=>$this->input->post('Soy'),
			// 'Dairy'=>$this->input->post('Dairy')
		);

		$this->db->insert('recipe', $recipe); 

	}      
}
?>