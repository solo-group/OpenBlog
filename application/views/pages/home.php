

    <!-- Main body -->

    <div class="mainBody">

      <div class="mContainer row rowM">

        <!-- flash massage -->

<?php if($this->session->flashdata('user_loggedin')): ?>

  <?php echo '<div class="chip alertBarS" style="text-align:center">'.$this->session->flashdata('user_loggedin').' <i class="close material-icons">close</i></div>'; ?>

<?php endif; ?>

<?php if($this->session->flashdata('wrong')): ?>

  <?php echo '<div class="chip alertBarD" style="text-align:center">'.$this->session->flashdata('wrong').' <i class="close material-icons">close</i></div>'; ?>

<?php endif; ?>

<?php if($this->session->flashdata('comDeleted')): ?>

  <?php echo '<div class="chip alertBarS" style="text-align:center">'.$this->session->flashdata('comDeleted').' <i class="close material-icons">close</i></div>'; ?>

<?php endif; ?>





    <!-- flash massage end -->

        <!-- main content -->

        <div class="col s12 m8 maincontet">

          <!-- Slider area -->

          <div class="sliderC">



            <div class="slider hide-on-small-only" >

              <div class="sliderBtnDiv">

                <a id="carousel-prev" class="movePrevCarousel btn waves-effect "><i class="fas fa-arrow-left"></i></a>

                <a id="carousel-next" class="moveNextCarousel btn waves-effect "><i class="fas fa-arrow-right"></i></a>



              </div>

              <ul class="slides">



                <?php if (isset($latestPosts)): ?>

                  <?php foreach ($latestPosts as $latestPost): ?>



                    <li>

                      <a href="<?php echo base_url('post/').$latestPost['post_slug']; ?>">

                        <img class="sliderImage" src="<?php echo base_url(); ?>images/580x250/<?php echo $latestPost['post_thumb']; ?>">

                        <div class="captiona caption left-align">

                          <h2><?php echo $latestPost['post_title']; ?></h2>

                          <div class="sliderMetaTextwithSomeText">

                            <div class="sliderMeta">

                              <span><i class="far fa-clock"></i> <?php echo date("d M Y",strtotime($latestPost['post_on'])); ?> </span>

                              <span><i class="fas fa-comments"></i> <?php echo $latestPost['post_comment']; ?> </span>

                            </div>

                            <div class="sliderparagraph">

                              <p class="truncate"><?php echo substr(strip_tags($latestPost['post_content']), 0, 280).'...'; ?></p>

                            </div>

                          </div>

                        </div>

                      </a>

                    </li>



                  <?php endforeach; ?>

                <?php endif; ?>



              </ul>

            </div>



          </div>



          <!-- some blogPosts -->



          <div class="blog_posts">

            <!-- feed header --->



            <div class="feedheader grey darken-4">

              <a href="#">

                <h3>Recent Posts</h3>

              </a>

            </div>

            <!-- single blog post for feed -->

            <?php if (isset($latestPosts)): ?>

              <?php foreach ($latestPosts as $latestPost): ?>



                <div class="blog_post">

                  <div class="blog_image">

                    <a href="<?php echo base_url('post/').$latestPost['post_slug']; ?>">

                      <img class="feedBlogImg" src="<?php echo base_url(); ?>/images/290x170/<?php echo $latestPost['post_thumb']; ?>" alt="<?php echo $latestPost['post_title']; ?>">

                    </a>

                  </div>

                  <article class="blogText">

                    <a href="<?php echo base_url('post/').$latestPost['post_slug']; ?>">

                      <h2><?php echo $latestPost['post_title']; ?> </h2>

                    </a>

                    <div class="feedBlogMetaAndP">

                      <div class="feedMeta">

                        <span><i class="far fa-clock"></i> <?php echo date("d M Y",strtotime($latestPost['post_on'])); ?></span>

                        <span><i class="fas fa-comments"></i> <?php echo $latestPost['post_comment']; ?></span>

                      </div>

                      <div class="feedParagrap">

                        <p class="multiline-ellipsis"><?php echo substr(strip_tags($latestPost['post_content']), 0, 280).'...'; ?></p>

                      </div>

                    </div>

                  </article>

                </div>



              <?php endforeach; ?>

            <?php endif; ?>





            <!-- single blog post for feed end  -->





          </div>



        </div>

      

