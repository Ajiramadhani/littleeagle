<div class="content-wrapper">
	<section class="content-header">
		<h1>
			Paket
			<small>Daftar Paket</small>
		</h1>
	</section>

	<section class="content">

		<div class="row">
			<div class="col-lg-9">
				
				<a href="<?php echo base_url().'dashboard/paket_tambah'; ?>" class="btn btn-sm btn-primary">Input Paket Baru</a>

				<br/>
				<br/>

				<div class="box box-primary">
					<div class="box-header">
						<h3 class="box-title">Paket</h3>
					</div>
					<div class="box-body">
						<table class="table table-bordered">
							<thead>
								<tr>
									<th width="1%">NO</th>
									<th>Nama Paket</th>
									<th>Foto Paket</th>
									<th width="10%">OPSI</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$no = 1;
								foreach($paket as $k){ 
									?>
									<tr>
										<td><?php echo $no++; ?></td>
										<td><?php echo $k->paket_nama; ?></td>
										<td><img width="150px" class="img-responsive" src="<?php echo base_url().'/gambar/profil/'.$k->foto; ?>"></td>
										<td>
											<a href="<?php echo base_url().'dashboard/paket_edit/'.$k->paket_id; ?>" class="btn btn-warning btn-sm"> <i class="fa fa-pencil"></i> </a>
											<a href="<?php echo base_url().'dashboard/paket_hapus/'.$k->paket_id; ?>" class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i> </a>
										</td>
									</tr>
								<?php } ?>
							</tbody>
						</table>
						

					</div>
				</div>

			</div>
		</div>

	</section>

</div>