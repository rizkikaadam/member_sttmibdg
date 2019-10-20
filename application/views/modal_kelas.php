<!-- #helpModal -->
<div id="tambah" class="modal fade">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Tambah kelas</h4>
        </div>
        <div class="modal-body">
            <p>
              <form class="form-horizontal" method="post" action="<?= base_url() ?>kelas/tambahkelas_proses" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Nama Kelas</label>

                    <div class="col-lg-8">
                        <input type="text" id="text1" placeholder="Nama Kelas"  name="nama_kelas" class="form-control">
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
                <?php 
                    foreach ($profil->result() as $data_kelas) {
                        $dosen_id = $data_kelas->dosen_id;
                    }
                ?>
                <div class="form-group">

                    <div class="col-lg-8">
                        <input type="hidden" id="text1" placeholder="id_dosen" value="<?php echo $dosen_id; ?>" name="id_dosen" class="form-control">
                    </div>
                </div>
                <!-- /.form-group -->

                  <button type="submit" name="btn simpan" class="btn btn-primary">Simpan</button>

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
