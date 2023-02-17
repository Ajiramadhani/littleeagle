<!-- start banner Area -->
<section class="banner-area relative" id="home">
    <div class="overlay overlay-bg"></div>	
    <div class="container">
        <div class="row fullscreen d-flex align-items-center justify-content-between">
            <div class="banner-content col-lg-9 col-md-12">
                <br><br><br><br><br>
                <img width="300px" src="<?php echo base_url().'/gambar/website/'.$pengaturan->logo; ?>" alt="">
                <br><br>
                <h1 class="text-uppercase">
                    We Ensure better education
                    for a better world			
                </h1>
                <p class="pt-10 pb-10 text-white">
                    In the history of modern astronomy, there is probably no one greater leap forward than the building and launch of the space telescope known as the Hubble.
                </p>
                <a href="#" class="primary-btn text-uppercase">Get Started</a>
            </div>										
        </div>
    </div>					
</section>
<!-- End banner Area -->

<!-- Start feature Area -->
<section class="feature-area">
    <div class="container">
        <div class="row">
            <?php foreach($mapel as $a){ ?>
            <div class="col-lg-4">
                <div class="single-feature">
                    <div class="title">
                        <h4 class="text-uppercase"><?php echo $a->event_judul?></h4>
                    </div>
                    <div class="desc-wrap">
                        <p>
                        <?php echo word_limiter($a->event_konten, 11); ?>
                        </p>
                        <a target="_blank" href="https://api.whatsapp.com/send?phone=+62<?php echo $pengaturan->telpon?>&text=<?php echo $pengaturan->pesan_wa?>%20<?php echo $a->event_judul ?>">Join Now</a>									
                    </div>
                </div>
            </div>

           
            <?php }?>											
        </div>
    </div>	
</section>
<!-- End feature Area -->
        
<!-- Start popular-course Area -->
<section class="popular-course-area section-gap">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="menu-content pb-70 col-lg-8">
                <div class="title text-center">
                    <h1 class="mb-10">Our Teachers We Offer</h1>
                    <p>There is a moment in the life of any inspiring.</p>
                </div>
            </div>
        </div>						
        <div class="row">
            
            <div class="active-popular-carusel">
                <?php foreach($event as $a){ ?>
                <div class="single-popular-carusel">
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
                            <a href="<?php echo base_url('sing_event/').$a->event_slug ?>"><?php echo $a->event_judul ?></a>
                            </h4>
                        <p>
                        <?php echo word_limiter($a->event_konten, 11); ?>
                        </p>
                    </div>
                </div>	
                <?php } ?>							
            </div>
        </div>
    </div>	
</section>
<!-- End popular-course Area -->

<!-- Start search-course Area -->
<section class="search-course-area relative">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-lg-12 pt-5">
                <h1 class="text-white text-center">
                    Yang Menjadi Keunggulan <br>
                    Kami adalah ...
                </h1>
                <div class="row details-content">
                    <div class="col-md-3 mt-3 single-detials">
                        <div class="text-center">
                            <span class="lnr lnr-hourglass"></span>
                            <a href="#"><h4>10 Tahun + Berdiri</h4></a>		
                            <p class="text-white">
                                Pengalaman kami yang telah berdiri lebih dari 10 tahun.
                            </p>
                            
                        </div>
                    </div>
                    <div class="col-md-3 mt-3 single-detials">
                        <div class="text-center">
                            <span class="lnr lnr-license"></span>
                            <a href="#"><h4>Sertifikasi</h4></a>		
                            <p class="text-white">
                                Setiap kamu menyelesaikan course maka akan mendapatkan sertifikat dari <?php echo $pengaturan->nama?>
                                Yang mana sertifikatnya <b>Resmi dan Diakui</b>
                            </p>
                        </div>					
                    </div>								
                    <div class="col-md-3 mt-3 pb-5 single-detials">
                        <div class="text-center">
                            <span class="lnr lnr-spell-check center"></span>
                            <a href="#"><h4>Jaminan bisa</h4></a>		
                            <p class="text-white">
                                Karena instruktur kami yang memiliki pengalaman maka
                                ada jaminan bisa jika kamu serius mengikutinya
                            </p>
                        </div>					
                    </div>															
                    <div class="col-md-3 mt-3 pb-5 single-detials">
                        <div class="text-center">
                            <span class="lnr lnr-graduation-hat"></span>
                            <a href="#"><h4>1000+ Alumni</h4></a>		
                            <p class="text-white">
                                1000 lebih alumni yang mahir bahasa asing telah kami lahirkan
                            </p>
                        </div>					
                    </div>															
                </div>
            </div>
        </div>
    </div>	
