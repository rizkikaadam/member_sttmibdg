<?php
foreach ($artikel->result() as $data_artikel) {
  $judul=$data_artikel->artikel_judul;
  $isi=$data_artikel->artikel_isi;
  $id=$data_artikel->artikel_id;
  $penulis=$data_artikel->penulis;
  $path=$data_artikel->artikel_path;
  $foto=$data_artikel->artikel_foto;
}
 ?>
<div id="content">
    <div class="outer">
        <div class="inner bg-light lter">
            <!-- table -->
            <div class="col-lg-4">
                <div class="box">
                    <header>
                      <h5><i class="glyphicon glyphicon-home"></i>&nbsp;Foto artikel</h5>
                        <div class="toolbar">
                          <a data-toggle="modal" data-original-title="Help" data-placement="bottom"
                             href="#helpModal" class="btn btn-primary btn-sm btn-rect" >  <i class="glyphicon glyphicon-edit"></i> edit</a>
                        </div>
                    </header>
                    <div class="body">
                        <img src="<?= base_url() ?>assets/gambar/<?php echo $foto;  ?>" width="100%"  />
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="box">
                    <header>
                        <h5><i class="glyphicon glyphicon-edit"></i>&nbsp;Edit artikel</h5>
                    </header>
                    <div id="borderedTable" class="body collapse in">
                      <form class="form-horizontal" method="post" action="<?= base_url() ?>artikel/editartikel_proses" enctype="multipart/form-data">
                          <div class="form-group">
                              <label for="text1" class="control-label col-lg-2">Judul artikel</label>
                              <div class="col-lg-8">
                                  <input type="text" name="artikel_judul"  id="text1" placeholder="Judul artikel" class="form-control" value="<?php echo "$judul"; ?>" />
                              </div>
                          </div>
                          <div class="form-group">
                              <label for="text1" class="control-label col-lg-2">Isi</label>
                              <div class="col-lg-8">
                              <textarea id="ckeditor" class="ckeditor" name="artikel_isi"><?php echo "$isi"; ?></textarea>
                              </div>
                          </div>
                          <div class="form-group">
                            <label for="text1" class="control-label col-lg-2"></label>
                              <div class="col-lg-8">
                                <input type="hidden" name="artikel_id" value="<?php echo "$id"; ?>"/>
                                  <button type="submit" name="btn simpan" class="btn btn-primary">Simpan</button>
                              </div>
                          </div>
                      </form>
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
<!-- #helpModal -->
<div id="helpModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Upload Foto artikel</h4>
            </div>
            <div class="modal-body">
                <p>
                  <form class="form-horizontal" method="post" action="<?= base_url() ?>artikel/update_foto" enctype="multipart/form-data">
                      <div class="form-group">
                          <label class="control-label col-lg-2">Foto artikel</label>
                          <div class="col-lg-8">
                              <input type="file" name="artikel_foto" class="form-control">
                          </div>
                      </div>
                      <div class="form-group">
                        <label for="text1" class="control-label col-lg-2"></label>
                          <div class="col-lg-8">
                            <input type="hidden" name="artikel_id"  id="text1" placeholder="Isi Banyak Mahasiswa" class="form-control" value="<?php echo $id;?>">
                              <button type="submit" name="btn simpan" class="btn btn-primary">Simpan</button>
                          </div>
                      </div>
                  </form>
                </p>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
