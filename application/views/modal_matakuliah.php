<!-- #helpModal -->
<div id="tambah" class="modal fade">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Tambah matakuliah</h4>
        </div>
        <div class="modal-body">
            <p>
              <form class="form-horizontal" method="post" action="<?= base_url() ?>matakuliah/tambah_proses" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Kode Matakuliah</label>

                    <div class="col-lg-8">
                        <input type="text" id="text1" placeholder="Kode Matakuliah"  name="kode_mk" class="form-control">
                    </div>
                </div>
                <!-- /.form-group -->

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Matakuliah</label>

                    <div class="col-lg-8">
                        <input type="text" id="text1" placeholder="Matakuliah"  name="nama_mk" class="form-control">
                    </div>
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Program Studi</label>

                    <div class="col-lg-8">
                        <select class="form-control" placeholder="Program Studi"  name="prodi">
                            <option value="geologi">Geologi</option>
                            <option value="tambang">Tambang</option>
                            <option value="geologi & tambang">Geologi & Tambang</option>
                        </select>
                    </div>
                </div>
                <!-- /.form-group -->

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Jenis Matakuliah </label>

                    <div class="col-lg-8">
                        <select class="form-control" placeholder="Jenis Matakuliah"  name="jenis">
                            <option value="pokok">Pokok</option>
                            <option value="pilihan">Pilihan</option>
                        </select>
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
