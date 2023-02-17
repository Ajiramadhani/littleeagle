			<!-- start banner Area -->
			<section class="banner-area relative blog-home-banner" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content blog-header-content col-lg-12">
							<h1 class="text-white">
								Dude You’re Getting
								a Telescope				
							</h1>	
							<p class="text-white">
									<a href="<?php echo base_url(); ?>">Home</a> | 
									<a href="<?php echo base_url('blog'); ?>">Blog</a> | 
									Artikel
							</p>
							<a href="#news" class="primary-btn">View More</a>
						</div>	
					</div>
				</div>
			</section>
			<!-- End banner Area -->				  
			<!-- Start top-category-widget Area -->
			<section class="top-category-widget-area pt-90 pb-90 ">
                <div class="container">
                    <div class="row align-items-center">		
                        <div class="col-lg-12">
                                <h4 class="text-center mx-auto text-uppercase"><?php foreach ($jum_kat as $a) {?><?php echo $a->kategori_nama?><?php }?></h4>							        
                        </div>												
                    </div>
                                
				</div>	
			</section>
			<!-- End top-category-widget Area -->
			<!-- Start post-content Area -->
			<section class="post-content-area">
				<div class="container">
					<div class="row">
						<div class="col-lg-8 posts-list" id="news">

                        <?php if(count($artikel) == 0){ ?>
                            <center>
                                <h3 class="mt-5">Belum Ada Artikel Pada Kategori Ini.</h3>
                            </center>
                        <?php } ?>
                        
							<?php foreach($artikel as $a){ ?>
							<div class="single-post row">
								<div class="col-lg-3  col-md-3 meta-details">
									<div class="user-details row">
										<p class="user-name col-lg-12 col-md-12 col-6"><a href="#"><?php echo $a->pengguna_nama ?></a><span class="lnr lnr-user"></span></p>
										<p class="date col-lg-12 col-md-12 col-6"><a href="#"><?php echo $a->artikel_tanggal ?></a> <span class="lnr lnr-calendar-full"></span></p>
										<!-- <p class="view col-lg-12 col-md-12 col-6"><a href="#">1.2M Views</a> <span class="lnr lnr-eye"></span></p>
										<p class="comments col-lg-12 col-md-12 col-6"><a href="#">06 Comments</a> <span class="lnr lnr-bubble"></span></p>						 -->
									</div>
								</div>
								<div class="col-lg-9 col-md-9 ">
								
									<div class="feature-img">
									<?php if($a->artikel_sampul != ""){ ?>
										<img src="<?php echo base_url(); ?>gambar/artikel/<?php echo $a->artikel_sampul ?>" alt="<?php echo $a->artikel_judul ?>" class="img-fluid">
									<?php } ?>
									</div>
									<a class="posts-title" href="<?php echo base_url().$a->artikel_slug ?>"><h3><?php echo $a->artikel_judul ?></h3></a>
									<p class="excert">
									<?php echo word_limiter($a->artikel_konten, 11); ?>
									</p>
									<a href="<?php echo base_url().$a->artikel_slug ?>" class="primary-btn">View More</a>
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
						</div>
						<div class="col-lg-4 sidebar-widgets">
							<div class="widget-wrap">
						
								<div class="single-sidebar-widget ads-widget">
									<a href="#"><img class="img-fluid" src="img/blog/ads-banner.jpg" alt=""></a>
								</div>
								<div class="single-sidebar-widget post-category-widget">
									<h4 class="category-title">Post Catgories</h4>
									<ul class="cat-list">
                                         <?php 
                                            $kategori = $this->m_data->get_data('kategori')->result();
                                            foreach($kategori as $k){
                                                ?>
                                                <li>
                                                <a href="<?php echo base_url().'kategori/'.$k->kategori_slug; ?>" class="d-flex justify-content-between"><?php echo $k->kategori_nama; ?></a>
                                                </li>
                                                <?php
                                            }
                                            ?>
									
																						
									</ul>
								</div>	
								<!-- <div class="single-sidebar-widget newsletter-widget">
									<h4 class="newsletter-title">Newsletter</h4>
									<p>
										Here, I focus on a range of items and features that we use in life without
										giving them a second thought.
									</p>
									<div class="form-group d-flex flex-row">
									   <div class="col-autos">
									      <div class="input-group">
									        <div class="input-group-prepend">
									          <div class="input-group-text"><i class="fa fa-envelope" aria-hidden="true"></i>
											</div>
									        </div>
									        <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Enter email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email'" >
									      </div>
									    </div>
									    <a href="#" class="bbtns">Subcribe</a>
									</div>	
									<p class="text-bottom">
										You can unsubscribe at any time
									</p>								
								</div> -->
								<div class="single-sidebar-widget tag-cloud-widget">
									<h4 class="tagcloud-title">Tag Clouds</h4>
									<ul>
                                    <?php 
                                        $kategori = $this->m_data->get_data('kategori')->result();
                                        foreach($kategori as $k){
                                            ?>
                                            <li>
                                            <a href="<?php echo base_url().'kategori/'.$k->kategori_slug; ?>"><?php echo $k->kategori_nama; ?></a>
                                            </li>
                                            <?php
                                        }
                                        ?>
									</ul>
								</div>								
							</div>
						</div>
					</div>
				</div>	


			</section>
			<!-- End post-content Area -->