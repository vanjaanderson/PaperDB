<?php
// Check if user is logged in
if($_SESSION['login']!=='logged_in'):
	header('Location: ?q=start');
endif;

$id = 0;
// Fetch the id from get parameter
if ( !empty($_GET['id'])) {
	$id = $_REQUEST['id'];
	$brand = $_REQUEST['brand'];
	$type = $_REQUEST['type'];
	$grammage = $_REQUEST['grammage'];
}

if (!empty($_POST)) {
	// Keep track post values
	$id = $_POST['id'];

	input_to_database('DELETE FROM paper WHERE id=?', $id);
	// Redirect to startpage
	header('Location:?q=start');
}
?>
		<!-- Heading -->
		<div class="row">
			<h1 class="text-center empty-row-after"><?=DELETE_PAPER_TITLE;?> <span class="danger_red"><?=$brand;?> <?=$type;?><?=$grammage;?></span></h1>
		</div>
		<div class="row">
			<form class="form-horizontal" action="?q=delete_paper" method="post" role="form">
				<div class="controls col-sm-12">
					<input type="hidden" name="id" value="<?=$id;?>" />
					<div class="alert alert-danger" role="alert"><?=BUTTON_DELETE;?> <strong><?=$brand;?> <?=$type;?><?=$grammage;?>?</strong></div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-6">
						<button type="submit" class="btn btn-default"><?=BUTTON_DELETE_YES;?></button>
						<a class="btn btn-danger" role="button" href="?q=start"><?=BUTTON_DELETE_NO;?></a>
					</div>
				</div>
			</form>
		</div>