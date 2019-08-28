


<div class="container">
	<div id="login-page" class="row">
		<div class="col s12 z-depth-6 card-panel">
			<center>
				<div class="registerAvatar center-align">
					<img src="<?php echo base_url('images/useravator.png'); ?>">
				</div>
				<h5 class="createAccountTitle">User Login</h5>
				<!-- flash massage -->

			    <?php if($this->session->flashdata('user_registered')): ?>
	              <?php echo '<div class="chip alertBarS" style="text-align:center">'.$this->session->flashdata('user_registered').' <i class="close material-icons">close</i></div>'; ?>
	            <?php endif; ?>

			    <?php if($this->session->flashdata('user_loggedout')): ?>
	              <?php echo '<div class="chip alertBarS" style="text-align:center">'.$this->session->flashdata('user_loggedout').' <i class="close material-icons">close</i></div>'; ?>
	            <?php endif; ?>
			    
			    <?php if($this->session->flashdata('login_failed')): ?>
	              <?php echo '<div class="chip alertBarD" style="text-align:center">'.$this->session->flashdata('login_failed').' <i class="close material-icons">close</i></div>'; ?>
	            <?php endif; ?>
			    <!-- flash massage end -->

			</center>
			<br><br>
			
			<?php echo validation_errors(); ?>
        <?php $fattr = array('class' => 'login-form' ); echo form_open_multipart('login',$fattr); ?>        
				<div class="row margin">
					<div class="input-field col s12">
						<input id="user_name" type="text" class="validate" name="userName" autofocus="autofocus">
						<label for="user_name" class="center-align">Username</label>
					</div>
				</div>
				<div class="row margin">
					<div class="input-field col s12">
						<input id="user_passw" type="password" class="validate" name="passWord"> 
						<label for="user_passw">Password</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12">
						<button type="submit" class="btn waves-effect loginButton col s12">Login</a>
					</div>
					<div class="input-field col s12">
						<p class="margin center medium-small sign-up">Create an account? <a href="Register"> Register</a></p>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
