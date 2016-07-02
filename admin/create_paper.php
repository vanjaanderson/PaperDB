<?php
// Only let users with common user privileges access this page
allow_user_privileges();

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

	// Execute database insertion if input is valid
	if($valid) {		
		input_to_database('INSERT INTO paper (brand, type, grammage, my, color, supplier, user) VALUES(?,?,?,?,?,?,?)', "$brand, $type, $grammage, $my, $color, $supplier, $user");
		// Redirect to startpage after insertion
		header('Location:?q=start');
	}
}
?>
	<article>
		<!-- Heading -->
		<div class="row">
			<h1 class="text-center empty-row-after"><?=CREATE_PAPER_TITLE;?> <small><?=MANDATORY_SUB_TITLE;?></small></h1>
		</div>
		<div class="row">
			<form class="form-horizontal" action="?q=create_paper" method="post" role="form">
				<!-- Name of paper, mandatory -->
				<div class="form-group">
					<label for="brand" class="control-label col-sm-3"><?=BRAND_TITLE.MANDATORY;?></label>
					<div class="controls col-sm-6">
	                    <input name="brand" class="form-control <?=$brandClass;?>" type="text" placeholder="<?=BRAND_PLACEHOLDER;?>" value="<?=!empty($brand)?$brand:'';?>" />
					</div>
				</div>
				<!-- Paper type, mandatory -->
				<div class="form-group">
					<label for="type" class="control-label col-sm-3"><?=TYPE_TITLE.MANDATORY;?></label>
					<div class="controls col-sm-6">
						<input name="type" class="form-control <?=$typeClass;?>" placeholder="<?=TYPE_PLACEHOLDER;?>" value="<?=!empty($type)?$type:'';?>" />
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
						<input name="color" class="form-control" placeholder="<?=COLOR_PLACEHOLDER;?>" value="<?=!empty($color)?$color:'';?>" />
					</div>
				</div>
				<!-- Supplier, mandatory through select/option value -->
				<div class="form-group empty-row-after">
					<label for="supplier" class="control-label col-sm-3"><?=SUPPLIER_TITLE;?></label>
					<div class="controls col-sm-6">
						<select class="form-control" name="supplier" id="supplier">
							<!-- Fetch suppliers from database -->
							<?php $pdo = CDatabase::connect();
							$sql = 'SELECT * FROM supplier ORDER BY name ASC';
							foreach ($pdo->query($sql) as $row) {
								echo '<option value="'.$row['name'].'">'.$row['name'].'</option>';
							}
							CDatabase::disconnect(); ?>
						</select>
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