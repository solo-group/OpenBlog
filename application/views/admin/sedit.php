    <!-- body area -->
    <div class="bodyContent">
      <div class="mContainer">

        <div class="createpost">
          <div class="createposth">
            <h5>Select Post for edit</h5>
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
	 				          <a href="<?php echo base_url('admin/edit/'.$recentPost['post_slug']) ?>">edit</a>
	 				          <a href="<?php echo base_url('post/'.$recentPost['post_slug']);?>">view</a>
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