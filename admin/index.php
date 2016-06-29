<?php
session_start();
// Check if session role is set
if(isset($_SESSION['role'])) {
	header('Location: ../?q=start');
} else {
	header('Location: ../?q=login');
}
?>