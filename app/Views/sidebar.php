
 <!-- ======= Sidebar ======= -->
 <aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

  <li class="nav-item">
    <a class="nav-link " href="<?php echo site_url(); ?>">
      <i class="bi bi-grid"></i>
      <span>Tawan Narkoba</span>
    </a>
  </li><!-- End Tawan Nav -->

  <li class="nav-item">
    <a class="nav-link " href="<?php echo site_url('dashboard_aoc'); ?>">
      <i class="bi bi-grid"></i>
      <span>Dashboard</span>
    </a>
  </li><!-- End Dashboard Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-menu-button-wide"></i><span>Masters</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="<?php echo site_url('user'); ?>">
          <i class="bi bi-circle"></i><span>User</span>
        </a>
      </li>  
      <li>
        <a href="<?php echo site_url('kabupaten'); ?>">
          <i class="bi bi-circle"></i><span>Kabupaten</span>
        </a>
      </li>
      <li>
        <a href="<?php echo site_url('kecamatan'); ?>">
          <i class="bi bi-circle"></i><span>Kecamatan</span>
        </a>
      </li>
      <li>
        <a href="<?php echo site_url('kelurahan'); ?>">
          <i class="bi bi-circle"></i><span>Kelurahan</span>
        </a>
      </li>      
    </ul>
  </li><!-- End Components Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-journal-text"></i><span>Data</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="<?php echo site_url('ungkapkasus'); ?>">
          <i class="bi bi-circle"></i><span>Ungkap Kasus</span>
        </a>
      </li>
      <li>
        <a href="<?php echo site_url('agenpemulihan'); ?>">
          <i class="bi bi-circle"></i><span>Agen Pemulihan</span>
        </a>
      </li>
      <li>
        <a href="<?php echo site_url('clientrehabilitasi'); ?>">
          <i class="bi bi-circle"></i><span>Klien Rehabilitasi</span>
        </a>
      </li>
      <li>
        <a href="<?php echo site_url('penggiat'); ?>">
          <i class="bi bi-circle"></i><span>Penggiat</span>
        </a>
      </li>
      <li>
        <a href="<?php echo site_url('rts'); ?>">
          <i class="bi bi-circle"></i><span>Remaja Teman Sebaya</span>
        </a>
      </li>
      <li>
        <a href="<?php echo site_url('desa-bersinar'); ?>">
          <i class="bi bi-circle"></i><span>Desa Bersinar</span>
        </a>
      </li>
      <li>
        <a href="<?php echo site_url('sosialisasi'); ?>">
          <i class="bi bi-circle"></i><span>Sosialisasi</span>
        </a>
      </li>
      <li>
        <a href="<?php echo site_url(relativePath: 'tempatkos'); ?>">
          <i class="bi bi-circle"></i><span>Tempat Kos</span>
        </a>
      </li>
      <li>
        <a href="<?php echo site_url('hiburanmalam'); ?>">
          <i class="bi bi-circle"></i><span>Hiburan Malam</span>
        </a>
      </li>
    </ul>
  </li><!-- End Forms Nav -->
</ul>

</aside><!-- End Sidebar-->