<?php
// Only let users with common user privileges access this page
allow_user_privileges();

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

if (!empty($_POST)) {
	// Keep track post values
	$id = $_POST['id'];

	input_to_database('DELETE FROM paper WHERE id=?', "$id");
	// Redirect to startpage
	header('Location:?q=start');
}
?>
	<article>
		<!-- Heading -->
		<div class="row">
			<h1 class="text-center empty-row-after"><?=DELETE_PAPER_TITLE;?> <span class="danger_red"><?=$data['brand'];?> <?=$data['type'];?><?=$data['grammage'];?></span></h1>
		</div>
		<div class="row">
			<form class="form-horizontal" action="?q=delete_paper" method="post" role="form">
				<div class="form-group">
					<div class="col-sm-offset-3 col-sm-6">
						<input type="hidden" name="id" value="<?=$id;?>" />
					<div class="alert alert-danger" role="alert"><?=BUTTON_DELETE;?> <strong><?=$data['brand'];?> <?=$data['type'];?><?=$data['grammage'];?>?</strong></div>
				</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-3 col-sm-6">
						<button type="submit" class="btn btn-success"><?=BUTTON_DELETE_YES;?></button>
						<a class="btn btn-danger" role="button" href="?q=start"><?=BUTTON_DELETE_NO;?></a>
					</div>
				</div>
			</form>
		</div>
	</article>