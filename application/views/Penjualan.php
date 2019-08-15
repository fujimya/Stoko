  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
       <!-- Main content -->
    <section class="content">
      <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Barang Keluar</h3>
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
                  <th>Harga jual (Rp)</th>
                  <th>Harga Diskon (Rp)</th>                  
                  <th>AKSI</th>
                </tr>
                </thead>
                <tbody>
                  <?php $jual = 0; $diskon = 0; foreach ($keranjang_jual as $krj) { $jual += $krj->harga; $diskon += $krj->diskon;?>
                <tr>
                  <td><?php echo $krj->kode; ?></td>
                  <td><?php echo $krj->nama_barang; ?></td>
                  <td><?php echo $krj->jumlah; ?></td>
                  <td><?php echo $krj->satuan; ?></td>
                  <td class="rupiah"><?php echo number_format($krj->harga,0,',','.'); ?></td>
                  <td><?php echo number_format($krj->diskon,0,',','.') ; ?></td>
                  
                  <td><a onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?')" href="<?php echo base_url().'penjualan/Hapus_keranjang_jual/'.$krj->id; ?>"><button class="btn btn-danger"><i class="fa fa-trash"></i> HAPUS</button></a></td>
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
                  <td>: Rp <?php echo number_format($jual,0,',','.'); ?></td>
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
    <?php echo form_open_multipart('penjualan/keranjang_jualSimpan'); ?>
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Data keranjang_jual</h4>
              </div>
              <div class="modal-body">
                 <div class="box box-warning">
                      <!-- /.box-header -->
                      <div class="box-body">
                        <div role="form">
                          <div class="form-group">
                            <label>Barang</label>
                            <select name="kode" id="kode" class="form-control select2 selec2" style="width: 100%;">
                              <option selected="selected">Pilih Barang</option>
                              <?php foreach ($barang as $brg) {?>
                              <option value="<?php echo $brg->kode; ?>" data-harga = "<?php echo $brg->harga_jual; ?>" ><?php echo $brg->nama_barang; ?></option>
                              <?php }?>
                            </select>
                          </div>

                        
                          <div class="form-group">
                            <label>Jumlah jual</label>
                            <input type="number" class="form-control" placeholder="Jumlah jual" name="jumlah_jual" id="jumlah_jual">
                          </div>

                          <div class="form-group">
                            <label>Harga jual</label>
                            <input type="text" class="form-control" onkeyup="reformatText(this)"placeholder="Harga jual" name="harga_jual" id="harga_jual">
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
    <?php echo form_open_multipart('penjualan/jualSimpan'); ?>
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Checkout Data keranjang_jual</h4>
              </div>
              <div class="modal-body">
                 <div class="box box-warning">
                      <!-- /.box-header -->
                      <div class="box-body">
                        <div role="form">
                          <input type="hidden" name="total" id="total" value="<?php echo $jual; ?>" >
                          <input type="hidden" name="diskon" id="diskon" value="<?php echo $diskon; ?>" >
                          <div class="form-group">
                            <label>customer</label>
                            <select name="customer" id="customer" class="form-control select2" style="width: 100%;">
                              <option selected="selected">Pilih customer</option>
                              <?php foreach ($customer as $spl) {?>
                              <option value="<?php echo $spl->id; ?>"><?php echo $spl->nama; ?></option>
                              <?php }?>
                            </select>
                          </div>

                          <div class="form-group">
                            <label>Faktur jual</label>
                            <input value="<?php echo(date("Ymd").chr(rand(65,90)).rand(100,10000).chr(rand(65,90)).chr(rand(65,90))) ?>" type="text" class="form-control" placeholder="Faktur jual" name="faktur" id="faktur">
                          </div>

                          <div class="form-group">
                            <label>Total jual (Rp)</label>
                            <input type="text" value="<?php echo $jual; ?>" class="form-control" placeholder="Total jual"  disabled>
                          </div>

                          <div class="form-group">
                            <label>Total Diskon (Rp)</label>
                            <input type="text" value="<?php echo $diskon; ?>" class="form-control" placeholder="Total jual"  disabled>
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