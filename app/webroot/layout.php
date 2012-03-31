<?php include("libs/header.php"); ?>

	<div id="homeContainer" class="container slim" role="main">
		<header>
			<a href="./" id="logo">
				<img src="img/logo.png" alt="Haikwitter">
			</a>
		</header>
		<form id="createHaiku" name="createHaiku" action="" method="post">
			<p>
				<input type="text" id="haiku1" name="haiku1" placeholder="Enter five words">
				<span id="haiku1Count" class="word-count" data-limit="5">5</span>
			</p>
			<p>
				<input type="text" id="haiku2" name="haiku2" placeholder="Enter seven words">
				<span id="haiku2Count" class="word-count" data-limit="7">7</span>
			</p>
			<p>
				<input type="text" id="haiku3" name="haiku3" placeholder="Enter five words">
				<span id="haiku3Count" class="word-count" data-limit="5">5</span>
			</p>
			<p>
				<button id="submitHaiku" class="form-button">express yourself</button>
			</p>
			<div class="clearfix"></div>
		</form>
	</div>
	
<?php include("libs/footer.php"); ?>