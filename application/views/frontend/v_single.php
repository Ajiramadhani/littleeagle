
			<!-- start banner Area -->
			<section class="banner-area relative" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">
                <?php foreach($artikel as $a){ ?>				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Artikel Blog				
							</h1>	
							<p class="text-white link-nav"><a href="<?php echo base_url(); ?>">Home</a><span class="lnr lnr-arrow-right"></span><a href="<?php echo base_url('blog'); ?>">Blog</a>  <span class="lnr lnr-arrow-right"></span>  <?php echo $a->artikel_judul ?></p>
                        </div>	
                        <?php } ?>
					</div>
				</div>
			</section>
			<!-- End banner Area -->					  
			
			<!-- Start post-content Area -->
			<section class="post-content-area single-post-area">
				<div class="container">
                <?php if(count($artikel) == 0){ ?>
                    <center>
                        <h3 class="mt-5">Artikel Tidak Ditemukan.</h3>
                    </center>
                <?php } ?>

                <?php foreach($artikel as $a){ ?>
					<div class="row">
						<div class="col-lg-8 posts-list">
							<div class="single-post row">
								<div class="col-lg-12">
									<div class="feature-img">
                                    <?php if($a->artikel_sampul != ""){ ?>
										<img src="<?php echo base_url(); ?>gambar/artikel/<?php echo $a->artikel_sampul ?>" alt="<?php echo $a->artikel_judul ?>" class="img-fluid">
									<?php } ?>
									</div>									
								</div>
								<div class="col-lg-3  col-md-3 meta-details">
									<ul class="tags">
                                    <?php echo $a->kategori_nama ?>
									</ul>
									<div class="user-details row">
										<p class="user-name col-lg-12 col-md-12 col-6"><a href="#"><?php echo $a->pengguna_nama ?></a> <span class="lnr lnr-user"></span></p>
										<p class="date col-lg-12 col-md-12 col-6"><?php echo format_indo($a->artikel_tanggal) ?></a> <span class="lnr lnr-calendar-full"></span></p>
										<!-- <p class="view col-lg-12 col-md-12 col-6"><a href="#">1.2M Views</a> <span class="lnr lnr-eye"></span></p>
										<p class="comments col-lg-12 col-md-12 col-6"><a href="#">06 Comments</a> <span class="lnr lnr-bubble"></span></p> -->
										<ul class="social-links col-lg-12 col-md-12 col-6">
											<li><a href="#"><i class="fa fa-gmail"></i><?php echo $a->pengguna_email ?></a></li>
										</ul>																				
									</div>
								</div>
								<div class="col-lg-9 col-md-9">
									<h3 class="mt-20 mb-20"><?php echo $a->artikel_judul ?></h3>
									<p class="excert">
                                        <?php echo $a->artikel_konten ?>
									</p>
								</div>
								<div class="col-lg-12">
									<!-- <div class="quotes">
										MCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money on boot camp when you can get the MCSE study materials yourself at a fraction of the camp price. However, who has the willpower to actually sit through a self-imposed MCSE training.										
									</div> -->
								</div>
                            </div>
                            
							<!-- <div class="navigation-area">
								<div class="row">
									<div class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
										<div class="thumb">
											<a href="#"><img class="img-fluid" src="img/blog/prev.jpg" alt=""></a>
										</div>
										<div class="arrow">
											<a href="#"><span class="lnr text-white lnr-arrow-left"></span></a>
										</div>
										<div class="detials">
											<p>Prev Post</p>
											<a href="#"><h4>Space The Final Frontier</h4></a>
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center">
										<div class="detials">
											<p>Next Post</p>
											<a href="#"><h4>Telescopes 101</h4></a>
										</div>
										<div class="arrow">
											<a href="#"><span class="lnr text-white lnr-arrow-right"></span></a>
										</div>
										<div class="thumb">
											<a href="#"><img class="img-fluid" src="img/blog/next.jpg" alt=""></a>
										</div>										
									</div>									
								</div>
							</div> -->
							
						</div>
						<div class="col-lg-4 sidebar-widgets">
							<div class="widget-wrap">
								<div class="single-sidebar-widget user-info-widget">
                                    
                                        <h4><?php echo $a->pengguna_nama?></h4>
                                    
									<p>
										<?php echo $a->pengguna_level?>
									</p>
									<hr>
									<p>
										<?php echo $a->deskripsi?>
                                    </p>
                                </div>
                                <?php } ?>
                                
								<div class="single-sidebar-widget popular-post-widget">
									<h4 class="popular-title">Newest Posts</h4>
									<div class="popular-post-list">
										<div class="single-post-list d-flex flex-row align-items-center">
											<div class="thumb">
                                            
                                            <!-- <?php if($a->artikel_sampul != ""){ ?>
										        <img src="<?php echo base_url(); ?>gambar/artikel/<?php echo $a->artikel_sampul ?>" class="img-fluid">
									        <?php } ?> -->
                                        </div>
                                        
                                            
											<div class="details">
                                                <?php 
                                                    $artikel = $this->db->query("SELECT * FROM artikel,pengguna,kategori WHERE artikel_status='publish' AND artikel_author=pengguna_id AND artikel_kategori=kategori_id ORDER BY artikel_id DESC LIMIT 4")->result();
                                                    foreach($artikel as $a){
                                                ?>
												<a href="<?php echo base_url().$a->artikel_slug; ?>"><h6><?php echo $a->artikel_judul; ?></h6></a>
												<p>Newest from Blog</p><br>
                                                <?php }?>
                                            </div>
                                        </div>
                                        
																									
									</div>
								</div>
								<div class="single-sidebar-widget ads-widget"> 
									<a href="#"><img class="img-fluid" src="<?php echo base_url(); ?>assets_frontend/depan/img/blog/ads-banner.jpg" alt=""></a>
								</div>
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
										<?php }?>
									</ul>
								</div>								
							</div>
						</div>
                    </div>
				</div>	
			</section>
			<!-- End post-content Area -->