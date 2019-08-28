
<div class="footerWraper #000000 black">
  <div class="mContainer">
    <!-- footer copyright area with social icons -->
<br> <br>
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
