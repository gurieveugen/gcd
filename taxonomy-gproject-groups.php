<?php 

get_header();
 ?>

<section class="partnership_portfolio">
    <div class="container">
    <?php
    $q = get_queried_object();
  	$q_id = $q->term_id;
       
        ?>
        <div class="row <?php echo $term->slug; ?>">
            <?php
            $tax_query = array(array('taxonomy'=>'gproject-groups','field'=>'id','terms'=>$q_id));
            $args = array('post_type'=>'gprojects','posts_per_page'=>-1,'order'=>'ASC','orderby'=>'post_date','tax_query'=>$tax_query);
            $query = new WP_Query($args);
            if($query->have_posts()):
                while($query->have_posts()):
                    $query->the_post();
                 $c++;
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
                echo 'No Design Projects available for '.$q->name.' partner';
            endif;
            ?>
        </div>
    </div>
</section>

 <?php 

get_footer();
  ?>