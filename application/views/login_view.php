
   <h1>Please login or register an account</h1>
   <?php echo validation_errors(); ?>
   
  <fieldset>
			<legend>Login</legend>
   <?php echo form_open('verifylogin'); ?>
				
     <label for="emailaddress">Email Address:</label>
     <input type="text" size="20" id="emailaddress" name="emailaddress" required/>
     <br/>
     <label for="password">Password:</label>
     <input type="password" size="20" id="password" name="password" required/>
     <br/>
     <input type="submit" value="Login"/>
   </form>
   </fieldset>
   
   
	<fieldset>
		<legend>Register</legend>
   <?php echo form_open('verifylogin/register_user'); ?>
				
     <label for="newfirstname">First Name:</label>   
     <input type="text" size="20" id="newfirstname" name="newfirstname" value="<?php echo set_value('newfirstname'); ?>" required/>
     <br/>
     
     <label for="lastname">Last Name:</label>
     <input type="text" size="20" id="newlastname" name="newlastname" value="<?php echo set_value('newlastname'); ?>" required/>
     <br/>
     
     <label for="newemailaddress">Email Address</label>
     <input type="text" size="20" id="newemailaddress" name="newemailaddress" value="<?php echo set_value('newemailaddress'); ?>" required/>
     <br/>
     
     <label for="newpassword">Password:</label>
     <input type="password" size="20" id="newpassword" name="newpassword" value="<?php echo set_value(''); ?>" required/>
     
     <br/>
     <label for="confirmpassword">Confirm Password:</label>
     <input type="password" size="20" id="confirmpassword" name="confirmpassword" value="<?php echo set_value(''); ?>" required/>
     
     <br/>
     
     
     <input type="submit" value="Register"/>
   </form>
   </fieldset>
     


