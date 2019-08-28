    <!-- body area -->
    <div class="bodyContent">
      <div class="mContainer">

      	<!-- flash massage end -->
              <?php if($this->session->flashdata('user_deleted')): ?>
                <?php echo '<div class="chip alertBarS" style="text-align:center">'.$this->session->flashdata('user_deleted').' <i class="close material-icons">close</i></div>'; ?>
              <?php endif; ?>

              <?php if($this->session->flashdata('user_error')): ?>
                <?php echo '<div class="chip alertBarD" style="text-align:center">'.$this->session->flashdata('user_error').' <i class="close material-icons">close</i></div>'; ?>
              <?php endif; ?>
          <!-- flash massage end -->

        <div class="createpost">
          <div class="createposth">
            <h5><?php echo $pageTitle; ?></h5>
            <hr>
          </div>


          <div class="row">
          	<div class="row recentPostsW">
				<?php if (isset($users) && $users): ?>

					<?php foreach ($users as $user): ?>

						  <div class="col s12 m6">
						    <div class="card horizontal">
						      <div class="card-image">
						        <img style="border-radius: 5px 34px 3px 20px;" src="<?php echo base_url('images/profile/'.$user['userImg']); ?>">
						      </div>
						      <div class="card-stacked">
						        <div style="padding-top: 5px; padding-bottom: 5px;" class="card-content">
						        	<h5 style="margin-top: 0px;" class="header"><?php echo $user['fullName']; ?></h5>
						        	<hr>
						          <p><?php echo $user['email']; ?>  <small><?php echo $user['userPosition']; ?></small></p>
						        </div>
						        <div class="card-action">
						          <a href="<?php echo base_url('admin/users/'.$user['user_id']); ?>">view user</a>
						          

						            <!-- user Delete Modal Trigger -->
									  <a style="float: right;" class="waves-effect waves-light  modal-trigger" href="#<?php echo $user['user_id'] ?>">Delete </a>

									  <!--user Delete Modal Structure -->
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

						      </div>
						    </div>
						  </div>
          
					    
					<?php endforeach; ?>
					<?php else: ?>
						<div class="headerR">
							<p>nothing to show..!</p>
						</div>
				<?php endif; ?>


			 </div>
          </div>
              

        </div>

      </div>
    </div>  