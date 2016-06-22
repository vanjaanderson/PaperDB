<?php

// Function to insert to database
function input_to_database($sql, $attr) {
	$pdo = CDatabase::connect();
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$stmt = $pdo->prepare($sql);
	$stmt->execute(explode(", ",$attr));
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

?>

