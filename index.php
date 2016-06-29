<?php
// Start session (used for user login)
session_start();

// Page functionality
require('db/config.php');
require('db/CDatabase.php');
require('script/functions.php'); 

// Page content variables' declarations (to avoid warnings and notices, depending on web-server's preferences)
$q = null;
$page = "";

// Check get variable and choose content depending on it
if(isset($_GET['q'])) {
	$q = $_GET['q'];
}
switch($q) {
	// Paper administration – all users
	case "read_paper": { 
		$pageAddition = 'Read paper';
		$page = 'content/read_paper.php';
	} break;
	// Paper administration – logged in user
	case "create_paper": { 
		$pageAddition = 'Create paper';
		$page = 'admin/create_paper.php';
	} break;
	case "update_paper": {
		$pageAddition = 'Update paper';
		$page = 'admin/update_paper.php';
	} break;
	case "delete_paper": {
		$pageAddition = 'Delete paper';
		$page = 'admin/delete_paper.php';
	} break;
	// Supplier administration – only logged in administrator
	case "suppliers": {
		$pageAddition = 'Administrate suppliers';
		$page = 'admin/suppliers.php';
	} break;
	case "create_supplier": {
		$pageAddition = 'Create supplier';
		$page = 'admin/create_supplier.php';
	} break;
	case "update_supplier": {
		$pageAddition = 'Update supplier';
		$page = 'admin/update_supplier.php';
	} break;
	case "delete_supplier": {
		$pageAddition = 'Delete supplier';
		$page = 'admin/delete_supplier.php';
	} break;
	// User administration – only logged in administrator
	case "users": {
		$pageAddition = 'Administrate users';
		$page = 'admin/users.php';
	} break;
	case "create_user": {
		$pageAddition = 'Create user';
		$page = 'admin/create_user.php';
	} break;
	case "update_user": {
		$pageAddition = 'Update user';
		$page = 'admin/update_user.php';
	} break;
	case "delete_user": {
		$pageAddition = 'Delete user';
		$page = 'admin/delete_user.php';
	} break;
	// Other performance – all users
	case "calculate_back": {
		$pageAddition = 'Calculate back';
		$page = 'content/calculate_back.php';
	} break;
	case "login": {
		$pageAddition = 'Login';
		$page = 'admin/login.php';
	} break;
	case "logout": {
		$pageAddition = 'Logout';
		$page = 'admin/logout.php';
	} break;
	// Default view – all users
	default : { 
		$pageAddition = 'Administrate paper';
		$page = 'content/start.php';
	}
}

// Page structure
include('inc/header.php');
include($page);
include('inc/footer.php');
?>