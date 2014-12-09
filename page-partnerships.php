<?php
/*
 * Template Name : Partnerships Page	
*/
get_header();?>
<section class="partnership_portfolio">
    <div class="container solid-border-bottom">
    <?php
    $terms = get_terms('gcd_groups', array('orderby'=>'id','order'=>'asc'));
    
    foreach($terms as $term){
        $id = $term->term_id;
        $name = $term->name;
       
        ?>
        <div class="row <?php echo $term->slug; ?>">
            <?php
            $tax_query = array(array('taxonomy'=>'gcd_groups','field'=>'id','terms'=>$id));
            $args = array('post_type'=>'gcd_projects','posts_per_page'=>-1, 'orderby' => 'id','order'=>'asc','orderby'=>'post_date','tax_query'=>$tax_query);
            $query = new WP_Query($args);
            if($query->have_posts()):
                while($query->have_posts()):
                    $query->the_post();
                
                ?>
                    <div class="col-sm-3">
                        <a href="<?php the_permalink(); ?>" class="round_img">
                            <figure>
                                <?php
                                    if(has_post_thumbnail()) {
                                        the_post_thumbnail('home-post');
                                    } else {
                                        echo '<img src="'.get_template_directory_uri().'/images/gray_round.jpg">';
                                    }
                                ?>
                            </figure>
                            <h6><?php echo $name; ?></h6>
                        </a>
                        <a href="<?php the_permalink(); ?>"><span><?php the_title(); ?></span></a>
                    </div>
                <?php
                endwhile;
                wp_reset_query();
            else:
                echo 'No Projects available for '.$name.' partner';
            endif;
            ?>
        </div>
        <?php
    }
    ?>
    </div>
</section>

<!-- list of General Projects  -->
<section class="partnership_portfolio">
    <div class="container no-border-bottom">
    <?php
    $terms = get_terms('gproject-groups', array('orderby'=>'id','order'=>'asc'));
    
    foreach($terms as $term){
        $id = $term->term_id;
        $name = $term->name;
       
        ?>
        <div class="row <?php echo $term->slug; ?> ">
            <?php
            $tax_query = array(array('taxonomy'=>'gproject-groups','field'=>'id','terms'=>$id));
            $args = array('post_type'=>'gprojects','posts_per_page'=>-1, 'orderby' => 'id','order'=>'asc','orderby'=>'post_date','tax_query'=>$tax_query);
            $query = new WP_Query($args);
            
            if($query->have_posts()):
                while($query->have_posts()):
                    $query->the_post();
                
                ?>
                    <div class="col-sm-3">
                        <a href="<?php the_permalink(); ?>" class="round_img">
                            <figure>
                                <?php
                                    if(has_post_thumbnail()) {
                                        the_post_thumbnail('home-post');
                                    } else {
                                        echo '<img src="'.get_template_directory_uri().'/images/gray_round.jpg">';
                                    }
                                ?>
                            </figure>
                            <h6><?php the_title(); ?></h6>
                        </a>
                        <a href="<?php the_permalink(); ?>"><span><?php echo get_post_meta($post->ID, 'subtitlee', true); ?></span></a>
                    </div>
                <?php
                endwhile;
                wp_reset_query();
            else:
                echo 'No Projects available for '.$name.' partner';
            endif;
            ?>
        </div>
        <?php
    }
    ?>
    </div>
</section>
<?php get_footer();?>