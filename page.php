<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other 'pages' on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>

<section class="partnership_portfolio">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
            	<?php 
					if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
					  the_post_thumbnail('article');
					} 
				?>
			</div>
        </div>
    </div>
</section>
<section class="description">
    <div class="container">
        <div class="row">
        	<?php

				// Start the Loop.
				while ( have_posts() ) : the_post();
				the_content();

					// // Include the page content template.
					// get_template_part( 'content', 'page' );

				endwhile;
			?>
        </div>
    </div>
</section>

<?php get_footer(); ?>
