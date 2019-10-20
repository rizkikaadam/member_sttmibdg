<div id="content">
    <div class="outer">
        <div class="inner bg-light lter">
            <!-- table -->
            <div class="col-lg-12">
                <div class="box">
                    <header>
                        <h5><i class="glyphicon glyphicon-calendar"></i>&nbsp;Edit kelas</h5>
                    </header>
                    <div id="borderedTable" class="body collapse in">
                      <?php
                      foreach ($isi_kelas->result() as $data_isi_kelas) {
                       ?>
                       <form class="form-horizontal" method="post" action="<?= base_url() ?>kelas/editfile_kelas/" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Judul</label>

                    <div class="col-lg-6">
                        <input type="text" id="text1" placeholder="Judul Tugas/Materi"  name="nama" class="form-control" value="<?php echo $data_isi_kelas->nama_isi_kelas;?>">
                    </div>
                </div>
                <!-- /.form-group -->

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Deskripsi</label>

                    <div class="col-lg-6">
                        <textarea class="form-control" name="deskripsi" rows="15"><?php echo $data_isi_kelas->deskripsi_isi_kelas; ?></textarea>
                    </div>
                </div>
                <!-- /.form-group -->

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Jenis</label>

                    <div class="col-lg-6">
                        <select class="form-control" name="jenis" required="required">
                            <option value="<?php echo $data_isi_kelas->jenis_isi_kelas;?>"><?php echo $data_isi_kelas->jenis_isi_kelas; ?></option>
                            <option value="materi">Materi</option>
                            <option value="tugas">Tugas</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">File Yang Tersimpan </label>

                    <div class="col-lg-6">
                      <input type="text" id="text1" readonly="" class="form-control" value="<?php echo $data_isi_kelas->file_isi_kelas; ?>">
                      <SPAN class="help-block">Jika Ingin Ganti File Upload Ulang di Bawah Ini</SPAN>
                    </div>
                </div>


                <div class="form-group">
                      <label for="text1" class="control-label col-lg-4">File</label>

                      <div class="col-lg-6">
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
                        <input type="hidden" id="text1" placeholder="id_kelas"  name="id_isi_kelas" class="form-control" value="<?php echo $data_isi_kelas->id_isi_kelas; ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4"></label>

                    <div class="col-lg-8">
                        <input type="hidden" id="text1" placeholder="id_kelas"  name="id_kelas" class="form-control" value="<?php echo $data_isi_kelas->id_kelas; ?>">
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
                      <?php }//akhir menampilkan edit data ?>
                    </div>
                </div>

                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>

                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
            </div>
        </div>
        <!-- /.inner -->
    </div>
    <!-- /.outer -->
</div>
<!-- /#content -->
    <div id="right" class="bg-light lter">
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Warning!</strong> Best check yo self, you're not looking too good.
        </div>
        <!-- .well well-small -->
        <div class="well well-small dark">
            <ul class="list-unstyled">
                <li>Visitor <span class="inlinesparkline pull-right">1,4,4,7,5,9,10</span></li>
                <li>Online Visitor <span class="dynamicsparkline pull-right">Loading..</span></li>
                <li>Popularity <span class="dynamicbar pull-right">Loading..</span></li>
                <li>New Users <span class="inlinebar pull-right">1,3,4,5,3,5</span></li>
            </ul>
        </div>
        <!-- /.well well-small -->
        <!-- .well well-small -->
        <div class="well well-small dark">
            <button class="btn btn-block">Default</button>
            <button class="btn btn-primary btn-block">Primary</button>
            <button class="btn btn-info btn-block">Info</button>
            <button class="btn btn-success btn-block">Success</button>
            <button class="btn btn-danger btn-block">Danger</button>
            <button class="btn btn-warning btn-block">Warning</button>
            <button class="btn btn-inverse btn-block">Inverse</button>
            <button class="btn btn-metis-1 btn-block">btn-metis-1</button>
            <button class="btn btn-metis-2 btn-block">btn-metis-2</button>
            <button class="btn btn-metis-3 btn-block">btn-metis-3</button>
            <button class="btn btn-metis-4 btn-block">btn-metis-4</button>
            <button class="btn btn-metis-5 btn-block">btn-metis-5</button>
            <button class="btn btn-metis-6 btn-block">btn-metis-6</button>
        </div>
        <!-- /.well well-small -->
        <!-- .well well-small -->
        <div class="well well-small dark">
            <span>Default</span><span class="pull-right"><small>20%</small></span>

            <div class="progress xs">
                <div class="progress-bar progress-bar-info" style="width: 20%"></div>
            </div>
            <span>Success</span><span class="pull-right"><small>40%</small></span>

            <div class="progress xs">
                <div class="progress-bar progress-bar-success" style="width: 40%"></div>
            </div>
            <span>warning</span><span class="pull-right"><small>60%</small></span>

            <div class="progress xs">
                <div class="progress-bar progress-bar-warning" style="width: 60%"></div>
            </div>
            <span>Danger</span><span class="pull-right"><small>80%</small></span>

            <div class="progress xs">
                <div class="progress-bar progress-bar-danger" style="width: 80%"></div>
            </div>
        </div>                    </div>
    <!-- /#right -->
</div>
<!-- /#wrap -->
<!-- /#wrap -->
<footer class="Footer bg-dark dker">
<p>2016 &copy; STTMI Bandung Powered By Ukuranmu Studio</p>
</footer>
<!-- /#footer -->
