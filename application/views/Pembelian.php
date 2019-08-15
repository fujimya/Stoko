  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
       <!-- Main content -->
    <section class="content">
      <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Barang Masuk</h3>
            </div>
            <!-- /.box-header -->

            <div class="box-body">
              <div class="box-body"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default"><i class="fa fa-plus"></i> Tambah</button></div>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Kode Barang</th>
                  <th>Nama Barang</th>
                  <th>Jumlah</th>
                  <th>Satuan</th>
                  <th>Harga Beli (Rp)</th>
                  <th>Harga Diskon (Rp)</th>                  
                  <th>AKSI</th>
                </tr>
                </thead>
                <tbody>
                  <?php $beli = 0; $diskon = 0; foreach ($keranjang as $krj) { $beli += $krj->harga; $diskon += $krj->diskon;?>
                <tr>
                  <td><?php echo $krj->kode; ?></td>
                  <td><?php echo $krj->nama_barang; ?></td>
                  <td><?php echo $krj->jumlah; ?></td>
                  <td><?php echo $krj->satuan; ?></td>
                  <td class="rupiah"><?php echo number_format($krj->harga,0,',','.'); ?></td>
                  <td><?php echo number_format($krj->diskon,0,',','.') ; ?></td>
                  
                  <td><a onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?')" href="<?php echo base_url().'Pembelian/Hapus_keranjang/'.$krj->id; ?>"><button class="btn btn-danger"><i class="fa fa-trash"></i> HAPUS</button></a></td>
                </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
            <hr>
            <div align="right">
              <table width="10%">
                <tr>
                  <td>Total</td>
                  <td>: Rp <?php echo number_format($beli,0,',','.'); ?></td>
                </tr>
                <tr>
                  <td>Diskon</td>
                  <td>: Rp <?php echo number_format($diskon,0,',','.'); ?></td>
                </tr>
              </table>

            </div>
            <hr>
            <!-- /.box-body -->
            <div class="box-body" style="text-align: right;"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-Checkout"><i class="fa fa-shopping-cart"></i>  Checkout</button></div>
          </div>
          <!-- /.box -->


    </section>
    <!-- /.content -->
  </div>
  
  <div class="modal fade" id="modal-default">
    <?php echo form_open_multipart('Pembelian/keranjangSimpan'); ?>
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Data keranjang</h4>
              </div>
              <div class="modal-body">
                 <div class="box box-warning">
                      <!-- /.box-header -->
                      <div class="box-body">
                        <div role="form">
                          <div class="form-group">
                            <label>Barang</label>
                            <select name="kode" id="kode" class="form-control select2" style="width: 100%;">
                              <option selected="selected">Pilih Barang</option>
                              <?php foreach ($barang as $brg) {?>
                              <option value="<?php echo $brg->kode; ?>"><?php echo $brg->nama_barang; ?></option>
                              <?php }?>
                            </select>
                          </div>

                          <div class="form-group">
                            <label>Jumlah Beli</label>
                            <input type="number" class="form-control" placeholder="Jumlah Beli" name="jumlah_beli" id="jumlah_beli">
                          </div>

                          <div class="form-group">
                            <label>Harga Beli</label>
                            <input type="text" class="form-control" onkeyup="reformatText(this)"placeholder="Harga Beli" name="harga_beli" id="harga_beli">
                          </div>

                          <div class="form-group">
                            <label>Satuan</label>
                            <input type="text" class="form-control" placeholder="Satuan" name="satuan" id="satuan">
                          </div>

                          <div class="form-group">
                            <label>Diskon</label>
                            <input type="text" class="form-control" placeholder="Diskon" onkeyup="reformatText(this)" name="diskon" id="diskon">
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

        <div class="modal fade" id="modal-Checkout">
    <?php echo form_open_multipart('Pembelian/BeliSimpan'); ?>
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Checkout Data keranjang</h4>
              </div>
              <div class="modal-body">
                 <div class="box box-warning">
                      <!-- /.box-header -->
                      <div class="box-body">
                        <div role="form">
                          <input type="hidden" name="total" id="total" value="<?php echo $beli; ?>" >
                          <input type="hidden" name="diskon" id="diskon" value="<?php echo $diskon; ?>" >
                          <div class="form-group">
                            <label>Suplier</label>
                            <select name="suplier" id="suplier" class="form-control select2" style="width: 100%;">
                              <option selected="selected">Pilih Suplier</option>
                              <?php foreach ($suplier as $spl) {?>
                              <option value="<?php echo $spl->id; ?>"><?php echo $spl->nama; ?></option>
                              <?php }?>
                            </select>
                          </div>

                          <div class="form-group">
                            <label>Faktur Beli</label>
                            <input type="text" class="form-control" placeholder="Faktur Beli" name="faktur" id="faktur">
                          </div>

                          <div class="form-group">
                            <label>Total Beli (Rp)</label>
                            <input type="text" value="<?php echo $beli; ?>" class="form-control" placeholder="Total Beli"  disabled>
                          </div>

                          <div class="form-group">
                            <label>Total Diskon (Rp)</label>
                            <input type="text" value="<?php echo $diskon; ?>" class="form-control" placeholder="Total Beli"  disabled>
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