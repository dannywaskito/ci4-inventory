<div class="col-sm-12">
<a href="<?= base_url('produk/tambah') ?>" class="btn btn-outline-primary">Tambah Produk</a>
   <a href="<?=base_url('produk/pdf') ?>" target="_blank" class="btn btn-outline-danger"><i class="fa fa-file-pdf"></i> Print PDF</a>
  <a href="<?=base_url('produk/excel') ?>" class="btn btn-outline-success"><i class="fa fa-file-excel"></i> Print Excel</a>
	<table id="example1" class="table table-bordered table-striped">
		<br><br>
	<!-- 	<?php 
				if (!empty(session()->getFlashdata('message'))) {?>
					<div class="alert alert-success">
						<?= session()->getFlashdata('message'); ?>
					</div>
				<?php }?> -->
		<div class="swal" data-swal="<?= session()->get('message'); ?>"></div>
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Produk</th>
				<th>Kategori</th>
				<th>Kode Produk</th>
				<th>Foto Produk</th>
				<th>Tanggal Register</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php $no=1; foreach ($produk as $key => $value) {?>

			<tr>
			<td align="center"><?= $no++; ?></td>
			<td><?= $value['nama_produk']; ?></td>
			<td><?= $value['nama_kategori']; ?></td>
			<td><?= $value['kode_produk']; ?></td>
			<td><img src="<?=base_url('foto_produk/'.$value['foto_produk']); ?>" width="100px" height="100px"></td>
			<td><?= date('d F Y', strtotime($value['tgl_register'])); ?></td>
			<td align="center">
			 <a href="<?= base_url('produk/edit/'. $value['id_produk']) ?>" class="btn btn-warning">Edit</a>
				<a href="<?= base_url('produk/delete/'. $value['id_produk']) ?>" class="btn btn-danger btn-hps">Delete</a>
			</td>
			</tr>
		<?php } ?>
		</tbody>
	</table>                                
</div>
