<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

$cakeDescription = __d('cake_dev', 'Haikwitter!');
?>
<!doctype html>
<?php if(isset($resultURL)){
		echo "<html itemscope itemtype='http://schema.org/Product' lang='en' class='no-js full-background' style='background-image: url({$resultURL});'>";
	} else {
		echo "<html itemscope itemtype='http://schema.org/Product' lang='en' class='no-js'>";
	};
?>
<head>
	<meta charset="utf-8">

	<title><?php echo $cakeDescription ?><?php //echo $title_for_layout; ?></title>

	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css( array(
			'010_base',
			'900_style',
			'ie',
			'999_print'
			)
		);

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>

	<meta name="author" content="Matt Webb, Randy Winch and Jake Gibbons">
	<meta property="og:title" content="haikwitter" />
	<meta property="og:url" content="http://haikwitter.com" />
	<meta property="og:image" content="http://haikwitter.com/img/facebook.png" />
	<meta property="og:site_name" content="haikwitter" />
	<meta property="og:description"
		  content="<?php echo (isset($entry) ? ($entry['Haiku']['line_1'] . " / " . $entry['Haiku']['line_2'] . " / " . $entry['Haiku']['line_3']) : ('haikwitter, you know, for kids')); ?>"/>

	<link href="http://fonts.googleapis.com/css?family=Gudea" rel="stylesheet">

	<!-- All JavaScript at the bottom, except this Modernizr build.
		 Modernizr enables HTML5 elements & feature detects for optimal performance.
		 Create your own custom Modernizr build: www.modernizr.com/download/ -->
	<script src="<?php echo $this->Html->url("/js/libs/modernizr-2.5.2.min.js"); ?>"></script>
</head>
	<body data-webroot="<?php echo $this->Html->url('/');?>">
	<!-- This is incase a user doesn't have JS enabled on their browser -->
	<noscript>
		<div class="js-disabled">
			Javascript is disabled in your web browser. For full functionality of
			this site it is necessary to enable JavaScript. Here are the
			<a href="http://www.enable-javascript.com/" target="_blank">
			instructions how to enable JavaScript in your web browser
			</a>.
		</div>
	</noscript>

		<?php echo $this->fetch('content'); ?>

		<footer id="global-footer">
			<p>
				Copyright &copy; 2012 | Built during <a href="http://www.developdenver.org">Develop Denver 1.0</a> by <a href="http://www.twitter.com/liquidlev">Randy</a>, <a href="http://www.twitter.com/creatify_me">Matt</a>, <a href="http://www.twitter.com/jayseeg">Jake</a> and Noah
			</p>
			<?php if(isset($linkBack)): ?>
				<p>
					Random photo pulled from flickr.com, <a href="<?php echo $linkBack ; ?>" title="Original photo on flickr.com" target="_blank">click here to view</a>.
				</p>
			<?php endif; ?>
		</footer>
	</div>

	<!--
		JavaScript at the bottom for fast page loading
	-->
	<!-- Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if offline -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="js/libs/jquery-1.7.1.min.js"><\/script>')</script>
	<script src="<?php echo $this->Html->url("/js/script.js"); ?>"></script>

	<script type="text/javascript">
		var _gaq = _gaq || [];
		_gaq.push(['_setAccount', 'UA-2412799-9']);
		_gaq.push(['_trackPageview']);

		(function() {
			var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		})();
	</script>

	<!-- Prompt IE 6 users to install Chrome Frame. Remove this if you want to support IE 6.
		chromium.org/developers/how-tos/chrome-frame-getting-started -->
	<!--[if lt IE 7 ]>
		<script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
		<script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
	<![endif]-->

	<?php /*echo $this->element('sql_dump');*/ ?>
</body>
</html>
