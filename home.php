<?php 
/**
*   Template Name: Home
*/
get_header(); 
?>

    <section class="banner_slider_block">
        <div class="container">
            <div class="row">
                
                <?php
                $taxonomy = 'gcd_groups';
                $terms = get_terms($taxonomy, array('orderby'=>'id','order'=>'asc'));$count=1;

                foreach($terms as $term){
                    //print_r($term);
                    $link = esc_attr(get_term_link($term, $taxonomy));
                    $id = $term->term_id;
                    $name = $term->name;
                    $desc = $term->description;
                    $featured = get_option('taxonomy_'.$id);
                    $isFeatured = $featured['featured'];
                    $subtitle = $featured['subtitle'];
                    if($isFeatured == '1'):
                    ?>
                        
                            <!-- <div id="term-<?php echo $id; ?>" class="col-sm-3"> -->
                            <div class="col-sm-3">
                                
                                        <a href="<?php echo $link; ?>" class="round_img">
                                       
                                        <div class="slider" style="border:none;" id="slider<?php echo $count; ?>">
                                        <?php
                                            $tax_query = array(array('taxonomy'=>'gcd_groups','field'=>'id','terms'=>$id));
                                            $args = array('post_type'=>'gcd_projects','posts_per_page'=>-1, 'orderby'=>'id', 'order'=>'ASC', 'orderby'=>'post_date', 'tax_query'=>$tax_query);
                                            $query = new WP_Query($args);

                                            while($query->have_posts()):
                                                $query->the_post();
                                            
                                        ?>
                                        
                                            <div>
												<div class="round-thumb">
													<figure>
														<?php
															if(has_post_thumbnail()) {
																the_post_thumbnail('home-post');
															} else {
																echo '<img src="'.get_template_directory_uri().'/images/gray_round.jpg">';
															}
														?>
													</figure>
												</div>
                                            </div>
                                        
                                        <?php
                                            endwhile;
                                            wp_reset_query();
                                        ?>
                                        </div>    
                                    
                                        <h6><?php echo $name; ?></h6>
                                    </a>
                                    <span><?php echo  $subtitle; ?> </span>
                                
                            <!-- </div> -->
                        </div>
                    <?php
                    $count++;endif;
                }
                ?>
            </div>
        </div>
    </section>
    
    </script>    
    <section class="text_block">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <?php 
                    $id=108; 
                    $post = get_post($id); 
                    $content = apply_filters('the_content', $post->post_content); 
                    echo $content;  
                    ?>
                </div>
                <div class="col-sm-4">
                    <?php 
                    $id=111; 
                    $post = get_post($id); 
                    $content = apply_filters('the_content', $post->post_content); 
                    echo $content;  
                    ?>
                </div>
                <div class="col-sm-4">
                    <?php 
                    $id=336; 
                    $post = get_post($id); 
                    $content = apply_filters('the_content', $post->post_content); 
                    echo $content;  
                    ?>
                </div>
            </div>
        </div>
    </section>
<?php get_footer();?>