<!DOCTYPE html>
	<html lang="zxx" class="no-js">
	<head>
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		<link rel="shortcut icon" href="img/fav.png">
		<!-- Author Meta -->
		<meta name="author" content="colorlib">
		<!-- Meta Description -->
		<meta name="description" content="">
		<!-- Meta Keyword -->
		<meta name="keywords" content="">
		<!-- meta character set -->
		<meta charset="UTF-8">
		<!-- Site Title -->
		<title><?php echo $pengaturan->nama ?> - <?php echo $pengaturan->deskripsi ?></title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="<?php echo $meta_keyword ?>" name="keywords">
        <meta content="<?php echo $meta_description ?>" name="description">
        
        <!-- Favicons -->
        <link href="<?php echo base_url().'/gambar/website/'.$pengaturan->logo; ?>" rel="icon">
        <link href="<?php echo base_url(); ?>assets_frontend/img/apple-touch-icon.png" rel="apple-touch-icon">


		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
			<!--
			CSS
			============================================= -->
			<link rel="stylesheet" href="<?php echo base_url(); ?>assets_frontend/depan/css/linearicons.css">
			<link rel="stylesheet" href="<?php echo base_url(); ?>assets_frontend/depan/css/font-awesome.min.css">
			<link rel="stylesheet" href="<?php echo base_url(); ?>assets_frontend/depan/css/bootstrap.css">
			<link rel="stylesheet" href="<?php echo base_url(); ?>assets_frontend/depan/css/magnific-popup.css">
			<link rel="stylesheet" href="<?php echo base_url(); ?>assets_frontend/depan/css/nice-select.css">							
			<link rel="stylesheet" href="<?php echo base_url(); ?>assets_frontend/depan/css/animate.min.css">
			<link rel="stylesheet" href="<?php echo base_url(); ?>assets_frontend/depan/css/owl.carousel.css">			
			<link rel="stylesheet" href="<?php echo base_url(); ?>assets_frontend/depan/css/jquery-ui.css">			
			<link rel="stylesheet" href="<?php echo base_url(); ?>assets_frontend/depan/css/main.css">

			<!-- Libraries CSS Files -->
			<link href="<?php echo base_url(); ?>assets_frontend/lib/animate/animate.min.css" rel="stylesheet">
			<link href="<?php echo base_url(); ?>assets_frontend/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
			<link href="<?php echo base_url(); ?>assets_frontend/lib/lightbox/css/lightbox.min.css" rel="stylesheet">

			<!-- Main Stylesheet File -->
 			 <link href="<?php echo base_url(); ?>assets_frontend/depan/css/style.css" rel="stylesheet">
        </head>
        
<body>
    
    <header id="header" id="home">
        <div class="header-top">
	  			<div class="container">
                      <div class="row">
			  			<div class="col-lg-6 col-sm-6 col-8 header-top-left no-padding">
                              <ul>
								<li><a target="_blank" href="<?php echo $pengaturan->link_facebook?>"><i class="fa fa-facebook"></i></a></li>
								<li><a target="_blank" href="<?php echo $pengaturan->link_twitter?>"><i class="fa fa-twitter"></i></a></li>
								<li><a target="_blank" href="<?php echo $pengaturan->link_instagram?>"><i class="fa fa-instagram"></i></a></li>
								<li><a target="_blank" href="<?php echo $pengaturan->link_youtube?>"><i class="fa fa-youtube"></i></a></li>
                            </ul>			
			  			</div>
			  			<div class="col-lg-6 col-sm-6 col-4 header-top-right no-padding">
			  				<a target="_blank" href="https://api.whatsapp.com/send?phone=+62<?php echo $pengaturan->telpon?>&text=<?php echo $pengaturan->pesan_wa?>%20tentang%20<?php echo $pengaturan->nama?>"><span class="lnr lnr-phone-handset"></span> <span class="text"><?php echo $pengaturan->telpon ?></span></a>
			  				<a target="_blank" href="mailto:<?php echo $pengaturan->email ?>"><span class="lnr lnr-envelope"></span> <span class="text"><?php echo $pengaturan->email ?></span></a>			
                        </div>
			  		</div>			  					
                </div>
			</div>
		    <div class="container main-menu">
                <div class="row align-items-center justify-content-between d-flex">
                    <div id="logo">
			        <img src="<?php echo base_url().'/gambar/website/'.$pengaturan->logo; ?>" width="60px" class="mr-2">

      <a class="navbar-brand js-scroll text-white" ><?php echo $pengaturan->nama ?> </a>
                </div>
			      <nav id="nav-menu-container">
                      <ul class="nav-menu">
			          <li><a href="<?php echo base_url(); ?>">Home</a></li>
			          <li><a href="<?php echo base_url('page/tentang'); ?>">About Us</a></li>
			          <li><a href="<?php echo base_url('page/kontak-kami'); ?>">Contact</a></li>
			          <li><a href="<?php echo base_url('blog'); ?>">Blog</a></li>
			          <li><a href="<?php echo base_url('event'); ?>">Teachers</a></li>
			          <li><a href="<?php echo base_url('course'); ?>">Course</a></li>
                      <li><a href="<?php echo base_url('page/layanan'); ?>">Services</a></li>
			          <!-- <li><a href="<?php echo base_url('login'); ?>">Login</a></li> -->
			        </ul>
                </nav><!-- #nav-menu-container -->		    		
		    	</div>
		    </div>
		  </header><!-- #header -->