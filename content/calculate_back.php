<?php

// Fetch values to calculate
if (!empty($_GET)) {
	$id = $_GET['id'];
	$brand = $_GET['brand'];
	$type = $_GET['type'];
	$my = $_GET['my'];
}
// Define default value for paper
$pages = !empty($_POST['pages'])?$_POST['pages']:100;
// Calculate result
$result = $pages/2*$my/1000;

?>
		<!-- Heading -->
		<div class="row">
			<h1 class="text-center empty-row-after"><?=CALCULATE_BACK_TITLE;?> <?=$_GET['brand'];?> <?=$_GET['type'];?><?=$_GET['my'];?></h1>
		</div>
		<form class="form-horizontal big text-center" action="#" method="post" role="form">
			<div class="form-group">
				<!-- Number of pages to calculate back of -->
				<input class="primary_blue right-justified small-width" type="text" name="pages" placeholder="<?=NUMBER_PAGES;?>" value="<?=$pages;?>" /> <em class="primary_blue">(sheets of paper)</em> <span>/ 2 &times;</span> 
				<!-- My-value -->
				<span class="info_blue"><?=$my;?> <em>(&#956;-value)</em></span> <span>/1000 = <strong class="success_green"><?=$result;?> mm</strong></span>
			</div>
			<div class="form-group">
				<!-- Submit button -->
				<input type="submit" class="btn btn-success" name="calculate" id="calculate" value="<?=CALCULATE;?>" />
				<a class="btn btn-default" role="button" href="<?=DOCUMENT_ROOT;?>"><?=BUTTON_BACK;?></a>
			</div>	
		</form>

