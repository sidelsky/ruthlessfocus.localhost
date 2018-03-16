<!doctype html>
<html <?php language_attributes(); ?>>

	<head>
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' |'; } ?> <?php bloginfo('name'); ?></title>

		<meta charset="<?php bloginfo('charset'); ?>" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta name="viewport" content="width=device-width,initial-scale=1.0" />

		<link href="<?php echo get_template_directory_uri(); ?>/assets/build/img/favicon.ico" rel="shortcut icon" />

		<?php wp_head(); ?>
	</head>
	
	<body <?php body_class(); ?>>

	<script type="text/javascript" src="https://analytics.clickdimensions.com/ts.js" > </script>
	<script type="text/javascript">
		var cdAnalytics = new clickdimensions.Analytics('analytics.clickdimensions.com');
		cdAnalytics.setAccountKey('aFRIYxJ1rKkq1sl1TWpwYr');
		cdAnalytics.setDomain('mediacomruthlessfocus.com');
		cdAnalytics.setScore(typeof(cdScore) == "undefined" ? 0 : (cdScore == 0 ? null : cdScore));
		cdAnalytics.trackPage();
	</script>

	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-115570338-1"></script>
	<script>
	// window.dataLayer = window.dataLayer || [];
	// function gtag(){dataLayer.push(arguments);}
	// gtag('js', new Date());
	
	// gtag('config', 'UA-115570338-1');

	    // var _gaq = _gaq || [];
        //   _gaq.push(['_setAccount', 'UA-115570338-1']);
        //   _gaq.push(['_trackPageview']);

        //   (function() {
        //     var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        //     ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        //     var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		//   })();
		  

		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		ga('create', 'UA-115570338-1', 'auto');
		ga('send', 'pageview');
	</script>


		<?php
			//Include SVG Sprite
			include('assets/build/svg-sprite.svg');
		?>

		<div class="page-wrap">