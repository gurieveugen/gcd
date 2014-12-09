                
            <footer>
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="text clearfix">
                                We’d love to chat, please call Linda on <span class="white">(08) 9388 9352</span><br />
                                Otherwise, you can drop us an email via<br />
                                <span class="white"><a href="mailto:linda@greatcircledesign.com.au">linda@greatcircledesign.com.au</a></span>
                            </div>
                            <div class="social_sharing">
                                <div class="left">
                                    <span>Share</span><div class="clear"></div>
                                    <a href=""><i class="fa fa-facebook"></i></a>
                                    <a href=""><i class="fa fa-linkedin"></i></a>
                                    <a href=""><i class="fa fa-twitter"></i></a>
                                </div>
                                <div class="right">
                                    <span>Connect</span><div class="clear"></div>
                                    <a href=""><i class="fa fa-facebook"></i></a>
                                    <a href=""><i class="fa fa-linkedin"></i></a>
                                </div>
                            </div>
                            <div class="search">
                                <fieldset>
                                    <!-- <label>Search</label>
                                    <input type="text"> -->
                                    <?php //the_widget( 'WP_Widget_Search', 'Search' ); ?>
                                </fieldset>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="copyright">© Copyright Great Circle Design & Animation</div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="<?php echo get_template_directory_uri(); ?>/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.anyslider.js"></script>
        <script type="text/javascript">
            // $("#slider").AnySlider({
            //     animation : 'fade'
            // });
            //$("#slider1").AnySlider({
            //    interval : 3000,
            //    bullets:false,
            //});
            //$("#slider2").AnySlider({
            //    interval : 4000,
            //    bullets:false
            //});
            //$("#slider3").AnySlider({
            //    interval : 5000,
            //    bullets:false
            //});
            //$("#slider4").AnySlider({
            //    interval : 7000,
            //    bullets:false
            //});
			$("#slider1").AnySlider({
                animation: "fade",
				delay : 300,
				speed : 1000,
                interval : 5000,
                bullets:false,
                showControls: false
                    
            });
            $("#slider2").AnySlider({
                animation: "fade",
				delay : 300,
				speed : 1000,
                interval : 8000,
                bullets:false,
                showControls: false
            });
            $("#slider3").AnySlider({
                animation: "fade",
				delay : 300,
				speed : 1000,
                interval : 11000,
                bullets:false,
                showControls: false
            });
            $("#slider4").AnySlider({
                animation: "fade",
				delay : 300,
				speed : 1000,
                interval : 7000,
                bullets:false,
                showControls: false
            });
            $("#project_image_slider").AnySlider({
               
            });
        </script>
        <?php wp_footer(); ?>
    </body>
</html>
