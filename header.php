<!DOCTYPE html>
<!--[if lt IE 7 ]> <html class="ie ie6 no-js" lang="en"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie ie7 no-js" lang="en"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie ie8 no-js" lang="en"> <![endif]-->
<!--[if IE 9 ]>    <html class="ie ie9 no-js" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--><html class="no-js" lang="en"><!--<![endif]-->

<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' );?>"/>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>&nbsp;<?php wp_title('&raquo;', true, right); ?></title>
		<link rel="profile" href="http://gmpg.org/xfn/11" />
	    <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" type="text/css" media="screen" />
	    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	    <link href="<?php echo get_template_directory_uri(); ?>/fonts/stylesheet.css" rel="stylesheet">
        <link href="https://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
        <link href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo get_template_directory_uri(); ?>/css/jquery-anyslider.css" rel="stylesheet">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
		<?php //if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
	    <?php wp_head(); ?>
        
        <style>
        #slider {
            -ms-touch-action: none;
            overflow: auto;
            position: relative;
            touch-action: none;
        }
}       </style>
	</head>
	<body>
		<div class="wrapper">


            <header>
                <div class="container">
                    <div class="row content">
                        <div class="col-sm-6">
                            <div class="left">
                                <a href="<?php bloginfo('url'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/great_logo.jpg" /></a>
                                <div class="navbar-header">
                                    <button class="navbar-toggle" data-target=".bs-navbar-collapse" data-toggle="collapse" type="button">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                </div>
                                <!-- <nav id="primary-navigation" class="site-navigation primary-navigation" role="navigation"> -->
								<nav class="navbar-collapse bs-navbar-collapse collapse nav links pull-right" style="height: auto;" role="navigation">
                                	<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
								</nav>
                            </div>
                        </div>
                        <div class="col-sm-6 pull-right">
                            <div class="right">
                                <a href="<?php bloginfo('url'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/great_circle_logo.jpg" /></a>
                            </div>
                        </div>
                            
                    </div>
                    
        		</div>
            </header>