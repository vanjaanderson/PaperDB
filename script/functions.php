<?php
// Function to insert to database
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
// Function to fetch all data from database
function fetch_all_from_database($sql) {
	$pdo = CDatabase::connect();
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$stmt = $pdo->prepare($sql);
	$stmt->execute();
	return $stmt->fetch(PDO::FETCH_ASSOC);
	CDatabase::disconnect();
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
// Catch exception (if any)
function catch_exception($e, $entity) {
	// Integrity constraint violation: 1062 Duplicate entry.
	if (strpos($e, '1062') !== false) {
		echo '<p class="alert alert-danger text-center absolute"> '.$entity.' already exist, try another input</p>';
	}
}

?>

