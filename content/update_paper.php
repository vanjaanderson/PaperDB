<?php
// Check if user is logged in
if($_SESSION['login']==!'logged_in'):
	header('Location: ?q=start');
endif;

$id = null;

if ( !empty($_GET['id'])) {
	$id = $_REQUEST['id'];
}

if ( $id === null ) {
	header('Location:?q=start');
}

if (!empty($_POST)) {
	// Keep track validation errors
    $brandError 	= null;
    $grammageError 	= null;
    $myError 		= null;

    // Keep track post values and sanitize them
	$brand 			= htmlspecialchars($_POST['brand']);
	$type			= htmlspecialchars($_POST['type']);
	$grammage 		= htmlspecialchars($_POST['grammage']);
	$my 			= htmlspecialchars($_POST['my']);
	$color 			= htmlspecialchars($_POST['color']);
	$supplier 		= htmlspecialchars($_POST['supplier']);

	// Check that input is not null
	// Set class errorfield on fields that does not validate
    $valid = true;
    if (empty($brand)) {
        $brandError = true;
        $valid 		= false;
        $brandClass = 'errorfield';
    }
    if (empty($type)) {
        $typeError 	= true;
        $valid 		= false;
        $typeClass 	= 'errorfield';
    }
    if (empty($grammage)) {
        $grammageError 	= true;
        $valid 			= false;
        $grammageClass	= 'errorfield';
    }
    if (empty($my)) {
        $myError 	= true;
        $valid 		= false;
        $myClass 	= 'errorfield';
    }

	// Execute database updates if input is valid
	if($valid) {
		input_to_database('UPDATE paper SET brand=?, type=?, grammage=?, my=?, color=?, supplier=? WHERE id=?', "$brand, $type, $grammage, $my, $color, $supplier, $id");
		// Redirect to startpage after insertion
		header('Location:?q=start');
	}
} else {
	$data = output_from_database('SELECT * FROM paper WHERE id = ?', "$id");
}
?>
		<!-- Heading -->
		<div class="row">
			<h1 class="text-center empty-row-after"><?=UPDATE_PAPER_TITLE;?> <small><?=CREATE_PAPER_SUB_TITLE;?></small></h1>
		</div>
		<form class="form-horizontal" action="?q=update_paper&amp;id=<?=$id;?>" method="post" role="form">
			<!-- Name of paper, mandatory -->
			<div class="form-group">
				<label for="brand" class="control-label col-sm-2"><?=BRAND_TITLE.MANDATORY;?></label>
				<div class="controls col-sm-6">
                    <input name="brand" class="form-control <?=$brandClass;?>" type="text" placeholder="<?=BRAND_PLACEHOLDER;?>" value="<?=$data['brand'];?>" />
				</div>
			</div>
			<!-- Paper type, mandatory -->
			<div class="form-group">
				<label for="type" class="control-label col-sm-2"><?=TYPE_TITLE.MANDATORY;?></label>
				<div class="controls col-sm-6">
					<input name="type" class="form-control <?=$typeClass;?>" placeholder="<?=TYPE_PLACEHOLDER;?>" value="<?=$data['type'];?>" />
				</div>
			</div>
			<!-- Grammage (paper density), mandatory -->
			<div class="form-group">
				<label for="grammage" class="control-label col-sm-2"><?=GRAMMAGE_TITLE.MANDATORY;?></label>
				<div class="controls col-sm-6">
					<input name="grammage" class="form-control <?=$grammageClass;?>" placeholder="<?=GRAMMAGE_PLACEHOLDER;?>" value="<?=$data['grammage'];?>" />
				</div>
			</div>
			<!-- MY-value, mandatory -->
			<div class="form-group">
				<label for="my" class="control-label col-sm-2"><?=MY_TITLE.MANDATORY;?></label>
				<div class="controls col-sm-6">
					<input name="my" class="form-control <?=$myClass;?>" placeholder="<?=MY_PLACEHOLDER;?>" value="<?=$data['my'];?>" />
				</div>
			</div>
			<!-- Color of paper, optional -->
			<div class="form-group">
				<label for="color" class="control-label col-sm-2"><?=COLOR_TITLE;?></label>
				<div class="controls col-sm-6">
					<input name="color" class="form-control" placeholder="<?=COLOR_PLACEHOLDER;?>" value="<?=$data['color'];?>" />
				</div>
			</div>
			<!-- Supplier, mandatory through select/option value -->
			<div class="form-group">
				<label for="supplier" class="control-label col-sm-2"><?=SUPPLIER_TITLE;?></label>
				<div class="controls col-sm-6">
					<input name="supplier" class="form-control" placeholder="<?=SUPPLIER_PLACEHOLDER;?>" value="<?=$data['supplier'];?>" />
				</div>
			</div>
			<!-- Buttons -->
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-6">
					<button type="submit" class="btn btn-success"><?=BUTTON_UPDATE;?></button>
					<a class="btn btn-default" role="button" href="<?=DOCUMENT_ROOT;?>"><?=BUTTON_BACK;?></a>
				</div>
			</div>
		</form>