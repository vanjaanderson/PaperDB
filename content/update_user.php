<?php
// Check if user role is administrator
if($_SESSION['role']!=='administrator'):
	header('Location: ?q=start');
endif;

$id = null;

if ( !empty($_GET['id'])) {
	$id = $_REQUEST['id'];
	$user = $_REQUEST['user'];
	$role = $_REQUEST['role'];
}

if ( $id === null ) {
	header('Location:?q=start');
}

if (!empty($_POST)) {
    // Keep track post values and sanitize them
	$user 			= htmlspecialchars($_POST['user']);
	$pwd 			= md5($_POST['pwd']);
	$pwd2			= md5($_POST['pwd2']);
	$role 			= htmlspecialchars($_POST['role']);

	// Check that input is not null
	// Set class errorfield on fields that does not validate
    $valid = true;
    if (empty($user)) {
        $valid 		= false;
        $errorClass = 'errorfield';
    }
    if (empty($role)) {
    	$valid 		= false;
        $roleClass = 'errorfield';
    }
    if ($pwd!==$pwd2) {
        $valid 		= false;
        $pwdClass = 'errorfield';
    }

	// Execute database updates if input is valid
	if($valid) {
		input_to_database('UPDATE user SET user=?, pwd=?, role=? WHERE id=?', "$user, $pwd, $role, $id");
		// Redirect to startpage after insertion
		header('Location:?q=users');
	}
} else {
	$data = output_from_database('SELECT * FROM user WHERE id = ?', "$id");
}
?>
		<!-- Heading -->
		<div class="row">
			<h1 class="text-center empty-row-after"><?=UPDATE_USER_TITLE;?> <span class="success_green"><?=($user)?$user:$data['user'];?></span> <small><?=CREATE_PAPER_SUB_TITLE;?></small></h1>
		</div>
		<form class="form-horizontal" action="?q=update_user&amp;id=<?=$id;?>" method="post" role="form">
			<!-- User -->
			<div class="form-group">
				<label for="user" class="control-label col-sm-2"><?=USER_TITLE.MANDATORY;?></label>
				<div class="controls col-sm-6">
					<input name="user" class="form-control" value="<?=($user)?$user:$data['user'];?>" />
				</div>
			</div>
			<!-- Password -->
			<div class="form-group">
				<label for="pwd" class="control-label col-sm-2"><?=NEW_PASSWORD_TITLE;?></label>
				<div class="controls col-sm-6">
					<input name="pwd" class="form-control <?=$pwdClass;?>" type="password" value="">
				</div>
			</div>
			<!-- Pwd again -->
			<div class="form-group">
				<label for="pwd2" class="control-label col-sm-2"><?=PASSWORD_AGAIN;?></label>
				<div class="controls col-sm-6">
					<input name="pwd2" class="form-control <?=$pwdClass;?>" type="password" value="">
				</div>
			</div>
			<!-- Role, mandatory through select/option value -->
			<div class="form-group">
				<label for="role" class="control-label col-sm-2"><?=USER_ROLE.MANDATORY;?></label>
				<div class="controls col-sm-6">
					<input name="role" class="form-control <?=$roleClass;?>" type="text" value="<?=($role)?$role:$data['role'];?>">
				</div>
			</div>
			<!-- Buttons -->
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-6">
					<button type="submit" class="btn btn-success"><?=BUTTON_UPDATE;?></button>
					<a class="btn btn-default" role="button" href="?q=users"><?=BUTTON_BACK;?></a>
				</div>
			</div>
		</form>