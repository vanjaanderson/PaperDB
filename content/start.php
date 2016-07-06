	<article>
		<div class="row">
			<h1 class="text-center empty-row-after"><?=WEB_PAGE_TITLE;?></h1>
		</div>
		<div class="row">
			<div class="col-sm-3">
				<form action="?q=start" role="search" method="GET">
					<div class="input-group">
						<input id="search" name="query" type="text" class="form-control" placeholder="<?=BUTTON_SEARCH;?>" value="<?=isset($_GET['query'])?$_GET['query']:'';?>">
						<span class="input-group-btn">
								<button type="submit" class="btn btn-xs btn-default"><strong class="glyphicon glyphicon-search"></strong></button>
						</span>
					</div>
				</form>
			</div>
			<div class="col-sm-9 text-right">
				<!-- Create button -->					
				<!-- User priviliges -->
				<?php if(isset($_SESSION['role'])):?>
					<a href="?q=create_paper" class="btn btn-xs btn-success"><?=BUTTON_CREATE_PAPER;?></a>
				<!-- Administrator extra priviliges -->
				<?php if(isset($_SESSION['role']) && $_SESSION['role']==='administrator'):?>
					<a href="?q=users" class="btn btn-xs btn-primary"><?=BUTTON_USER;?></a>
					<a href="?q=suppliers" class="btn btn-xs btn-info"><?=BUTTON_SUPPLIER;?></a>
				<?php endif;?>
					<a href="?q=logout" class="btn btn-xs btn-default"><?=BUTTON_LOGOUT;?></a>
				<?php else:?>
					<!-- Button login or logout is shown depending on the user session -->
					<a href="?q=login" class="btn btn-xs btn-default"><?=BUTTON_LOGIN;?></a>
				<?php endif;?>	
			</div>
		</div>
		<!-- End nav -->
		<div class="table-responsive empty-row-before">
			<table class="table table-striped table-bordered">
				<thead>
					<tr>
						<!-- Administrator head -->
						<?php if(isset($_SESSION['role']) && $_SESSION['role']==='administrator'):?>
							<th>#</th>
							<th><?=BRAND_TITLE;?></th>
							<th><?=TYPE_TITLE;?></th>
							<th><?=MY_TITLE;?></th>
							<th><?=GRAMMAGE_TITLE;?></th>
							<th><?=COLOR_TITLE;?></th>
							<th><?=SUPPLIER_TITLE;?></th>
							<th><?=CREATED_BY;?></th>
							<th><?=IMAGE_TITLE;?></th>
							<th><?=ACTIVITY;?></th>
						<!-- All others head -->
						<?php else: ?>
							<th><?=PAPER_NAME;?></th>
							<th><?=PAPER_THICKNESS;?></th>
							<th><?=PAPER_DENSITY;?></th>
							<th><?=ACTIVITY;?></th>
						<?php endif;?>
					</tr>
				</thead>
				<tbody>
<?php 
// Query database to select all papers, with paginator and search box
$pdo = CDatabase::connect();
// Paginating
$paginator = new CPaginator();
$sql = "SELECT count(*) FROM paper";
$paginator->paginate($pdo->query($sql)->fetchColumn());
/***************
 The query
 **************/
$sql = "SELECT * FROM paper ";
// If search is input, include search in query
$query = isset($_GET['query'])?('%'.$_GET['query'].'%'):'%';
$sql .= "WHERE brand LIKE :query OR type LIKE :query OR supplier LIKE :query OR grammage LIKE :query OR my LIKE :query OR user LIKE :query ";
// Order query
$sql .= "ORDER BY id ASC ";
// Limit posts in view
$sql .="limit :start, :length";

$start = (($paginator->get_current_page()-1)*$paginator->itemsPerPage);
$length = ($paginator->itemsPerPage);
/**************/
// Bind parameters
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':start',$start,PDO::PARAM_INT);
$stmt->bindParam(':length',$length,PDO::PARAM_INT);
$stmt->bindParam(':query',$query,PDO::PARAM_STR);
$stmt->execute();
//
foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
	echo '<tr>';

	if(isset($_SESSION['role']) && $_SESSION['role']==='administrator'): 
		echo '<td>'.$row['id'].'</td>';
		echo '<td>'.$row['brand'].'</td>';
		echo '<td>'.$row['type'].'</td>';
		echo '<td>'.$row['my'].'</td>';
		echo '<td>'.$row['grammage'].'</td>';
		echo '<td>'.$row['color'].'</td>';
		echo '<td>'.$row['supplier'].'</td>';
		echo '<td>'.$row['user'].'</td>';
		echo '<td><img src="'.$row['image'].'" alt="thumbnail image" class="thumb" /></td>';
	else:
		echo '<td>'.$row['brand'].' '.$row['type'].$row['grammage'].'</td>';
		echo '<td>'.$row['my'].' &#956;mm</td>';
		echo '<td>'.$row['grammage'].' g/m&#178;</td>';
	endif;

	// Read link
	echo '<td class="activity-column">';
	echo '<a class="btn btn-warning btn-xs" role="button" href="?q=read_paper&amp;id='.$row['id'].'">'.BUTTON_READ.'</a> ';
	// Check user name and role, if administrator view all posts, if user only view their own posts
	if((isset($_SESSION['role']) && $_SESSION['user']===$row['user']) || (isset($_SESSION['role']) && $_SESSION['role']==='administrator')):
		echo '<a class="btn btn-success btn-xs" role="button" href="?q=update_paper&amp;id='.$row['id'].'">'.BUTTON_UPDATE.'</a> ';
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
	</article>
<?=$paginator->page_nav();?>