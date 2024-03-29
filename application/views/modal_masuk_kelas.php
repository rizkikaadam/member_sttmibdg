<!-- #helpModal -->
<div id="tambah" class="modal fade">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Tambah Materi/Tugas</h4>
        </div>
        <div class="modal-body">
            <p>
            <?php
                foreach ($kelas->result() as $data_kelas) {
                      $id_kelas=$data_kelas->id_kelas;
                      $nama_kelas=$data_kelas->nama_kelas;
                      $deskripsi=$data_kelas->deskripsi;
                      $dosen=$data_kelas->dosen_nama;
                      $waktu=$data_kelas->waktu;
                }// akhir menampilkan data kelas
            ?>
              <form class="form-horizontal" method="post" action="<?= base_url() ?>kelas/tambahfile_kelas/" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Judul</label>

                    <div class="col-lg-8">
                        <input type="text" id="text1" placeholder="Judul Tugas/Materi"  name="nama" class="form-control">
                    </div>
                </div>
                <!-- /.form-group -->

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Deskripsi</label>

                    <div class="col-lg-8">
                        <textarea class="form-control" name="deskripsi"></textarea>
                    </div>
                </div>
                <!-- /.form-group -->

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Jenis</label>

                    <div class="col-lg-8">
                        <select class="form-control" name="jenis" required="required">
                            <option value="materi">Materi</option>
                            <option value="tugas">Tugas</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                      <label for="text1" class="control-label col-lg-4">File</label>

                      <div class="col-lg-8">
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="input-group">
                        <div class="form-control uneditable-input span3" data-trigger="fileinput"><i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
                        <span class="input-group-addon btn btn-default btn-file"><span class="fileinput-new">Select file</span><span class="fileinput-exists">Change</span><input type="file" name="file_unduh"></span>
                        <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                            </div>
                          </div>
                      </div>
                  </div>

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4"></label>

                    <div class="col-lg-8">
                        <input type="hidden" id="text1" placeholder="id_kelas"  name="id_kelas" class="form-control" value="<?php echo "$id_kelas" ?>">
                    </div>
                </div>
                <!-- /.form-group -->

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4"></label>

                    <div class="col-lg-8">
                        <button type="submit" name="btn simpan" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
                <!-- /.form-group -->

                  

                  <!-- /.form-group -->
              </form>
                  <!-- /.form-group -->
            </p>
        </div>
        <div class="modal-footer">

        </div>
    </div>
    <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!-- /#helpModal -->
<!-- #helpModal -->
<div id="upload_tugas" class="modal fade">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Upload Tugas</h4>
        </div>
        <div class="modal-body">
            <p>
            <?php
                foreach ($kelas->result() as $data_kelas) {
                      $id_kelas=$data_kelas->id_kelas;
                      $nama_kelas=$data_kelas->nama_kelas;
                      $deskripsi=$data_kelas->deskripsi;
                      $dosen=$data_kelas->dosen_nama;
                      $waktu=$data_kelas->waktu;
                }// akhir menampilkan data kelas
            ?>
              <form class="form-horizontal" method="post" action="<?= base_url() ?>kelas/uploadfile_mahasiswa/" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Deskripsi</label>

                    <div class="col-lg-8">
                        <textarea class="form-control" name="deskripsi" rows="15"></textarea>
                    </div>
                </div>
                <!-- /.form-group -->

                <div class="form-group">
                      <label for="text1" class="control-label col-lg-4">File</label>

                      <div class="col-lg-8">
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="input-group">
                        <div class="form-control uneditable-input span3" data-trigger="fileinput"><i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
                        <span class="input-group-addon btn btn-default btn-file"><span class="fileinput-new">Select file</span><span class="fileinput-exists">Change</span><input type="file" name="file_unduh"></span>
                        <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                            </div>
                          </div>
                      </div>
                  </div>

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4"></label>

                    <div class="col-lg-8">
                        <input type="hidden" id="text1" placeholder="id_kelas"  name="id_kelas" class="form-control" value="<?php echo "$id_kelas" ?>">
                    </div>
                </div>
                <!-- /.form-group -->

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4"></label>

                    <div class="col-lg-8">
                        <button type="submit" name="btn simpan" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
                <!-- /.form-group -->

                  

                  <!-- /.form-group -->
              </form>
                  <!-- /.form-group -->
            </p>
        </div>
        <div class="modal-footer">

        </div>
    </div>
    <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!-- /#helpModal -->
