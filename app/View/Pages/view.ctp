<div style="background: url(<?php echo $resultURL; ?>) no-repeat; height: 1000px; width: 2400px">
	<div style="background: #fff; width: 320px;">

		<h1><?php echo $entry['Haiku']['line_1'];?></h1>
		<h1><?php echo $entry['Haiku']['line_2'];?></h1>
		<h1><?php echo $entry['Haiku']['line_3'];?></h1>

		<div><?php echo $this->Html->link('Give me more inspiration!','/view/' . $next['Haiku']['id']); ?> | <?php echo $this->Html->link('Add more inspiration!','/'); ?></div>
	</div><!-- / -->

</div>