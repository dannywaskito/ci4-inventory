<div class="col-sm-12">
	<button class="btn btn-outline-primary" data-toggle="modal" data-target="#myModal">Tambah Kategori</button>
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
				<th>Nama Kategori</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php $no=1; foreach ($kategori as $key => $value) {?>

			<tr>
			<td align="center"><?= $no++; ?></td>
			<td><?= $value['nama_kategori']; ?></td>
			<td align="center">
				<button class="btn btn-warning" data-toggle="modal" data-target="#edit<?= $value['id_kategori']; ?>">Edit</button>
				<a href="<?= base_url('kategori/delete/'. $value['id_kategori']) ?>" class="btn btn-danger btn-hps">Delete</a>
			</td>
			</tr>
		<?php } ?>
		</tbody>
	</table>
	<!-- Modal Tambah kategori -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
              <div class="modal-body">
                <?= form_open(base_url('kategori/save')); ?>
                <?=csrf_field(); ?>
               <div class="form-group">
                    <label>Nama Kategori</label>
                    <input name="nama_kategori" class="form-control" placeholder="Nama Kategori" required="">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Simpan</button>
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                </div>
             <?= form_close(); ?>
          </div>                                    <!-- /.modal-content -->
      </div>    
      </div>                                 <!-- /.modal-dialog -->
  </div>
<!-- Modal Edit kategori -->
<?php $no=1;
foreach ($kategori as $key => $value) {?>
<div class="modal fade" id="edit<?=$value['id_kategori']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Kategori</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
              <div class="modal-body">
                <?= form_open('kategori/edit/' .$value['id_kategori']); ?>
                <?=csrf_field(); ?>
               <div class="form-group">
                    <label>Nama Kategori</label>
                    <input name="nama_kategori" value="<?= $value['nama_kategori']?>" class="form-control" placeholder="Nama Produk" required="" >
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Edit</button>
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                </div>
             <?= form_close(); ?>
          </div>
                                            <!-- /.modal-content --                                   /.modal-dialog -->
  </div>
</div>
<?php } ?>