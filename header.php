<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	
	<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/im/favicon.ico">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	
	<?/*<meta name="viewport" content="width=460px">*/?>
	
	<?/*<meta name="viewport" content="width=device-width, initial-scale=1">*/?>
	
	<meta name="viewport" content="width=460px">

		<meta name="apple-mobile-web-app-capable" content="YES" />

	<?php wp_head(); ?>

	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,700italic,600italic,400italic,300italic&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
	
	<script src="<?php bloginfo('template_url'); ?>/js/code.js"></script>
	<script src="<?php bloginfo('template_url'); ?>/js/jquery.formstyler.min.js"></script>
	
	<link href="<?php bloginfo('template_url'); ?>/im/css.css" type="text/css" rel="stylesheet">
	<link href="<?php bloginfo('template_url'); ?>/m_style.css" type="text/css" rel="stylesheet">
	<link href="<?php bloginfo('template_url'); ?>/im/jquery.formstyler.css" type="text/css" rel="stylesheet">
	
	<link href="/form/form.css" type="text/css" rel="stylesheet">
	<script src="/form/jquery.form.js" type="text/javascript"></script>
		<script>
		(function($) {
			$(function() {
				$('input, select').styler({
					selectPlaceholder: ''
				});
			});
		})(jQuery);
	</script>
	
	
	<script type="text/javascript">
		
		jQuery(document).ready(function(){
			jQuery("#accordion .item-has-children>a").removeAttr('href');
			jQuery("#accordion .item-has-children .children").addClass('hide');
			jQuery("#accordion .current-cat .children").removeClass('hide');
			jQuery("#accordion .current-cat-parent .children").removeClass('hide');
			jQuery("#accordion .item-has-children>a" ).click(function() {
				
				if ( jQuery( this ).next().hasClass( "hide" ) ) {
					 jQuery( this ).next().removeClass('hide');
				}else{
					 jQuery( this ).next().addClass('hide');
				}
			});
			
			jQuery("#accordion .menu-item-has-children>a").removeAttr('href');
			jQuery("#accordion .menu-item-has-children .sub-menu").addClass('hide');
			jQuery("#accordion .current-menu-item .sub-menu").removeClass('hide');
			jQuery("#accordion .current-menu-parent .sub-menu").removeClass('hide');
			jQuery("#accordion .menu-item-has-children>a" ).click(function() {
				
				if ( jQuery( this ).next().hasClass( "hide" ) ) {
					 jQuery( this ).next().removeClass('hide');
				}else{
					 jQuery( this ).next().addClass('hide');
				}
			});
		});

	</script>
	<?php if( is_page( 'result' )) {?>
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/bootstrap.css">
	<?php }?>
	
</head>

<body <?php body_class(); ?>>
	<!--wrapper-->
	<div id="wrapper">
		<!--header-->
		<div id="header">
			<div class="in">
				<div class="logo">
					<a href="/"><img src="/wp-content/themes/medportal/im/logo.png" alt="#"></a>
				</div>
				<div class="mobile-icon-menu"><span>МЕНЮ</span></div>
				<?php dynamic_sidebar( 'header-banner' ); ?>
			</div>
			<div class="tm_wr">
				<div class="in">
					<div class="h-menu">
						<span class="mp">Меню портала</span>
						<?php	
							$nav_args = array(
								'container'       => false, 
								'menu_class'      => 'menu', 
								'container_id'	  => 'topnav',
								'depth'           => 4,
								'before'          => '',
								'after'           => '',
								'link_before'     => '<span>',
								'link_after'      => '</span>',
								'theme_location'  => 'main-menu'
								);
							wp_nav_menu($nav_args);
						?>
					</div>
					<div class="search_form">
						<?php get_search_form(); ?>
					</div>
				</div>
			</div>
			<?php// require_once 'Mobile_Detect.php'; ?>
			<?php// $detect = new Mobile_Detect; ?>
			<?php// if ( $detect->isMobile() ) { ?>
			<div class="dt-mobile-header">
				<div class="close-icon"><span></span></div>
				<div class="mobile-menu">
					<?php dynamic_sidebar( 'mobile-menu' ); ?>
				</div>
			</div>
			<?php //}?>
			
		</div><!--/header-->