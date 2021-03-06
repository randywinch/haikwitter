	<div id="homeContainer" class="container slim" role="main">
		<header>
			<a href="<?php echo $this->Html->url('/');?>" id="logo">
				<?php echo $this->Html->image('logo.png', array('alt'=>'Haikwitter', 'class'=>'home-logo')); ?>
			</a>
		</header>

		<?php echo $this->Form->create('Haiku', array(
				'id'=>'createHaiku'
				)
			);
		?>
			<p>
				<?php echo $this->Form->input('Haiku.line_1', array(
						'id'=>'haiku1',
						'label'=>false,
						'placeholder'=>'Enter five syllables',
						'div'=>false,
						'error'=>false
						)
					);
				?>
				<span id="haiku1Count" class="word-count" data-limit="5">5</span>
			</p>
			<p>
				<?php echo $this->Form->input('Haiku.line_2', array(
						'id'=>'haiku2',
						'label'=>false,
						'placeholder'=>'Enter seven syllables',
						'div'=>false,
						'error'=>false
						)
					);
				?>
				<!-- <input type="text" id="haiku2" name="haiku2" placeholder="Enter seven words"> -->
				<span id="haiku2Count" class="word-count" data-limit="7">7</span>
			</p>
			<p>
				<?php echo $this->Form->input('Haiku.line_3', array(
						'id'=>'haiku3',
						'label'=>false,
						'placeholder'=>'Enter five syllables',
						'div'=>false,
						'error'=>false
						)
					);
				?>
				<span id="haiku3Count" class="word-count" data-limit="5">5</span>
			</p>
			<p class="clearfix submit-container">
				<button id="submitHaiku" class="button long-button">express yourself <span class="arrow"></span></button>
			</p>
			<div class="clearfix button-container">
				<a id="submitHaiku" class="button purple" href="<?php echo $this->Html->url('/view/' . $next['Haiku']['id']); ?>">random haikwitter <span class="arrow"></span></a>
			</div>
			<p class="syllable-warning">*Please be patient, the 5th graders we hired to count syllables aren't always accurate.</p>
			<div class="clearfix"></div>
		<?php echo $this->Form->end(); ?>
	</div>
