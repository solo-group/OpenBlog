<!-- sidebar -->
<div class="col s12 m4 sidecontent">
  <!-- sidebar tabs -->
  <div class="siderbarTab">
   <div class="siderbartabIndi">
     <ul class="tabs grey darken-4">
       <li class="tab col s4"><a class="active" href="#POPULAR">POPULAR</a></li>
       <li class="tab col s4"><a href="#RECENT">RECENT</a></li>
       <li class="tab col s4"><a href="#COMMENTS">COMMENTS</a></li>
     </ul>
   </div>
   <!-- tab1 post // popular posts -->

   <div id="POPULAR" class="col s12 tabI">
     <div class="tabPostsWraper">

       <?php if (isset($popularPosts)): ?>
         <?php foreach ($popularPosts as $popularPost): ?>

           <div class="tabPost">
             <div class="tabPostImg">
              <a href="<?php echo base_url('post/').$popularPost['post_slug']; ?>">
                <img src="<?php echo base_url(); ?>images/90x65/<?php echo $popularPost['post_thumb']; ?>" alt="<?php echo $popularPost['post_title']; ?>">
              </a>
             </div>
             <div class="tabPostMetaAndTitle">
               <h3 class="truncate"> <a href="<?php echo base_url('post/').$popularPost['post_slug']; ?>"><?php echo $popularPost['post_title']; ?></a> </h3>
               <div class="postTabMeta">
                   <span><i class="far fa-clock"></i> <?php echo date("d M Y",strtotime($popularPost['post_on'])); ?></span>
                   <span><i class="fas fa-comments"></i> <?php echo $popularPost['post_comment']; ?></span>
               </div>
             </div>
           </div>

         <?php endforeach; ?>
       <?php endif; ?>

     </div>
   </div>
   <!-- tab2 post // recent posts -->

   <div id="RECENT" class="col s12 tabI">
     <div class="tabPostsWraper">

       <?php if (isset($latestPostsSide) && $latestPostsSide): ?>
         <?php foreach ($latestPostsSide as $latestPost): ?>

           <div class="tabPost">
             <div class="tabPostImg">
              <a href="<?php echo base_url('post/').$latestPost['post_slug']; ?>">
                <img src="<?php echo base_url(); ?>images/90x65/<?php echo $latestPost['post_thumb']; ?>" alt="tabPostImg">
              </a>
             </div>
             <div class="tabPostMetaAndTitle">
               <h3 class="truncate"> <a href="<?php echo base_url('post/').$latestPost['post_slug']; ?>"><?php echo $latestPost['post_title']; ?></a> </h3>
               <div class="postTabMeta">
                   <span><i class="far fa-clock"></i> <?php echo date("d M Y",strtotime($latestPost['post_on'])); ?></span>
                   <span><i class="fas fa-comments"></i> <?php echo $latestPost['post_comment']; ?></span>
               </div>
             </div>
           </div>

         <?php endforeach; ?>
       <?php endif; ?>


     </div>
   </div>
   <!-- tab3  // comments  -->

   <div id="COMMENTS" class="col s12 tabI">
    <div class="tabPostsWraper">

       <?php if (isset($commentsS)): ?>
         <?php foreach ($commentsS as $comment): ?>

           <div class="tabPost">
             <div class="tabPostImg">
              <a href="<?php echo base_url('post/').$comment['com_for']; ?>">
                <img src="<?php echo base_url(); ?>images/profile/<?php echo $comment['userImg']; ?>" alt="<?php echo $comment['fullName']; ?>">
              </a>
             </div>
             <div class="tabPostMetaAndTitle">
               <h3 class="truncate"> <a href="<?php echo base_url('post/').$comment['com_for']; ?>"><?php echo $comment['com_content']; ?></a> </h3>
               <div class="postTabMeta">
                   <span><i class="far fa-clock"></i> <?php echo date("d M Y",strtotime($comment['com_on'])); ?></span>
                   
               </div>
             </div>
           </div>

         <?php endforeach; ?>
       <?php endif; ?>

     </div>
   </div>
  </div>

  <!-- sidebar category -->

  <div class="siderbarcategory">
    <div class="sidebarcatHeader grey darken-4">
      <h3>Categories</h3>
    </div>
    <div class="catWraper">
      <ul>

        <?php if (isset($categories) && $categories): ?>
          <?php foreach ($categories as $category): ?>
            <li>
              <a href="<?php echo base_url('category/'.$category['cat_name']); ?>">
                <div class="categoryD">
                  <div class="catLeft">
                    <span><i class="fas fa-chevron-right"></i></span> <span> <?php echo $category['cat_name']; ?></span>
                  </div>
                  <div class="catRight">
                    <span>( <?php echo $categoriesTP[$category['cat_name']]; ?> )</span>
                  </div>
                </div>
              </a>
            </li>
          <?php endforeach ?>
        <?php endif ?>

      </ul>
    </div>
  </div>

</div>
