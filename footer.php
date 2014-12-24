                
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
                                    <?php $url = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>
                                    <span>Share</span><div class="clear"></div>
                                    <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?&u=<?php echo $url; ?>"><i class="fa fa-facebook"></i></a>
                                    <a target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo $url; ?>&title=Share&summary=&source="><i class="fa fa-linkedin"></i></a>
                                </div>
                                <div class="right">
                                    <span>Connect</span><div class="clear"></div>
                                    <a target="_blank" href="https://www.facebook.com/greatcircledesign"><i class="fa fa-facebook"></i></a>
                                    <a target="_blank" href="https://www.linkedin.com/profile/view?id=21063478&trk=nav_responsive_tab_profile_pic"><i class="fa fa-linkedin"></i></a>
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
			/*$("#slider1").AnySlider({
                animation: "fade",
				delay : 0,
				speed : 2000,
                interval : 5000,
                bullets:false,
                showControls: false
                    
            });
            *
            $("#slider2").AnySlider({
                animation: "fade",
				delay : 0,
				speed : 2000,
                interval : 8000,
                bullets:false,
                showControls: false
            });
            $("#slider3").AnySlider({
                animation: "fade",
				delay : 0,
				speed : 2000,
                interval : 12000,
                bullets:false,
                showControls: false
            });
            $("#slider4").AnySlider({
                animation: "fade",
				delay : 0,
				speed : 2000,
                interval : 14000,
                bullets:false,
                showControls: false
            });*/
                $(document).ready(function(){
                    var slider1 = $('#slider1').anyslider({
                        animation: "fade",
                        delay : 0,
                        speed : 1500,
                        interval : 0,
                        showBullets :false,
                        showControls: false,
                        pauseOnHover: false,
                    });
                    var anyslider1 = slider1.data('anyslider');

                    var slider2 = $('#slider2').anyslider({
                        animation: "fade",
                        delay : 0,
                        speed : 1500,
                        interval : 0,
                        showBullets :false,
                        showControls: false,
                        pauseOnHover: false,
                    });
                    var anyslider2 = slider2.data('anyslider');

                    var slider3 = $('#slider3').anyslider({
                        animation: "fade",
                        delay : 0,
                        speed : 1500,
                        interval : 0,
                        showBullets :false,
                        showControls: false,
                        pauseOnHover: false,
                    });
                    var anyslider3 = slider3.data('anyslider');

                    var slider4 = $('#slider4').anyslider({
                        animation: "fade",
                        delay : 0,
                        speed : 1500,
                        interval : 0,
                        showBullets :false,
                        showControls: false,
                        pauseOnHover: false,
                    });
                    var anyslider4 = slider4.data('anyslider');
                    setTimeout(function(){
                        anyslider1.next();
                    }, 5000);
                    setTimeout(function(){
                        anyslider3.next();
                    }, 10000);
                    setTimeout(function(){
                        anyslider2.next();
                    }, 15000);
                    setTimeout(function(){
                        anyslider4.next();
                    }, 20000);

                    setTimeout(function(){
                        anyslider2.next();
                    }, 25000);
                    setTimeout(function(){
                        anyslider3.next();
                    }, 30000);
                    setTimeout(function(){
                        anyslider1.next();
                    }, 35000);
                    setTimeout(function(){
                        anyslider4.next();
                    }, 40000);

                    setTimeout(function(){
                        anyslider2.next();
                    }, 45000);
                    setTimeout(function(){
                        anyslider1.next();
                    }, 50000);
                    setTimeout(function(){
                        anyslider4.next();
                    }, 55000);
                    setTimeout(function(){
                        anyslider3.next();
                    }, 60000);

                    setInterval(function(){
                        setTimeout(function(){
                            anyslider1.next();
                        }, 5000);
                        setTimeout(function(){
                            anyslider3.next();
                        }, 10000);
                        setTimeout(function(){
                            anyslider2.next();
                        }, 15000);
                        setTimeout(function(){
                            anyslider4.next();
                        }, 20000);

                        setTimeout(function(){
                            anyslider2.next();
                        }, 25000);
                        setTimeout(function(){
                            anyslider3.next();
                        }, 30000);
                        setTimeout(function(){
                            anyslider1.next();
                        }, 35000);
                        setTimeout(function(){
                            anyslider4.next();
                        }, 40000);

                        setTimeout(function(){
                            anyslider2.next();
                        }, 45000);
                        setTimeout(function(){
                            anyslider1.next();
                        }, 50000);
                        setTimeout(function(){
                            anyslider4.next();
                        }, 55000);
                        setTimeout(function(){
                            anyslider3.next();
                        }, 60000);
                    }, 60000);
                    
                    // $("#slider1").anyslider({
                    //     animation: "fade",
                    //     delay : 0,
                    //     speed : 1500,
                    //     interval : 5000,
                    //     bullets:false,
                    //     showControls: false,
                    //     pauseOnHover: false,
                    //     afterChange: function(){
                    //        $("#slider3").anyslider({
                    //             animation: "fade",
                    //             delay : 0,
                    //             speed : 1500,
                    //             interval : 5000,
                    //             bullets:false,
                    //             showControls: false,
                    //             pauseOnHover: false,
                    //             afterChange: function(){
                    //                 $("#slider2").anyslider({
                    //                     animation: "fade",
                    //                     delay : 0,
                    //                     speed : 1500,
                    //                     interval : 5000,
                    //                     bullets:false,
                    //                     showControls: false,
                    //                     pauseOnHover: false,
                    //                     afterChange: function(){
                    //                         $("#slider4").anyslider({
                    //                             animation: "fade",
                    //                             delay : 0,
                    //                             speed : 1500,
                    //                             interval : 5000,
                    //                             bullets:false,
                    //                             showControls: false,
                    //                             pauseOnHover: false,
                    //                         });
                    //                     }
                    //                 });
                    //             }
                    //         });
                    //     }
                            
                    // });
                });
            

            $("#project_image_slider").anyslider({});
        </script>
        <?php wp_footer(); ?>
    </body>
</html>