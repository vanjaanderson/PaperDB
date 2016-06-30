<?php
// Only let users with admin privileges access this page
allow_admin_privileges();
?>
		<div class="row">
			<h1 class="text-center empty-row-after"><?=USERS_TITLE;?></h1>
			<!-- Create button -->
			<p class="start-row text-right">
				<a href="?q=create_user" class="btn btn-xs btn-success"><?=BUTTON_CREATE_USER;?></a>
				<a href="?q=start" class="btn btn-xs btn-info"><?=BUTTON_BACK;?></a>
				<a href="?q=logout" class="btn btn-xs btn-default"><?=BUTTON_LOGOUT;?></a>
			</p>
		</div>
		<div class="row">
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
$sql = 'SELECT * FROM user ORDER BY id ASC';
// Loop through result.
// Maybe it would be cleaner code with heredoc: http://php.net/manual/en/language.types.string.php
foreach ($pdo->query($sql) as $row) {
	echo '<tr>';
	echo '<td>'.$row['name'].'</td>';
	echo '<td>'.$row['role'].'</td>';
	// Read link
	echo '<td class="activity-column">';
	// Upadate link
	echo '<a class="btn btn-success btn-xs" role="button" href="?q=update_user&amp;id='.$row['id'].'&amp;user='.$row['name'].'&amp;role='.$row['role'].'">'.BUTTON_UPDATE.'</a> ';
	// Delete button
	echo '<a class="btn btn-danger btn-xs" role="button" href="?q=delete_user&amp;id='.$row['id'].'&amp;user='.$row['name'].'">'.BUTTON_DELETE.'</a> ';
	echo '</td>';
	echo '</tr>';
}
CDatabase::disconnect();
?>
				</tbody>
			</table>
		</div>