
<body>

    <!-- bread crumb section start -->

    <section class="bread-crumb-section">
        <img class="shape shape1" src="<?php echo base_url();?>assets/frontend//images/bread/1.png" alt="images_not_found">
        <img class="shape shape2" src="<?php echo base_url();?>assets/frontend//images/bread/2.png" alt="images_not_found">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="title text-center">SEO</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="<?php echo base_url();?>">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><span>Why SEO</span></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>


    <!-- bread crumb section end -->

    <!-- blog details section start -->
    <section class="blog-details-section section-pt-150 section-pb-150">
        <div class="container">
            <div class="row mb-n7">
                <div class="col-lg-8 ps-xl-7 mb-7">
                    <div class="blog-details-thumb">
                        <img src="<?php echo base_url();?>assets/images/blog/<?php echo $result[0]['image'];?>" alt="images_not_found" />
                    </div>
                    <!-- social-share-card start -->
                    <div class="social-share-card">
                        <ul>
                            <li class="social-share-item">
                                <i class="icofont-calendar"></i>
                                <span>18 January, 2021</span>
                            </li>

                            <li class="social-share-item">
                                <i class="icofont-user-alt-7"></i>
                                <span>Roberto Parker</span>
                            </li>

                            <li class="social-share-item">
                                <i class="icofont-heart"></i>
                                <span>8,568</span>
                            </li>

                            <li class="social-share-item">
                                <i class="icofont-speech-comments"></i>
                                <span>2,356</span>
                            </li>
                        </ul>
                        <div class="social-share-wrap">
                            <span class="share mb-2">Share:</span>
                            <ul class="share-social-links share-social-links2 d-flex flex-wrap align-items-center">
                                <li class="social-link-item">
                                    <a href="#" class="social-link"><i class="icofont-facebook"></i></a>
                                </li>
                                <li class="social-link-item">
                                    <a href="#" class="social-link"><i class="icofont-twitter"></i></a>
                                </li>
                                <li class="social-link-item">
                                    <a href="#" class="social-link"><i class="icofont-skype"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- social-share-card end -->

                    <div class="service-details">
                        <div class="service-details-list">
                            <h3 class="title"><?php echo $result[0]['title'];?></h3>
                            <p class="mb-2">
                               <?php echo $result[0]['description'];?>
                            </p>
                            
                        </div>
                    </div>

                 
             
                
                </div>
                <div class="col-lg-4 order-lg-first mb-7">
                    <aside class="sidebar">
                       

                     
                        <div class="sidebar-widget post-card">
                            <h3 class="title">Post Category</h3>
                            <ul class="list-group">
                                <?php if(!empty($services)){ 
                                foreach($services AS $val){
                                    $blog_service=$this->Common_model->CommonRetrivedata('blogs','*',array('blog_status'=>1,"service"=>$val['slug']),1);
                                    
                                ?>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <a href="<?php echo base_url();?>blog-category/<?php echo $val['slug'];?>"><i class="icofont-rounded-double-right"></i><?php echo $val['name'];?></a>
                                    <span>(<?php if(!empty($blog_service)){ echo count($blog_service); }else{ echo "0";}?> )</span>
                                </li>
                                
                                <?php } 
                                
                                } ?>
                                
                                
                                
                                
                            </ul>
                        </div>
                    
                        <div class="about-banner sidebar">
                            <a href="<?php echo base_url();?>" class="logo">
                                <img src="<?php echo base_url();?>assets/frontend//images/about/logo.png" alt="logo_not_found" />
                            </a>
                            <h4 class="title">We Are Different From Others.</h4>
                            <p>Cell: <a href="tel:+8846897546">+88 468 975 46</a></p>
                            <a href="<?php echo base_url();?>contact" class="btn btn-warning">Contact Us <i class="icofont-rounded-double-right"></i></a>
                        </div>


                    </aside>
                </div>
            </div>
        </div>
    </section>

    <!-- blog details section end -->


</body>
