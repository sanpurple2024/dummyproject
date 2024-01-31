
<?php

if($this->session->flashdata('success') != '')
{
$msg = $this->session->flashdata('success');
$heading = 'Success';
$icon = 'success';
}else
if ($this->session->flashdata('error') != '')
	{
	$msg = $this->session->flashdata('error');
	$heading = 'Error';
	$icon = 'error';
	}
  else
   if (isset($error) && $error != ''){
	
    	$msg = $error;
    	$heading = 'Error';
    	$icon = 'error';
	}
  else
   if (isset($success) && $success != ''){
	
    	$msg = $success;
    	$icon = 'success';
    	$heading = 'Success';
	}else{
		$msg = '';
        $icon = '';
        $icon = '';

	}		
?>

<footer class="footer-section position-relative">

<svg class="path-svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 126.82 303.68">
    <defs>
        <radialGradient id="radial-gradient" cx="78.77" cy="6322.87" r="43.8" gradientTransform="translate(0 -3383.39) scale(1 0.58)" gradientUnits="userSpaceOnUse">
            <stop offset="0.16" stop-color="#2647c8" />
            <stop offset="0.17" stop-color="#294ac9" />
            <stop offset="0.29" stop-color="#6179d7" />
            <stop offset="0.42" stop-color="#92a2e3" />
            <stop offset="0.54" stop-color="#b9c4ed" />
            <stop offset="0.66" stop-color="#d8def5" />
            <stop offset="0.78" stop-color="#edf0fb" />
            <stop offset="0.9" stop-color="#fbfbfe" />
            <stop offset="1" stop-color="#fff" />
        </radialGradient>
        <linearGradient id="linear-gradient" x1="45.02" y1="258.73" x2="112.52" y2="258.73" gradientUnits="userSpaceOnUse">
            <stop offset="0" stop-color="#fff" />
            <stop offset="0.27" stop-color="#f4f7fd" />
            <stop offset="0.74" stop-color="#d8e0f8" />
            <stop offset="1" stop-color="#c5d2f4" />
        </linearGradient>
        <linearGradient id="linear-gradient-2" x1="43.77" y1="240.52" x2="113.76" y2="240.52" gradientUnits="userSpaceOnUse">
            <stop offset="0" stop-color="#c5d2f4" />
            <stop offset="0.26" stop-color="#d8e0f8" />
            <stop offset="0.73" stop-color="#f4f7fd" />
            <stop offset="1" stop-color="#fff" />
        </linearGradient>
    </defs>
    <g class="cls-1">
        <path class="cls-2" d="M111.1,297c17.86-10.25,17.86-27,0-37.28s-47-10.25-64.74,0-17.75,27,0,37.28S93.25,307.24,111.1,297Z" transform="translate(0 -1)" />
        <path class="cls-3" d="M102.64,283.06c13.18-7.57,13.18-42.77,0-50.33s-34.69-7.57-47.79,0-13.11,42.76,0,50.33c6.47,3.74,15,7.3,23.57,7.35C87.18,290.45,96,286.89,102.64,283.06Z" transform="translate(0 -1)" />
        <path class="cls-4" d="M113.76,240.86c0-.23,0-.45,0-.68v-5.26h-1.35c-1.59-3.18-4.54-6.18-8.88-8.67-13.67-7.85-36-7.85-49.58,0-4.32,2.49-7.25,5.49-8.83,8.67H43.89v3.9a12.1,12.1,0,0,0,0,3.4v.09h0c.7,4.56,4,9,10.05,12.48,13.6,7.85,35.91,7.85,49.58,0,6-3.47,9.41-7.92,10.11-12.48h.12Z" transform="translate(0 -1)" />
        <path class="cls-5" d="M103.53,249.77c13.68-7.85,13.68-20.69,0-28.54s-36-7.85-49.58,0-13.6,20.69,0,28.54S89.86,257.63,103.53,249.77Z" transform="translate(0 -1)" />
        <path class="cls-6" d="M101.52,248.61c12.56-7.21,12.56-19,0-26.22s-33.06-7.21-45.55,0-12.49,19,0,26.22S89,255.83,101.52,248.61Z" transform="translate(0 -1)" />
        <path class="cls-7" d="M97.39,249.6c10.28-5.91,10.28-15.57,0-21.47s-27.06-5.9-37.28,0-10.23,15.56,0,21.47S87.11,255.5,97.39,249.6Z" transform="translate(0 -1)" />
        <path class="cls-8" d="M80.79,242.55c.16-14.78.32-17.18.48-32,.07-7,.28-11.46-.21-18.41a95.41,95.41,0,0,0-3.73-19.67c-3.91-13.64-7.15-27.08-8.31-41.27a266.63,266.63,0,0,1,.2-41.63C70.4,73.74,72.55,58,74.74,42.19c.22-1.56-2.16-2.23-2.38-.66-3.85,27.69-7.7,55.65-6.22,83.68a180.79,180.79,0,0,0,6.69,40.73c1.91,6.63,4,13.22,5.09,20.05,1.07,7,1,11.67.94,18.75-.17,16.73-.36,21.08-.54,37.81a1.24,1.24,0,0,0,2.47,0Z" transform="translate(0 -1)" />
        <path class="cls-8" d="M68.94,135.59c-5.26-5.31-10.58-10.8-14.13-17.44a28.67,28.67,0,0,1-3.46-11c-.39-4.37.39-8.74.88-13.07A37.33,37.33,0,0,0,47.76,71.3c-4.17-7.87-9.13-15.38-13.95-22.86-.86-1.33-3-.1-2.14,1.25,4.9,7.59,10,15.23,14.16,23.25A35.23,35.23,0,0,1,50,85.53c.43,4.37-.33,8.74-.84,13.07-.89,7.68,0,14.67,3.84,21.47,3.65,6.52,8.93,12,14.15,17.27,1.12,1.14,2.87-.61,1.75-1.75Z" transform="translate(0 -1)" />
        <path class="cls-8" d="M72.51,153.29C74,142.2,86.55,136.48,93.38,129a52.06,52.06,0,0,0,13.21-31.12c.11-1.59-2.36-1.58-2.48,0a49.23,49.23,0,0,1-15.79,32.68c-7.2,6.58-16.9,12.23-18.28,22.78-.21,1.58,2.27,1.56,2.47,0Z" transform="translate(0 -1)" />
        <path class="cls-8" d="M40.5,34.88c-1.13-7-7.14-12.12-12.74-16.53C19.15,11.57,10.33,4.67,0,1A77.52,77.52,0,0,1,8.61,22.43c1.24,5.25,2.11,11,5.84,14.88,5.2,5.42,15,6.31,17.55,13.39l5.43,7.74C36.41,50.53,41.76,42.76,40.5,34.88Z" transform="translate(0 -1)" />
        <path class="cls-8" d="M85.33,14.47c-4,9.36-17.15,12.58-20.31,22.27-3.26,10,6.11,20.72,3.46,30.91L71,68.94c7.28-6.46,11.55-15.8,13.43-25.35S86,24.19,85.33,14.47Z" transform="translate(0 -1)" />
        <path class="cls-8" d="M126.82,52.12C118.59,57.29,112.24,64.9,106,72.38c-1.71,2.05-3.46,4.18-4.19,6.75a19.37,19.37,0,0,0-.38,6.27l1.11,23.2.69,3c3.68-5.89,13.56-6.08,16.07-12.56.91-2.33.56-4.93.33-7.42A75.29,75.29,0,0,1,126.82,52.12Z" transform="translate(0 -1)" />
    </g>

