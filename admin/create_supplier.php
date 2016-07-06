<?php
// Only let users with admin privileges access this page
allow_admin_privileges();

// Define error variables
$errorClass = '';

if (!empty($_POST)) {
    // Keep track post values and sanitize them
	$supplier 			= htmlspecialchars($_POST['supplier']);
	// Check that input is not null
	// Set class errorfield on fields that does not validate
    $valid = true;
    if (empty($supplier)) {
        $valid 		= false;
        $errorClass = 'errorfield';
    }
	// Execute database insertion if input is valid
	// Syntax: input_to_database(sql, values, url to redirect to)
	if($valid) {		
		input_to_database('INSERT INTO supplier (supplier) VALUES(?)', "$supplier", '?q=suppliers');
	}
}
?>
	<article>
		<!-- Heading -->
		<div class="row">
			<h1 class="text-center empty-row-after"><?=CREATE_SUPPLIER_TITLE;?> <small><?=MANDATORY_SUB_TITLE;?></small></h1>
		</div>
		<div class="row">
			<form class="form-horizontal" action="?q=create_supplier" method="post" role="form">
				<!-- Name of paper, mandatory -->
				<div class="form-group empty-row-after">
					<label for="supplier" class="control-label col-sm-3"><?=SUPPLIER_TITLE.MANDATORY;?></label>
					<div class="controls col-sm-6">
	                    <input name="supplier" class="form-control <?=$errorClass;?>" type="text" placeholder="<?=SUPPLIER_PLACEHOLDER;?>" value="<?=!empty($supplier)?$supplier:'';?>" />
					</div>
				</div>
				<!-- Buttons -->
				<div class="form-group">
					<div class="col-sm-offset-3 col-sm-6">
						<button type="submit" class="btn btn-success"><?=BUTTON_SAVE;?></button>
						<a class="btn btn-info" role="button" href="?q=suppliers"><?=BUTTON_BACK;?></a>
					</div>
				</div>
			</form>
		</div>
	</article>