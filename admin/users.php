<?php
// Only let users with admin privileges access this page
allow_admin_privileges();
?>
	<article>
		<div class="row">
			<h1 class="text-center empty-row-after"><?=USERS_TITLE;?></h1>
		</div>
		<div class="row">
			<!-- Create button -->
			<p class="text-left col-xs-12 col-sm-8">
			Users with no activity links are bound to papers and cannot be updated or deleted in this view.</p>
			<p class="text-right col-xs-12 col-sm-4">
				<a href="?q=create_user" class="btn btn-xs btn-success"><?=BUTTON_CREATE_USER;?></a>
				<a href="?q=start" class="btn btn-xs btn-info"><?=BUTTON_BACK;?></a>
				<a href="?q=logout" class="btn btn-xs btn-default"><?=BUTTON_LOGOUT;?></a>
			</p>
		</div>
		<table class="table table-striped table-bordered">
			<thead>
				<tr>
					<th><?=USERNAME;?></th>
					<th><?=USER_ROLE;?></th>
					<th><?=ACTIVITY;?></th>
				</tr>
			</thead>
			<tbody>
<?php
// Query database to select all papers
$pdo = CDatabase::connect();
$sql = 'SELECT * FROM user ORDER BY name ASC';

// Check which supplier is not used by a paper
$sql2 = 'SELECT name FROM user WHERE NOT EXISTS (SELECT user FROM paper WHERE user.name = paper.user)';

foreach ($pdo->query($sql) as $row) {
	echo '<tr>';
	echo '<td>'.$row['name'].'</td>';
	echo '<td>'.$row['role'].'</td>';
	// Read link
	echo '<td class="activity-column">';
	// Update link
	foreach ($pdo->query($sql2) as $not_used) {
		if ($row['name']===$not_used['name']) {
			echo '<a class="btn btn-success btn-xs" role="button" href="?q=update_user&amp;name='.$row['name'].'">'.BUTTON_UPDATE.'</a> ';
			// Delete button
			echo '<a class="btn btn-danger btn-xs" role="button" href="?q=delete_user&amp;name='.$row['name'].'">'.BUTTON_DELETE.'</a> ';
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