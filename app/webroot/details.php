<?php $page = "details" ?>
<?php include("libs/header.php"); ?>

	<div id="detailsContainer" class="container slim" role="main">
		<header>
			<a href="./" id="logo">
				<img src="img/logo.png" alt="Haikwitter">
			</a>
		</header>
		<p class="haiku-detail">
			the siren stop<br>
			sat the draped body<br>
			hopscotch markings
		</p>
		<div class="clearfix button-container">
			<a id="submitHaiku" class="button purple">new haikwitter <span class="arrow"></span></a>
		</div>
		<div class="clearfix button-container">
			<a id="submitHaiku" class="button">randomize <span class="arrow"></span></a>
		</div>
	</div>
	
<?php include("libs/footer.php"); ?>