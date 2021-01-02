      <!-- left column -->
          <div class="col-md-8">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Produk</h3>
              </div>
                   <!-- Sukses -->
          <?php if (!empty(session()->getFlashdata('success'))) {?>
          <div class="alert alert-success">
           <?php 
              echo session()->getFlashdata('success');
           ?>
          </div>
        <?php }?> 
        <!-- Gagal -->
  
              <!-- /.card-header -->
              <!-- form start -->
              <?php echo form_open_multipart('produk/update/' . $produk['id_produk']); ?>
              <?=csrf_field(); ?>
                <div class="card-body">
                  <div class="form-group">
                    <label>Nama Produk</label>
                    <input name="nama_produk" class="form-control" placeholder="Nama Produk" required="" value="<?= $produk['nama_produk'] ?>">
                  </div>
                      <div class="form-group">
                    <label>Kode Produk</label>
                    <input name="kode_produk" class="form-control" placeholder="Nama Produk" required="" value="<?= $produk['kode_produk'] ?>">
                  </div>
                     <div class="form-group">
                    <label>Kategori</label>
                <select name="id_kategori" class="form-control" readonly>
                  <option value="<?= $produk['id_kategori'] ?>"><?= $produk['nama_kategori'] ?></option>
                  <?php foreach ($kategori as $key => $value) { ?>
                    <option value="<?=$value['id_kategori'] ?>"><?=$value['nama_kategori'] ?></option>
                  <?php } ?>
                </select>
                  </div>
                  <label>Foto Produk</label>
                    <div class="row">
                        <div class="col-sm-8">

                            <img src="<?= base_url('foto_produk/' . $produk['foto_produk']) ?>" width="200px" id="gambar_load">
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group row">
                                <label>Ganti Foto</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control" name="foto_produk" id="preview_gambar">
                                </div>
                            </div>
                        <div class="form-group">
                    <label>Tanggal Register</label>
                    <input type="date" name="tgl_register" class="form-control"  required="" value="<?= $produk['tgl_register'] ?>">
                  </div>
                   <button type="submit" class="btn btn-primary">Update</button>
                </div>
                <!-- /.card-body -->
                 
              <?= form_close(); ?>
            </div>
          </div>
        </div>
      </div>
            <!-- /.card -->