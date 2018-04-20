    <div id="sub-footer">
        <div class="container">
            <div id="sub-content">
                <div class="row">
                    <!-- <div class="col-sm">
                        <div id="blogContent">
                            <h4>Hungry Bytes</h4>
                            <p> &copy; <?php echo date("Y"); ?> - All Rights Reserved </p>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div id="blogContent1">
                            <h4>About Us.</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p>
                        </div>
                    </div> -->
                    <?php dynamic_sidebar('footer-widgets-1'); ?> 
                    <!-- <div class="col-sm">
                        <div id="blogContent1">
                            <h4>KNOW MORE</h4>
                            <ul id="quickLinks">
                                <li><a href="#">Terms &amp; Conditions</a></li>
                                <li><a href="#">TAQ</a></li>
                                <li><a href="#">Pricing</a></li>
                                <li><a href="#">Services</a></li>
                            </ul>
                        </div>
                    </div> -->
                    <?php dynamic_sidebar('footer-widgets-2'); ?> 
                    <!-- <div class="col-sm">
                        <div id="blogContent1">
                            <h4>Connect</h4>
                            <div id="footerSocials">
                                <ul>
                                    <li><a href="#" class="fa fa-facebook"></a>Facebook</li>
                                    <li><a href="#" class="fa fa-twitter"></a>Twitter</li>
                                    <li><a href="#" class="fa fa-google"></a>Google Plus</li>
                                </ul>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div> -->
                    <?php dynamic_sidebar('footer-widgets-3'); ?> 
                </div>
            </div>
        </div>
    </div>
    <script>
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();

                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'

                });
            });
        })
    </script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <?php wp_footer(); ?> 
</body>

</html>