<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sanpurple - Digital Marketing Services</title>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url();?>assets/frontend/images/logo/logo.png" />

    <link rel="stylesheet" href="<?php echo base_url();?>assets/frontend/css/vendor/icofont.min.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/frontend/css/plugins/animate.min.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/frontend/css/plugins/swiper-bundle.min.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/frontend/css/plugins/aos.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/frontend/css/plugins/selectric.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/frontend/css/style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    	<link href="<?php echo base_url();?>assets/vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.css" rel="stylesheet" type="text/css">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    
</head>

<body>
    <!-- Modal -->
    <div class="modal offcanvas-modal fade" id="offcanvas-modal">
        <div class="modal-dialog offcanvas-dialog">
            <div class="modal-content">
                <div class="modal-header offcanvas-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- offcanvas-menu start -->
                <nav id="offcanvas-menu" class="offcanvas-menu">
                    <ul>
                        <li>
                            <a href="<?php echo base_url();?>">Home</a>
                            <!-- add your sub menu here -->
                        </li>
                        <li>
                            <a href="about.php">about us</a>

                        </li>
                        
                        <li>
                            <a href="javascript:void(0)">Services</a>
                            <ul>
                                <li>
                                    <a href="<?php echo base_url();?>social-media-marketing">Social Media Marketing</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url();?>content-marketing">Content Marketing</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url();?>seo">SEO </a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url();?>influancer-marketing">Influencer Marketing</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url();?>lead-generation">Lead Generation </a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url();?>website-design">UI/UX Design</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url();?>web-development">Web Development</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url();?>mobileapp-development">Mobile App Development </a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url();?>software-development">Software Development </a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url();?>visual-branding.php">Visual Branding</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url();?>ecommerce-development">Ecommerce Development </a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url();?>videography">Videography </a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url();?>matrimony-services">Matrimony Services </a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url();?>recruitment-services">Recruitment Services</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url();?>franchise-consultation">Franchise Consultation</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url();?>telesales">Telesales</a>
                                </li>

                                    

                                
                            </ul>
                        </li>
                        <li>
                            <a href="<?php echo base_url();?>portfolio">Portfolio</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url();?>">Blog</a>
                        </li>
                        <li class="main-menu-item">
                            <a class="main-menu-link" href="career.php">Career</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url();?>contact">Contact</a>
                        </li>
                        
                    </ul>

                    <div class="offcanvas-social">
                        <ul>
                            <li>
                                <a href="https://www.facebook.com/sanpurpleinc/"><i class="icofont-facebook"></i></a>
                            </li>
                            <li>
                                <a href="https://in.linkedin.com/company/sanpurple-inc#"><i class="icofont-linkedin"></i></a>
                            </li>
                            <li>
                                <a href="https://www.instagram.com/sanpurplebranding/"><i class="icofont-instagram"></i></a>
                            </li>
                            <li>
                                <a href="https://www.youtube.com/@sanpurpleinc9465"><i class="icofont-youtube"></i></a>
                            </li>
                            
                        </ul>
                    </div>
                </nav>
                <!-- offcanvas-menu end -->

               
            </div>
        </div>
    </div>

    <header class="header">

        <div id="active-sticky" class="header-bottom">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-2 col-md-3 col-6">
                        <a href="<?php echo base_url();?>" class="brand-logo">
                            <img src="<?php echo base_url();?>assets/frontend/images/logo/logo.png" alt="brand logo" />
                        </a>
                    </div>
                    <div class="col-lg-8 col-md-9 col-6">
                        <a class="btn btn-warning btn-hover-warning d-none d-sm-inline-block d-lg-none" href="tel:+918484004343">Enquire Now! <i class="icofont-arrow-right"></i>
                        </a>

                        <button type="button" class="btn btn-warning offcanvas-toggler" data-bs-toggle="modal" data-bs-target="#offcanvas-modal">
                            <span class="line"></span>
                            <span class="line"></span>
                            <span class="line"></span>
                        </button>
                        <nav class="d-none d-lg-block">
                            <ul class="main-menu text-end">
                                <li class="main-menu-item">
                                    <a class="main-menu-link" href="<?php echo base_url();?>">Home</a>
                                </li>
                                <li class="main-menu-item">
                                    <a class="main-menu-link" href="<?php echo base_url();?>about">About Us</a>
                                </li>



                                <li class="main-menu-item">
                                    <a class="main-menu-link" >Services</a>
                                    <div class="submenu-fullcontain">
                                         
                                        <div class="sub-menu">  
                                            <div class="row">
                                                <div class="col-md-4 black-bg">
                                                    <div class="sub-main-inner">
                                                        <span class="sub-main-menu-label">Featured</span>
                                                        <div class="fuatured-with-title">
                                                            <div class="fuatured-img">
                                                                <div class="imggs">
                                                                    <img src="<?php echo base_url();?>assets/frontend/images/blog-grid/1.png" alt="saas product development" loading="lazy">
                                                                </div>
                                                            </div>
                                                            <div class="fuatured-title">
                                                                <h3 class="text-white menu-featured-heading">
                                                                <a href="<?php echo base_url();?>">Guide To Improving Your Google Rankings.</a>
                                                                </h3>
                                                            </div>
                                                        </div>
                                                        
                                                        <p class="mb-5">
                                                               Optimize for users, not robots, with relevant keywords and engaging content, and watch your Google rankings soar.
                                                        </p>
                                                            <a href="<?php echo base_url();?>" class="text-white industry-redirect">Learn More 
                                                                <span class="pl-1 arrow-icon-submenu"><i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                                                                </span>
                                                            </a>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <h4 class="mega-title poppins-28">Description</h4>
                                                    <p class=" menu-description">Unleash the power of digital with Sanpurple Inc. Our data-driven marketing solutions and stunning website designs help businesses conquer the online world. Contact us today and watch your brand soar!
                                                    </p>
                                                    <div class="submenu-explore-btn mt-5">
                                                            <a href="<?php echo base_url();?>" class="explore-btn industry-redirect">Explore More
                                                                <span class="pl-1 arrow-icon-submenu"><i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                                                                </span>
                                                            </a>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    
                                                    <ul class="icon-des menu-sub-links">
                                                        
                                                        <li>
                                                            <a href="<?php echo base_url();?>social-media-marketing">Marketing
                                                            <span class="pl-1 arrow-icon-submenu"><i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                                                                </span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="<?php echo base_url();?>content-marketing">Development
                                                                <span class="pl-1 arrow-icon-submenu"><i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                                                                </span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="<?php echo base_url();?>seo">SEO 
                                                            <span class="pl-1 arrow-icon-submenu"><i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                                                                </span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="<?php echo base_url();?>influancer-marketing">Designing
                                                            <span class="pl-1 arrow-icon-submenu"><i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                                                                </span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="<?php echo base_url();?>lead-generation">Data Science
                                                            <span class="pl-1 arrow-icon-submenu"><i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                                                                </span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="<?php echo base_url();?>website-design">Branding
                                                            <span class="pl-1 arrow-icon-submenu"><i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                                                                </span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="<?php echo base_url();?>web-development">Content Writing
                                                            <span class="pl-1 arrow-icon-submenu"><i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                                                                </span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="<?php echo base_url();?>requirement">Recruitment
                                                            <span class="pl-1 arrow-icon-submenu"><i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                                                                </span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                    
                                            </div>  
                                        <div>    
                                    </div>                          
                                </li>

                                <li class="main-menu-item">
                                    <a class="main-menu-link" href="<?php echo base_url();?>portfolio">Portfolio</a>
                                </li>
                                <li class="main-menu-item">
                                    <a class="main-menu-link" href="<?php echo base_url();?>blog">Blog</a>
                                </li>
                                <li class="main-menu-item">
                                    <a class="main-menu-link" href="<?php echo base_url();?>career">Career</a>
                                </li>
                                <li class="main-menu-item">
                                    <a class="main-menu-link" href="<?php echo base_url();?>contact">Contact</a>
                                </li>
                                

                            </ul>
                        </nav>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-4">
                        <li class="main-menu-item equirebtn header-grt-btn">
                            <a class="btn btn-warning btn-hover-warning btn-lg " href="<?php echo base_url();?>">Enquire Now!
                            </a>
                        </li>
                    </div>
                </div>
            </div>
        </div>

    </header>

</body>
</html>
