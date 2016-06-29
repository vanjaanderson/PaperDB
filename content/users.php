<?php
// Check if user role is administrator
if($_SESSION['role']!=='administrator'):
	header('Location: ?q=start');
endif;
?>
		<div class="row">
			<h1 class="text-center"><?=USERS_TITLE;?></h1>
			<!-- Create button -->
			<p class="text-right">
				<a href="?q=create_user" class="btn btn-success"><?=BUTTON_CREATE_USER;?></a>
				<a href="?q=start" class="btn btn-info"><?=BUTTON_BACK;?></a>
				<a href="?q=logout" class="btn btn-default"><?=BUTTON_LOGOUT;?></a>
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
	echo '<td>'.$row['user'].'</td>';
	echo '<td>'.$row['role'].'</td>';
	// Read link
	echo '<td width="260px">';
	// Upadate link
	echo '<a class="btn btn-success btn-xs" role="button" href="?q=update_user&amp;id='.$row['id'].'&amp;user='.$row['user'].'&amp;role='.$row['role'].'">'.BUTTON_UPDATE.'</a> ';
	// Delete button
	echo '<a class="btn btn-danger btn-xs" role="button" href="?q=delete_user&amp;id='.$row['id'].'&amp;user='.$row['user'].'">'.BUTTON_DELETE.'</a> ';
	echo '</td>';
	echo '</tr>';
}
CDatabase::disconnect();
?>
				</tbody>
			</table>
		</div>