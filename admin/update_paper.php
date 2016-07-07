<?php
// Only let users with common user privileges access this page
allow_user_privileges();

$id = null;
// Define error variables
$brandClass = '';
$typeClass 	= '';
$grammageClass	= '';
$myClass 	= '';
$imageError = '';

if ( !empty($_GET['id'])) {
	$id = $_REQUEST['id'];
}

if ( $id === null ) {
	header('Location:?q=start');
} else {
	// Fetch all data from paper
	$data = output_from_database('SELECT * FROM paper WHERE id = ?', "$id");
}

// Store source image (in case there are no uploaded file)
$src_image = $data['image'];

if (!empty($_POST)) {
    // Keep track post values and sanitize them
	$brand 			= htmlspecialchars($_POST['brand']);
	$type			= htmlspecialchars($_POST['type']);
	$grammage 		= htmlspecialchars($_POST['grammage']);
	$my 			= htmlspecialchars($_POST['my']);
	$color 			= htmlspecialchars($_POST['color']);
	$supplier 		= htmlspecialchars($_POST['supplier']);
	$image 			= $_POST['image'];
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
	// Execute database updates if input is valid
	if($valid) {
		// Save uploaded image or default image in variable image
		(empty($_FILES['image']['name']))?$image=$src_image:$image=$uploader->upload($_FILES['image'], $papername);
		// Insert into database
		input_to_database('UPDATE paper SET brand=?, type=?, grammage=?, my=?, color=?, supplier=?, image=? WHERE id=?', "$brand, $type, $grammage, $my, $color, $supplier, $image, $id", '?q=read_paper&id='.$id);
	}
} 
?>
	<article>
		<!-- Heading -->
		<div class="row">
			<h1 class="text-center empty-row-after"><?=UPDATE_PAPER_TITLE;?> <small><?=MANDATORY_SUB_TITLE;?></small></h1>
		</div>
		<!-- Pay attention to the enctype -->
		<div class="row">
			<form class="form-horizontal" action="?q=update_paper&amp;id=<?=$id;?>" method="post" role="form" enctype="multipart/form-data">
        	<!-- Grouping input fields together -->
        	<div class="form-group col-sm-8">
				<!-- Name of paper, mandatory -->
				<div class="form-group">
					<label for="brand" class="control-label col-sm-3 col-sm-offset-2"><?=BRAND_TITLE.MANDATORY;?></label>
					<div class="controls col-sm-6">
	                    <input name="brand" class="form-control <?=$brandClass;?>" type="text" placeholder="<?=BRAND_PLACEHOLDER;?>" value="<?=$data['brand'];?>" />
					</div>
				</div>
				<!-- Paper type, mandatory -->
				<div class="form-group">
					<label for="type" class="control-label col-sm-3 col-sm-offset-2"><?=TYPE_TITLE.MANDATORY;?></label>
					<div class="controls col-sm-6">
						<input name="type" class="form-control <?=$typeClass;?>" placeholder="<?=TYPE_PLACEHOLDER;?>" value="<?=$data['type'];?>" />
					</div>
				</div>
				<!-- Grammage (paper density), mandatory -->
				<div class="form-group">
					<label for="grammage" class="control-label col-sm-3 col-sm-offset-2"><?=GRAMMAGE_TITLE.MANDATORY;?></label>
					<div class="controls col-sm-6">
						<input name="grammage" class="form-control <?=$grammageClass;?>" placeholder="<?=GRAMMAGE_PLACEHOLDER;?>" value="<?=$data['grammage'];?>" />
					</div>
				</div>
				<!-- MY-value, mandatory -->
				<div class="form-group">
					<label for="my" class="control-label col-sm-3 col-sm-offset-2"><?=MY_TITLE.MANDATORY;?></label>
					<div class="controls col-sm-6">
						<input name="my" class="form-control <?=$myClass;?>" placeholder="<?=MY_PLACEHOLDER;?>" value="<?=$data['my'];?>" />
					</div>
				</div>
				<!-- Color of paper, optional -->
				<div class="form-group">
					<label for="color" class="control-label col-sm-3 col-sm-offset-2"><?=COLOR_TITLE;?></label>
					<div class="controls col-sm-6">
						<input name="color" class="form-control" placeholder="<?=COLOR_PLACEHOLDER;?>" value="<?=$data['color'];?>" />
					</div>
				</div>
				<!-- IMAGE UPLOADER -->		
					<div class="form-group">
						<label for="image" class="control-label col-sm-3 col-sm-offset-2"><?=UPLOAD_TITLE;?></label>
						<div class="controls col-sm-6">
							<input type="file" name="image" placeholder="File" />
							<input type="hidden" name="image" value="<?=$image;?>" />
							<p class="text-danger"><?=(isset($imageError))?$imageError:'';?></p>
						</div>
					</div>
				<!-- Supplier, mandatory through select/option value -->
				<div class="form-group empty-row-after">
					<label for="supplier" class="control-label col-sm-3 col-sm-offset-2"><?=SUPPLIER_TITLE;?></label>
					<div class="controls col-sm-6">
						<input name="supplier" class="form-control" placeholder="<?=SUPPLIER_PLACEHOLDER;?>" value="<?=$data['supplier'];?>" />
					</div>
				</div>
				</div> <!-- End grouping -->
				<!-- UPLOADED IMAGE  -->
				<div class="form-group col-sm-4">
					<img src="<?=DOCUMENT_ROOT;?>/<?=$data['image'];?>" alt="Paper image" class="img-responsive img-thumbnail" />
				</div>
				<!-- Buttons -->
				<div class="form-group">
					<div class="col-sm-offset-3 col-sm-6">
						<button type="submit" class="btn btn-success"><?=BUTTON_UPDATE;?></button>
						<a class="btn btn-info" role="button" href="<?=DOCUMENT_ROOT;?>"><?=BUTTON_BACK;?></a>
					</div>
				</div>
			</form>
		</div>
	</article>