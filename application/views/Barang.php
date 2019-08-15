  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
       <!-- Main content -->
    <section class="content">
      <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data barang</h3>
            </div>
            <!-- /.box-header -->

            <div class="box-body">
              <div class="box-body"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default"><i class="fa fa-edit"></i> Tambah</button></div>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Nama Barang</th>
                  <th>Harga Beli (Rp)</th>
                  <th>Harga Jual (Rp)</th>
                  <th>Stok</th>
                  <th>AKSI</th>
                </tr>
                </thead>
                <tbody>
                  <?php foreach ($barang as $brg) {?>
                <tr>
                  <td><?php echo $brg->kode; ?></td>
                  <td><?php echo $brg->nama_barang; ?></td>
                  <td class="rupiah"><?php echo number_format($brg->harga_beli,0,',','.'); ?></td>
                  <td><?php echo number_format($brg->harga_jual,0,',','.') ; ?></td>
                  <td><?php echo $brg->stok; ?></td>
                  <td><button type="button" class="btn btn-primary ubah_databarang" data-toggle="modal" data-target="#modalUbahbrgin" data-kode="<?php echo $brg->kode; ?>" data-nama_barang="<?php echo $brg->nama_barang; ?>" data-harga_jual="<?php echo number_format($brg->harga_jual,0,',',','); ?>" data-harga_beli="<?php echo number_format($brg->harga_beli,0,',',','); ?>"><i class="fa fa-edit"></i> Ubah </button> <a onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?')" href="<?php echo base_url().'barang/Hapus_barang/'.$brg->kode; ?>"><button class="btn btn-danger"><i class="fa fa-trash"></i> HAPUS</button></a></td>
                </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->


    </section>
    <!-- /.content -->
  </div>
  
  <div class="modal fade" id="modal-default">
    <?php echo form_open_multipart('barang/barangSimpan'); ?>
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Data Barang</h4>
              </div>
              <div class="modal-body">
                 <div class="box box-warning">
                      <!-- /.box-header -->
                      <div class="box-body">
                        <div role="form">
                          <div class="form-group">
                            <label>Kode</label>
                            <input type="text" class="form-control" placeholder="Kode" name="kode" id="kode">
                          </div>

                          <div class="form-group">
                            <label>Nama Barang</label>
                            <input type="text" class="form-control" placeholder="Nama" name="nama_barang" id="nama_barang">
                          </div>
                          <div class="form-group">
                            <label>Harga Beli</label>
                            <input type="text" class="form-control" onkeyup="reformatText(this)"placeholder="Harga Beli" name="harga_beli" id="harga_beli">
                          </div>
                          <div class="form-group">
                            <label>Harga Jual</label>
                            <input type="text" class="form-control" placeholder="Harga Jual" onkeyup="reformatText(this)" name="harga_jual" id="harga_jual">
                          </div>
                        </div>
                      </div>
                  </div>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
          <?php echo form_close();?>
        </div>

<div class="modal fade" id="modalUbahbrgin">
    <?php echo form_open_multipart('Barang/BarangUbah'); ?>
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Ubah Data barang</h4>
              </div>
              <div class="modal-body">
                 <div class="box box-warning">
                      <!-- /.box-header -->
                      <div class="box-body">
                        <input type="hidden"  id="kode" name="kode" class="kode">
                        <div role="form">
                          <div class="form-group">
                            <label>Nama Barang</label>
                            <input type="text" class="form-control nama_barang " placeholder="Nama" name="nama_barang" id="nama_barang">
                          </div>
                          <div class="form-group">
                            <label>Harga Beli</label>
                            <input type="text" class="form-control harga_beli" onkeyup="reformatText(this)"placeholder="Harga Beli" name="harga_beli" id="harga_beli">
                          </div>
                          <div class="form-group">
                            <label>Harga Jual</label>
                            <input type="text" class="form-control harga_jual" placeholder="Harga Jual" onkeyup="reformatText(this)" name="harga_jual" id="harga_jual">
                          </div>
                        </div>
                      </div>
                  </div>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
          <?php echo form_close();?>
        </div>
