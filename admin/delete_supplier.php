<?php
// Only let users with admin privileges access this page
allow_admin_privileges();

$name = 0;
// Fetch the id from get parameter
if ( !empty($_GET['name'])) {
	$name = urldecode($_REQUEST['name']);
}

if (!empty($_POST)) {
	// Keep track post values
	$name = $_POST['name'];

	input_to_database('DELETE FROM supplier WHERE name=?', "$name");
	// Redirect to startpage
	header('Location:?q=suppliers');
}
?>
	<article>
		<!-- Heading -->
		<div class="row">
			<h1 class="text-center empty-row-after"><?=DELETE_SUPPLIER_TITLE;?> <span class="danger_red"><?=$name;?></span></h1>
		</div>
		<div class="row">
			<form class="form-horizontal" action="" method="post" role="form">
				<div class="form-group">
					<div class="col-sm-offset-3 col-sm-6">
						<input type="hidden" name="name" value="<?=$name;?>" />
					<div class="alert alert-danger" role="alert"><?=BUTTON_DELETE;?> <strong><?=$name;?>?</strong></div>
				</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-3 col-sm-6">
						<button type="submit" class="btn btn-success"><?=BUTTON_DELETE_YES;?></button>
						<a class="btn btn-danger" role="button" href="?q=suppliers"><?=BUTTON_DELETE_NO;?></a>
					</div>
				</div>
			</form>
		</div>
	</article>