			<!-- start banner Area -->
			<section class="banner-area relative about-banner" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<?php foreach($event as $e) { ?>
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								<?php echo $e->event_judul?>	
							</h1>	
							<p class="text-white link-nav"><a href="<?php echo base_url(); ?>">Home </a><span class="lnr lnr-arrow-right"></span><a href="<?php echo base_url('event'); ?>">Guru</a>  <span class="lnr lnr-arrow-right"></span> <?php echo $e->event_judul ?></p>
						</div>	
					</div>
					<?php } ?>
				</div>
			</section>
			<!-- End banner Area -->	

			<!-- Start course-details Area -->
			<section class="course-details-area pt-120">
				<div class="container">
				<?php if(count($event) == 0){ ?>
                    <center>
                        <h3 class="mt-5">Your Request Not Found | 404.</h3>
                    </center>
				<?php } ?>
				
				<?php foreach($event as $e){ ?>
					<div class="row">
						<div class="col-lg-8 left-contents">
							<div class="main-image">
							<?php if($e->event_sampul != ""){ ?>
								<img src="<?php echo base_url(); ?>gambar/event/<?php echo $e->event_sampul ?>" alt="<?php echo $e->event_judul ?>" class="img-fluid">
							<?php } ?>
							</div>
							<div class="jq-tab-wrapper" id="horizontalTab">
	                            <div class="jq-tab-menu">
	                                <div class="jq-tab-title active" data-tab="1">Profile Singkat</div>
	                                <div class="jq-tab-title" data-tab="3">Video Profile</div>
	                                <!-- <div class="jq-tab-title" data-tab="4">Comments</div> -->
	                                <!-- <div class="jq-tab-title" data-tab="5">Reviews</div> -->
	                            </div>
	                            <div class="jq-tab-content-wrapper">
	                                <div class="jq-tab-content active" data-tab="1">
	                                    <?php echo $e->event_konten?>
	                                </div>
	                                <div class="jq-tab-content" data-tab="3">
										<ul class="course-list">
											<li class="justify-content-between d-flex">
											<iframe width="700" height="365" src="<?php echo $e->event_link?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
												<!-- <iframe width="<?php echo $e->kata_width?>" height="<?php echo $e->kata_height?>" src="<?php echo $e->event_link?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> -->
											</li>

										</ul>
	                                </div>
	                            </div>
	                        </div>
						</div>
						<div class="col-lg-4 right-contents">
							<ul>
								<li>
									<a class="justify-content-between d-flex">
										<p>Nama Instruktur</p> 
										<span class="or"><?php echo $e->event_judul?></span>
									</a>
								</li>
								<!-- <li>
									<a class="justify-content-between d-flex" >
										<p></p>
										<span>Rp. <?= number_format($e->event_harga, 0, '.', '.')?></span>
									</a>
								</li> -->
								<li>
									<a class="justify-content-between d-flex">
										<p>Concern </p>
										<span><?php echo $e->kategori_nama?></span>
									</a>
								</li>
							</ul>
							<a target="_blank" href="https://api.whatsapp.com/send?phone=+62<?php echo $pengaturan->telpon?>&text=<?php echo $pengaturan->pesan_wa?>%20<?php echo $e->event_judul ?>" class="primary-btn text-uppercase">Daftar Kelas Sekarang yuk!</a>
						</div>
					</div>
				</div>	
			</section>
			<!-- End course-details Area -->
			

		<!-- Start popular-course Area -->
			<section class="popular-course-area section-gap">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-70 col-lg-8">
							<div class="title text-center">
								<h1 class="mb-10">Other Teachers we offer</h1>
								<p>There is a moment in the life of any inspiring.</p>
							</div>
						</div>
					</div>						
					<div class="row">
						
						<div class="active-popular-carusel">
							<?php foreach($popular as $a){ ?>
							<div class="single-popular-carusel">
								<div class="thumb-wrap relative">
									<div class="thumb relative">
										<div class="overlay overlay-bg"></div>	
										<?php if($a->event_sampul != ""){ ?>
											<img style="height:300px; width:300px;" src="<?php echo base_url(); ?>gambar/event/<?php echo $a->event_sampul ?>" alt="<?php echo $a->event_judul ?>" class="img-fluid">
										<?php } ?>
									</div>
									<!-- <div class="meta d-flex justify-content-between">
										<h4>Rp. <?= number_format($a->event_harga, 0, '.', '.')?></h4>
									</div>									 -->
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
						</div>
					</div>
					<?php }?>
				</div>	
			</section>
		<!-- End popular-course Area -->				

			<!-- Start cta-two Area -->
			<section class="cta-two-area">
				<div class="container">
					<div class="row">
						<div class="col-lg-8 cta-left">
							<h1>Not Yet Satisfied with our Trend?</h1>
						</div>
						<div class="col-lg-4 cta-right">
							<a target="_blank" class="primary-btn wh" href="<?php echo $pengaturan->link_youtube?>">view our blog</a>
						</div>
					</div>
				</div>	
			</section>
			<!-- End cta-two Area -->						    			