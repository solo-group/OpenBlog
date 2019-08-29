</div>

</div>

<div class="footerWraper #000000 black">

  <div class="mContainer">

    <!-- footer posts area -->

    <div class="footerPosts row">



      <div class="footerpostContent col s12 m4">

        <h3 class="footerPostTitle">Recent Post's</h3>

        <div class="footerPostsWraper">

        <?php if (isset($latestPostsSide)): ?>

          <?php foreach ($latestPostsSide as $latestPost): ?>



          <div class="footerPost">

            <div class="footerPostImg">

             <a href="<?php echo base_url('post/').$latestPost['post_slug']; ?>">

               <img src="<?php echo base_url(); ?>images/90x65/<?php echo $latestPost['post_thumb']; ?>" alt="<?php echo $latestPost['post_title']; ?>">

             </a>

            </div>

            <div class="footerPosttext">

              <h3 class="truncate"> <a href="<?php echo base_url('post/').$latestPost['post_slug']; ?>"><?php echo $latestPost['post_title']; ?></a> </h3>

              <div class="fpostMeta">

                  <span><i class="far fa-clock"></i> <?php echo date("d M Y",strtotime($latestPost['post_on'])); ?></span>

                  <span><i class="fas fa-comments"></i> <?php echo $latestPost['post_comment']; ?></span>

              </div>

            </div>

          </div>



          <?php endforeach; ?>

        <?php endif; ?>





        </div>

      </div>

      <div class="footerpostContent col s12 m4">

        <h3 class="footerPostTitle">Popular Post's</h3>

        <div class="footerPostsWraper">



        <?php if (isset($popularPosts)): ?>

          <?php foreach ($popularPosts as $popularPost): ?>

          <div class="footerPost">

            <div class="footerPostImg">

             <a href="<?php echo base_url('post/').$popularPost['post_slug']; ?>">

               <img src="<?php echo base_url(); ?>images/90x65/<?php echo $popularPost['post_thumb']; ?>" alt="<?php echo $popularPost['post_title']; ?>">

             </a>

            </div>

            <div class="footerPosttext">

              <h3 class="truncate"> <a href="<?php echo base_url('post/').$popularPost['post_slug']; ?> "> <?php echo $popularPost['post_title']; ?> </a> </h3>

              <div class="fpostMeta">

                  <span><i class="far fa-clock"></i><?php echo date("d M Y",strtotime($popularPost['post_on'])); ?></span>

                  <span><i class="fas fa-comments"></i> <?php echo $popularPost['post_comment']; ?></span>

              </div>

            </div>

          </div>

          <?php endforeach; ?>

       <?php endif; ?>



        </div>

      </div>

      <div class="footerpostContent col s12 m4">

        <h3 class="footerPostTitle">About</h3>

        <div class="footerPostsWraper">

          <p><?php echo substr( $pageMeta['siteDes'],0,300) ?></p>

        </div>

      </div>

    </div>

    <!-- footer copyright area with social icons -->



    <div class="copyrightAndSocialIcons  row">

      <div class="socialIcons col s12 m6  push-m6">

        <ul>

      <?php if (isset($socialIcons) && $socialIcons): ?>

        <?php foreach ($socialIcons as $socialIcon): ?>

          <li><a href="<?php echo $socialIcon['url']; ?>" title="<?php echo $socialIcon['link_name']; ?>" ><i class="<?php echo $socialIcon['link_icon']; ?>"></i></a></li>

        <?php endforeach ?>

      <?php endif ?>

        </ul>

      </div>

      <div class="copyright col s12 m6  pull-m6">

        <h4 style="color:var(--white)">Copyright &copy; 2019  Created By  <a href="https://github.com/anikghosh356/" style="color:var(--main_color)">Anik Ghosh </a> </h4>

      </div>

    </div>

  </div>

</div>





</body>

<script type="text/javascript" src="<?= base_url('assets'); ?>/js/jquery-3.4.1.min.js"></script>

<script type="text/javascript" src="<?= base_url('assets'); ?>/js/materialize.min.js"></script>

<script type="text/javascript" src="<?= base_url('assets'); ?>/js/inis.js"></script>

<script type="text/javascript" src="<?= base_url('assets'); ?>/js/main.js"></script>

</html>

