      <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Tambah Produk</h3>
              </div>
            <!-- Validasi -->
             <?php 
      $errors = session()->getFlashdata('errors'); 

      if (!empty($errors)) { ?>
                <br>
       <div class="alert alert-danger" role="alert">
        <ul>
      <?php foreach ($errors as $error) : ?>
        <li><?= esc($error) ?></li>
      <?php endforeach ?>
    </ul>
  </div>
     <?php }?>
  
              <!-- /.card-header -->
              <!-- form start -->
              <?= form_open_multipart(base_url('produk/save')); ?>
              <?=csrf_field(); ?>
                <div class="card-body">
                  <div class="form-group">
                    <label>Nama Produk</label>
                    <input name="nama_produk" class="form-control" placeholder="Nama Produk">
                  </div>
                     <div class="form-group">
                    <label>Kategori</label>
                <select name="id_kategori" class="form-control">
                   <option value="">= Pilih Kategori =</option>
                  <?php foreach ($kategori as $key => $value) { ?>
                    <option value="<?=$value['id_kategori'] ?>"><?=$value['nama_kategori'] ?></option>
                  <?php } ?>
                </select>
                  </div>
                   <div class="form-group">
                    <label>Kode Produk</label>
                    <input name="kode_produk" class="form-control" placeholder="Nama Produk">
                  </div>
                           <label>Foto Produk</label>
                    <div class="row">
                        <div class="col-sm-8">

                            <img src="<?= base_url('foto_produk/default.jpg') ?>" id="gambar_load" width="200px">
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group row">
                                <label>Pilih Foto</label>
                                <div class="col-sm-12">
                                    <input type="file" class="form-control" name="foto_produk" id="preview_gambar">
                                </div>
                            </div>
                        <div class="form-group">
                    <label>Tanggal Register</label>
                    <input type="date" name="tgl_register" class="form-control" placeholder="Nama Produk">
                  </div>
                  <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                <!-- /.card-body -->
              <?= form_close(); ?>
            </div>
          </div>
        </div>
      </div>
            <!-- /.card -->