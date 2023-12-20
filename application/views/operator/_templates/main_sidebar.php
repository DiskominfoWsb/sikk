<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>

<aside class="main-sidebar">
  <section class="sidebar">
    <?php if ($admin_prefs['user_panel'] == TRUE): ?>
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url($avatar_dir . '/m_001.png'); ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $user_login['firstname'].$user_login['lastname']; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> <?php echo lang('menu_online'); ?></a>
        </div>
      </div>

    <?php endif; ?>
    <?php if ($admin_prefs['sidebar_form'] == TRUE): ?>
      <!-- Search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="<?php echo lang('menu_search'); ?>...">
          <span class="input-group-btn">
            <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
          </span>
        </div>
      </form>

    <?php endif; ?>
    <!-- Sidebar menu -->
    <ul class="sidebar-menu">


      <li class="header text-uppercase"><?php echo lang('menu_main_navigation'); ?></li>
      <li class="<?=active_link_controller('dashboard')?>">
        <a href="<?php echo site_url('operator/dashboard'); ?>">
          <i class="fa fa-dashboard"></i> <span><?php echo lang('menu_dashboard'); ?></span>
        </a>
      </li>
      <li class="treeview <?=active_link_controller('main_menu_bencana')?>">
        <a href="#">
          <i class="fa fa-list"></i>
          <span><?php echo lang('main_menu_bencana'); ?></span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li class="<?=active_link_function('menu_tambah_bencana')?>"><a href="<?php echo site_url('operator/bencana/add_bencana'); ?>"><?php echo lang('menu_tambah_bencana'); ?></a></li>
          <li class="<?=active_link_function('menu_bencana')?>"><a href="<?php echo site_url('operator/bencana'); ?>"><?php echo lang('menu_bencana'); ?></a></li>                                                                     
        </ul>                                                                      


        <li class="header text-uppercase"><?php echo lang('menu_administration'); ?></li>

        <li class="<?=active_link_controller('files')?>">
          <a href="<?php echo site_url('operator/files'); ?>">
            <i class="fa fa-file-pdf-o"></i> <span><?php echo lang('menu_files'); ?></span>
          </a>
        </li>         

        <li class="header text-uppercase"><?php echo lang('menu_referensi'); ?></li>
        <li class="<?=active_link_controller('jenis_bencana')?>">
          <a href="<?php echo site_url('operator/jenis_bencana'); ?>">
            <i class="fa fa-bars"></i> <span><?php echo lang('menu_jenis_bencana'); ?></span>
          </a>
        </li>
        <!-- <li class="<?=active_link_controller('informasi')?>">
          <a href="<?php echo site_url('operator/informasi'); ?>">
            <i class="fa fa-bars"></i> <span><?php echo lang('menu_informasi'); ?></span>
          </a>
        </li>  -->
        <li class="treeview <?=active_link_controller('wilayah')?>">
          <a href="#">
            <i class="fa fa-map"></i>
            <span><?php echo lang('menu_data_wilayah'); ?></span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li class="<?=active_link_function('menu_data_kecamatan')?>"><a href="<?php echo site_url('operator/kecamatan'); ?>"><?php echo lang('menu_data_kecamatan'); ?></a></li>
            <li class="<?=active_link_function('menu_data_desa')?>"><a href="<?php echo site_url('operator/desa'); ?>"><?php echo lang('menu_data_desa'); ?></a></li>
            <li class="<?=active_link_function('menu_data_dusun')?>"><a href="<?php echo site_url('operator/dusun'); ?>"><?php echo lang('menu_data_dusun'); ?></a></li>                                                                
          </ul>

          <li class="<?=active_link_controller('petugas')?>">
            <a href="<?php echo site_url('operator/petugas'); ?>">
              <i class="fa fa-users"></i> <span><?php echo lang('menu_petugas'); ?></span>
            </a>
          </li> 
          <!-- <li class="treeview ">
            <a href="#">
              <i class="fa fa-user"></i>
              <span>Relawan</span>
              <i class="fa fa-angle-left pull-right"></i>
            </a>
            </li> 
            <ul class="treeview-menu">
              <li class=""><a href="<?php echo site_url('operator/relawans'); ?>">Data Relawan</a></li>
              <li class=""><a href="<?php echo site_url('operator/organisasi'); ?>">Organisasi</a></li>
              <li class=""><a href="<?php echo site_url('operator/keahlian'); ?>">Keahlian</a></li>                                                                
            </ul>   --> 

            <li class="<?=active_link_controller('peralatan')?>">
              <a href="<?php echo site_url('operator/peralatan'); ?>">
                <i class="fa fa-legal"></i> <span><?php echo lang('menu_peralatan'); ?></span>
              </a>
            </li>                                                                             
            <li class="<?=active_link_controller('kontak')?>">
              <a href="<?php echo site_url('operator/kontak'); ?>">
                <i class="fa fa-phone"></i> <span><?php echo lang('menu_kontak'); ?></span>
              </a>
            </li> 
          </ul>
        </section>
      </aside>
