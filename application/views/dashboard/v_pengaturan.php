<div class="content-wrapper">
	<section class="content-header">
		<h1>
			Pengaturan
			<small>Update Pengaturan Website</small>
		</h1>
	</section>

	<section class="content">

		<div class="row">
			<div class="col-lg-6">
				
				<div class="box box-primary">
					<div class="box-header">
						<h3 class="box-title">Pengaturan</h3>
					</div>
					<div class="box-body">

						<?php 
						if(isset($_GET['alert'])){
							if($_GET['alert'] == "sukses"){
								echo "<div class='alert alert-success'>Pengaturan telah diupdate!</div>";
							}
						}
						?>
						
						<?php foreach($pengaturan as $p){ ?>

							<form method="post" action="<?php echo base_url('dashboard/pengaturan_update') ?>" enctype="multipart/form-data">
								<div class="box-body">
									<div class="form-group">
										<label>Nama Website</label>
										<input type="text" name="nama" class="form-control" placeholder="Masukkan nama website.." value="<?php echo $p->nama; ?>">
										<?php echo form_error('nama'); ?>
									</div>

									<div class="form-group">
										<label>Deskripsi Website</label>
										<input type="text" name="deskripsi" class="form-control" placeholder="Masukkan deskripsi .." value="<?php echo $p->deskripsi; ?>">
										<?php echo form_error('deskripsi'); ?>
									</div>

									<hr>

									<div class="form-group">
										<label>Logo Website</label>
										<input type="file" name="logo">
										<small>Kosongkan jika tidak ingin mengubah logo</small>
									</div>

									<hr>

									<div class="form-group">
										<label>Link Facebook</label>
										<input type="text" name="link_facebook" class="form-control" placeholder="Masukkan link facebook .." value="<?php echo $p->link_facebook; ?>">
										<?php echo form_error('link_facebook'); ?>
									</div>

									<div class="form-group">
										<label>Link Twitter</label>
										<input type="text" name="link_twitter" class="form-control" placeholder="Masukkan link twitter .." value="<?php echo $p->link_twitter; ?>">
										<?php echo form_error('link_twitter'); ?>
									</div>

									<div class="form-group">
										<label>Link Instagram</label>
										<input type="text" name="link_instagram" class="form-control" placeholder="Masukkan link instagram .." value="<?php echo $p->link_instagram; ?>">
										<?php echo form_error('link_instagram'); ?>
									</div>

									<div class="form-group">
										<label>Link Channel Youtube</label>
										<input type="text" name="link_youtube" class="form-control" placeholder="Masukkan link Channel youtube anda.." value="<?php echo $p->link_youtube; ?>">
										<?php echo form_error('link_youtube'); ?>
									</div>

									<div class="form-group">
										<label>Pesan Whatsapp</label>
										<input type="text" name="pesan_wa" class="form-control" placeholder="Masukkan Template Pesan WA .." value="<?php echo $p->pesan_wa; ?>">
										<?php echo form_error('pesan_wa'); ?>
									</div>

									<div class="form-group">
										<label>No Telpon</label>
										<input type="text" name="telpon" class="form-control" placeholder="Masukkan Nomor Whatsapp .." value="<?php echo $p->telpon; ?>">
										<?php echo form_error('telpon'); ?>
									</div>
									<div class="form-group">
										<label>Email</label>
										<input type="text" name="email" class="form-control" placeholder="Masukkan Email .." value="<?php echo $p->email; ?>">
										<?php echo form_error('email'); ?>
									</div>
								</div>

								<div class="box-footer">
									<input type="submit" class="btn btn-success" value="Simpan">
								</div>
							</form>

						<?php } ?>

					</div>
				</div>

			</div>
		</div>

	</section>

</div>