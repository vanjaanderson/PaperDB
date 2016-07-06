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
	<article>
		<!-- Heading -->
		<div class="row">
			<h1 class="text-center empty-row-after"><?=READ_PAPER_TITLE;?> <span class="success_green"><?=$data['brand'];?> <?=$data['type'];?><?=$data['grammage'];?></span></h1>
		</div>
		<div class="row">
	       	<div class="table-responsive empty-row-before col-sm-5 col-sm-offset-2">
				<table class="table table-striped table-bordered">
					<tr><th><?=BRAND_TITLE;?></th><td><?=$data['brand'];?></td></tr>
					<tr><th><?=TYPE_TITLE;?></th><td><?=$data['type'];?></td></tr>
					<tr><th><?=GRAMMAGE_TITLE;?></th><td><?=$data['grammage'];?> g/m&#178;</td></tr>
					<tr><th><?=MY_TITLE;?></th><td><?=$data['my'];?> &#956;mm</td></tr>
					<tr><th><?=COLOR_TITLE;?></th><td><?=$data['color'];?></td></tr>
					<tr><th><?=SUPPLIER_TITLE;?></th><td><?=$data['supplier'];?></td></tr>
					<?php if(isset($_SESSION['role']) && $_SESSION['role']==='administrator'):?>
						<tr><th><?=CREATED_BY;?></th><td><?=$data['user'];?></td></tr>
					<?php endif;?>
				</table>
			</div>
			<!-- Uploaded image  -->
			<div class="form-group col-sm-4 empty-row-before">
				<img src="<?=$data['image'];?>" alt="Paper image" class="img-responsive img-thumbnail" />
			</div>
			<!-- Buttons -->
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-9">
					<!-- Updating and deleting papers, for users -->
					<?php if(isset($_SESSION['role'])):?>
						<a class="btn btn-success" role="button" href="?q=update_paper&amp;id=<?=$data['id'];?>"><?=BUTTON_UPDATE;?> this record</a>
						<a class="btn btn-danger" role="button" href="?q=delete_paper&amp;id=<?=$data['id'];?>"><?=BUTTON_DELETE;?> this record</a>
					<?php endif;?>
					<a class="btn btn-info" role="button" href="<?=DOCUMENT_ROOT;?>"><?=BUTTON_BACK;?></a>
				</div>
			</div>
		</div>
	</article>