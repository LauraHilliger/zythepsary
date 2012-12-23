<!DOCTYPE html>
<html class="no-js" lang="en" dir="ltr">
<?php $options = get_option('accentbox'); ?>
<head>
	<meta charset="UTF-8">
	
	<title><?php wp_title(''); ?></title>
	
	<?php if ($options['mts_favicon'] != '') { ?>
	<link rel="icon" href="<?php echo $options['mts_favicon']; ?>" type="image/x-icon" />
	<?php } ?>
	
	<!--iOS/android/handheld specific -->	
	<link rel="apple-touch-icon" href="apple-touch-icon.png">			
	<meta name="viewport" content="width=device-width, initial-scale=1.0">						
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">

	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />

	<link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
	
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

	<?php wp_enqueue_script("jquery"); ?>
	<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	
	<?php wp_head(); ?>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/modernizr.min.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/customscript.js" type="text/javascript"></script>
	
	<style type="text/css">
		<?php if ($options['mts_logo'] != '') { ?>
			#header h1, #header h2 {
			text-indent: -999em;
			min-width:200px; margin-top: 0;
			}
			#header h1 a, #header h2 a{
			background: url(<?php echo $options['mts_logo']; ?>) no-repeat;
			min-width: 200px;
			display: block;
			min-height: 80px;
			line-height: 28px;
			}
		<?php } ?>
		<?php if($options['mts_color_scheme'] != '') { ?>
			.more a, .bubble a:hover, #commentform input#submit {
				background-color: <?php echo $options['mts_color_scheme']; ?>;
			}
			a, .title a:hover, #navigation ul ul li a:hover, #navigation > ul > li > a:hover {
			color:<?php echo $options['mts_color_scheme']; ?>;
			}
		<?php } ?>
		<?php if($options['mts_layout'] == 'sclayout') { ?>
			.article {
				float:right;
			}
			#content_box {
				padding-right: 0;
				padding-left: 40px;
			}
			.sidebar.c-4-12 { float:left; }
			@media screen and (max-width:700px){
			#content_box {
			padding-left: 0;
			}
			}
		<?php } ?>
		<?php echo $options['mts_custom_css']; ?>
	</style>

	<?php echo $options['mts_header_code']; ?>
</head>

	<body id ="blog" <?php body_class('main'); ?>>
		<header class="main-header">
		<div class="container">
				<div id="header">
				
					<?php if( is_front_page() || is_home() || is_404() ) { ?>
							<h1 id="logo">
								<a href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ); ?></a>
							</h1><!-- END #logo -->
					<?php } else { ?>
							<h2 id="logo">
								<a href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ); ?></a>
							</h2><!-- END #logo -->
					<?php } ?>
					<?php if ( ! dynamic_sidebar( 'Header' ) ) : ?>
					<?php endif ?>
				</div><!--#header-->
		</div><!--.container-->
		</header>
		<div class="container">
		<div class="secondary-navigation">
				<nav id="navigation" >
					<?php if ( has_nav_menu( 'primary-menu' ) ) { ?>
						<?php wp_nav_menu( array( 'theme_location' => 'primary-menu', 'menu_class' => 'menu', 'container' => '' ) ); ?>
					<?php } else { ?>
						<ul class="menu">
							<?php wp_list_categories('title_li='); ?>
						</ul>
					<?php } ?>
				</nav>
			</div>
		</div>