<!--/ Section Blog-Single Star /-->

<!-- <section class="post-content-area" id="blog">
  <div class="container">
    <div class="row">
      <div class="col-md-12"> -->
        <?php foreach($halaman as $a){ ?>

      <!-- start banner Area -->
			<section class="banner-area relative about-banner" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Halaman				
							</h1>	
							<p class="text-white link-nav"><a href="<?php echo base_url(); ?>">Home</a>  <span class="lnr lnr-arrow-right"></span>  <a href="about.php"> <?php echo $a->halaman_judul?></a></p>
						</div>	
					</div>
				</div>
			</section>
			<!-- End banner Area -->	

        <?php if(count($halaman) == 0){ ?>
          <center>
            <h3 class="mt-5 mb-5">Halaman Ini Tidak Ditemukan.</h3>
          </center>
        <?php } ?>

        
        <!-- <section class="contact-page-area section-gap"> -->
          <section class="sample-text-area">
            <div class="container">
					<!-- <div class="row"> -->
            <h1 class="text-center"><?php echo $a->halaman_judul ?></h1>
            <br>
                <p class="sample-text mt-3">
                  <p><?php echo $a->halaman_konten ?></p>
                  <br>
                </div>
              </div>
              <?php } ?>
            </div>	
          </section>
          <!-- End info Area -->	