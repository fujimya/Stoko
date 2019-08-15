  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
       <!-- Main content -->
    <section class="content">
      <div style="text-align: center;">
        <h1>LAPORAN DATA STOK BARANG</h1>
        <hr style="background-color: #000; height: 4px; width: 70% ">
      </div>
      <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data barang</h3>
            </div>
            <!-- /.box-header -->

            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Nama Barang</th>
                  <th>Harga Beli (Rp)</th>
                  <th>Harga Jual (Rp)</th>
                  <th>Stok</th>
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
                </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <div class="box-body" style="text-align: right;">
            <a target="_blank" href="<?php echo base_url();?>Laporan/cetak"><button type="button" class="btn btn-primary"><i class="fa fa-print"></i> Cetak Laporan</button></a>
          </div>
    </section>
    <!-- /.content -->
  </div>
  
