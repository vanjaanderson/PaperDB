<?php
// Fetch values to calculate
$id = null;
// Fetch the id from get parameter
if ( !empty($_GET['id'])) {
	$id = $_REQUEST['id'];
}
// If no request, forward to start page
if ( $id === null ) {
	header('Location:?q=start');
// ... else query the database and save values in $data array
} else {
	$data = output_from_database('SELECT * FROM paper WHERE id = ?', "$id");
}
// Define default value for paper
$pages = !empty($_POST['pages'])?$_POST['pages']:100;
// Make number of pages even (i.e. if number is odd, add one to make it even)
if ($pages%2 === 1) {
	$pages += 1;
}
// Calculate result
$result = $pages/2*$data['my']/1000;
?>
		<!-- Heading -->
		<div class="row">
			<h1 class="text-center empty-row-after"><?=CALCULATE_BACK_TITLE;?> <span class="success_green"><?=$data['brand'];?> <?=$data['type'];?><?=$data['my'];?></span></h1>
			<div class="start-row">
				<p class="text-center">Number of pages must be even, if you enter an odd value, the value will increase by one. Usually a printed matter with up to 64 pages will have no back.</p>
			</div>
		</div>
		<div id="calculate-well" class="well row">
			<form class="form-horizontal big text-center" action="#" method="post" role="form">
				<div class="form-group">
					<!-- Number of pages to calculate back of -->
					<input class="primary_blue right-justified small-width" type="text" name="pages" placeholder="<?=NUMBER_PAGES;?>" value="<?=$pages;?>" /> <em class="primary_blue">(sheets of paper)</em> <span>/ 2 &times;</span> 
					<!-- My-value -->
					<span class="info_blue"><?=$data['my'];?> <em>(&#956;-value)</em></span> <span>/1000 = <strong class="success_green"><?=$result;?> mm</strong></span>
				</div>
				<div class="form-group">
					<!-- Submit button -->
					<input type="submit" class="btn btn-success" name="calculate" id="calculate" value="<?=CALCULATE;?>" />
					<a class="btn btn-info" role="button" href="<?=DOCUMENT_ROOT;?>"><?=BUTTON_BACK;?></a>
				</div>	
			</form>
		</div>