</svg>

<!-- <img class="shape" src="<?php echo base_url();?>assets/frontend/images/footer/1.png" alt="images_notFound" /> -->
<div class="footer-top position-relative">
    <div class="container">
        <!-- Newsletter start -->
        <div class="row">
            <div class="col-12" data-aos="fade-up" data-aos-delay="100">
                <div class="section-title process text-center pb-10">
                   
                    <h3 class="title">Let's Discuss Your Project</h3>

                    <span class="hr-secodary"></span>
                    <p class="text-22">Let us know your project idea and Get free consultation to turn it into an amazing digital product.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12" data-aos="fade-up" data-aos-delay="300">
                <div class="news-letter pb-100">
                     <!--<form class="row gx-4" id="mc-form" action="subscribe_submit.php" method="POST" class="news-letter-form position-relative">-->
                    <form method="POST" action="" id="subscribe_submit" class="news-letter-form position-relative">
                        <input required id="mc-email" class="form-control" name="email" type="email" placeholder="Enter Your Email Address" />
                        <button type="submit" class="btn btn-warning submit-btn">
                            Subscribe Now <i class="icofont-rounded-double-right"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <!-- Newsletter end -->
        <div class="row">
            <div class="col-12" data-aos="fade-up" data-aos-delay="600">
                <div class="footer-card">
                    <div class="footer-row">
                        <div class="footer-col">
                            <div class="footer-widget">
                                <a class="footer-logo" href="index.php">
                                    <img src="<?php echo base_url();?>assets/frontend/images/logo/logo-white.png" alt="logo_not_found" />
                                </a>

                                <ul class="adress">
                                    <li>
                                        <span class="icon"><i class="icofont-ui-call"></i></span>
                                        <a href="tel:+918484004343">+91 84840 04343</a>
                                    </li>
                                    <li>
                                        <span class="icon"
                ><i class="icofont-send-mail"></i
              ></span>
                                        <a href="mailto:info@sanpurple.com">info@sanpurple.com</a>
                                    </li>
                                    <li>
                                        <span class="icon"
                ><i class="icofont-google-map"></i
              ></span>
              515B, 5th floor, Amanora Chambers, Magarpatta, Pune, Maharashtra 411028
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="footer-col">
                            <div class="footer-widget">
                                <h4 class="title">All Services</h4>
                                <ul class="footer-menu">
                                    <li>
                                        <a class="footer-link" href="<?php echo base_url();?>social-media-marketing">
                                            <i class="icofont-rounded-double-right"></i>Social Media Marketing</a>
                                    </li>
                                    <li>
                                        <a class="footer-link" href="<?php echo base_url();?>website-design">
                                            <i class="icofont-rounded-double-right"></i>Website Design </a>
                                    </li>
                                    <li>
                                        <a class="footer-link" href="<?php echo base_url();?>web-development">
                                            <i class="icofont-rounded-double-right"></i>Web Development</a>
                                    </li>
                                    <li>
                                        <a class="footer-link" href="<?php echo base_url();?>mobileapp-development">
                                            <i class="icofont-rounded-double-right"></i>Mobile App Development</a>
                                    </li>
                                    <li>
                                        <a class="footer-link" href="<?php echo base_url();?>Ecommerce-development">
                                            <i class="icofont-rounded-double-right"></i>Ecommerce Development</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="footer-col">
                            <div class="footer-widget">
                                <h4 class="title">Quick Links</h4>
                                <ul class="footer-menu">
                                    <li>
                                        <a class="footer-link" href="<?php echo base_url();?>about">
                                            <i class="icofont-rounded-double-right"></i>About</a>
                                    </li>
                                    <li>
                                        <a class="footer-link" href="<?php echo base_url();?>portfolio">
                                            <i class="icofont-rounded-double-right"></i>Portfolio</a>
                                    </li>
                                    <li>
                                        <a class="footer-link" href="<?php echo base_url();?>blog">
                                            <i class="icofont-rounded-double-right"></i>Blog</a>
                                    </li>
                                    <li>
                                        <a class="footer-link" href="<?php echo base_url();?>career">
                                            <i class="icofont-rounded-double-right"></i>Career</a>
                                    </li>
                                    <li>
                                        <a class="footer-link" href="<?php echo base_url();?>contact">
                                            <i class="icofont-rounded-double-right"></i>Contact</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="footer-col">
                            <div class="footer-widget">
                                <h4 class="title">Follow Us</h4>
                                <p>
                                Follow us on various social platforms to know more about us
                                </p>
                                <ul class="footer-social">
                                    <li class="footer-social-item">
                                        <a class="footer-social-link" href="https://www.facebook.com/sanpurpleinc/"><i class="icofont-facebook"></i></a>
                                    </li>
                                    <li class="footer-social-item">
                                        <a class="footer-social-link" href="https://in.linkedin.com/company/sanpurple-inc#"><i class="icofont-linkedin"></i></a>
                                    </li>
                                    <li class="footer-social-item">
                                        <a class="footer-social-link" href="https://www.instagram.com/sanpurplebranding/"><i class="icofont-instagram"></i></a>
                                    </li>
                                    <li class="footer-social-item">
                                        <a class="footer-social-link" href="https://www.youtube.com/@sanpurpleinc9465"><i class="icofont-youtube"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- coppy right satrt -->
