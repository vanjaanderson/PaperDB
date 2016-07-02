<?php
// Only let users with admin privileges access this page
allow_admin_privileges();

$name = null;

if ( !empty($_GET['name'])) {
	$name = $_REQUEST['name'];
}

if ( $id === null ) {
	header('Location:?q=start');
} else {
	// Fetch all values from user
	$data = output_from_database('SELECT * FROM user WHERE name = ?', "$name");
}

// Check password values, if changed use posted values otherwise use database values
if (empty($_POST['pwd']) && empty($_POST['pwd2'])) {
	$pwd 			= $data['pwd'];
	$pwd2 			= $data['pwd'];
} else {
	$pwd 			= md5($_POST['pwd']);
	$pwd2			= md5($_POST['pwd2']);
}
if (!empty($_POST)) {
    // Keep track post values and sanitize them
	$user 			= htmlspecialchars($_POST['user']);
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
		input_to_database('UPDATE user SET name=?, pwd=?, role=? WHERE name=?', "$name, $pwd, $role, $name");
		// Redirect to startpage after insertion
		header('Location:?q=users');
	}
} 
?>
	<article>
		<!-- Heading -->
		<div class="row">
			<h1 class="text-center empty-row-after"><?=UPDATE_USER_TITLE;?> <span class="success_green"><?=($user)?$user:$data['name'];?></span> <small><?=MANDATORY_SUB_TITLE;?></small></h1>
		</div>
		<div class="row">
			<form class="form-horizontal" action="?q=update_user&amp;id=<?=$name;?>" method="post" role="form">
				<!-- User -->
				<div class="form-group">
					<label for="user" class="control-label col-sm-3"><?=USER_TITLE.MANDATORY;?></label>
					<div class="controls col-sm-6">
						<input name="user" class="form-control" value="<?=($user)?$user:$data['name'];?>" />
					</div>
				</div>
				<!-- Password -->
				<div class="form-group">
					<label for="pwd" class="control-label col-sm-3"><?=NEW_PASSWORD_TITLE;?></label>
					<div class="controls col-sm-6">
						<input name="pwd" class="form-control <?=$pwdClass;?>" type="password" />
					</div>
				</div>
				<!-- Pwd again -->
				<div class="form-group">
					<label for="pwd2" class="control-label col-sm-3"><?=PASSWORD_AGAIN;?></label>
					<div class="controls col-sm-6">
						<input name="pwd2" class="form-control <?=$pwdClass;?>" type="password" />
					</div>
				</div>
				<!-- Role, mandatory through select/option value -->
				<div class="form-group empty-row-after">
					<label for="role" class="control-label col-sm-3"><?=USER_ROLE.MANDATORY;?></label>
					<div class="controls col-sm-6">
						<input name="role" class="form-control <?=$roleClass;?>" type="text" value="<?=($role)?$role:$data['role'];?>">
					</div>
				</div>
				<!-- Buttons -->
				<div class="form-group">
					<div class="col-sm-offset-3 col-sm-6">
						<button type="submit" class="btn btn-success"><?=BUTTON_UPDATE;?></button>
						<a class="btn btn-info" role="button" href="?q=users"><?=BUTTON_BACK;?></a>
					</div>
				</div>
			</form>
		</div>
	</article>