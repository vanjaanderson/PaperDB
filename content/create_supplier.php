<?php
// Check if user role is administrator
if($_SESSION['role']!=='administrator'):
	header('Location: ?q=start');
endif;

if (!empty($_POST)) {
    // Keep track post values and sanitize them
	$name 			= htmlspecialchars($_POST['name']);

	// Check that input is not null
	// Set class errorfield on fields that does not validate
    $valid = true;
    if (empty($name)) {
        $valid 		= false;
        $errorClass = 'errorfield';
    }

	// Execute database insertion if input is valid
	if($valid) {		
		input_to_database('INSERT INTO supplier (name) VALUES(?)', "$name");
		// Redirect to startpage after insertion
		header('Location:?q=suppliers');
	}
}
?>
		<!-- Heading -->
		<div class="row">
			<h1 class="text-center empty-row-after"><?=CREATE_SUPPLIER_TITLE;?> <small><?=CREATE_PAPER_SUB_TITLE;?></small></h1>
		</div>
		<form class="form-horizontal" action="?q=create_supplier" method="post" role="form">
			<!-- Name of paper, mandatory -->
			<div class="form-group">
				<label for="name" class="control-label col-sm-2"><?=SUPPLIER_TITLE.MANDATORY;?></label>
				<div class="controls col-sm-6">
                    <input name="name" class="form-control <?=$errorClass;?>" type="text" placeholder="<?=SUPPLIER_PLACEHOLDER;?>" value="<?=!empty($name)?$name:'';?>" />
				</div>
			</div>
			<!-- Buttons -->
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-6">
					<button type="submit" class="btn btn-success"><?=BUTTON_SAVE;?></button>
					<a class="btn btn-default" role="button" href="?q=suppliers"><?=BUTTON_BACK;?></a>
				</div>
			</div>
		</form>