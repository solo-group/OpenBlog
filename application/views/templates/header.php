<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <!-- Primary Meta Tags -->
    <title><?= $pageTitle.'  - '. $pageMeta['siteName']; ?></title>
    <meta name="title" content="<?= $pageTitle.'  - '. $pageMeta['siteName']; ?>">
    <meta name="description" content="<?php echo $pageMeta['pageDes'] ?>">


    <link href='<?php echo base_url('images/'.$pageMeta['favIcon']); ?>' rel='icon' type='image/x-icon'/>

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website ">
    <meta property="og:url" content="<?= $pageMeta['pageUrl']; ?>">
    <meta property="og:title" content="<?= $pageTitle.'  - '. $pageMeta['siteName']; ?> ">
    <meta property="og:description" content="<?php echo $pageMeta['pageDes'] ?>">
    <meta property="og:image" content="<?php echo base_url('images/'.$pageMeta['pageThumbnail']); ?>">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="<?= $pageMeta['pageUrl']; ?>">
    <meta property="twitter:title" content="<?= $pageTitle.'  - '. $pageMeta['siteName']; ?>">
    <meta property="twitter:description" content="<?php echo $pageMeta['pageDes'] ?>">
    <meta property="twitter:image" content="<?php echo base_url('images/'.$pageMeta['pageThumbnail']); ?>">




    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Pacifico&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/css/style.css">
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/css/materialize.min.css">
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/css/single.css">
  </head>
  <body>
    <!-- Blog Top Social icons -->
    <div class="topbar #000000 black">
      <div class="mContainer row rowM">
        <!-- left menu -->
        <div class="col s12 m6 topLeftCol hide-on-small-only">
          <ul>
            <li><a href="<?= base_url(); ?>">Home</a></li>
            <li><a href="<?= base_url(); ?>About">About</a></li>
            <?php if ($this->session->userdata('logged_in')): ?>
              <li><a href="<?php echo base_url('member/profile/').$this->session->userdata('username'); ?>">Profile</a></li>
              <li><a href="<?php echo base_url('logout'); ?>">Logout</a></li>
              <?php else: ?>
                <li><a href="<?php echo base_url('login'); ?>">Login</a></li>
                <li><a href="<?php echo base_url('register'); ?>">Register</a></li>
            <?php endif ?>
          </ul>
        </div>
        <!-- right socia icons -->
        <div class="col  s12 m6 topRightCol">
          <ul>
        <?php if (isset($socialIcons) && $socialIcons): ?>
          <?php foreach ($socialIcons as $socialIcon): ?>
            <li><a href="<?php echo $socialIcon['url']; ?>" title="<?php echo $socialIcon['link_name']; ?>" ><i class="<?php echo $socialIcon['link_icon']; ?>"></i></a></li>
          <?php endforeach ?>
        <?php endif ?>
          </ul>
        </div>
      </div>
    </div>

    <!-- Blog Logo div -->
    <div class="topLogo">
      <div class="mContainer row rowM">
        <div class="col mainLogoCol s12 m4">
          <a href="<?= base_url(); ?>">
            <?php if (isset($pageMeta['siteLogo']) && $pageMeta['siteLogo']): ?>
              <img src="<?= base_url('images/'.$pageMeta['siteLogo']); ?>" title="<?php echo $pageMeta['siteName'] ?>"><?php echo $pageMeta['siteName'] ?> alt="<?php echo $pageMeta['siteName']; ?>"> 
              <h1 class="textLogo" style="display: none;"><?php echo $pageMeta['siteName'] ?></h1>
              <?php else: ?>
              <h1 class="textLogo" title="<?php echo $pageMeta['siteName'] ?>"><?php echo $pageMeta['siteName'] ?></h1>
            <?php endif ?>
          </a>
        </div>
        <div class="col TopAddcol m8 hide-on-small-only">
          <!-- add-->
        </div>
      </div>
    </div>

    <!-- main nav bar -->
    <div class="mainNav">
      <div class="mContainer">
        <div class="navContent  #000000 black">
          <div class="leftFullNav">
            <div>
              <a href="<?= base_url(); ?>"><i class="fas fa-home"></i></a>
            </div>
            <div class="desnav">
              <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="<?php echo base_url('posts'); ?>">Posts</a></li>
                <?php if (isset($categories) && $categories): ?>
                  <?php foreach (array_slice($categories, 0, 4) as $category): ?>

                  <li><a href="<?php echo base_url('category/'.$category['cat_name']); ?>"><?php echo ucwords($category['cat_name']); ?></a></li>

                  <?php endforeach ?>
                <?php endif ?>



                
              </ul>
            </div>

            <div class="phonenav">
              <!-- Dropdown Trigger -->
                <a class='phonebavT btn' href='#' data-target='phonedrop'>Drop Me! <i class="fas fa-caret-down"></i></a>

                <!-- Dropdown Structure -->
                <ul id='phonedrop' class='dropdown-content'>

                  <?php if ($this->session->userdata('logged_in')): ?>
                  <li><a href="<?= base_url('member/profile/').$this->session->userdata('username');  ?>">Profile</a></li>
                <?php endif ?>
                  <li><a href="<?php echo base_url(); ?>">Home</a></li>
                <?php if (isset($categories) && $categories): ?>
                  <?php foreach (array_slice($categories, 0, 4) as $category): ?>

                  <li><a href="<?php echo base_url('category/'.$category['cat_name']); ?>"><?php echo $category['cat_name']; ?></a></li>

                  <?php endforeach ?>
                <?php endif ?>

                <?php if ($this->session->userdata('logged_in')): ?>
                  <li><a href="<?php echo base_url('logout'); ?>">Logout</a></li>
                  <?php else: ?>
                    <li><a href="<?php echo base_url('login'); ?>">Login</a></li>
                    <li><a href="<?php echo base_url('register'); ?>">Register</a></li>
                <?php endif ?>


                </ul>
              </div>
          </div>
          <div class="rightShrchBar">
            <div class="wrap">
              <?php $fattr = array('class' => 'search' ); echo form_open_multipart('search/',$fattr); ?> 
                <input type="text" class="searchTerm browser-default" placeholder="What are you looking for?" name="searchText" required="required">
                <button type="submit" class="searchButton">
                  <i class="fa fa-search"></i>
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
