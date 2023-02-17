			  
			<!-- start banner Area -->
			<section class="banner-area relative about-banner" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Our Teachers		
							</h1>	
							<p class="text-white link-nav">
									<a href="<?php echo base_url(); ?>">Home</a> | 
									<a href="<?php echo base_url('event'); ?>">Events</a>
							</p>
						</div>	
					</div>
				</div>
			</section>
			<!-- End banner Area -->	

			<!-- Start popular-courses Area --> 
			<section class="popular-courses-area courses-page" >
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-70 col-lg-8">
							<div class="title text-center">
								<h1 class="mb-10">Our Teachers We Offer</h1>
								<p>There is a moment in the life of any aspiring.</p>
							</div>
						</div>
					</div>						
					<div class="row">
                    <?php foreach($event as $a){ ?>
						<div class="single-popular-carusel col-lg-3 col-md-6">
							<div class="thumb-wrap relative">
								<div class="thumb relative">
									<div class="overlay overlay-bg"></div>	
									<?php if($a->event_sampul != ""){ ?>
										<img style="height:200px;" src="<?php echo base_url(); ?>gambar/event/<?php echo $a->event_sampul ?>" alt="<?php echo $a->event_judul ?>" class="img-fluid">
									<?php } ?>
								</div>
							</div>
							<div class="details">
									<h4>
                                    <a href="<?php echo base_url('det_guru/').$a->event_slug ?>"><?php echo $a->event_judul ?></a>
									</h4>
								<p>
                                <?php echo word_limiter($a->event_konten, 11); ?>
								</p>
							</div>
                        </div>	
                        <?php } ?>
						
							<nav class="blog-pagination justify-content-center d-flex">
		                        <ul class="pagination">
		                            <li class="page-item">
									<?php echo $this->pagination->create_links(); ?>
		                            </li>
		                        </ul>
							</nav>
													
						<!-- <a href="#" class="primary-btn text-uppercase mx-auto">Load More Courses</a>													 -->
					</div>
				</div>	
			</section>
			<!-- End popular-courses Area -->			

									

			<!-- Start cta-two Area -->
			<section class="cta-two-area">
				<div class="container">
					<div class="row">
						<div class="col-lg-8 cta-left">
							<h1>Not Yet Satisfied with our Blog?</h1>
						</div>
						<div class="col-lg-4 cta-right">
							<a target="_blank" class="primary-btn wh" href="<?php echo $pengaturan->link_instagram?>">view our blog</a>
						</div>
					</div>
				</div>	
			</section>
			<!-- End cta-two Area -->						    			
