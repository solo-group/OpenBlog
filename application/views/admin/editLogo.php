    <!-- body area -->
    <div class="bodyContent">
      <div class="mContainer">
        <div class="websiteDetails">
        	<div>
            	<h4><?= $pageTitle; ?> </h4>
            <hr>
            </div>

            <div class="row" style="max-width: 800px; margin:0 auto;">
                  <?php echo validation_errors(); ?>
                <?php $fattr = array('class' => 'col s12' ); echo form_open_multipart('admin/editLogo',$fattr); ?>
                  <div class="row">
                    <div class="input-field col s12 m4">
                      <!-- image preview -->
                      <img id="preView" src="<?php echo base_url('images/'.$siteDetails['site_logo']); ?>" alt="site log not found">
                    </div>
                  </div>

                  <div class="row"> 
                    <div class="file-field input-field col s12">
                      <div class="btn">
                        <span>File</span>
                        <input type="file" name="logoImg" onchange="imagePreview(this);">
                      </div>
                      <div class="file-path-wrapper">
                        <input class="file-path validate" type="text">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="input-field col s12">
                      <input class="btn " type="submit" value="Update" >
                      <a class="btn red" href="<?php echo base_url('admin/websiteDetails'); ?>"> cancel</a>
                    </div>
                  </div>
                </form>
            </div>

        </div>

      </div>
    </div>