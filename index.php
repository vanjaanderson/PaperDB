
<?php
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
	// Create paper
	case "create_paper": { 
		$pageAddition = 'Create paper';
		$page = 'content/create_paper.php';
	}
	break;
	// Read paper
	case "read_paper": { 
		$pageAddition = 'Read paper';
		$page = 'content/read_paper.php';
	} 
	break;
	// Update paper
	case "update_paper": {
		$pageAddition = 'Update paper';
		$page = 'content/update_paper.php';
	}
	break;
	// Delete paper
	case "delete_paper": {
		$pageAddition = 'Delete paper';
		$page = 'content/delete_paper.php';
	} 
	break;
	case "calculate_back": {
		$pageAddition = 'Calculate back';
		$page = 'content/calculate_back.php';
	}
	break;
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