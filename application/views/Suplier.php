  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
       <!-- Main content -->
    <section class="content">
      <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Suplier</h3>
            </div>
            <!-- /.box-header -->

            <div class="box-body">
              <div class="box-body"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default"><i class="fa fa-edit"></i> Tambah</button></div>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Nama</th>
                  <th>No Telp</th>
                  <th>Alamat</th>
                  <th>AKSI</th>
                </tr>
                </thead>
                <tbody>
                  <?php foreach ($suplier as $spl) {?>
                <tr>
                  <td><?php echo $spl->id; ?></td>
                  <td><?php echo $spl->nama; ?></td>
                  <td><?php echo $spl->nope; ?></td>
                  <td><?php echo $spl->alamat; ?></td>
                  <td><button type="button" class="btn btn-primary ubah_dataSuplier" data-toggle="modal" data-target="#modalUbahsplin" data-id="<?php echo $spl->id; ?>" data-nama="<?php echo $spl->nama; ?>" data-nope="<?php echo $spl->nope; ?>" data-alamat="<?php echo $spl->alamat; ?>"><i class="fa fa-edit"></i> Ubah </button> <a onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?')" href="<?php echo base_url().'Suplier/Hapus_suplier/'.$spl->id; ?>"><button class="btn btn-danger"><i class="fa fa-trash"></i> HAPUS</button></a></td>
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
    <?php echo form_open_multipart('Suplier/SuplierSimpan'); ?>
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Data Suplier</h4>
              </div>
              <div class="modal-body">
                 <div class="box box-warning">
                      <!-- /.box-header -->
                      <div class="box-body">
                        <div role="form">
                          
                          <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" placeholder="Nama" name="nama" id="nama">
                          </div>
                          <div class="form-group">
                            <label>No Telp</label>
                            <input type="text" class="form-control" placeholder="nope" name="nope" id="nope">
                          </div>
                          
                          <div class="form-group">
                            <label>Alamat</label>
                            <textarea class="form-control" rows="3" placeholder="Alamat" id="alamat" name="alamat"></textarea>
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

<div class="modal fade" id="modalUbahsplin">
    <?php echo form_open_multipart('Suplier/suplierUbah'); ?>
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Ubah Data suplier</h4>
              </div>
              <div class="modal-body">
                 <div class="box box-warning">
                      <!-- /.box-header -->
                      <div class="box-body">
                        <input type="hidden" id="id" name="id" class="id">
                        <div role="form">
                          <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control nama" placeholder="Nama" name="nama" id="nama">
                          </div>
                          <div class="form-group">
                            <label>No Telp</label>
                            <input type="text" class="form-control nope" placeholder="nope" name="nope" id="nope">
                          </div>
                          
                          <div class="form-group">
                            <label>Alamat</label>
                            <textarea class="form-control alamat" rows="3" placeholder="Alamat" id="alamat" name="alamat"></textarea>
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