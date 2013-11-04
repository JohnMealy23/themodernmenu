
	<h1>Submit a Recipe</h1>

	<div id="body">
		<?PHP
	echo form_open(base_url()."recipesubmission",array("method"=>"post","onsubmit"=>"javascript:return compileDirectionsIngredients()"));
	?>
			<fieldset>
				<legend>Title</legend>
				<input type="text" id="Title" name="Title" required="required" placeholder="Enter title" value="">
			</fieldset>
			<fieldset>
				<legend>Description</legend>
				<textarea id="Description" name="Description"></textarea>
			<script>
				$('textarea').jqte();
			</script>
			</fieldset>
			<fieldset>
				<legend>Preparation Time</legend>
				<label for="Days">Days:</label>
				<select name="Days" id="Days" required="required">
					<option value=''></option>
					<?php 
						for ($i=0; $i<=7; $i++) {
						echo "<option value='" . $i . "'>" . $i . "</option>";
						};
					?>
				</select>
				<label for="hours">Hours:</label>
				<select name="Hours" id="Hours" required="required">
					<option value=''></option>
					<?php 
						for ($i=0; $i<=23; $i++) {
						echo "<option value='" . $i . "'>" . $i . "</option>";
						};
					?>
				</select>
				<label for="minutes">Minutes:</label>
				<select name="Minutes" id="Minutes" required="required">
					<option value=''></option>
					<?php 
						for ($i=0; $i<=59; $i++) {
						echo "<option value='" . $i . "'>" . $i . "</option>";
						};
					?>
				</select>
			</fieldset>
			<fieldset>
				<legend>Ingredients</legend>
				<ol id="IngredientList" class="sortable list">
					<li draggable="true">
						<img src='images/handle.png' class='Handle'><input type="text" class="Ingredient" name="Ingredient1" required="required" placeholder="Enter ingredient"><div class="RemoveX" id="RemoveIngredient0">X</div>
					</li>
				</ol>
				<a class="AddAnother" id="AddIngredient" alt="Ingredient">+ add another ingredient...</a>
			</fieldset>
			<fieldset>
				<legend>Directions</legend>
				<ol id="DirectionList" class="sortable list">
					<li draggable="true">
						<img src='images/handle.png' class='Handle'><input type="text" class="Direction" name="Direction1" required="required" placeholder="Enter direction"><div class="RemoveX" id="RemoveDirction1">X</div>
					</li>
				</ol>
				<a class="AddAnother" id="AddDirection" alt="Direction">+ add another step...</a>
			</fieldset>
			<fieldset>
				<legend>Dietary Considerations</legend>
				<input type="checkbox" name="Gluten" id="Gluten" value="Gluten"><label for="Gluten">Gluten Free</label>
				<input type="checkbox" name="Soy" id="Soy" value="Soy"><label for="Soy">Soy Free</label>
				<input type="checkbox" name="Dairy" id="Dairy" value="Dairy"><label for="Dairy">Dairy Free</label>
			</fieldset>
<script>

	$('.sortable').sortable({
    	handle: '.Handle'
	});
	
	//Add new field:
	var FieldNumber = 1;

	$(document).on( 'click', '.AddAnother', function(){
		var FieldType = $(this).attr('alt');
		FieldNumber++;
		$(this).parent().children('ol').append(
			"<li draggable='true'>" +
				"<img src='images/handle.png' class='Handle'>" +
				"<input type='text' class='" + FieldType + "' id='" + FieldType + FieldNumber + "' name='" + FieldType + FieldNumber + "' required='required' placeholder='Enter " + FieldType.toLowerCase() + "'>" +
				"<div class='RemoveX'>X</div></li>"
		);
		$('.sortable').sortable({
	    	handle: '.Handle'
		});
	});
	
	//Remove field:
	$(document).on( 'click', '.RemoveX', function(event){
		var FieldType = $(event.target).parent().parent().find('input').attr('class').toLowerCase();
		var arr = $(event.target).parent().parent().find('li').length;
		if(arr < 2){
			alert("Please include at least one " + FieldType + " for your recipe.");
		} else {
			var r=confirm("Are you sure?");
			if (r==true) {
			  $(this).parent().remove();
			};
		}
	});
	
	//Compiles all of a the fieldtype into a JSON array:

	
</script>
			<button name='recipesubmit' value='recipesubmit' type='submit'>Submit</button>
	</div>