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
	              <?php echo '<div class="chip alertBarS" style="text-align:center">'.$this->session->flashdata('catUpdated').' <i class="close material-icons">close</i></div>'; ?>
	            <?php endif; ?>

	            <?php if($this->session->flashdata('catDeleted')): ?>
	              <?php echo '<div class="chip alertBarS" style="text-align:center">'.$this->session->flashdata('catDeleted').' <i class="close material-icons">close</i></div>'; ?>
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
             <?php $fattr = array('class' => 'row' ); echo form_open_multipart('admin/addcat',$fattr); ?>
          			<div class="input-field col s12 m6">
          			  <i class="material-icons prefix">bookmark</i>
			          <input name="catName"  id="catName" type="text" class="validate">
			          <label for="catName">First Name</label>
			        </div>

			        <div class="input-field col s12 m2">
          			  <i class="material-icons prefix">import_export</i>
			          <input name="catPosition"  id="catPo" type="number" class="validate">
			          <label for="catPo">Cat Position</label>
			        </div>

			        <div class="input-field col s12 m2">
			          <button class="btn green waves-effect">Add</button>
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
		             			<td><a class="btn green" href="<?php echo base_url('admin/categoryEdit/'.$category['cat_id']) ?>">Edit</a></td>
		             			<td>
									<!-- Modal Trigger -->
									  <a class="waves-effect waves-light btn red modal-trigger" href="#<?php echo $category['cat_id']; ?>">Delete</a>

									  <!-- Modal Structure -->
									  <div id="<?php echo $category['cat_id']; ?>" class="modal">
									    <div class="modal-content">
									      <h4>Are you sure?</h4>
									      <p>you want to delete category..</p>
									    </div>
									    <div class="modal-footer">
									      <a  class="btn modal-close waves-effect red" href="<?php echo base_url('admin/categoryDelete/'.$category['cat_id']) ?>">Yes</a>
									    </div>
									  </div>

		             			</td>
		             		</tr>
             			<?php endforeach ?>
             		<?php endif ?>
             		
             	</tbody>
             </table>
      
          </div>

        </div>

      </div>
    </div>