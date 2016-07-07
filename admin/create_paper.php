<?php
// Only let users with common user privileges access this page
allow_user_privileges();

// Define variables
$src_image = 'uploads/no-image.jpg';
$brandClass = '';
$typeClass = '';
$grammageClass = '';
$myClass = '';
$imageError = '';

// Store logged in user (for inserting with the paper)
if (!empty($_SESSION['user'])) {
	$user = $_SESSION['user'];
}

if (!empty($_POST)) {
    // Keep track post values and sanitize them
	$brand 			= htmlspecialchars($_POST['brand']);
	$type			= htmlspecialchars($_POST['type']);
	$grammage 		= htmlspecialchars($_POST['grammage']);
	$my 			= htmlspecialchars($_POST['my']);
	$color 			= htmlspecialchars($_POST['color']);
	$supplier 		= htmlspecialchars($_POST['supplier']);
	// Create an instance of class CUploader
	$uploader 		= new CUploader();
	$papername = $brand.'_'.$type.$grammage;

	// Check that input is not null
	// Set class errorfield on fields that does not validate
    $valid = true;
    if (empty($brand)) {
        $valid 		= false;
        $brandClass = 'errorfield';
    }
    if (empty($type)) {
        $valid 		= false;
        $typeClass 	= 'errorfield';
    }
    if (empty($grammage)) {
        $valid 			= false;
        $grammageClass	= 'errorfield';
    }
    if (empty($my)) {
        $valid 		= false;
        $myClass 	= 'errorfield';
    }
    // Check uploaded file
    if (!empty($_FILES['image']['name']) && !$uploader->valid($_FILES['image'])) {
    	$valid 		= false;
    	$imageError = 'Wrong file type! Please select a GIF, JPG or PNG file.';
    }

	// Execute database insertion if input is valid
	// Syntax: input_to_database(sql, values, url to redirect to)
	if($valid) {
		// Save uploaded image or default image in variable image
		(empty($_FILES['image']['name']))?$image=$src_image:$image=$uploader->upload($_FILES['image'], $papername);
		// Check number of id of highest paper in database (+ 1 for increment)
		$url = fetch_from_database('SELECT max(id) FROM paper');
		$id = $url['max(id)'] + 1;

		// Input to database		
		input_to_database('INSERT INTO paper (id, brand, type, grammage, my, color, supplier, user, image) VALUES(?,?,?,?,?,?,?,?,?)', "$id, $brand, $type, $grammage, $my, $color, $supplier, $user, $image", '?q=read_paper&id='.$id); 
	}
}
?>
	<article>
		<!-- Heading -->
		<div class="row">
			<h1 class="text-center empty-row-after"><?=CREATE_PAPER_TITLE;?> <small><?=MANDATORY_SUB_TITLE;?></small></h1>
		</div>
		<div class="row">
			<!-- Pay attention to the enctype -->
			<form class="form-horizontal" action="?q=create_paper" method="post" role="form" enctype="multipart/form-data">
				<!-- Name of paper, mandatory through select/option value -->
				<div class="form-group">
					<label for="brand" class="control-label col-sm-3"><?=BRAND_TITLE.MANDATORY;?></label>
					<div class="controls col-sm-6">
	                    <?php output_query_in_select('brand'); ?>
					</div>
				</div>
				<!-- Paper type, mandatory through select/option value -->
				<div class="form-group">
					<label for="type" class="control-label col-sm-3"><?=TYPE_TITLE.MANDATORY;?></label>
					<div class="controls col-sm-6">
						<?php output_query_in_select('type'); ?>
					</div>
				</div>
				<!-- Grammage (paper density), mandatory -->
				<div class="form-group">
					<label for="grammage" class="control-label col-sm-3"><?=GRAMMAGE_TITLE.MANDATORY;?></label>
					<div class="controls col-sm-6">
						<input name="grammage" class="form-control <?=$grammageClass;?>" placeholder="<?=GRAMMAGE_PLACEHOLDER;?>" value="<?=!empty($grammage)?$grammage:'';?>" />
					</div>
				</div>
				<!-- MY-value, mandatory -->
				<div class="form-group">
					<label for="my" class="control-label col-sm-3"><?=MY_TITLE.MANDATORY;?></label>
					<div class="controls col-sm-6">
						<input name="my" class="form-control <?=$myClass;?>" placeholder="<?=MY_PLACEHOLDER;?>" value="<?=!empty($my)?$my:'';?>" />
					</div>
				</div>
				<!-- Color of paper, optional -->
				<div class="form-group">
					<label for="color" class="control-label col-sm-3"><?=COLOR_TITLE;?></label>
					<div class="controls col-sm-6">
						<?php output_query_in_select('color'); ?>
					</div>
				</div>
				<!-- Image uploader -->
				<div class="form-group">
					<label for="image" class="control-label col-sm-3"><?=UPLOAD_TITLE;?></label>
					<div class="controls col-sm-6">
						<input type="file" name="image" placeholder="File" />
						<p class="text-danger"><?=(isset($imageError))?$imageError:'';?></p>
					</div>
				</div>
				<!-- Supplier, mandatory through select/option value -->
				<div class="form-group empty-row-after">
					<label for="supplier" class="control-label col-sm-3"><?=SUPPLIER_TITLE.MANDATORY;?></label>
					<div class="controls col-sm-6">
						<?php output_query_in_select('supplier'); ?>
					</div>
				</div>
				<!-- Buttons -->
				<div class="form-group">
					<div class="col-sm-offset-3 col-sm-6">
						<button type="submit" class="btn btn-success"><?=BUTTON_SAVE;?></button>
						<a class="btn btn-info" role="button" href="<?=DOCUMENT_ROOT;?>"><?=BUTTON_BACK;?></a>
					</div>
				</div>
			</form>
		</div>
	</article>