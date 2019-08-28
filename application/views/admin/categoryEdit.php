    <!-- body area -->
    <div class="bodyContent">
      <div class="mContainer">
			<!-- flash massage -->

			    <?php if($this->session->flashdata('wrong')): ?>
	              <?php echo '<div class="chip alertBarS" style="text-align:center">'.$this->session->flashdata('wrong').' <i class="close material-icons">close</i></div>'; ?>
	            <?php endif; ?>

			    <?php if($this->session->flashdata('catCreaded')): ?>
	              <?php echo '<div class="chip alertBarS" style="text-align:center">'.$this->session->flashdata('catCreaded').' <i class="close material-icons">close</i></div>'; ?>
	            <?php endif; ?>
	            <?php if($this->session->flashdata('catUpdated')): ?>
	              <?php echo '<div class="chip alertBarS" style="text-align:center">'.$this->session->flashdata('catCreaded').' <i class="close material-icons">close</i></div>'; ?>
	            <?php endif; ?>
			    
			    <!-- flash massage end -->
        <div class="createpost">
          <div class="createposth">
            <h4><?= $pageTitle; ?> </h4>
            <hr>
          </div>


          <div class="row">
          	<div class="col s12">
          		<?php echo validation_errors(); ?>
             <?php $fattr = array('class' => 'row' ); echo form_open_multipart('admin/categoryEdit/'.$category['cat_id'],$fattr); ?>
          			<div class="input-field col s12 m6">
          			  <i class="material-icons prefix">bookmark</i>
			          <input name="catName"  id="catName" type="text" class="validate" value="<?php echo $category['cat_name']; ?>">
			          <label for="catName">First Name</label>
			        </div>

			        <div class="input-field col s12 m2">
          			  <i class="material-icons prefix">import_export</i>
			          <input name="catPosition"  id="catPo" type="number" class="validate" value="<?php echo $category['cat_po']; ?>">
			          <label for="catPo">Cat Position</label>
			        </div>

			        <div class="input-field col s12 m2">
			          <button class="btn green waves-effect">Update</button>
			        </div>
          		</form>
          	</div>
            <table   class="col s12 striped highlight">
             	<thead>
             		<tr>
             			<th>Cat-Name</th>
             			<th>Cat-Position</th>
             			<th>Created-At</th>
             			<th>Edit</th>
             			<th>Delete</th>
             		</tr>
             	</thead>
             	<tbody>

             		<?php if (isset($categories) && $categories): ?>
             			<?php foreach ($categories as $category): ?>
             				<tr>
		             			<td><?php echo $category['cat_name']; ?></td>
		             			<td><?php echo $category['cat_po']; ?></td>
		             			<td><?php echo date("d M Y",strtotime($category['cat_on'])); ?></td>
		             			<td><a class="btn green" href="<?php echo base_url('admin/categoryEdit') ?>">Edit</a></td>
		             			<td><a class="btn red" href="<?php echo base_url('admin/categoryDelete') ?>">Delete</a></td>
		             		</tr>
             			<?php endforeach ?>
             		<?php endif ?>
             		
             	</tbody>
             </table>
      
          </div>

        </div>

      </div>
    </div>