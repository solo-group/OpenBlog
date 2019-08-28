    <!-- body area -->
    <div class="bodyContent">
      <div class="mContainer">

        <div class="createpost">
          <div class="createposth">
            <h5>Select Post for delete</h5>
            <hr>
          </div>


          <div class="row">
          	<div class="row recentPostsW">
				<?php if (isset($recentPostsByUser) && $recentPostsByUser): ?>

					<?php foreach ($recentPostsByUser as $recentPost): ?>

						<div class="col s12 m4">
					      <div class="card">
					        <div class="card-image">
					          <img src="<?php echo base_url(); ?>images/290x170/<?= $recentPost['post_thumb']  ?>">
					          <span class="card-title truncate"><?= $recentPost['post_title']  ?></span>
					        </div>
					        <div class="card-content">
					          <p class="truncate"><?php echo strip_tags(substr($recentPost['post_content'], 0, 450)).'...'; ?></p>
					        </div>
					        <div class="card-action">
	 				          

							<!-- Modal Trigger -->
							<a class="waves-effect waves-light btn modal-trigger" href="#<?php echo $recentPost['post_slug']; ?>">Delete</a>

							<!-- Modal Structure -->
							<div id="<?php echo $recentPost['post_slug']; ?>" class="modal">
							<div class="modal-content">
							  <h4>are you sure !?</h4>
							  <p>You don't need this post .</p>
							</div>
							<div class="modal-footer">
							  <a href="<?php echo base_url('admin/delete/').$recentPost['post_slug']; ?>" class="modal-close waves-effect waves-green btn-flat">Agree</a>
							</div>
							</div>

	 				          <a class="btn waves-green pink" href="<?php echo base_url('post/'.$recentPost['post_slug']);?>">view</a>
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