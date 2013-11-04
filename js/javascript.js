/**
 * @author John
 */

function validate_recipe_values()
{  
    var Title			= document.getElementById('Title').value;
    var Desc			= document.getElementById('Desc').value;
    var Days			= document.getElementById('Days');
    var DaysValue		= Days.options[Days.selectedIndex].value;
    var Hours			= document.getElementById('Hours');
    var HoursValue		= Hours.options[Hours.selectedIndex].value;
    var Minutes			= document.getElementById('Minutes');
    var MinutesValue		= Minutes.options[Minutes.selectedIndex].value;    
    var Ingredient		= document.getElementById('Ingredient1').value;
	var Direction		= document.getElementById('Direction1').value;
    var Diet			= new Array();
		Diet[0]=document.getElementById('Gluten').checked;
		Diet[1]=document.getElementById('Soy').checked;
		Diet[2]=document.getElementById('Dairy').checked;

    if (Title == '') {
    	alert("Please title your recipe.");
    	$('#Title').css('background-color', '#FFF4F4');	
    	var $Control = $('#Title');
    	scrollTo($Control);
    	return false;
    } else if (Desc == '') {
    	alert("Please describe your recipe.");
    	$('.jqte_Content').css('background-color', '#FFF4F4');
    	var $Control = $('#Desc');
    	scrollTo($Control);	
    	return false;
    } else if (DaysValue == '' || HoursValue == '' || MinutesValue == '') {
    	alert("Please include the days, hours and minutes needed to complete your recipe.");
    	$('#Days, #Hours, #Minutes').css('background-color', '#FFF4F4');
    	var $Control = $('#Day');
    	scrollTo($Control);	
    	return false;	
    } else if (Ingredient == '') {
    	alert("Please list the ingredients for your recipe.");	
    	var $Control = $('#Ingredient1');
    	scrollTo($Control);	
    	return false;
    } else if (Direction == ""){
		alert("Please list the directions for your recipe.");
		var $Control = $('#Direction1');
    	scrollTo($Control);	
		return false;
    } else if (Diet[0] == false && Diet[1] == false && Diet[2] == false){
		alert("Please only submit recipes that cater to special dietary needs.  If your recipe does this, please click the checkbox to indicate which dietary need it addresses.\n\nThank you.");
		$('#Gluten').parent().css('background-color', '#FFF4F4');
		var $Control = $('#Glutin');
    	//scrollTo($Control);
		alert('validation faulure');
		return false;
    } else {
        //return checkemail();
		return true;
    }    
}

function scrollTo($Control) {
	var NewTop = $Control.parent().offset();	
	$('html, body').animate( {
		scrollTop:NewTop.top
	}, 500);
	return false;
	//Control.dequeue();
}


var testresults
function checkemail(){ 
	var str=document.getElementById('email').value;
	var filter=/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
	if (filter.test(str)) {
		testresults=true;
	} else {
		alert("Please input a valid email address!");
		testresults=false;
	}
	return (testresults);
}

function add_another() {
	$('.AddAnother').click(function(){
		//$(this).
		
	})
}
