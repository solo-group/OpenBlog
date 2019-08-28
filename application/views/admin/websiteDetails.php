    <!-- body area -->
    <div class="bodyContent">
      <div class="mContainer">
			<!-- flash massage -->

			    <?php if($this->session->flashdata('wrong')): ?>
	              <?php echo '<div class="chip alertBarS" style="text-align:center">'.$this->session->flashdata('wrong').' <i class="close material-icons">close</i></div>'; ?>
	            <?php endif; ?>

			    <?php if($this->session->flashdata('siteUpdated')): ?>
	              <?php echo '<div class="chip alertBarS" style="text-align:center">'.$this->session->flashdata('siteUpdated').' <i class="close material-icons">close</i></div>'; ?>
	            <?php endif; ?>
	            <?php if($this->session->flashdata('siUpdate')): ?>
	              <?php echo '<div class="chip alertBarS" style="text-align:center">'.$this->session->flashdata('siUpdate').' <i class="close material-icons">close</i></div>'; ?>
	            <?php endif; ?>

	            <?php if($this->session->flashdata('fiUpdate')): ?>
	              <?php echo '<div class="chip alertBarS" style="text-align:center">'.$this->session->flashdata('fiUpdate').' <i class="close material-icons">close</i></div>'; ?>
	            <?php endif; ?>
			    
			    <!-- flash massage end -->
        
        <div class="websiteDetails">
        	<div>
            	<h4><?= $pageTitle; ?> </h4>
            <hr>
            </div>

            <div class="row">
            	<div class="col s12 m12">
            		<div class="row dTtem">
            			<h5>Text Details</h5>
            		</div>
            		<hr>
            	</div>
            	<div class="col s12 m12">
            		<div class="row dTtem">
            			<div class="col s4 m4">
            				Title
            			</div>
            			<div class="col s8 m8">
            				<?php echo $siteDetails['site_name']; ?>
            			</div>
            		</div>
            		<hr>
            	</div>

            	<div class="col s12 m12">
            		<div class="row dTtem">
            			<div class="col s4 m4">
            				TagLine
            			</div>
            			<div class="col s8 m8">
            				<?php echo $siteDetails['site_tagline']; ?>
            			</div>
            		</div>
            		<hr>
            	</div>

            	<div class="col s12 m12">
            		<div class="row dTtem">
            			<div class="col s4 m4">
            				Description
            			</div>
            			<div class="col s8 m8">
            				<?php echo $siteDetails['site_des']; ?>
            			</div>
            		</div>
            		<hr>
            	</div>
            	<div class="col s12 m12">
            		<a href="<?php echo base_url('/admin/editDetails') ?>" class="btn">Edit Details</a>
            	</div>
            </div>


            <div class="row">
            	<div class="col s12 m12">
            		<div class="row dTtem">
            			<h5>Web Logo</h5>
            		</div>
            		<hr>
            	</div>

            	<div class="col s12 m12">
            		<div class="row dTtem">
            			<div class="col s4 m4 m33 ">
            				Main Logo
            			</div>
            			<div class="col s8 m6">
            				<img class="aWLogo" src="<?php echo base_url('images/'.$siteDetails['site_logo']); ?>" alt="Logo Not Found">
            			</div>
            			<div class="col s12 m2 m30">
            				<a href="<?php echo base_url('admin/editLogo') ?>" class="btn ">Edit</a>
            			</div>
            		</div>
            		<hr>
            	</div>

            	<div class="col s12 m12">
            		<div class="row dTtem">
            			<div class="col s4 m4 m33">
            				favIcon
            			</div>
            			<div class="col s8 m6">
            				<img class="aFIcon" src="<?php echo base_url('images/'.$siteDetails['site_favicon']); ?>" alt="favIcon Not Found">
            			</div>
            			<div class="col s12 m2 m30">
            				<a href="<?php echo base_url('admin/editFav') ?>" class="btn ">Edit</a>
            			</div>
            		</div>
            		<hr>
            	</div>

            </div>


        </div>

      </div>
    </div>