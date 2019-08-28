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
                <?php $fattr = array('class' => 'col s12' ); echo form_open_multipart('admin/editDetails',$fattr); ?>
                  <div class="row">
                    <div class="input-field col s12 m4">
                      <i class="material-icons prefix">create</i>
                      <input id="icon_prefix" type="text" class="validate" value="<?php echo $siteDetails['site_name']; ?>" name="siteTitle">
                      <label for="icon_prefix">Title</label>
                    </div>
                    <div class="input-field col s12 m8">
                      <i class="material-icons prefix">text_format</i>
                      <input id="icon_telephone" type="text" class="validate"  value="<?php echo $siteDetails['site_tagline']; ?>" name="siteTagline">
                      <label for="icon_telephone">TagLine</label>
                    </div>
                  </div>

                  <div class="row">
                    <div class="input-field col s12">
                      <i class="material-icons prefix">details</i>
                      <textarea id="icon_prefix2" class="materialize-textarea" name="siteDes"><?php echo $siteDetails['site_des']; ?></textarea>
                      <label for="icon_prefix2">Description</label>
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