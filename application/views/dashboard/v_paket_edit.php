<div class="content-wrapper">
<section class="content-header">
		<h1>
			Paket
			<small>Edit nama Paket</small>
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
						<h3 class="box-title">Kategori</h3>
					</div>
					<div class="box-body">
						
						<?php foreach($paket as $k){ ?>
                            <?= form_open_multipart('dashboard/paket_update'); ?>
							<!-- <form method="post" action="<?php echo base_url('dashboard/paket_update') ?>"> -->
								<div class="box-body">
                                    <div class="form-group">
                                        <input type="hidden" name="id" value="<?php echo $k->paket_id; ?>">
										<label>Nama Kategori</label>
										<input type="text" name="paket_nama" class="form-control" placeholder="Masukkan nama paket .." value="<?php echo $k->paket_nama; ?>">
										<?php echo form_error('paket_nama'); ?>
									</div>
									<div class="form-group">
										<label>Upload Foto Paket</label>
										<input type="file" name="foto" class="form-control" value="<?php echo $k->foto; ?>">
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
									<input type="submit" class="btn btn-success" value="Update">
								</div>
                            <?= form_close(); ?>

						<?php } ?>

					</div>
				</div>

			</div>
		</div>

	</section>

</div>