<?php
// Id variable
$id = null;
// Fetch the id from get parameter
if ( !empty($_GET['id'])) {
	$id = $_REQUEST['id'];
}
// If no request, forward to start page
if ( $id === null ) {
	header('Location:?q=start');
// ... else query the database and save values in $data array
} else {
	$data = output_from_database('SELECT * FROM paper WHERE id = ?', "$id");
}
?>
		<!-- Heading -->
		<div class="row">
			<h1 class="text-center empty-row-after"><?=READ_PAPER_TITLE;?> <span class="success_green"><?=$data['brand'];?> <?=$data['type'];?><?=$data['grammage'];?></span></h1>
		</div>
		<div class="row">
			<form class="form-horizontal" action="#" method="post" role="form">
				<!-- Name of paper -->
				<div class="form-group">
					<label for="brand" class="control-label col-sm-3"><?=BRAND_TITLE;?></label>
					<div class="controls col-sm-6">
	                    <input name="brand" class="form-control <?=$brandClass;?>" type="text" value="<?=$data['brand'];?>" />
					</div>
				</div>
				<!-- Paper type, mandatory -->
				<div class="form-group">
					<label for="type" class="control-label col-sm-3"><?=TYPE_TITLE;?></label>
					<div class="controls col-sm-6">
						<input name="type" class="form-control <?=$typeClass;?>" value="<?=$data['type'];?>" />
					</div>
				</div>
				<!-- Grammage (paper density) -->
				<div class="form-group">
					<label for="grammage" class="control-label col-sm-3"><?=GRAMMAGE_TITLE;?></label>
					<div class="controls col-sm-6">
						<input name="grammage" class="form-control <?=$grammageClass;?>" value="<?=$data['grammage'];?>" />
					</div>
				</div>
				<!-- MY-value -->
				<div class="form-group">
					<label for="my" class="control-label col-sm-3"><?=MY_TITLE;?></label>
					<div class="controls col-sm-6">
						<input name="my" class="form-control <?=$myClass;?>" value="<?=$data['my'];?>" />
					</div>
				</div>
				<!-- Color of paper -->
				<div class="form-group">
					<label for="color" class="control-label col-sm-3"><?=COLOR_TITLE;?></label>
					<div class="controls col-sm-6">
						<input name="color" class="form-control" value="<?=$data['color'];?>" />
					</div>
				</div>
				<!-- Supplier -->
				<div class="form-group empty-row-after">
					<label for="supplier" class="control-label col-sm-3"><?=SUPPLIER_TITLE;?></label>
					<div class="controls col-sm-6">
						<input name="supplier" class="form-control" value="<?=$data['supplier'];?>" />
					</div>
				</div>
				<!-- Buttons -->
				<div class="form-group">
					<div class="col-sm-offset-3 col-sm-6">
						<!-- Updating and deleting papers, for users -->
						<?php if($_SESSION['role']):?>
						<a class="btn btn-success" role="button" href="?q=update_paper&amp;id=<?=$data['id'];?>"><?=BUTTON_UPDATE;?> this record</a>
						<a class="btn btn-danger" role="button" href="?q=delete_paper&amp;id=<?=$data['id'];?>&amp;brand=<?=$data['brand'];?>&amp;type=<?=$data['type'];?>&amp;grammage=<?=$data['grammage'];?>"><?=BUTTON_DELETE;?> this record</a>
						<?php endif;?>
						<a class="btn btn-info" role="button" href="<?=DOCUMENT_ROOT;?>"><?=BUTTON_BACK;?></a>
					</div>
				</div>
			</form>
		</div>