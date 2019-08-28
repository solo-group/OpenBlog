    <!-- body area -->
    <div class="bodyContent">
      <div class="mContainer">

      	<!-- flash massage end -->
              <?php if($this->session->flashdata('com_deleted')): ?>
                <?php echo '<div class="chip alertBarS" style="text-align:center">'.$this->session->flashdata('com_deleted').' <i class="close material-icons">close</i></div>'; ?>
              <?php endif; ?>

              <?php if($this->session->flashdata('com_error')): ?>
                <?php echo '<div class="chip alertBarD" style="text-align:center">'.$this->session->flashdata('com_error').' <i class="close material-icons">close</i></div>'; ?>
              <?php endif; ?>
          <!-- flash massage end -->

        <div class="createpost">
          <div class="createposth">
            <h5><?php echo $pageTitle; ?></h5>
            <hr>
          </div>


          <div class="row">
          	<div class="row recentPostsW">
          		<div class="col s12 m8 offset-m2" >
          			<?php if (isset($user) && $user): ?>
					<div class="card">
					<div class="profileImg">
						<img src="<?php echo base_url(); ?>images/profile/<?php echo $user['userImg']; ?>">
					</div>
					<div class="userDetils">
						<ul class="collection with-header">
					        <li class="collection-header">
					       		<h4><?php echo $user['fullName']; ?> <small style="font-size:15px;" class="userRole"><?php echo $user['userPosition']; ?></small></h4>
					       	</li>
					        <li class="collection-item">
					       		<div>Username <span class="secondary-content"><?php echo $user['userName']; ?></span></div>
					       	</li>
					       	<li class="collection-item">
					       		<div>Email <span class="secondary-content"><?php echo $user['email']; ?></span></div>
					       	</li>
					       	<li class="collection-item">
					       		<div>Gender <span class="secondary-content"><?php echo $user['gender']; ?> </span></div>
					       	</li>
					       	<li class="collection-item">
					       		<div>Birth-Date <span class="secondary-content">
					       			<?php if ($user['birthDate'] != NULL): ?>
					       				<?php echo date("d M Y",strtotime( $user['birthDate'])); ?>
					       				<?php else: ?>
					       					<?php echo 'unset'; ?> 
					       			<?php endif ?>
					       		</span></div>
					       	</li>
					       	<li class="collection-item">
					       		<div>Join Date <span class="secondary-content"><?php echo date("d M Y",strtotime( $user['resOn'])); ?></span></div>
					       	</li>
					       	
					       	
					       	<li class="collection-item">
					       		<div>Delete this user <a href="#<?php echo $user['user_id'] ?>"  class="secondary-content modal-trigger red-text">Delete</a>

					       			<div id="<?php echo $user['user_id'] ?>" class="modal">
									    <div class="modal-content">
									      <h4>Are you sure !?</h4>
									      <p>You want to delete this user ..?</p>
									    </div>
									    <div class="modal-footer">
									      <a  href="<?php echo base_url('admin/uDelete/'.$user['user_id']); ?>">Delete</a>
									    </div>
									  </div>
					       		</div>

					       	
									  
					       	</li>
					       
					     </ul>
					</div>

				</div>
				<?php endif ?>
          		</div>
				
	          	

			 </div>
          </div>
              

        </div>

      </div>
    </div>  