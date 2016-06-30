<?php
// Only let users with admin privileges access this page
allow_admin_privileges();

$name = null;

if ( !empty($_GET['name'])) {
	$name = $_REQUEST['name'];
}

if ( $name === null ) {
	header('Location:?q=start');
} else {
	// Fetch all data from supplier
	$data = output_from_database('SELECT * FROM supplier WHERE name = ?', "$name");
}

if (!empty($_POST)) {
	// Keep track validation errors
    $nameError 	= null;

    // Keep track post values and sanitize them
	$value 			= htmlspecialchars($_POST['value']);

	// Check that input is not null
	// Set class errorfield on fields that does not validate
    $valid = true;
    if (empty($name)) {
        $nameError = true;
        $valid 		= false;
        $brandClass = 'errorfield';
    }

	// Execute database updates if input is valid
	if($valid) {
		input_to_database('UPDATE supplier SET name=? WHERE name=?', "$value, $name");
		// Redirect to startpage after insertion
		header('Location:?q=suppliers');
	}
} 
?>
		<!-- Heading -->
		<div class="row">
			<h1 class="text-center empty-row-after"><?=UPDATE_SUPPLIER_TITLE;?> <span class="success_green"><?=$data['name'];?></span> <small><?=MANDATORY_SUB_TITLE;?></small></h1>
		</div>
		<div class="row">
			<form class="form-horizontal" action="?q=update_supplier&amp;name=<?=$name;?>" method="post" role="form">
				<!-- Supplier, mandatory through select/option value -->
				<div class="form-group empty-row-after">
					<label for="value" class="control-label col-sm-3"><?=SUPPLIER_TITLE.MANDATORY;?></label>
					<div class="controls col-sm-6">
						<input name="value" class="form-control" placeholder="<?=SUPPLIER_NAME;?>" value="<?=$data['name'];?>" />
					</div>
				</div>
				<!-- Buttons -->
				<div class="form-group">
					<div class="col-sm-offset-3 col-sm-6">
						<button type="submit" class="btn btn-success"><?=BUTTON_UPDATE;?></button>
						<a class="btn btn-info" role="button" href="?q=suppliers"><?=BUTTON_BACK;?></a>
					</div>
				</div>
			</form>
		</div>