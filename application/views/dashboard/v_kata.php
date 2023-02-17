<div class="content-wrapper">
<section class="content-header">
		<h1>
			Upload Video
			<small>Copy link video dari youtube anda, dengan cara klik bagikan -> klik sematkan -> lalu ambil link di a href="..."</small>
		</h1>
	</section>

	<section class="content">

		<div class="row">
			<div class="col-lg-9">
				
				<a href="<?php echo base_url().'dashboard/kata_tambah'; ?>" class="btn btn-sm btn-primary">Buat Kata baru</a>

				<br/>
				<br/>

				<div class="box box-primary">
					<div class="box-header">
						<h3 class="box-title">Form Upload Video</h3>
					</div>
					<div class="box-body">
						<table class="table table-bordered">
							<thead>
								<tr>
									<th width="1%">NO</th>
									<th>Narasi Video</th>
									<th>Link</th>
									<th>Width</th>
									<th>Height</th>
									<th width="10%">OPSI</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$no = 1;
								foreach($kata as $k){ 
									?>
									<tr>
										<td><?php echo $no++; ?></td>
										<td><?php echo $k->kata_nama; ?></td>
										<td><?php echo $k->kata_slug; ?></td>
										<td><?php echo $k->kata_width; ?></td>
										<td><?php echo $k->kata_height; ?></td>
										<td>
											<a href="<?php echo base_url().'dashboard/kata_edit/'.$k->kata_id; ?>" class="btn btn-warning btn-sm"> <i class="fa fa-pencil"></i> </a>
											<a href="<?php echo base_url().'dashboard/kata_hapus/'.$k->kata_id; ?>" class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i> </a>
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