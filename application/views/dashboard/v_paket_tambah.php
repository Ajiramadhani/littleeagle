<div class="content-wrapper">
<section class="content-header">
		<h1>
			Paket
			<small>Tambah Daftar Paket</small>
		</h1>
	</section>

	<section class="content">

		<div class="row">
			<div class="col-lg-6">
				<a href="<?php echo base_url().'dashboard/paket'; ?>" class="btn btn-sm btn-primary">Kembali</a>
				
				<br/>
				<br/>

				<div class="box box-primary">
					<div class="box-header">
						<h3 class="box-title">Paket</h3>
					</div>
					<div class="box-body">
						
                        <?= form_open_multipart('dashboard/paket_aksi'); ?>
							<div class="box-body">
								<div class="form-group">
									<label>Nama Paket</label>
									<input type="text" name="paket_nama" class="form-control" placeholder="Masukkan nama paket ..">
									<?php echo form_error('paket_nama'); ?>
								</div>
								<div class="form-group">
									<label>Foto Paket</label>
									<input type="file" name="foto" class="form-control">
									<?php echo form_error('foto'); ?>
								</div>
                            </div>
                            
                            <?php
									if (isset($gambar_error)) {
										echo $gambar_error;
									}
									?>
							<?php echo form_error('foto'); ?>

							<div class="box-footer">
								<input type="submit" class="btn btn-success" value="Simpan">
							</div>
                            <?= form_close(); ?>

					</div>
				</div>

			</div>
		</div>

	</section>

</div>