<?php 

get_header();
 ?>

<section class="partnership_portfolio">
    <div class="container">
    <?php
    $q = get_queried_object();
    $name = $q->name;
    $q_id = $q->term_id;

       
        ?>
        <div class="row <?php echo $term->slug; ?>">
            <?php
            $tax_query = array(array('taxonomy'=>'gcd_groups','field'=>'id','terms'=>$q_id));
            $args = array('post_type'=>'gcd_projects','posts_per_page'=>-1,'order'=>'ASC','orderby'=>'post_date','tax_query'=>$tax_query);
            $query = new WP_Query($args);
            if($query->have_posts()):
                while($query->have_posts()):
                    $query->the_post();
                 $c++;
                ?>
                    <div class="col-sm-3">
                        <a href="<?php the_permalink(); ?>" class="round_img">
                            <figure>
                                <?php if (has_post_thumbnail()): 
                                    the_post_thumbnail('home-post');    
                                endif;
                                ?>
                            </figure>
                            <h6><?php echo $name; ?></h6>
                        </a>
                       <a href="<?php the_permalink(); ?>"><span> <?php the_title(); ?></span></a>
                    </div>
                <?php
                endwhile;
                wp_reset_query();
            else:
                echo 'No Projects available for '.$q->name.' partner';
            endif;
            ?>
        </div>
    </div>
</section>

 <?php 

get_footer();
  ?>