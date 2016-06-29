<?php
// Check if user role is administrator
if($_SESSION['role']!=='administrator'):
	header('Location: ?q=start');
endif;
?>
		<div class="row">
			<h1 class="text-center"><?=SUPPLIERS_TITLE;?></h1>
			<p class="text-center">Suppliers with no activity links are bound to papers and cannot be updated or deleted.</p>
			<!-- Create button -->
			<p class="text-right">
				<a href="?q=create_supplier" class="btn btn-success"><?=BUTTON_CREATE_SUPPLIER;?></a>
				<a href="?q=start" class="btn btn-info"><?=BUTTON_BACK;?></a>
				<a href="?q=logout" class="btn btn-default"><?=BUTTON_LOGOUT;?></a>
			</p>
		</div>
		<div class="row">
			<table class="table table-striped table-bordered">
				<thead>
					<tr>
						<th><?=SUPPLIER_NAME;?></th>
						<th><?=ACTIVITY;?></th>
					</tr>
				</thead>
				<tbody>
<?php
// Query database to select all suppliers
$pdo = CDatabase::connect();
$sql = 'SELECT * FROM supplier ORDER BY name ASC';

// Check which supplier is not used by a paper
$sql2 = 'SELECT name FROM supplier WHERE NOT EXISTS (SELECT supplier FROM paper WHERE supplier.name = paper.supplier)';

// Loop through result.
// Maybe it would be cleaner code with heredoc: http://php.net/manual/en/language.types.string.php
foreach ($pdo->query($sql) as $row) {
	echo '<tr>';
	echo '<td>'.$row['name'].'</td>';
	echo '<td width="260px">';

	foreach ($pdo->query($sql2) as $not_used) {
		if ($row['name']===$not_used['name']) {
			// Update link
			echo '<a class="btn btn-success btn-xs" role="button" href="?q=update_supplier&amp;name='.$row['name'].'">'.BUTTON_UPDATE.'</a> ';
			// Delete link
			echo '<a class="btn btn-danger btn-xs" role="button" href="?q=delete_supplier&amp;name='.$row['name'].'">'.BUTTON_DELETE.'</a> ';
		}
	}
	echo '</td>';
	echo '</tr>';
}
CDatabase::disconnect();
?>
				</tbody>
			</table>
		</div>