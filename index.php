 <?php add_theme_support( $feature ); ?>
<?php get_header(); ?>
<div class="container">

<?php
    if ( have_posts() ) :
        while ( have_posts() ) :
            the_post();
            // the_title();
            the_content();
        endwhile; // end while
    endif; // end if
?>
<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
   <!-- Post stuff -->
</div>
<!-- </div>
        <div>
            <div id="segment1">
                <div class="container">
                    <div id="hero">
                        <h2>Hungry Bytes</h2>
                        <p>|Wordpress Development| Fullstack Development| Mobile Development|</p>
                        <a href="#projectnav" class="btn btn-light">Our work</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="gradientbg"></div>
    </div>
    <div id="servicenav"></div>
    <div id="featrow">
        <div id="services" class="row">
            <div>
                <h3>Services Offered</h3>
            </div>
        </div>
        <div class="row">

            <div id="features" class="col-lg">
                <img <?php echo esc_url( get_template_directory_uri() ) ;?>/img/icon-service-1.png">
                <h3>Responsive Design</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p>
            </div>
            <div id="features" class="col-lg">
                <img src="img/icon-service-2.png">
                <h3>Search Engine Optimization</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p>
            </div>
            <div id="features" class="col-lg">
                <img src="img/icon-service-3.png">
                <h3>App Development</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p>
            </div>
        </div>
    </div>
    <div class="gradientbgreverse"></div>
    <div id="projectnav"></div>
    <div class="content">
        <div class="container">
            <div id="projects">
                <h2>Some Of Our Projects</h2>
                <p>Excepteur sinto occaecat cupidatat non proident, sunt in culpa qui nam sint essent officia mollit.</p>
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="img/corgi.jpg" alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="img/corgi.jpg" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="img/corgi.jpg" alt="Third slide">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
                </div>
            </div>
        </div>
    </div>
    <div class="gradientbg"></div>
    <div id="aboutnav"></div>
    <div id="aboutus">
        <div class="container">
            <div id="theTeam">
                <h2> The team </h2>
                <div class="row">
                    <div id="team" class="col-lg">
                        <div>
                            <img src="<?php echo esc_url( get_template_directory_uri() ) ; ?>/img/corgi.jpg">
                            <h3>Best Boii</h3>
                        </div>
                        <p> UX Engineer</p>
                    </div>
                    <div id="team" class="col-lg">
                        <div>
                            <img src="<?php echo esc_url( get_template_directory_uri() ) ; ?>/img/corgi.jpg">
                            <h3>Best Boii</h3>
                        </div>
                        <p> UX Engineer</p>
                    </div>
                    <div id="team" class="col-lg">
                        <div>
                            <img src="<?php echo esc_url( get_template_directory_uri() ) ; ?>/img/corgi.jpg">
                            <h3>Best Boii</h3>
                        </div>
                        <p> UX Engineer</p>
                    </div>
                    <div id="team" class="col-lg">
                        <div>
                            <img src="<?php echo esc_url( get_template_directory_uri() ) ; ?>/img/corgi.jpg">
                            <h3>Best Boii</h3>
                        </div>
                        <p> UX Engineer</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="gradientbgreverse"></div>
        <div class="content">
            <div class="container fill">
                <div id="about">
                    <h2>About Us</h2>
                    <div class="row">
                        <div class="col">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</p>
                        </div>
                        <div class="col">
                            <p> consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                        </div>
                        <div class="col">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</p>
                        </div>
                        <div class="col">
                            <p> consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="gradientbg"></div>
        <div id="contactnav"></div>
        <div class="container">
            <div id="contact">
                <h2>Lets Work Together!</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p>
            </div>
            <div class="row">
                <form id="contactform">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">First Name</label>
                            <input type="text" class="form-control" id="inputEmail4" placeholder="First Name">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Last Name</label>
                            <input type="text" class="form-control" id="inputPassword4" placeholder="Last Name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputAddress">Email</label>
                        <input type="email" class="form-control" id="inputAddress" placeholder="Email@mail.com">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Project Details</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>


                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div> -->
    <?php get_footer(); ?>
