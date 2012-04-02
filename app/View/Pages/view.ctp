	<div id="detailsContainer" class="container slim" role="main">
		<header>
			<a href="<?php echo $this->Html->url('/');?>" id="logo">
				<?php echo $this->Html->image('logo.png', array('alt'=>'Haikwitter')); ?>
			</a>
		</header>
		<p class="haiku-detail" data-selected-term="<?php if(isset($query)){echo $query;} ?>">
			<?php echo $entry['Haiku']['line_1'];?><br>
			<?php echo $entry['Haiku']['line_2'];?><br>
			<?php echo $entry['Haiku']['line_3'];?>
		</p>
		<div class="clearfix button-container">
			<a id="submitHaiku" class="button purple" href="<?php echo $this->Html->url('/'); ?>">new haikwitter <span class="arrow"></span></a>
		</div>
		<div class="clearfix button-container">
			<a id="submitHaiku" class="button" href="<?php echo $this->Html->url('/view/' . $next['Haiku']['id']); ?>">randomize <span class="arrow"></span></a>
		</div>
	</div>