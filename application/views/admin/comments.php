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
            <h5>Select a comment for delete or view comments</h5>
            <hr>
          </div>


          <div class="row">
          	<div class="row recentPostsW">
				<?php if (isset($comments) && $comments): ?>

					<?php foreach ($comments as $comment): ?>

						  <div class="col s12 m6">
						    <div class="card horizontal">
						      <div class="card-image">
						        <img style="border-radius: 5px 34px 3px 20px;" src="<?php echo base_url('images/profile/'.$comment['userImg']); ?>">
						      </div>
						      <div class="card-stacked">
						        <div style="padding-top: 5px; padding-bottom: 5px;" class="card-content">
						        	<h5 style="margin-top: 0px;" class="header"><?php echo $comment['fullName']; ?></h5>
						        	<hr>
						          <p><?php echo $comment['com_content']; ?></p>
						        </div>
						        <div class="card-action">
						          <a href="<?php echo base_url('post/'.$comment['com_for']); ?>">view comment</a>
						          

						            <!-- Comment Delete Modal Trigger -->
									  <a style="float: right;" class="waves-effect waves-light  modal-trigger" href="#<?php echo $comment['com_id'] ?>">Delete </a>

									  <!--Comment Delete Modal Structure -->
									  <div id="<?php echo $comment['com_id'] ?>" class="modal">
									    <div class="modal-content">
									      <h4>Are you sure !?</h4>
									      <p>You want to delete this comment ..?</p>
									    </div>
									    <div class="modal-footer">
									      <a  href="<?php echo base_url('admin/delCom/'.$comment['com_id']); ?>">Delete</a>
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