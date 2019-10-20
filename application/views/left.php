<div id="left">
    <div class="media user-media bg-dark dker">
        <div class="user-media-toggleHover">
            <span class="fa fa-user"></span>
        </div>
        <!--<div class="user-wrapper bg-dark">
            <a class="user-link" href="">
                <img class="media-object img-thumbnail user-img" alt="User Picture" src="assets/img/user.gif">
            </a>
        </div>-->
    </div>
    <!-- #menu -->
    <ul id="menu" class="bg-blue dker">
              <li class="nav-header">Menu</li>
              <li class="nav-divider"></li>
              <!--<li class="">
                <a href="index.php">
                  <i class="glyphicon glyphicon-dashboard"></i><span class="link-title">&nbsp;Dashboard</span>
                </a>
              </li>-->
              <?php

                $member=$this->session->userdata('member');

              ?>
              <li class="">
                <a href="<?php echo base_url(); ?>awal">
                  <i class="glyphicon glyphicon-home"></i><span class="link-title">&nbsp;Profil</span>
                </a>
              </li>
                <li class="">
                  <a href="<?php echo base_url(); ?>pengajar">
                    <i class="glyphicon glyphicon-user"></i><span class="link-title">&nbsp;Dosen</span>
                  </a>
                </li>
                <?php if($member!="dosen") {?> 
              <li class="">
                <a href="<?php echo base_url(); ?>mahasiswa/nilai">
                  <i class="glyphicon glyphicon-eye-open"></i><span class="link-title">&nbsp;Nilai</span>
                </a>
              </li>
                <?php }
                if($member=="dosen") {?> 
              <li class="">
                <a href="<?php echo base_url(); ?>kelas/index_kelas_dosen">
                  <i class="glyphicon glyphicon-folder-close"></i><span class="link-title">&nbsp;Kelas</span>
                </a>
              </li>
                <?php } 
                  else { ?>
                  <li class="">
                <a href="<?php echo base_url(); ?>kelas/index_kelas_mahasiswa">
                  <i class="glyphicon glyphicon-folder-close"></i><span class="link-title">&nbsp;Kelas</span>
                </a>
              </li>
                 <?php }
                ?>
              
              <?php if($member=="admin") {?> 
              <li class="">
                <a href="<?php echo base_url(); ?>berita">
                  <i class="glyphicon glyphicon-file"></i><span class="link-title">&nbsp;Berita</span>
                </a>
              </li>
              <li class="">
                <a href="<?php echo base_url(); ?>artikel">
                  <i class="glyphicon glyphicon-file"></i><span class="link-title">&nbsp;Artikel</span>
                </a>
              </li>
              <li class="">
                <a href="<?php echo base_url(); ?>info">
                  <i class="glyphicon glyphicon-info-sign"></i><span class="link-title">&nbsp;Info</span>
                </a>
              </li>
                <?php } ?>
              <li class="nav-divider"></li>
            </ul>
    <!-- /#menu -->
</div>
<!-- /#left -->
