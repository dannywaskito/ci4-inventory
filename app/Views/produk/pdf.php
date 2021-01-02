<table id="example1" class="table table-bordered table-striped">
<div class="text-center">
	<h1>Data Produk</h1>
</div>
		<br><br>
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Produk</th>
				<th>Kategori</th>
				<th>Kode Produk</th>
				<th>Foto Produk</th>
				<th>Tanggal Register</th>
			</tr>
		</thead>
		<tbody>
			<?php $no=1; foreach ($produk as $key => $value) {?>

			<tr>
			<td><?= $no++; ?></td>
			<td><?= $value['nama_produk']; ?></td>
			<td><?= $value['nama_kategori']; ?></td>
			<td><?= $value['kode_produk']; ?></td>
			<td><img src="<?=base_url('foto_produk/'.$value['foto_produk']); ?>" class="img-circle" width="70px" height="70px"></td>
			<td><?= date('d F Y', strtotime($value['tgl_register'])); ?></td>
			</tr>
		<?php } ?>
		</tbody>
	</table>             