  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
       <!-- Main content -->
    <section class="content">
      <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data User</h3>
            </div>
            <!-- /.box-header -->

            <div class="box-body">
              <div class="box-body"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default"><i class="fa fa-edit"></i> Tambah</button></div>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>NIK</th>
                  <th>Nama</th>
                  <th>jabatan</th>
                  <th>Password</th>
                  <th>AKSI</th>
                </tr>
                </thead>
                <tbody>
                  <?php foreach ($user as $usr) {?>
                <tr>
                  <td><?php echo $usr->nik; ?></td>
                  <td><?php echo $usr->nama; ?></td>
                  <td><?php echo $usr->jabatan; ?></td>
                  <td><?php echo $usr->password; ?></td>
                  <td><button type="button" class="btn btn-primary ubah_dataUser" data-toggle="modal" data-target="#modalUbahusrin" data-nik="<?php echo $usr->nik; ?>" data-nama="<?php echo $usr->nama; ?>" data-jabatan="<?php echo $usr->jabatan; ?>" data-password="<?php echo $usr->password; ?>"><i class="fa fa-edit"></i> Ubah </button> <a onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?')" href="<?php echo base_url().'Admin/Hapus_User/'.$usr->nik; ?>"><button class="btn btn-danger"><i class="fa fa-trash"></i> HAPUS</button></a></td>
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
    <?php echo form_open_multipart('Admin/UserSimpan'); ?>
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Data User</h4>
              </div>
              <div class="modal-body">
                 <div class="box box-warning">
                      <!-- /.box-header -->
                      <div class="box-body">
                        <div role="form">
                          <div class="form-group">
                            <label>NIK</label>
                            <input type="text" class="form-control" placeholder="NIK" name="nik" id="nik">
                          </div>
                          <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" placeholder="Nama" name="nama" id="nama">
                          </div>
                          <div class="form-group">
                            <label>Jabatan</label>
                            <select class="form-control" name="jabatan" id="jabatan">
                              <option value="ADMIN">ADMIN</option>
                              <option value="PEMILIK">PEMILIK</option>
                            </select>
                          </div>
                          
                          <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" placeholder="Password" name="password" id="password">
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

<div class="modal fade" id="modalUbahusrin">
    <?php echo form_open_multipart('Admin/UserUbah'); ?>
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Ubah Data User</h4>
              </div>
              <div class="modal-body">
                 <div class="box box-warning">
                      <!-- /.box-header -->
                      <div class="box-body">
                        <input type="hidden" id="nik" name="nik" class="nik">
                        <div role="form">
                          <div class="form-group">
                            <label>NIK</label>
                            <input type="text" class="form-control nik" placeholder="NIK" name="nik" id="nik">
                          </div>
                          <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control nama" placeholder="Nama" name="nama" id="nama">
                          </div>
                          <div class="form-group">
                            <label>Jabatan</label>
                            <select class="form-control jabatan" name="jabatan" id="jabatan">
                              <option value="ADMIN">ADMIN</option>
                              <option value="PEMILIK">PEMILIK</option>
                            </select>
                          </div>
                          <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control password" placeholder="Password" name="password" id="password">
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