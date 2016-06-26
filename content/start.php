		<div class="row">
			<h1 class="text-center"><?=WEB_PAGE_TITLE;?></h1>
			<!-- Create button -->
			<p><a href="?q=create_paper" class="btn btn-success">Create paper</a></p>
		</div>
		<div class="row">
			<table class="table table-striped table-bordered">
				<thead>
					<tr>
						<th><?=PAPER_NAME;?></th>
						<th><?=PAPER_THICKNESS;?></th>
						<th><?=PAPER_DENSITY;?></th>
						<th><?=PAPER_ACTIVITY;?></th>
					</tr>
				</thead>
				<tbody>
<?php
// Query database to select all papers
$pdo = CDatabase::connect();
$sql = 'SELECT * FROM paper ORDER BY brand ASC';
// Loop through result.
// Maybe it would be cleaner code with heredoc: http://php.net/manual/en/language.types.string.php
foreach ($pdo->query($sql) as $row) {
	echo '<tr>';
	echo '<td>'.$row['brand'].' '.$row['type'].$row['grammage'].'</td>';
	echo '<td>'.$row['my'].' &#956;mm</td>';
	echo '<td>'.$row['grammage'].' g/m&#178;</td>';
	// Read link
	echo '<td width="260px">';
	echo '<a class="btn btn-warning btn-xs" role="button" href="?q=read_paper&amp;id='.$row['id'].'">'.BUTTON_READ.'</a> ';
	// Upadate link
	echo '<a class="btn btn-success btn-xs" role="button" href="?q=update_paper&amp;id='.$row['id'].'">'.BUTTON_UPDATE.'</a> ';
	// Delete button
	echo '<a class="btn btn-danger btn-xs" role="button" href="?q=delete_paper&amp;id='.$row['id'].'&amp;brand='.$row['brand'].'&amp;type='.$row['type'].'&amp;grammage='.$row['grammage'].'">'.BUTTON_DELETE.'</a> ';
	// Calculate back button
	echo '<a class="btn btn-info btn-xs" role="button" href="?q=calculate_back&amp;id='.$row['id'].'&amp;brand='.$row['brand'].'&amp;type='.$row['type'].'&amp;my='.$row['my'].'">'.BUTTON_CALCULATE_BACK.'</a> ';
	echo '</td>';
	echo '</tr>';
}
CDatabase::disconnect();
?>
				</tbody>
			</table>
		</div>