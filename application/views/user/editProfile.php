<div class="mContainer userPanel">
	
	<div class="row ">

		<div class="col s12 m12 l4">
			<div class="card">
				<div class="profileWrap"  style="background-image:url('<?php echo base_url(); ?>images/profileCover.jpg')">
					<div class="profileImg">
						<img src="<?php echo base_url(); ?>images/profile/<?php echo $UserInfo['userImg']; ?>">
					</div>
					<div class="profileEdit">
						<div class="btn-floating btn-large "><a href="<?php echo base_url('member/edit/'.$this->session->userdata('username')); ?>"><i class="large material-icons">mode_edit</i></a></div>
					</div>
				</div>
				<div class="userDetils">
					<ul class="collection with-header">
				        <li class="collection-header">
				       		<h4><?php echo $UserInfo['fullName']; ?> <span class="userRole"><?php echo $UserInfo['userPosition']; ?></span></h4>
				       	</li>
				        <li class="collection-item">
				       		<div>Username <span class="secondary-content"><?php echo $UserInfo['userName']; ?></span></div>
				       	</li>
				       	<li class="collection-item">
				       		<div>Email <span class="secondary-content"><?php echo $UserInfo['email']; ?></span></div>
				       	</li>
				       	<li class="collection-item">
				       		<div>Gender <span class="secondary-content"><?php echo $UserInfo['gender']; ?> </span></div>
				       	</li>
				       	<li class="collection-item">
				       		<div>Birth-Date <span class="secondary-content">
				       			<?php if ($UserInfo['birthDate'] != NULL): ?>
				       				<?php echo date("d M Y",strtotime( $UserInfo['birthDate'])); ?>
				       				<?php else: ?>
				       					<?php echo 'unset'; ?> 
				       			<?php endif ?>
				       		</span></div>
				       	</li>
				       	<li class="collection-item">
				       		<div>Join Date <span class="secondary-content"><?php echo date("d M Y",strtotime( $UserInfo['resOn'])); ?></span></div>
				       	</li>
				       	<li class="collection-item">
				       		<div>Change Password <a href="#" class="secondary-content">Try Later</a></div>
				       	</li>
				       	<?php if ($this->session->userdata('user_role')== 'admin'): ?>
				       		<li class="collection-item">
				       		<div>Admin DashBord <a href="<?php echo base_url('admin'); ?>" class="secondary-content">DashBord</a></div>
				       	</li>
				       	<?php endif ?>
				       	<li class="collection-item">
				       		<div>Log out <a href="<?php echo base_url('Logout') ?>" class="secondary-content">logout</a></div>
				       	</li>
				       
				     </ul>
				</div>

			</div>
		</div>

		<div class="col s12 m12 l8">
			<div class="card recentPostU">
				<div>
					<h5>Update details</h5>
					<hr>
				</div>

			<?php echo validation_errors(); ?>
				<div class="row">
				    	<?php $fattr = array('class' => 'col s12' ); echo form_open_multipart('member/edit/'.$this->session->userdata['username'],$fattr); ?>
				    	  <div class="row">
					        
					        <div class="input-field col s12 m6 push-m6">
					        	<div class="profileImgedit">
					        		<img src="<?php echo base_url('images/profile/').$UserInfo['userImg']; ?>">
					        	</div>
					        </div>
					        <div class="file-field input-field  col s12 m6 pull-m6" style="margin:65px auto; ">
						      <div class="btn ">
						        <span><i class="far fa-images material-icons "></i></span>
						        <input name="profileImage" type="file">
						      </div>
						      <div class="file-path-wrapper">
						        <input class="file-path validate" type="text">
						      </div>
						    </div>
					      </div>
					      <br>
					      <div class="row">
					        <div class="input-field col s12 m6">
					          <i class="material-icons prefix">account_circle</i>
					          <input id="fullName" name="fullName" type="text" class="validate" value="<?php echo $UserInfo['fullName']; ?>">
					           
					          <label for="fullName">Name</label>
					        </div>
					      </div>

					      <div class="row">
					        <div class="input-field col s12 m6">
					          <i class="fas fa-birthday-cake material-icons prefix"></i>
					          <input id="dateofbirth" name="birthDate" type="text" class="datepicker" value="<?php if ($UserInfo['birthDate'] != NULL): ?><?php echo $UserInfo['birthDate']; ?><?php endif ?>" name="birthDate">
					           
					          <label for="dateofbirth">Date of Birth</label>
					        </div>
					        <div class="input-field col s12 m6">
					          <i class="fas fa-venus-mars material-icons prefix"></i>
					            <select name="gender" id="gender">
							      <option value="" disabled selected>Choose your option</option>
							      <option value="male"  <?php if ($UserInfo['gender']=='male'): ?><?php echo 'selected="selected"' ?>
							      	
							      <?php endif ?> >Male</option>
							      <option value="female" <?php if ($UserInfo['gender']=='female'): ?><?php echo 'selected="selected"' ?>
							      	
							      <?php endif ?> >Female</option>
							    </select>
							    <label for="gender">Gender</label>
					        </div>
					      </div>
					      <div class="row">
					      	<div class="col m3">
					      		<button class="btn  commbtn"  type="Submit">Submit</button>
					      	</div>
					      	<div class="col m3">
					      		<a class="btn commbtn green" href="<?php echo base_url('member'); ?>">Cancel</a>
					      	</div>
					      </div>
				    </form>
				</div>

			</div>
		</div>

	</div>

</div>