<div class="copy-right-section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <p>
                    Copyright &copy;
                    <span id="currentYear"></span>
                    
                    <a href="<?php echo base_url();?>">Sanpurple Inc</a>
                    All Rights Reserved
                </p>
            </div>
        </div>
    </div>
</div>
<!-- coppy right end -->
</footer>


<!-- Scripts -->
<script src="<?php echo base_url();?>assets/vendors/bower_components/jquery/dist/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/common/js/jquery.toast.js"></script>
<script src="<?php echo base_url();?>assets/frontend/js/vendor/modernizr-3.11.2.min.js"></script>
<script src="<?php echo base_url();?>assets/frontend/js/vendor/jquery-3.6.0.min.js"></script>
<script src="<?php echo base_url();?>assets/frontend/js/vendor/jquery-migrate-3.3.2.min.js"></script>
<script src="<?php echo base_url();?>assets/frontend/js/vendor/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url();?>assets/frontend/js/plugins/swiper-bundle.min.js"></script>
<script src="<?php echo base_url();?>assets/frontend/js/ajax-contact.js"></script>
<script src="<?php echo base_url();?>assets/frontend/js/plugins/ajax-mailchimp.js"></script>
<script src="<?php echo base_url();?>assets/frontend/js/plugins/aos.js"></script>
<script src="<?php echo base_url();?>assets/frontend/js/plugins/scroll-up.js"></script>
<script src="<?php echo base_url();?>assets/frontend/js/plugins/waypoints.js"></script>
<script src="<?php echo base_url();?>assets/frontend/js/plugins/jquery.selectric.min.js"></script>
<script src="<?php echo base_url();?>assets/frontend/js/main.js"></script>
	<script><?php

            if ($msg != '')
            	{ ?>$.toast({heading: '<?php
            	echo $heading; ?>',text: '<?php
            	echo $msg; ?>',showHideTransition: 'fade',position: 'top-right',icon: '<?php
            	echo $icon; ?>'});<?php
            	} ?>
            </script>
 <script>
 $(document).ready(function() {
     
     $('#contactForms').submit(function(e){
              e.preventDefault(); 
            $.ajax({
              url: '<?php echo base_url();?>contact',
              type: 'POST',
              data: new FormData(this),
              contentType:false,  
              processData:false,
            })
            .done(function(data){
                $(".form-message").addClass("success");
                $('#contactForms').trigger("reset");
                $(".form-message").html("Form submitted succesfull");
                // window.location = '<?php echo base_url();?>contact';
          })  
            .fail(function(){
               alert('Try again later'); 
            });
    
           
		   });
		   
	$('#subscribe_submit').submit(function(e){
              e.preventDefault(); 
            $.ajax({
              url: '<?php echo base_url();?>subscribe_submit',
              type: 'POST',
              data: new FormData(this),
              contentType:false,  
              processData:false,
            })
            .done(function(data){
                // $(".form-message").addClass("success");
                $('#subscribe_submit').trigger("reset");
                $(".form-message").html("Form submitted succesfull");
                 window.location = '<?php echo base_url();?>';
          })  
            .fail(function(){
               alert('Try again later'); 
            });
    
           
		   });
		   
	$('#carrierForm').submit(function(e){
              e.preventDefault(); 
            $.ajax({
              url: '<?php echo base_url();?>career',
              type: 'POST',
              data: new FormData(this),
              contentType:false,  
              processData:false,
            })
            .done(function(data){
                $(".form-message").addClass("success");
                $('#carrierForm').trigger("reset");
                $(".form-message").html("Form submitted succesfull");
                // window.location = '<?php echo base_url();?>contact';
          })  
            .fail(function(){
               alert('Try again later'); 
            });
    
           
		   });
     
 });
 
 </script>
