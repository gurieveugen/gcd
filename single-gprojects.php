<?php
get_header(); 
$object_id = get_queried_object_id();
global $post;
$terms = get_the_terms($post->ID, 'gproject-groups');

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
                    <h3><?php the_title(); ?></h3>
                    <?php
			         $content = get_the_content();
        			 if($content){
        				echo '<p>'.$content.'</p>';
        			 }
        		    ?>
                    <ul class="generalPrjs">
                    <?php
                        //$tax_query = array(array('taxonomy'=>'gcd_groups','field'=>'id','terms'=>$id));
                        $gproject_args = array(
                            'post_type'=>'gprojects',
                            'posts_per_page'=>-1,
                            'orderby' => 'id',
                            'order'=>'asc',
                            'orderby'=>'post_date'
                        );
                        $results = new WP_Query($gproject_args);
                        while( $results->have_posts() ):
                            $results->the_post();
                        global $post;
                        $id = $post->ID;
                        ?>
                            <li><a <?php echo ($object_id == $id ) ? 'class="active"': ''; ?> href="<?php the_permalink(); ?>"><?php echo 'view '. get_the_title(); ?></a></li>
                        <?php
                        endwhile;
                        wp_reset_query();
                    ?>
                    </ul>
                </div>
                <i class="fa fa-arrow-right white"></i> &nbsp
                
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
                <div class="content padding_right15">
                    <h3><?php echo $name ?></h3>
                    <?php echo apply_filters('the_content', $desc); ?>
                    <!-- <span>What our clients Louise & Leit had to say...</span><br />
                    <div class="italic">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</div> -->
                </div>
            </div>
            <div class="col-sm-4">
            <?php
            $args = array(
                'exclude' => $tid,
                'order'   => 'DESC',
            );
            $others = get_terms('gcd_groups',$args);
            ?>
                <ul>
                <?php
                foreach($others as $other){
                    echo '<li><a href="'.site_url().'/gcd_partnerships/'.$other->slug.'"> view '.$other->name.'</a></li>';
                }
                ?>
                </ul>
            </div>
        </div>
    </div>
</section>
<?php get_footer();?>