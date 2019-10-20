<!-- #helpModal -->
<div id="ubah_password" class="modal fade">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Ubah Password</h4>
        </div>
        <div class="modal-body">
            <p>
              <form class="form-horizontal" method="post" action="<?= base_url() ?>Pengajar/ubah_password_proses" enctype="multipart/form-data">
              <?php
                foreach ($dosen->result() as $data_dosen) {
                  $password_lama=$data_dosen->epass;
                  $dosen_id=$data_dosen->dosen_id;
                } 
              ?>
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Password Lama</label>

                    <div class="col-lg-6">
                        <input type="text" id="text1" readonly  name="dosen_name" class="form-control" required="required" value="<?php echo "$password_lama";?>">
                    </div>
                </div>
                <!-- /.form-group -->

                <div class="form-group">
                      <label for="text1" class="control-label col-lg-4">Password Baru</label>
                      <div class="col-lg-6">
                        <input type="password" id="text1" placeholder="Masukan Password Baru Password"  name="password" class="form-control" required="required">
                      </div>
                </div>

                <div class="form-group">
                      <label for="text1" class="control-label col-lg-4">Confirm Password</label>
                      <div class="col-lg-6">
                        <input type="password" id="text1" placeholder="Tulis Lagi Password"  name="password" class="form-control" required="required">
                      </div>
                </div>
                <input type="hidden" id="hidden" value="<?php echo $dosen_id;?>"  name="dosen_id" class="form-control" required="required">
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