</section>
<!-- End search-course Area -->


<!-- Start Visi Area -->
<section class="upcoming-event-area section-gap">
    <div class="container">
    <?php
        $pengaturan = $this->m_data->get_data('pengaturan')->result();
        foreach($pengaturan as $p) {
    ?>
        <div class="row d-flex justify-content-center">
            <div class="menu-content pb-70 col-lg-8">
                <div class="title text-center">
                    <h1 class="mb-10"><?php echo $p->nama?></h1>
                    <p style="font-size: large;"><strong><b><?php echo $p->nama?> : &#8221; <?php echo $p->deskripsi?> &#8220;</b></strong> Adalah fokus kami sebagai salah satu <strong>lembaga kursus bahasa inggris</strong> di Kampung Inggris, Depok, Jawa Barat.</p>
                </div>
            </div>
        </div>
        								
        <div class="row">
            <div class="active-upcoming-event">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <blockquote class="generic-blockquote ">
                            <p style="font-size: medium;">Metode belajar di <?php echo $p->nama?> Kampung Inggris sudah kami desain sedemikian rupa sehingga akan 
                                sangat cocok buat kamu yang pingin ngrerasain suasana belajar bahasa inggris yang <strong style="color: red;">RILEKS, 
                                    GAK TEGANG, SANTAI TAPI SERIUS, FUN BERKESAN, ASIK DAN SANGAT MUDAH DIPAHAMI.</strong>
                            </p>
                        </blockquote>
                    </div>
                        <div class="col-md-6">
                            <img class="img-fluid" src="<?php base_url()?>assets_frontend/depan/img/kampung-inggris.png"></img></a>
                        </div>
                        <div class="col-md-6">
                            <img class="img-fluid" src="<?php base_url()?>assets_frontend/depan/img/kampung-inggris.png"></img></a>
                        </div>
                   
                </div>																				
            </div>
        </div>
    </div>	
</section>
<!-- End Visi Area -->
            
<!-- Start review Area -->
<div class="title text-center">
    <h1 class="mb-1">#LittleEagleSuperSeru</h1>
</div>
<section class="review-area relative">
    <div class="overlay overlay-bg"></div>
        <div class="container">			
            <div class="title text-center">
                <h2 class="pt-4 pb-4">4 Alasan Kenapa Harus Milih <?php echo $p->nama?></h2>
            </div>
            	
            <div class="row">    
            
            <div class="active-review-carusel pb-5">
                <!-- view 1                 -->
                <div class="single-review item">
                    <div class="title justify-content-start d-flex">
                            <h2>1. Program-Program di <?php echo $p->nama?> itu SERU-SERU, Simpel dan Gampaaang Banget Dipahami</h2>
                    </div>
                    <p>
                        Percaya deh, kamu akan sangat menikmati setiap momen belajar di <?php echo $p->nama?> Kampung Inggris di Kota Depok. Kamu akan diajari bahasa inggris dari awal, 
                        sampai kamu akhirnya bisa jadi lebih PD ngomong inggris. Sudah terbukti, sejak dari tahun 2011 ada ribuan alumni kami telah terdongkrak PD-nya ( Percaya dirinya ) dan 
                        meningkat kemampuan speakingnya. Lihat semua paket yang cocok untuk kamu.  
                    </p>
                        <div class="thumb relative">
                            <div class="overlay overlay-bg"></div>
                                <div class="thumb">
                                    <img style="height:300px;" src="<?php base_url()?>assets_frontend/depan/img/kampung-inggris.png" class="img-fluid"x></img></a>
                                </div>	
                        </div>
                    
                    </div>
                
                <!-- akhir view 1 -->
                <!-- view 2 -->
                <div class="single-review item">
                    <div class="title justify-content-start d-flex">
                        <div class="thumb relative">
                            <div class="overlay overlay-bg"></div>	
                                <img style="height:300px;" src="<?php base_url();?>assets_frontend/depan/img/kampung-inggris.png" class="img-fluid"x></img></a>
                        </div>
                    
                    </div>

                            <h2>2. Praktek Ngomong Inggris Setiap Hari. Baik di Asrama, maupun di kelas.</h2>
                    
                    <p>
                    Setiap hari kemampuan bahasa inggris kamu akan diasah, dengan adanya sesi praktek ngomong inggris. Sehingga lama-kelamaan, 
                    kamu akan sangat terbiasa untuk mendengar dan terbiasa berkomunikasi dengan menggunakan bahasa inggris. 
                    Salah-salah dulu tidak apa apa, yang terpenting asah terus keberanian untuk ngomong inggris. Tutor-tutor kami dengan senang hati akan membimbing kamu guys ^_^.
                    </p>
                </div>
                <!-- akhir view 2 -->
                
                <!-- view 3 -->
                <div class="single-review item">
                    <div class="title justify-content-start d-flex">
                            <h2>3. Para pengajar di <?php echo $p->nama?> itu KECE-KECE, ASYIK-ASYIK dan BERKOMPETEN di bidang nya.</h2>
                    </div>
                    <p>
                    Tutor-tutor <?php echo $p->nama?> akan siap sedia untuk menjadi teman dan sahabat terbaikmu dalam proses <em>Learning English</em>. Dan kamu juga bisa sharing atau konsultasi 
                    kapanpun dan dimanapun, saat kamu menemui kesulitan selama proses belajar. 
                    Sharingnya bebas kok, kamu bisa pake Bahasa Inggris dengan campuran Bahasa Indonesia atau malah pake Bahasa asing selainnya ^_^.
                    </p>

                        <div class="thumb relative">
                            <div class="overlay overlay-bg"></div>	
                                <img style="height:300px;" src="<?php base_url();?>assets_frontend/depan/img/kampung-inggris.png" class="img-fluid"x></img></a>
                        </div>
                </div>
                <!-- akhir view 3 -->
                <!-- Awal View 4 -->
                <div class="single-review item">
                    <div class="title justify-content-start d-flex">
                        <div class="thumb relative">
                            <div class="overlay overlay-bg"></div>	
                                <img style="height:300px;" src="<?php base_url();?>assets_frontend/depan/img/kampung-inggris.png" class="img-fluid"x></img></a>
                        </div>
                    
                    </div>
                            <h2>4. Kelas nya SERU-SERU, Fun & Relax</h2>
                    <p>
                        Suasana belajar di <?php echo $p->nama ?> itu bakal BEDA BANGET dengan kebanyakan belajar bahasa inggris di sekolah2 guys.</p><p>Tim <?php echo $p->nama?> sudah mendesain &#8220;SPESIAL&#8221; 
                        kelas sedemikian rupa, menjadi sebuah kelas yg HAPPY, FUN &amp; RELAX. Sehingga kamu bakal berasa nyaman belajar, gak tegang, santai &#8230;TAPI tetep 
                        dapet manfaat materi belajar nya. Asyiik kaaan? ^_^
                    </p>
                </div>	
				<!-- Akhir View 4 -->
            </div>
        <?php }?>
        </div>
    </div>	
