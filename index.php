<?php
// Start session
session_start();

// echo $_SESSION['role'];

// Page functionality
include('db/config.php');
include('db/CDatabase.php');
include('script/functions.php'); 

$q = null;
$page = "";

if(isset($_GET['q'])) {
	$q = $_GET['q'];
}
// Choose content depending on get parameter
switch($q) {
	// Paper administration
	case "create_paper": { 
		$pageAddition = 'Create paper';
		$page = 'content/create_paper.php';
	} break;
	case "read_paper": { 
		$pageAddition = 'Read paper';
		$page = 'content/read_paper.php';
	} break;
	case "update_paper": {
		$pageAddition = 'Update paper';
		$page = 'content/update_paper.php';
	} break;
	case "delete_paper": {
		$pageAddition = 'Delete paper';
		$page = 'content/delete_paper.php';
	} break;
	// Supplier administration
	case "suppliers": {
		$pageAddition = 'Administrate suppliers';
		$page = 'content/suppliers.php';
	} break;
	case "create_supplier": {
		$pageAddition = 'Create supplier';
		$page = 'content/create_supplier.php';
	} break;
	case "update_supplier": {
		$pageAddition = 'Update supplier';
		$page = 'content/update_supplier.php';
	} break;
	case "delete_supplier": {
		$pageAddition = 'Delete supplier';
		$page = 'content/delete_supplier.php';
	} break;
	// User administration
	case "users": {
		$pageAddition = 'Administrate users';
		$page = 'content/users.php';
	} break;
	case "create_user": {
		$pageAddition = 'Create user';
		$page = 'content/create_user.php';
	} break;
	case "update_user": {
		$pageAddition = 'Update user';
		$page = 'content/update_user.php';
	} break;
	case "delete_user": {
		$pageAddition = 'Delete user';
		$page = 'content/delete_user.php';
	} break;
	// Other performance
	case "calculate_back": {
		$pageAddition = 'Calculate back';
		$page = 'content/calculate_back.php';
	} break;
	case "login": {
		$pageAddition = 'Login';
		$page = 'content/login.php';
	} break;
	case "logout": {
		$pageAddition = 'Logout';
		$page = 'content/logout.php';
	} break;
	// Default view
	default : { 
		$pageAddition = 'Administrate paper';
		$page = 'content/start.php';
	}
}

// Page structure
include ('inc/header.php');
include($page);
include('inc/footer.php');
?>