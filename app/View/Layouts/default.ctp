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

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
?>
<!doctype html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7 ie6" lang="en"><![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8 ie7" lang="en"><![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9 ie8" lang="en"><![endif]-->
<!--[if IE 9]><html class="no-js ie9" lang="en"><![endif]-->
<!--[if gt IE 9]><!--><html class="no-js" lang="en"><!--<![endif]-->
<head>
	<meta charset="utf-8">

	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>

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

	<link href="http://fonts.googleapis.com/css?family=Gudea" rel="stylesheet">

	<!-- All JavaScript at the bottom, except this Modernizr build.
		 Modernizr enables HTML5 elements & feature detects for optimal performance.
		 Create your own custom Modernizr build: www.modernizr.com/download/ -->
	<script src="js/libs/modernizr-2.5.2.min.js"></script>
</head>
<?php if(isset($resultURL)){
		echo "<body class='full-background' style='background-image: url({$resultURL});'>";
	} else {
		echo "<body>";
	};
?>
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

	<div id="homeContainer" class="container slim" role="main">
		<header>
			<a href="./" id="logo">
				<?php echo $this->Html->image('logo.png'); ?>
			</a>
		</header>

		<?php echo $this->fetch('content'); ?>

		<footer id="global-footer">
			<p>
				Copyright &copy; 2012 The 1st Movement LLC. All Rights Reserved.
				<br>
				Coded with care by Matt Webb, Randy Winch and Jake Gibbons :)
				<br>
				Designed by: Noah Dempewolf
			</p>
		</footer>
	</div>

	<!--
		JavaScript at the bottom for fast page loading
	-->
	<!-- Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if offline -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="js/libs/jquery-1.7.1.min.js"><\/script>')</script>

	<script>
		var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview'],['_trackPageLoadTime']];
		(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
		g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
		s.parentNode.insertBefore(g,s)}(document,'script'));
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
