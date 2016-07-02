<?php
// Only let users with admin privileges access this page
allow_admin_privileges();

if (!empty($_POST)) {
    // Keep track post values and sanitize them
	$name 			= htmlspecialchars($_POST['name']);
	$pwd 			= md5($_POST['pwd']);
	$pwd2			= md5($_POST['pwd2']);
	$role 			= htmlspecialchars($_POST['role']);
	// Check that input is not null
	// Set class errorfield on fields that does not validate
    $valid = true;
    if (empty($name)) {
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
	// Syntax: input_to_database(sql, values, url to redirect to)
	if($valid) {		
		input_to_database('INSERT INTO user (name, pwd, role) VALUES(?,?,?)', "$name, $pwd, $role", '?q=users');
	}
}
?>
	<article>
		<!-- Heading -->
		<div class="row">
			<h1 class="text-center empty-row-after"><?=CREATE_USER_TITLE;?> <small><?=MANDATORY_SUB_TITLE;?></small></h1>
		</div>
		<div class="row">
			<form class="form-horizontal" action="?q=create_user" method="post" role="form">
				<!-- Name of user, mandatory -->
				<div class="form-group">
					<label for="name" class="control-label col-sm-3"><?=USER_TITLE.MANDATORY;?></label>
					<div class="controls col-sm-6">
	                    <input name="name" class="form-control <?=$errorClass;?>" type="text" placeholder="<?=USER_PLACEHOLDER;?>" value="<?=!empty($name)?$name:'';?>" />
					</div>
				</div>
				<!-- Password -->
				<div class="form-group">
					<label for="pwd" class="control-label col-sm-3"><?=PASSWORD_TITLE.MANDATORY;?></label>
					<div class="controls col-sm-6">
						<input name="pwd" class="form-control <?=$pwdClass;?>" type="password" value="">
					</div>
				</div>
				<!-- Pwd again -->
				<div class="form-group">
					<label for="pwd2" class="control-label col-sm-3"><?=PASSWORD_AGAIN.MANDATORY;?></label>
					<div class="controls col-sm-6">
						<input name="pwd2" class="form-control <?=$pwdClass;?>" type="password" value="">
					</div>
				</div>
				<!-- Role, mandatory through select/option value -->
				<div class="form-group empty-row-after">
					<label for="role" class="control-label col-sm-3"><?=USER_ROLE;?></label>
					<div class="controls col-sm-6">
						<select class="form-control" name="role" id="role">
							<option value="user" selected="selected">user</option>
							<option value="administrator">administrator</option>
						</select>
					</div>
				</div>
				<!-- Buttons -->
				<div class="form-group">
					<div class="col-sm-offset-3 col-sm-6">
						<button type="submit" class="btn btn-success"><?=BUTTON_SAVE;?></button>
						<a class="btn btn-info" role="button" href="?q=users"><?=BUTTON_BACK;?></a>
					</div>
				</div>
			</form>
		</div>
	</article>