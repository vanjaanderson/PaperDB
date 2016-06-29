<?php
// Check if user role is administrator
if($_SESSION['role']!=='administrator'):
	header('Location: ?q=start');
endif;

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
    if (empty($_POST['pwd']) || empty($_POST['pwd2'])) {
    	$valid 		= false;
        $pwdClass = 'errorfield';
    }
    if ($pwd!==$pwd2) {
        $valid 		= false;
        $pwdClass = 'errorfield';
    }

	// Execute database insertion if input is valid
	if($valid) {		
		input_to_database('INSERT INTO user (user, pwd, role) VALUES(?,?,?)', "$user, $pwd, $role");
		// Redirect to startpage after insertion
		header('Location:?q=users');
	}
}
?>
		<!-- Heading -->
		<div class="row">
			<h1 class="text-center empty-row-after"><?=CREATE_USER_TITLE;?> <small><?=CREATE_PAPER_SUB_TITLE;?></small></h1>
		</div>
		<form class="form-horizontal" action="?q=create_user" method="post" role="form">
			<!-- Name of user, mandatory -->
			<div class="form-group">
				<label for="user" class="control-label col-sm-2"><?=USER_TITLE.MANDATORY;?></label>
				<div class="controls col-sm-6">
                    <input name="user" class="form-control <?=$errorClass;?>" type="text" placeholder="<?=USER_PLACEHOLDER;?>" value="<?=!empty($user)?$user:'';?>" />
				</div>
			</div>
			<!-- Password -->
			<div class="form-group">
				<label for="pwd" class="control-label col-sm-2"><?=PASSWORD_TITLE.MANDATORY;?></label>
				<div class="controls col-sm-6">
					<input name="pwd" class="form-control <?=$pwdClass;?>" type="password" value="">
				</div>
			</div>
			<!-- Pwd again -->
			<div class="form-group">
				<label for="pwd2" class="control-label col-sm-2"><?=PASSWORD_AGAIN.MANDATORY;?></label>
				<div class="controls col-sm-6">
					<input name="pwd2" class="form-control <?=$pwdClass;?>" type="password" value="">
				</div>
			</div>
			<!-- Role, mandatory through select/option value -->
			<div class="form-group">
				<label for="role" class="control-label col-sm-2"><?=USER_ROLE;?></label>
				<div class="controls col-sm-6">
					<select class="form-control" name="role" id="role">
						<option value="user" selected="selected">user</option>
						<option value="administrator">administrator</option>
					</select>
				</div>
			</div>
			<!-- Buttons -->
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-6">
					<button type="submit" class="btn btn-success"><?=BUTTON_SAVE;?></button>
					<a class="btn btn-default" role="button" href="?q=users"><?=BUTTON_BACK;?></a>
				</div>
			</div>
		</form>