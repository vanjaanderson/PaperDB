<?php
// Check if user role is administrator
if($_SESSION['role']!=='administrator'):
	header('Location: ?q=start');
endif;

$id = 0;
// Fetch the id from get parameter
if ( !empty($_GET['id'])) {
	$id = ($_REQUEST['id']);
	$user = ($_REQUEST['user']);
}

if (!empty($_POST)) {
	// Keep track post values
	$id = $_POST['id'];

	input_to_database('DELETE FROM user WHERE id=?', "$id");
	// Redirect to startpage
	header('Location:?q=users');
}
?>
		<!-- Heading -->
		<div class="row">
			<h1 class="text-center empty-row-after"><?=DELETE_USER_TITLE;?> <span class="danger_red"><?=$user;?></span></h1>
		</div>
		<div class="row">
			<form class="form-horizontal" action="" method="post" role="form">
				<div class="controls col-sm-12">
					<input type="hidden" name="id" value="<?=$id;?>" />
					<div class="alert alert-danger" role="alert"><?=BUTTON_DELETE;?> <strong><?=$user;?>?</strong></div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-6">
						<button type="submit" class="btn btn-default"><?=BUTTON_DELETE_YES;?></button>
						<a class="btn btn-danger" role="button" href="?q=users"><?=BUTTON_DELETE_NO;?></a>
					</div>
				</div>
			</form>
		</div>