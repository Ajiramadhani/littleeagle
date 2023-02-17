<div class="content-wrapper">
	<section class="content-header">
		<h1>
			Edit URL Video
			<small>Ubah Video dengan cara Copy link video dari youtube anda yang lain, dengan cara klik bagikan -> lalu pilih sematkan -> terakhir ambil/salin link di a href="..."</small>
		</h1>
	</section>

	<section class="content">

		<div class="row">
			<div class="col-lg-6">
				<a href="<?php echo base_url().'dashboard/kata'; ?>" class="btn btn-sm btn-primary">Kembali</a>
				
				<br/>
				<br/>

				<div class="box box-primary">
					<div class="box-header">
						<h3 class="box-title">Form Upload Video</h3>
					</div>
					<div class="box-body">
						
						<?php foreach($kata as $k){ ?>

							<form method="post" action="<?php echo base_url('dashboard/kata_update') ?>">
								<div class="box-body">
									<div class="form-group">
										<label>Narasi Video</label>
										<input type="hidden" name="id" value="<?php echo $k->kata_id; ?>">
										<input type="text" name="kata_nama" class="form-control" placeholder="Masukkan nama kata .." value="<?php echo $k->kata_nama; ?>">
										<?php echo form_error('kata_nama'); ?>
									</div>
									<div class="form-group">
										<label>Link</label>
										<input type="text" name="kata_slug" class="form-control" placeholder="Masukkan alamat link.." value="<?php echo $k->kata_slug; ?>">
										<?php echo form_error('kata_slug'); ?>
									</div>
									<div class="form-group">
										<label>Width</label>
										<small>Default 600</small>
										<input type="number" name="kata_width" class="form-control" placeholder="Masukkan lebar layar..." value="<?php echo $k->kata_width; ?>">
										<?php echo form_error('kata_width'); ?>
									</div>
									<div class="form-group">
										<label>Height</label>
										<small>Default 336</small>
										<input type="number" name="kata_height" class="form-control" placeholder="Masukkan tinggi layar..." value="<?php echo $k->kata_height; ?>">
										<?php echo form_error('kata_height'); ?>
									</div>
								</div>

								<div class="box-footer">
									<input type="submit" class="btn btn-success" value="Update">
								</div>
							</form>

						<?php } ?>

					</div>
				</div>

			</div>
		</div>

	</section>

</div>