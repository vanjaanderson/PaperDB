		<div class="row">
			<h1 class="text-center empty-row-after"><?=WEB_PAGE_TITLE;?> <?php if(!($_SESSION['role'])):?><small>Login with /admin in the URL</small><?php endif;?></h1>
			<!-- Create button -->
			<p class="start-row text-right">
				<!-- User priviliges -->
				<?php if(isset($_SESSION['role'])):?>
					<a href="?q=create_paper" class="btn btn-xs btn-success"><?=BUTTON_CREATE_PAPER;?></a>
					<!-- Administrator extra priviliges -->
					<?php if($_SESSION['role']==='administrator'):?>
						<a href="?q=users" class="btn btn-xs btn-primary"><?=BUTTON_USER;?></a>
						<a href="?q=suppliers" class="btn btn-xs btn-info"><?=BUTTON_SUPPLIER;?></a>
					<?php endif;?>
					<a href="?q=logout" class="btn btn-xs btn-default"><?=BUTTON_LOGOUT;?></a>
				<?php else:?>
					<!-- Login button currently disabled, login with /admin -->
					<!-- <a href="?q=login" class="btn btn-default"><?=BUTTON_LOGIN;?></a> -->
				<?php endif;?>
			</p>
		</div>
		<div class="row">
			<table class="table table-striped table-bordered">
				<thead>
					<tr>
						<th><?=PAPER_NAME;?></th>
						<th><?=PAPER_THICKNESS;?></th>
						<th><?=PAPER_DENSITY;?></th>
						<th><?=ACTIVITY;?></th>
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
	echo '<td class="activity-column">';
	echo '<a class="btn btn-warning btn-xs" role="button" href="?q=read_paper&amp;id='.$row['id'].'">'.BUTTON_READ.'</a> ';
	// Check user name and role, if administrator view all posts, if user only view their own posts
	if((isset($_SESSION['role']) && $_SESSION['user']===$row['user']) || ($_SESSION['role']==='administrator')):
	// Update link
	echo '<a class="btn btn-success btn-xs" role="button" href="?q=update_paper&amp;id='.$row['id'].'">'.BUTTON_UPDATE.'</a> ';
	// Delete button
	echo '<a class="btn btn-danger btn-xs" role="button" href="?q=delete_paper&amp;id='.$row['id'].'">'.BUTTON_DELETE.'</a> ';
	endif;
	// Calculate back button
	echo '<a class="btn btn-info btn-xs" role="button" href="?q=calculate_back&amp;id='.$row['id'].'">'.BUTTON_CALCULATE_BACK.'</a> ';
	echo '</td>';
	echo '</tr>';
}
CDatabase::disconnect(); ?>
				</tbody>
			</table>
		</div>