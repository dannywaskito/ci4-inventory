<div class="col-sm-12">
	<button class="btn btn-outline-primary" data-toggle="modal" data-target="#myModal">Tambah Stok</button>
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
				<th>Jumlah Barang</th>
				<th>Tanggal Update</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php $no=1; foreach ($stok as $key => $data) {?>

			<tr>
			<td align="center"><?= $no++; ?></td>
			<td><?= $data['nama_produk']; ?></td>
			<td><?= $data['jumlah_barang']; ?></td>
      <td><?= date('d F Y', strtotime($data['tgl_update'])); ?></td>
			<td align="center">
				<button class="btn btn-warning" data-toggle="modal" data-target="#edit<?= $data['id_stok']; ?>">Edit</button>
				<a href="<?= base_url('stok/delete/'. $data['id_stok']) ?>" class="btn btn-danger btn-hps">Delete</a>
			</td>
			</tr>
		<?php } ?>
		</tbody>
	</table>
	<!-- Modal Tambah Stok Produk -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Stok</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
              <div class="modal-body">
                <?= form_open(base_url('stok/save')); ?>
                <?=csrf_field(); ?>
                     <div class="form-group">
                    <label>Nama Produk</label>
                <select name="id_produk" class="form-control">
                  <option value="">-Pilih produk-</option>
                  <?php foreach ($produk as $key => $value) { ?>
                    <option value="<?=$value['id_produk'] ?>"><?=$value['nama_produk'] ?></option>
                  <?php } ?>
                </select>
                  </div>
                   <div class="form-group">
                    <label>Jumlah Barang</label>
                    <input name="jumlah_barang" type="number" class="form-control" placeholder="Jumlah Barang" required="">
                  </div>
                            <div class="form-group">
                    <label>Tanggal Update</label>
                    <input name="tgl_update" type="date" class="form-control" required="">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Simpan</button>
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                </div>
             <?= form_close(); ?>
          </div>   
          </div>                                 <!-- /.modal-content -->
      </div>                                     <!-- /.modal-dialog -->
  </div>
<!-- Modal Edit Stok Produk -->
<?php
foreach ($stok as $key => $data) {?>
<div class="modal fade" id="edit<?=$data['id_stok']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Stok Produk</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
              <div class="modal-body">
                <?= form_open('stok/edit/' .$data['id_stok']); ?>
                <?=csrf_field(); ?>
                <div class="form-group">
                    <label>Nama Produk</label>
                <select name="id_produk" class="form-control" required="">
                  <option value="<?=$data['id_produk'] ?>"><?=$data['nama_produk'] ?></option>
                  <?php foreach ($produk as $key => $value) { ?>
                    <option value="<?=$value['id_produk'] ?>"><?=$value['nama_produk'] ?></option>
                  <?php } ?>
                </select>
                  </div>
                   <div class="form-group">
                    <label>Jumlah Barang</label>
                    <input name="jumlah_barang" value="<?= $data['jumlah_barang']?>" class="form-control" placeholder="Jumlah Barang" required="">
                  </div>
                        <div class="form-group">
                    <label>Tanggal Update</label>
                    <input type="date" value="<?= $data['tgl_update']?>" name="tgl_update"class="form-control" required="">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Edit</button>
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                </div>
             <?= form_close(); ?>
          </div>
                                            <!-- /.modal-content -->
      </div>
                                        <!-- /.modal-dialog -->
</div>
<?php } ?>