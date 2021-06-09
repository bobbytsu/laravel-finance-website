<?php if(count($errors) > 0): ?>
	<div class="error">
		<?php foreach ($errors as $error) : ?>
			 <div class="row text-center">
		    	<div class="col-12">
		    		<div class="card border border-primary">
		        	<p><?php echo $error; ?></p>
		        	</div>
		    	</div>
		    </div>
			
		<?php endforeach ?>
	</div>
<?php endif ?>