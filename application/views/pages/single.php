    <!-- Main body -->
    <div class="mainBody">
      <div class="mContainer row rowM">
        <!-- main content -->
        <div class="col s12 m8">

          <!-- single post -->
          <div class="post">

          <!-- flash message -->
          <?php if($this->session->flashdata('comment_added')): ?>
              <?php echo '<div class="chip alertBarS" style="text-align:center">'.$this->session->flashdata('comment_added').' <i class="close material-icons">close</i></div>'; ?>
          <?php endif; ?>

          <?php if($this->session->flashdata('wrong')): ?>
  <?php echo '<div class="chip alertBarD" style="text-align:center">'.$this->session->flashdata('wrong').' <i class="close material-icons">close</i></div>'; ?>
<?php endif; ?>
<?php if($this->session->flashdata('comDeleted')): ?>
  <?php echo '<div class="chip alertBarS" style="text-align:center">'.$this->session->flashdata('comDeleted').' <i class="close material-icons">close</i></div>'; ?>
<?php endif; ?>

            <!-- single post header and meta -->
            <div class="post_header">
              <!-- single post title -->
              <div class="postTitle">
                <h1><?php echo $post['post_title']; ?></h1>
              </div>
              <!-- sigle post meta -->
              <div class="postmeta">
                <span><i class="fas fa-user"></i> <?php echo $author['fullName']; ?> </span>&nbsp;
                <span><i class="far fa-clock"></i> <?php echo date("d M Y",strtotime($post['post_on'])); ?></span>&nbsp;
                <span><i class="fas fa-comments"></i> <?php echo $post['post_comment']; ?> </span>
              </div>
              <hr>

              <nav class="breadcrumbN">
                <div class="nav-wrapper">
                  <div class="">
                    <a href="<?php echo base_url(); ?>" class="breadcrumb">Home</a>
                    <a href="<?php echo base_url('/category/'.$post['post_cat']); ?>" class="breadcrumb"><?php echo ucfirst($post['post_cat']); ?></a>
                    <a  class="breadcrumb"><?php echo ucfirst($post['post_title']); ?></a>
                  </div>
                </div>
              </nav>
            </div>

            <!-- sigle post thumbnail -->
            <div class="postThumbnail">
              <img src="<?php echo base_url(); ?>images/580x250/<?php echo $post['post_thumb'] ?>" alt="Thumbnail" title="<?php echo $post['post_title']; ?>">
            </div>

            <!-- post content -->

            <div class="postContent">
              <article class="articleS">
                <?php echo $post['post_content'] ?>
              </article>

            </div>

            <!-- post tag's -->
            <div class="postTag">
              <!-- author reletet -->
              <div class="chip">
                <img src="<?php echo base_url(); ?>images/profile/<?php echo $author['userImg']; ?>" alt="Contact Person">
                <a href="<?php echo base_url('author/').$post['post_author'] ?>"><?php echo $author['fullName']; ?></a>
              </div>

              <!--post tag's -->

              <?php foreach ($tags as $tag): ?>
                <div class="chip">
                  <a href="<?php echo base_url('tag/').trim($tag); ?>"><?php echo trim($tag); ?></a>
                  <i class="close material-icons">close</i>
                </div>
              <?php endforeach ?>
              



            </div>

            <!-- related post's -->
            <div class="relatedPosts">

              <!-- related header -->
              <div class="feedheader grey darken-4">
                <a href="#">
                  <h3>Related Post's</h3>
                </a>
              </div>

              <!-- related post's -->

              <div class="relatedPC">

                <!-- related post -->
                <ul class="relateditems">
                  <?php if (isset($relatedPosts)): ?>
                    <?php foreach ($relatedPosts as $relatedPost): ?>
                      <li class="relatedItem">
                        <div class="relatedthumb">
                          <a href="<?php echo base_url('post/').$relatedPost['post_slug']; ?>">
                            <img src="<?php echo base_url(); ?>images/290x170/<?php echo $relatedPost['post_thumb']; ?>" alt="<?php echo $relatedPost['post_title']; ?>">
                          </a>
                        </div>
                        <div class="relatedContent">
                          <h3><a href="<?php echo base_url('post/').$relatedPost['post_slug']; ?>"><?php echo $relatedPost['post_title']; ?></a></h3>
                          <div class="relatedmeta">
                            <span><i class="far fa-clock"></i> <?php echo date("d M Y",strtotime($relatedPost['post_on'])); ?> </span>
                            <span><i class="fas fa-comments"></i> <?php echo $relatedPost['post_comment']; ?></span>
                          </div>
                        </div>
                      </li>
                    <?php endforeach ?>
                  <?php endif ?>
                  

                </ul>
              </div>

            </div>

            <!--Previous and next post -->

            <div class="prevAnex">

              <!-- previous post -->
              <?php if (isset($previousPost)): ?>
                <div class="previousPost">
                  <a href="<?php echo base_url('post/').$previousPost['post_slug'] ?>">
                    <div class="proviousThumb">
                      <img src="<?php echo base_url(); ?>images/90x65/<?php echo $previousPost['post_thumb']; ?>" alt="<?php echo $previousPost['post_title']; ?>">
                    </div>

                    <div class="provioustitle">
                      <span><i class="fas fa-caret-left"></i>&nbsp;Provious</span><br>
                      <h4 class="truncate"><?php echo $previousPost['post_title']; ?></h4>
                    </div>
                  </a>
                </div>
              <?php endif ?>
              

              <!-- next post -->
              <?php if (isset($nextPost)): ?>
                <div class="nextPost">
                  <a href="<?php echo base_url('post/').$nextPost['post_slug'] ?>">
                    <div class="nextthumb">
                      <img src="<?php echo base_url(); ?>images/90x65/<?php echo $nextPost['post_thumb']; ?>" alt="<?php echo $nextPost['post_title']; ?>">
                    </div>

                    <div class="nexttitle">
                      <span>Next&nbsp;<i class="fas fa-caret-right"></i></span><br>
                      <h4 class="truncate"><?php echo $nextPost['post_title']; ?></h4>
                    </div>
                  </a>
                </div>
              <?php endif ?>
              

            </div>


            <!-- Post comments -->

            <div class="postComments">
              <div class="feedheader grey darken-4">
                  <h3>Post comment's</h3>
              </div>

              <div class="Commnets">

                <!-- comment -->
                <?php if (isset($comments) && $comments): ?>
                  <?php foreach ($comments as $comment): ?>
                    <div class="comment">
                      <div class="commentauth">
                        <div class="commentauthImg">
                          <img src="<?php echo base_url('images/') ?>profile/<?php echo $comment['userImg'] ?>" alt="<?php echo $comment['fullName'] ?>">
                        </div>

                        <div class="authnameAmeta">
                          <p><?php echo $comment['fullName'] ?>  <span>--On </span> <span><i class="far fa-clock"></i> <?php echo date("d M Y",strtotime($comment['com_on'])); ?></span> </p>

                        </div>
                        <div class="commentText">
                          <p><?php echo $comment['com_content'] ?></p>
                        </div>
                        <?php if (isset($this->session->userdata['username']) && $comment['com_who'] == $this->session->userdata['username']): ?>
                          <div class="commentDelete">
                          <!-- Modal Trigger -->
                          <a class="waves-effect waves-light btn modal-trigger red" href="#<?php echo $comment['com_id']; ?>">Delete</a>
                        </div>

                          

                          <!-- Modal Structure -->
                          <div id="<?php echo $comment['com_id']; ?>" class="modal">
                            <div class="modal-content">
                              <h4>are you sure !?</h4>
                              <p>You want to delete this comment..</p>
                            </div>
                            <div class="modal-footer">
                              <a href="<?php echo base_url('member/deleteComment/'.$comment['com_id']); ?>" class="modal-close waves-effect waves-green btn-flat">Yes</a>
                            </div>
                          </div>
                          
                        <?php endif ?>
                      </div>
                    </div>
                  <?php endforeach ?>
                  <?php else: ?>
                    <div class="gray">
                      no comment found..
                    </div>
                <?php endif ?>


              </div>
              <!--add comment form -->
              <?php if (isset($lUser)): ?>
                <div class="addcomment">
                  <div class="commentAs">
                    <div class="lUserImg">
                      <img src="<?php echo base_url('images/'); ?>profile/<?php echo $lUser['userImg']; ?>">
                    </div>
                    <div class="lUserMeta">
                      <p><?php echo $lUser['fullName']; ?></p>
                    </div>
                  </div>
                    <?php $fattr = array('class' => 'commentadd' ); echo form_open_multipart('comment/create/'.$post['post_slug'],$fattr); ?>
                    <div class="row">
                      <div class="input-field col s10">
                        <i class="material-icons prefix">comment</i>
                        <textarea id="icon_prefix2" class="materialize-textarea" name="com_content"></textarea>
                        <label for="icon_prefix2">add a comment </label>
                      </div>
                      <div class="s2">
                        <input class=" waves-green btn commbtn" type="submit" name="comSubmit" value="Submit">
                      </div>
                    </div>
                  </form>
                </div>
              <?php endif ?>
              

            </div>

          </div>


        </div>

