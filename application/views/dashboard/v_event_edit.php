<div class="content-wrapper">
	<section class="content-header">
		<h1>
			Teachers
			<small>Edit Data Guru</small>
		</h1>
	</section>
	<section class="content">

		<a href="<?php echo base_url().'dashboard/event'; ?>" class="btn btn-sm btn-primary">Kembali</a>

		<br/>
		<br/>

		<?php foreach($event as $a){ ?>

		<form method="post" action="<?php echo base_url('dashboard/event_update') ?>" enctype="multipart/form-data">
			<div class="row">
				<div class="col-lg-9">

					<div class="box box-primary">
						<div class="box-body">


							<div class="box-body">
								<div class="form-group">
									<label>Nama Guru</label>
									<input type="hidden" name="id" value="<?php echo $a->event_id; ?>">
									<input type="text" name="judul" class="form-control" placeholder="Masukkan judul event.." value="<?php echo $a->event_judul; ?>">
									<br/>
									<?php echo form_error('judul'); ?>
								</div>
							</div>

							<div class="box-body">
								<div class="form-group">
									<label>Profil Singkat</label>
									<?php echo form_error('konten'); ?>
									<br/>
									<textarea class="form-control" id="editor" name="konten"> <?php echo $a->event_konten; ?> </textarea>
								</div>
							</div>


						</div>
					</div>

				</div>

				<div class="col-lg-3">
					<div class="box box-primary">
						<div class="box-body">
							<div class="form-group">
								<label>Kategori</label>
								<select class="form-control" name="kategori">
									<option value="">- Pilih Kategori</option>
									<?php foreach($kategori as $k){ ?>
										<option <?php if($a->event_kategori == $k->kategori_id){echo "selected='selected'";} ?> value="<?php echo $k->kategori_id ?>"><?php echo $k->kategori_nama; ?></option>
									<?php } ?>
								</select>
								<br/>
								<?php echo form_error('kategori'); ?>
							</div>

						<div class="form-group">
							<label>Alamat Link</label>
								<input type="text" name="link" class="form-control" placeholder="Masukkan alamat link video" value="<?php echo $a->event_link?>">
							<?php echo form_error('link'); ?>
						</div>

							<br/>

							<div class="form-group">
								<label>Gambar Sampul</label>

								<input type="file" name="sampul">

								<br/>
								<?php 
								if(isset($gambar_error)){
									echo $gambar_error;
								}
								?>
								<?php echo form_error('sampul'); ?>
							</div>

							<br/><br/>

							<input type="submit" name="status" value="Draft" class="btn btn-warning btn-block">
							<input type="submit" name="status" value="Publish" class="btn btn-success btn-block">

						</div>
					</div>

				</div>
			</div>
		</form>
		<?php } ?>

	</section>

</div>