</section>
<!-- End review Area -->	

<!-- Start cta-one Area -->
<section class="cta-one-area relative section-gap">
    
            <div class="title text-center">
                <h2 class="mt-3 mb-5"> <b>Kata Mereka tentang <?php echo $p->nama?></b></h2>
            </div>
   
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row">
            <div class="active-upcoming-event-carusel">
                <?php foreach ($kata as $k){ ?>
                    <div class="single-carusel row align-items-center">
                        <div class="col-xl-12">
                            <iframe class="col-xl-12" width="<?php echo $k->kata_width?>" height="<?php echo $k->kata_height?>" src="<?php echo $k->kata_slug?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                    </div>
                    <?php } ?>
            </div>
        </div>
    </div>
</section>
<!-- End cta-one Area -->

<!-- Start blog Area -->
<section class="blog-area section-gap" id="blog">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="menu-content pb-70 col-lg-8">
                <div class="title text-center">
                    <h1 class="mb-10">Latest posts from our Blog</h1>
                    <p>In the history of modern astronomy there is.</p>
                </div>
            </div>
        </div>					
        <div class="row">

        <?php foreach($artikel as $a){ ?>
            <div class="col-lg-3 col-md-6 single-blog">
                <div class="thumb">
                    <?php if($a->artikel_sampul != ""){ ?>
                      <img style="height: 200px;" src="<?php echo base_url(); ?>gambar/artikel/<?php echo $a->artikel_sampul ?>" alt="" class="img-fluid">
                    <?php } ?>
                    <p class="meta"><?php echo date('d-M-Y', strtotime($a->artikel_tanggal)); ?>  |  By <a href="#" class="author"><?php echo $a->pengguna_nama; ?></a></p>
                    <a href="<?php echo base_url().$a->artikel_slug ?>">
                        <h5><a href="<?php echo base_url().$a->artikel_slug ?>"><?php echo $a->artikel_judul ?></a></h5>
                </a>
              </div>
              <div class="card-body">
                <div class="card-category-box">
                  <div class="card-category">
                    <h6 class="category"><?php echo $a->kategori_nama ?></h6>
                  </div>
                </div>
              </div>
            </div>
        <?php } ?>
        
      </div>
            <!-- <div class="col-lg-3 col-md-6 single-blog">
                <div class="thumb">
                    <img class="img-fluid" src="img/b1.jpg" alt="">								
                </div>
                <p class="meta">25 April, 2018  |  By <a href="#">Mark Wiens</a></p>
                <a href="blog-single.html">
                    <h5>Addiction When Gambling Becomes A Problem</h5>
                </a>
                <p>
                    Computers have become ubiquitous in almost every facet of our lives. At work, desk jockeys spend hours in front of their.
                </p>
                <a href="#" class="details-btn d-flex justify-content-center align-items-center"><span class="details">Details</span><span class="lnr lnr-arrow-right"></span></a>		
            </div>
            <div class="col-lg-3 col-md-6 single-blog">
                <div class="thumb">
                    <img class="img-fluid" src="img/b2.jpg" alt="">								
                </div>
                <p class="meta">25 April, 2018  |  By <a href="#">Mark Wiens</a></p>
                <a href="blog-single.html">
                    <h5>Computer Hardware Desktops And Notebooks</h5>
                </a>
                <p>
                    Ah, the technical interview. Nothing like it. Not only does it cause anxiety, but it causes anxiety for several different reasons. 
                </p>
                <a href="#" class="details-btn d-flex justify-content-center align-items-center"><span class="details">Details</span><span class="lnr lnr-arrow-right"></span></a>						
            </div> -->
            <!-- <div class="col-lg-3 col-md-6 single-blog">
                <div class="thumb">
                    <img class="img-fluid" src="img/b3.jpg" alt="">								
                </div>
                <p class="meta">25 April, 2018  |  By <a href="#">Mark Wiens</a></p>
                <a href="blog-single.html">
                    <h5>Make Myspace Your Best Designed Space</h5>
                </a>
                <p>
                    Plantronics with its GN Netcom wireless headset creates the next generation of wireless headset and other products such as wireless.
                </p>
                <a href="#" class="details-btn d-flex justify-content-center align-items-center"><span class="details">Details</span><span class="lnr lnr-arrow-right"></span></a>									
            </div> -->
            <!-- <div class="col-lg-3 col-md-6 single-blog">
                <div class="thumb">
                    <img class="img-fluid" src="img/b4.jpg" alt="">								
                </div>
                <p class="meta">25 April, 2018  |  By <a href="#">Mark Wiens</a></p>
                <a href="blog-single.html">
                    <h5>Video Games Playing With Imagination</h5>
                </a>
                <p>
                    About 64% of all on-line teens say that do things online that they wouldn’t want their parents to know about.   11% of all adult internet 
                </p>
                <a href="#" class="details-btn d-flex justify-content-center align-items-center"><span class="details">Details</span><span class="lnr lnr-arrow-right"></span></a>							
            </div>							 -->
        </div>
    </div>	
</section>
<!-- End blog Area -->			


<!-- Start cta-two Area -->
<section class="cta-two-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 cta-left">
                <h1>Not Yet Satisfied with our Blog?</h1>
            </div>
            <?php foreach ($pengaturan as $p) {?>
            <div class="col-lg-4 cta-right">
                <a target="_blank" class="primary-btn wh" href="<?php echo $p->link_instagram?>">view our blog</a>
            </div>
            <?php } ?>
        </div>
    </div>	
</section>
<!-- End cta-two Area -->