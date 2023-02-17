<div class="content-wrapper">
	<section class="content-header">
		<h1>
			Profil
			<small>Update Profil Pengguna</small>
		</h1>
	</section>

	<section class="content">

		<div class="row">
			<div class="col-lg-6">
				
				<div class="box box-primary">
					<div class="box-header">
						<h3 class="box-title">Update Profil</h3>
						<small>Jika ingin edit, jangan lupa sematkan juga foto profilnya</small>
					</div>
					<div class="box-body">

						<?php 
						if(isset($_GET['alert'])){
							if($_GET['alert'] == "sukses"){
								echo "<div class='alert alert-success'>Profil telah diupdate!</div>";
							}
						}
						?>
						
						<?php foreach($profil as $p){ ?>

							<?= form_open_multipart('dashboard/profil_update'); ?>
							<!-- <form method="post" action="<?php echo base_url('dashboard/profil_update') ?>"> -->
								<div class="box-body">
									<div class="form-group">
										<label>Nama</label>
										<input type="text" name="nama" class="form-control" placeholder="Masukkan nama .." value="<?php echo $p->pengguna_nama; ?>">
										<?php echo form_error('nama'); ?>
									</div>

									<div class="form-group">
										<label>Email</label>
										<input type="text" name="email" class="form-control" placeholder="Masukkan email .." value="<?php echo $p->pengguna_email; ?>">
										<?php echo form_error('email'); ?>
									</div>

									<div class="form-group">
										<label>Quotes of Profile</label>
										<input type="text" name="deskripsi" class="form-control" placeholder="Masukkan quotes anda .." value="<?php echo $p->deskripsi; ?>">
										<?php echo form_error('deskripsi'); ?>
									</div>

									<div class="form-group">
										<label>Upload Foto Guru</label>
										<small>Jika ingin edit, jangan lupa sematkan juga foto profilnya</small>
										<input type="file" name="foto" class="form-control" value="<?php echo $p->foto; ?>">
										<?php echo form_error('foto'); ?>
									</div>

							</div>
					
								<?php
									if (isset($gambar_error)) {
										echo $gambar_error;
									}
									?>
								<?php echo form_error('foto'); ?>
							</div>

								<div class="box-footer">
									<input type="submit" class="btn btn-success" value="Update">
								</div>
							<?= form_close(); ?>

						<?php } ?>

					</div>
				</div>
			</div>

	</section>

</div>