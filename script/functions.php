<?php
// Function to fetch simple optional data from database
function fetch_from_database($sql) {
	$pdo = CDatabase::connect();
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$stmt = $pdo->prepare($sql);
	$stmt->execute();
	return $stmt->fetch(PDO::FETCH_ASSOC);
	CDatabase::disconnect();
}
// Function to insert to database, url is url to redirect to after insertion
function input_to_database($sql, $attr, $url) {
	$pdo = CDatabase::connect();
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	// Try input and eventually catch exception
	$caught = false;
	try { $stmt = $pdo->prepare($sql)->execute(explode(", ",$attr));
	} catch (PDOException $e) {catch_exception($e, explode(", ",$attr)[0]); $caught = true; }
	if (!$caught) { // If caught still is false
		header('Location:'.$url.'');
	}
	CDatabase::disconnect();
}
// Function to fetch values from database
function output_from_database($sql, $attr) {
	$pdo = CDatabase::connect();
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$stmt = $pdo->prepare($sql);
	$stmt->execute(explode(", ",$attr));
	return $stmt->fetch(PDO::FETCH_ASSOC);
	CDatabase::disconnect();
}
// Output query in select/option list
function output_query_in_select($index) {
	echo '<select class="form-control" name="'.$index.'" id="'.$index.'">';
	$pdo = CDatabase::connect();
	$sql = "SELECT * from $index ORDER BY $index ASC";
	foreach ($pdo->query($sql) as $row) {
		echo '<option value="'.$row[$index].'">'.$row[$index].'</option>';
	}
	CDatabase::disconnect();
	echo '</select>';
}			
// Check for user with common user privileges
function allow_user_privileges() {
	if(!$_SESSION['role']):
		header('Location: ?q=start');
	endif;
}
// Check for user with admin privileges
function allow_admin_privileges() {
	if($_SESSION['role']!=='administrator'):
		header('Location: ?q=start');
	endif;
}
// Catch PDO exception (if any)
function catch_exception($e, $entity) {
	// Integrity constraint violation: 1062 Duplicate entry.
	if (strpos($e, '1062') !== false) {
		echo '<p class="alert alert-danger text-center absolute"> '.$entity.' already exist, try another input</p>';
	}
}	
?>