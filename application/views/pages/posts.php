    <!-- Main body -->
    <div class="mainBody">
      <div class="mContainer row rowM">
        <!-- main content -->
        <div class="col s12 m8">

          <div class="blog_posts">
            <!-- feed header --->

            <div class="feedheader grey darken-4">
              <a href="#">
                <h3><?php echo $pageTitle; ?></h3>
              </a>
            </div>
            <!-- single blog post for Posts -->
            <?php if (isset($posts) && $posts): ?>
              <?php foreach ($posts as $post): ?>

                <div class="blog_post">
                  <div class="blog_image">
                    <a href="<?php echo base_url('post/').$post['post_slug']; ?>">
                      <img class="feedBlogImg" src="<?php echo base_url(); ?>/images/290x170/<?php echo $post['post_thumb']; ?>" alt="<?php echo $post['post_title']; ?>">
                    </a>
                  </div>
                  <article class="blogText">
                    <a href="<?php echo base_url('post/').$post['post_slug']; ?>">
                      <h2><?php echo $post['post_title']; ?> </h2>
                    </a>
                    <div class="feedBlogMetaAndP">
                      <div class="feedMeta">
                        <span><i class="far fa-clock"></i> <?php echo date("d M Y",strtotime($post['post_on'])); ?></span>
                        <span><i class="fas fa-comments"></i> <?php echo $post['post_comment']; ?></span>
                      </div>
                      <div class="feedParagrap">
                        <p class="multiline-ellipsis"><?php echo substr(strip_tags($post['post_content']), 0, 280).'...'; ?></p>
                      </div>
                    </div>
                  </article>
                </div>

              <?php endforeach; ?>
              <?php else: ?>
                <div class="blog_post">
                  <p>no post found..! </p>
                </div>
            <?php endif; ?>

			<?php echo $this->pagination->create_links(); ?>
            <!-- single blog post for feed end  -->


          </div>


        </div>



