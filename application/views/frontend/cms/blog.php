

    <section class="bread-crumb-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="title text-center">Blogs</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="<?php echo base_url();?>">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><span>Blogs</span></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>


    <!-- bread crumb section end -->

    <!-- blog section start -->
    <section class="section-pt-150 section-pb-150">
        <div class="container">
            <div class="row mb-n7">
                
                <?php if(!empty($result)){
                
                foreach($result AS $val){   ?>
                
                
                <div class="col-12 col-md-6 col-lg-4 mb-7">
                    <div class="blog-grid-card">
                        <a href="why-seo-is-important.php" class="blog-grid-thumb">
                            <img src="<?php echo base_url();?>assets/images/blog/<?php echo $val['image'];?>" alt="images_not_found">
                        </a>
                        <div class="blog-grid-content">
                            <ul>
                                <li class="date">
                                    <i class="icofont-ui-calendar"></i><?php echo date("F d, Y", strtotime($val['blog_date_time'])) ?>
                                </li>
                                <li>
                                    <!--<span class="comments me-3">-->
                                    <!--  <a href="javascript:void(0)">2 Comments</a>-->
                                    <!--</span>-->
                    <!--                <span class="link-share">-->
                    <!--  <a href="javascript:void(0)">Share</a>-->
                    <!--</span>-->
                                </li>
                            </ul>

                            <h5 class="title mb-4">
                                <a href="blog-detail.html"><?php echo $val['title'];?></a>
                            </h5>

                            <p class="mb-5">
                               <?php  
                               $fullDescription=$val['description'];
                               $limitedDescription = substr($fullDescription, 0, 200);
                                    if (strlen($fullDescription) > 200) {
                                        $limitedDescription .= '...';
                                    }
                                    
                                    // Display the limited description
                                    echo $limitedDescription;
                               
                               ;?>
                            </p>
                            
                            <?php
                             $cleanString = preg_replace('/[^A-Za-z0-9\-]/', '-', $val['title']);
                             if (strlen($fullDescription) > 200) { ?>

                               <a href="<?php echo base_url();?>blog-details/<?php echo $val['slug'];?>" class="btn btn-warning">read more</a>
                            
                            <?php } ?>
                        </div>
                    </div>
                </div>
                
                <?php
                    
                }
                
                } ?>
                
                <!--<div class="col-12 col-md-6 col-lg-4 mb-7">-->
                <!--    <div class="blog-grid-card">-->
                <!--        <a href="blog-details.html" class="blog-grid-thumb">-->
                <!--            <img src="<?php echo base_url();?>assets/frontend/images/blog-grid/2.png" alt="images_not_found">-->
                <!--        </a>-->
                <!--        <div class="blog-grid-content">-->
                <!--            <ul>-->
                <!--                <li class="date">-->
                <!--                    <i class="icofont-ui-calendar"></i>May 21, 2021-->
                <!--                </li>-->
                <!--                <li>-->
                <!--                    <span class="comments me-3">-->
                <!--      <a href="javascript:void(0)">2 Comments</a>-->
                <!--    </span>-->
                <!--                    <span class="link-share">-->
                <!--      <a href="javascript:void(0)">Share</a>-->
                <!--    </span>-->
                <!--                </li>-->
                <!--            </ul>-->

                <!--            <h5 class="title mb-4">-->
                <!--                <a href="blog-detail.html">-->
                <!--                    What's the Current Job Market for Seo Professionals-->
                <!--                    Like?-->
                <!--                </a>-->
                <!--            </h5>-->

                <!--            <p class="mb-5">-->
                <!--                Lorem ipsum dolor sit amet, consectet adipi elit, sed do-->
                <!--                eius tempor incididunt ut labore gthydolore magna aliqua.-->
                <!--            </p>-->

                <!--            <a href="blog-details.html" class="btn btn-warning">read more-->
                <!--            </a>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--</div>-->
                <!--<div class="col-12 col-md-6 col-lg-4 mb-7">-->
                <!--    <div class="blog-grid-card">-->
                <!--        <a href="blog-details.html" class="blog-grid-thumb">-->
                <!--            <img src="<?php echo base_url();?>assets/frontend/images/blog-grid/3.png" alt="images_not_found">-->
                <!--        </a>-->
                <!--        <div class="blog-grid-content">-->
                <!--            <ul>-->
                <!--                <li class="date">-->
                <!--                    <i class="icofont-ui-calendar"></i>May 21, 2021-->
                <!--                </li>-->
                <!--                <li>-->
                <!--                    <span class="comments me-3">-->
                <!--      <a href="javascript:void(0)">2 Comments</a>-->
                <!--    </span>-->
                <!--                    <span class="link-share">-->
                <!--      <a href="javascript:void(0)">Share</a>-->
                <!--    </span>-->
                <!--                </li>-->
                <!--            </ul>-->

                <!--            <h5 class="title mb-4">-->
                <!--                <a href="blog-detail.html">Addicted to Seo? Us Too. 6 Reasons We Just Can't-->
                <!--                    Stop.</a>-->
                <!--            </h5>-->

                <!--            <p class="mb-5">-->
                <!--                Lorem ipsum dolor sit amet, consectet adipi elit, sed do-->
                <!--                eius tempor incididunt ut labore gthydolore magna aliqua.-->
                <!--            </p>-->

                <!--            <a href="blog-details.html" class="btn btn-warning">read more</a>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--</div>-->
                <!--<div class="col-12 col-md-6 col-lg-4 mb-7">-->
                <!--    <div class="blog-grid-card">-->
                <!--        <a href="blog-details.html" class="blog-grid-thumb">-->
                <!--            <img src="<?php echo base_url();?>assets/frontend/images/blog-grid/4.png" alt="images_not_found">-->
                <!--        </a>-->
                <!--        <div class="blog-grid-content">-->
                <!--            <ul>-->
                <!--                <li class="date">-->
                <!--                    <i class="icofont-ui-calendar"></i>May 21, 2021-->
                <!--                </li>-->
                <!--                <li>-->
                <!--                    <span class="comments me-3">-->
                <!--      <a href="javascript:void(0)">2 Comments</a>-->
                <!--    </span>-->
                <!--                    <span class="link-share">-->
                <!--      <a href="javascript:void(0)">Share</a>-->
                <!--    </span>-->
                <!--                </li>-->
                <!--            </ul>-->

                <!--            <h5 class="title mb-4">-->
                <!--                <a href="blog-detail.html">-->
                <!--                    Why You Should Spend More Time Thinking About Seo.-->
                <!--                </a>-->
                <!--            </h5>-->

                <!--            <p class="mb-5">-->
                <!--                Lorem ipsum dolor sit amet, consectet adipi elit, sed do-->
                <!--                eius tempor incididunt ut labore gthydolore magna aliqua.-->
                <!--            </p>-->

                <!--            <a href="blog-details.html" class="btn btn-warning">read more-->
                <!--            </a>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--</div>-->
                <!--<div class="col-12 col-md-6 col-lg-4 mb-7">-->
                <!--    <div class="blog-grid-card">-->
                <!--        <a href="blog-details.html" class="blog-grid-thumb">-->
                <!--            <img src="<?php echo base_url();?>assets/frontend/images/blog-grid/5.png" alt="images_not_found">-->
                <!--        </a>-->
                <!--        <div class="blog-grid-content">-->
                <!--            <ul>-->
                <!--                <li class="date">-->
                <!--                    <i class="icofont-ui-calendar"></i>May 21, 2021-->
                <!--                </li>-->
                <!--                <li>-->
                <!--                    <span class="comments me-3">-->
                <!--      <a href="javascript:void(0)">2 Comments</a>-->
                <!--    </span>-->
                <!--                    <span class="link-share">-->
                <!--      <a href="javascript:void(0)">Share</a>-->
                <!--    </span>-->
                <!--                </li>-->
                <!--            </ul>-->

                <!--            <h5 class="title mb-4">-->
                <!--                <a href="blog-detail.html">-->
                <!--                    Why is SEO important for marketing?</a>-->
                <!--            </h5>-->

                <!--            <p class="mb-5">-->
                <!--                Lorem ipsum dolor sit amet, consectet adipi elit, sed do-->
                <!--                eius tempor incididunt ut labore gthydolore magna aliqua.-->
                <!--            </p>-->

                <!--            <a href="blog-details.html" class="btn btn-warning">read more</a>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--</div>-->
                <!--<div class="col-12 col-md-6 col-lg-4 mb-7">-->
                <!--    <div class="blog-grid-card">-->
                <!--        <a href="blog-details.html" class="blog-grid-thumb">-->
                <!--            <img src="<?php echo base_url();?>assets/frontend/images/blog-grid/6.png" alt="images_not_found">-->
                <!--        </a>-->
                <!--        <div class="blog-grid-content">-->
                <!--            <ul>-->
                <!--                <li class="date">-->
                <!--                    <i class="icofont-ui-calendar"></i>May 21, 2021-->
                <!--                </li>-->
                <!--                <li>-->
                <!--                    <span class="comments me-3">-->
                <!--      <a href="javascript:void(0)">2 Comments</a>-->
                <!--    </span>-->
                <!--                    <span class="link-share">-->
                <!--      <a href="javascript:void(0)">Share</a>-->
                <!--    </span>-->
                <!--                </li>-->
                <!--            </ul>-->

                <!--            <h5 class="title mb-4">-->
                <!--                <a href="blog-detail.html">-->
                <!--                    How can I start SEO Marketing SEO Consultancy?-->
                <!--                </a>-->
                <!--            </h5>-->

                <!--            <p class="mb-5">-->
                <!--                Lorem ipsum dolor sit amet, consectet adipi elit, sed do-->
                <!--                eius tempor incididunt ut labore gthydolore magna aliqua.-->
                <!--            </p>-->

                <!--            <a href="blog-details.html" class="btn btn-warning">read more-->
                <!--            </a>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--</div>-->
                
                    </nav>
                </div>
            </div>
        </div>
    </section>
