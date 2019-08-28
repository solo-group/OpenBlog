<div class="container">
	<div id="register-page" class="row">
		<div class="col s12 z-depth-6 card-panel">
			<center>
				<div class="registerAvatar center-align">
					<img src="<?php echo base_url('images/useravator.png'); ?>">
				</div>
				<h5 class="createAccountTitle">Create Account</h5>
			</center>
			
			<?php echo validation_errors(); ?>
        <?php $fattr = array('class' => 'register-form' ); echo form_open_multipart('Register',$fattr); ?>        
				<div class="row margin">
					<div class="input-field col s12">
						<input id="user_name" type="text" class="validate" name="username">
						<label for="user_name" class="center-align">Username</label>
					</div>
				</div>
				<div class="row margin">
					<div class="input-field col s12">
						<input id="full_name" type="text" class="validate" name="fullName">
						<label for="full_name" class="center-align">Full Name</label>
					</div>
				</div>
				<div class="row margin">
					<div class="input-field col s12">
						<input id="user_email" type="email" class="validate" name="email">
						<label for="user_email" class="center-align">Email</label>
					</div>
				</div>
				<div class="row margin">
					<div class="input-field col s12">
						<input id="user_passw" type="password" class="validate" name="password1"> 
						<label for="user_passw">Password</label>
					</div>
				</div>
				<div class="row margin">
					<div class="input-field col s12">
						<input id="confirm_pass" type="password" name="password2">
						<label for="confirm_pass">Re-type password</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12">
						<button type="submit" class="btn waves-effect registerButton col s12">Register Now</a>
					</div>
					<div class="input-field col s12">
						<p class="margin center medium-small sign-up">Already have an account? <a href="Login">Login</a></p>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
