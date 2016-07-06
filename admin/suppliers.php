<?php
// Only let users with admin privileges access this page
allow_admin_privileges();
?>
	<article>
		<div class="row">
			<h1 class="text-center empty-row-after"><?=SUPPLIERS_TITLE;?></h1>
		</div>
		<div class="row">
			<!-- Create button -->
			<p class="text-left col-xs-12 col-sm-8">
			Suppliers with no activity links are bound to papers and cannot be updated or deleted in this view.</p>
			<p class="text-right col-xs-12 col-sm-4">
				<a href="?q=create_supplier" class="btn btn-xs btn-success"><?=BUTTON_CREATE_SUPPLIER;?></a>
				<a href="?q=start" class="btn btn-xs btn-info"><?=BUTTON_BACK;?></a>
				<a href="?q=logout" class="btn btn-xs btn-default"><?=BUTTON_LOGOUT;?></a>
			</p>
		</div>
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
$sql = 'SELECT * FROM supplier ORDER BY supplier ASC';

// Check which supplier is not used by a paper
$sql2 = 'SELECT supplier FROM supplier WHERE NOT EXISTS (SELECT supplier FROM paper WHERE supplier.supplier = paper.supplier)';

// Loop through result.
// Maybe it would be cleaner code with heredoc: http://php.net/manual/en/language.types.string.php
foreach ($pdo->query($sql) as $row) {
	echo '<tr>';
	echo '<td>'.$row['supplier'].'</td>';
	echo '<td class="activity-column">';

	foreach ($pdo->query($sql2) as $not_used) {
		if ($row['supplier']===$not_used['supplier']) {
			// Update link
			echo '<a class="btn btn-success btn-xs" role="button" href="?q=update_supplier&amp;supplier='.$row['supplier'].'">'.BUTTON_UPDATE.'</a> ';
			// Delete link
			echo '<a class="btn btn-danger btn-xs" role="button" href="?q=delete_supplier&amp;supplier='.$row['supplier'].'">'.BUTTON_DELETE.'</a> ';
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
	</article>