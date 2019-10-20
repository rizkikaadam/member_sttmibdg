                <div id="content">
                    <div class="outer">
                        <div class="inner bg-light lter">
                            <!-- table -->
                            <div class="row">
                              <div class="col-lg-12">
                                    <div class="box">
                                        <header>
                                            <div class="icons"><i class="glyphicon glyphicon-list"></i></div>
                                            <h5><i class="glyphicon glyphicon-user"></i>&nbsp;Data kelas</h5>
                                            <div class="toolbar">
                                            <?php if($this->session->userdata('member') == "dosen") { ?>
                                              <a data-toggle="modal" data-original-title="Help" data-placement="bottom"
                                                 href="#tambah" class="btn btn-primary btn-sm btn-rect" >  <i class="glyphicon glyphicon-edit"></i> Tambah Data kelas</a>
                                            </div><?php } ?>
                                        </header>
                                        <div id="collapse4" class="body">
                                          <?php
                                          $jumlah_data=$kelas->num_rows();
                                          if ($jumlah_data==0) {
                                            echo "Data Belum Terisi";
                                          }
                                          else {
                                           $pesan=$this->session->flashdata('message');
                                           if ($pesan == "edit") {
                                             echo "<p class='bg-info'>Data Berhasil Diubah</p>";
                                           }
                                           elseif ($pesan == "hapus") {
                                             echo "<p class='bg-info'>Data Berhasil Dihapus</p>";
                                           }
                                           elseif ($pesan == "tambah") {
                                             echo "<p class='bg-info'>Data Berhasil Diubah</p>";
                                           }
                                           ?>
                                            <table id="dataTable" class="table table-bordered table-condensed table-hover table-striped">
                                                <thead>
                                                <tr>
                                                    <th>ID Kelas</th>
                                                    <th>Nama</th>
                                                    <th>Deskripsi</th>
                                                    <th>Tanggal</th>
                                                    <th>Manage</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                  <?php
                                                        //<td><img src='assets/gambar/$data_kelas->foto' width='100' /></td>
                                                        foreach ($kelas->result() as $data_kelas) {
                                                          echo "<tr>
                                                              <td>$data_kelas->id_kelas</td>
                                                              <td>$data_kelas->nama_kelas</td>
                                                              <td>$data_kelas->deskripsi</td>
                                                              <td>$data_kelas->waktu</td>";?>
                                                              <?php
                                                              $member = $this->session->userdata('member');
                                                              if ($member=="dosen"){
                                                                  echo "
                                                                  <td>
                                                                    <a href='". base_url() ."kelas/masuk_kelas/$data_kelas->id_kelas/' class='btn btn-success btn-sm'>  <i class='glyphicon glyphicon-log-in'></i>&nbsp;Masuk</a>
                                                                    <a href='". base_url() ."kelas/edit_kelas/$data_kelas->id_kelas/' class='btn btn-primary btn-sm'>  <i class='glyphicon glyphicon-eye-open'></i>&nbsp;Edit</a>
                                                                    <a href='". base_url() ."kelas/hapuskelas_proses/$data_kelas->id_kelas' class='btn btn-danger btn-sm'>  <i class='glyphicon glyphicon-trash'></i>&nbsp;Hapus</a>
                                                                  </td>
                                                              </tr>";
                                                              }
                                                              else{
                                                                echo "<td>
                                                                    <a href='". base_url() ."kelas/gabung_kelas/$data_kelas->id_kelas/' class='btn btn-success btn-sm'>  <i class='glyphicon glyphicon-log-in'></i>&nbsp;Gabung</a>";
                                                              }
                                                              
                                                        }// akhir menampilkan data kelas
                                                   ?>
                                                </tbody>
                                              </table>
                                              <?php }//akhir kondisi menghitung data kelas ?>
                                        </div>
                                    </div>
                                </div>
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
