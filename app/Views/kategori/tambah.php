      <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Tambah Produk</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="<?= base_url('kategori/save'); ?>" method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label>Nama Kategori</label>
                    <input name="nama_kategori" class="form-control" placeholder="Nama Produk" required="">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
              </form>
            </div>
          </div>
            <!-- /.card -->