<?php

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

	// Execute database insertion if input is valid
	if($valid) {		
		input_to_database('INSERT INTO paper (brand, type, grammage, my, color, supplier) values(?,?,?,?,?,?)', "$brand, $type, $grammage, $my, $color, $supplier");
		// Redirect to startpage after insertion
		header('Location:?q=start');
	}
}
?>
		<!-- Heading -->
		<div class="row">
			<h1 class="text-center empty-row-after"><?=CREATE_PAPER_TITLE;?> <small><?=CREATE_PAPER_SUB_TITLE;?></small></h1>
		</div>
		<form class="form-horizontal" action="?q=create_paper" method="post" role="form">
			<!-- Name of paper, mandatory -->
			<div class="form-group">
				<label for="brand" class="control-label col-sm-2"><?=BRAND_TITLE.MANDATORY;?></label>
				<div class="controls col-sm-6">
                    <input name="brand" class="form-control <?=$brandClass;?>" type="text" placeholder="<?=BRAND_PLACEHOLDER;?>" value="<?=!empty($brand)?$brand:'';?>" />
				</div>
			</div>
			<!-- Paper type, mandatory -->
			<div class="form-group">
				<label for="type" class="control-label col-sm-2"><?=TYPE_TITLE.MANDATORY;?></label>
				<div class="controls col-sm-6">
					<input name="type" class="form-control <?=$typeClass;?>" placeholder="<?=TYPE_PLACEHOLDER;?>" value="<?=!empty($type)?$type:'';?>" />
				</div>
			</div>
			<!-- Grammage (paper density), mandatory -->
			<div class="form-group">
				<label for="grammage" class="control-label col-sm-2"><?=GRAMMAGE_TITLE.MANDATORY;?></label>
				<div class="controls col-sm-6">
					<input name="grammage" class="form-control <?=$grammageClass;?>" placeholder="<?=GRAMMAGE_PLACEHOLDER;?>" value="<?=!empty($grammage)?$grammage:'';?>" />
				</div>
			</div>
			<!-- MY-value, mandatory -->
			<div class="form-group">
				<label for="my" class="control-label col-sm-2"><?=MY_TITLE.MANDATORY;?></label>
				<div class="controls col-sm-6">
					<input name="my" class="form-control <?=$myClass;?>" placeholder="<?=MY_PLACEHOLDER;?>" value="<?=!empty($my)?$my:'';?>" />
				</div>
			</div>
			<!-- Color of paper, optional -->
			<div class="form-group">
				<label for="color" class="control-label col-sm-2"><?=COLOR_TITLE;?></label>
				<div class="controls col-sm-6">
					<input name="color" class="form-control" placeholder="<?=COLOR_PLACEHOLDER;?>" value="<?=!empty($color)?$color:'';?>" />
				</div>
			</div>
			<!-- Supplier, mandatory through select/option value -->
			<div class="form-group">
				<label for="supplier" class="control-label col-sm-2"><?=SUPPLIER_TITLE;?></label>
				<div class="controls col-sm-6">
					<select class="form-control" name="supplier" id="supplier">
						<option value="<?=SUPPLIER_DEFAULT;?>" selected="selected"><?=SUPPLIER_DEFAULT;?></option>
					</select>
				</div>
			</div>
			<!-- Buttons -->
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-6">
					<button type="submit" class="btn btn-success"><?=BUTTON_SAVE;?></button>
					<a class="btn btn-default" role="button" href="<?=DOCUMENT_ROOT;?>"><?=BUTTON_BACK;?></a>
				</div>
			</div>
		</form>
