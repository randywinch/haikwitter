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
		<div class="social-container clearfix">
			<div class="twitter-container inner-social-container">
				<a href="https://twitter.com/share" class="twitter-share-button" data-text="<?php echo $entry['Haiku']['line_1'] . " / " . $entry['Haiku']['line_2'] . " / " . $entry['Haiku']['line_3'];?>" data-via="haikwitter_575" data-hashtags="haikwitter">Tweet</a>
			</div>
			<div class="google-plus-container inner-social-container">
				<div class="g-plusone" data-annotation="none" data-href="http://haikwitter.com"></div>
			</div>
			<div class="facebook-container inner-social-container">
				<div class="fb-like" data-href="http://haikwitter.com" data-send="true" data-layout="button_count" data-width="110" data-show-faces="false" data-font="arial"></div>
			</div>
			<div class="inner-social-container">
				<?php
					if($flags == 0){
						$flagSubmit = '';
					} else {
						$flagSubmit = ' ' . $flags;
					}
					echo $this->Form->create('Flag', array('action'=>'flag'));
					echo $this->Form->hidden('ip', array('value'=>$userIP));
					echo $this->Form->hidden('haikwitter', array('value'=>$this->Session->request->params['pass']['0']));
					echo '<div class="hidden ajaxSubmit"><a href="javascript:void(1);" title="Flag this post as innappropriate">flag<span class="flag-count">' . $flagSubmit . '</span></a></div>';
					echo $this->Form->end(array('label'=>'Flag' . $flagSubmit, 'name'=>'flag', 'div'=>false, 'class'=>'flag-submit flag'));
				?>
			</div>
		</div>
	</div>

	<span itemprop="name" class="visuallyhidden">Haikwitter</span>
	<span itemprop="description" class="visuallyhidden"><?php echo $entry['Haiku']['line_1'] . " " . $entry['Haiku']['line_2'] . " " . $entry['Haiku']['line_3'];?></span>

	<script id="socialDefers"></script>
	<div id="fb-root"></div>


<!-- add flaggin mechanism -->
