<?php
/*
*	Project Page
*/
get_header(); 
global $post;
$terms = get_the_terms($post->ID, 'gcd_groups');
$tid = '';
$name = '';
$slug = '';
$desc = '';
foreach($terms as $term){
    $tid = $term->term_id;
    $name = $term->name;
    $slug = $term->slug;
    $desc = $term->description;
}
?>
<section class="gallery_block">
    <div class="container">
    <?php
    while(have_posts()):
        the_post();
    ?>
        <div class="row">
            <div class="col-sm-8 padding_right15">
                <div id="project_image_slider">
                   
                    <?php 
                        $args = array('post_type'=>'attachment','post_parent' => $post->ID,'posts_per_page'=>-1,'order'=>'asc','orderby'=>'id');
                        $atts = get_posts($args);
                        //echo '<pre>';print_r($atts);
                        if($atts):
                            foreach($atts as $att){
                                $image_id = $att->ID;
                                $image = wp_get_attachment_image_src($image_id, 'project-gallery');
                                $src = $image[0];
                                echo '<div><img src="'.$src.'" alt="gallery"></div>';
                            }
                        else:
                             echo '<img alt="dummy" src="'.get_template_directory_uri().'/images/slider_img.jpg" />';
                        endif;
                     ?>
                </div>
                <!-- <div class="pagination_nav">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/pagination_nav.jpg" />
                </div> -->
            </div>
            <div class="col-sm-4">
                <div class="content">
                    <?php the_title('<h3>','</h3>'); ?>
                    <p><span>Brief: </span><?php echo get_the_content(); ?> </p>
                    <p><span>Rationale: </span><?php echo get_post_meta(get_the_id(), 'r_rational', true); ?></p>
                </div>
                <?php
		    $arrow = get_template_directory_uri(). '/images/nav-arrow.png';
		   if(''!=(get_next_post_link( '%link', ' view next '.$name.' project', TRUE, ' ', 'gcd_groups' ))) {
                        echo get_next_post_link( '%link', '<img src="'.$arrow.'"/>  view next '.$name.' project', TRUE, ' ', 'gcd_groups' );

                    } else {
                    
                        $args = array(
                        	'posts_per_page'   => 1,
                        	'orderby'          => 'id',
                        	'order'            => 'asc',
                        	'post_type'        => 'gcd_projects',
                        	'tax_query' => array(
                            		array(
                                		'taxonomy' => 'gcd_groups',
                                		'field'    => 'id',
                                		'terms'    => $tid,
                            		),
                        	),
                    	);

                    	$posts_array = get_posts( $args );
                    	$posts_array = $posts_array[0];
                    
                    	echo '<a href="'.get_permalink( $posts_array->ID ).'"><img src="'.$arrow.'"/> view next '.$name.' project</a>';
                    }
 ?> 
            </div>
        </div>
    <?php 
    endwhile; 
    wp_reset_query();
    ?>
</section>

<section class="description">
    <div class="container">
        <div class="row">
            <div class="col-sm-8">
                <div class="content descriptions padding_right15">
                    <h3><?php echo $name ?></h3>
                    <?php
                        echo apply_filters('the_content', $desc); 

                        $args = array(
                            'posts_per_page'   => -1,
                            'orderby'          => 'id',
                            'order'            => 'asc',
                            'post_type'        => 'testimonial',
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'gcd_groups',
                                    'field'    => 'id',
                                    'terms'    => $tid,
                                ),
                            ),
                        );
                        $testimonials = get_posts( $args );
                        foreach ( $testimonials as $testimonial ) {
                            # code...
                            echo "<br /><h3>{$testimonial->post_title}.</h3>";
                            echo $testimonial->post_content;
                        }
                    ?>
                    
                </div>
            </div>
            <div class="col-sm-4">
            <?php
            $args = array( 'orderby'=>'id','order'=>'asc', 'exclude'=>$tid);
            $others = get_terms('gcd_groups',$args);
            $dprojects = get_terms( 'gproject-groups' )
            ?>
                <ul>
                <?php
                foreach($others as $other){
                    echo '<li><a href="'.site_url().'/gcd_partnerships/'.$other->slug.'"> view '.$other->name.'</a></li>';
                }
                foreach ($dprojects as $dproject) {
                    echo '<li><a href="'.site_url().'/gproject-groups/'.$dproject->slug.'"> view '.$dproject->name.'</a></li>';
                }
                ?>

                </ul>
            </div>
        </div>
    </div>
</section>
<?php get_footer();?>