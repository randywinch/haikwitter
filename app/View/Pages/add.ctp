		<?php echo $this->Form->create('Haiku', array(
				'id'=>'createHaiku'
				)
			);
		?>
			<p>
				<?php echo $this->Form->input('Haiku.line_1', array(
						'id'=>'haiku1',
						'label'=>false,
						'placeholder'=>'Enter five words',
						'div'=>false
						)
					);
				?>
				<span id="haiku1Count" class="word-count" data-limit="5">5</span>
			</p>
			<p>
				<?php echo $this->Form->input('Haiku.line_2', array(
						'id'=>'haiku2',
						'label'=>false,
						'placeholder'=>'Enter seven words',
						'div'=>false
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
						'placeholder'=>'Enter five words',
						'div'=>false
						)
					);
				?>
				<span id="haiku3Count" class="word-count" data-limit="5">5</span>
			</p>
			<p>
				<button id="submitHaiku" class="button">express yourself <span class="arrow"></span></button>
			</p>
			<div class="clearfix"></div>
		<?php echo $this->Form->end(); ?>
