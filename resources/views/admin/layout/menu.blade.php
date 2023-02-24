<style type="text/css" media="screen">
  .nav ul li p !important {
    font-size: 12px;
  }
  .infoku {
    margin-left: 20px; 
    text-transform: uppercase;
    color: yellow;
    font-size: 11px;
  }
</style>
<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ asset('admin/dasbor') }}" class="brand-link">
      <img src="{{ asset('assets/upload/image/'.website('icon')) }}"
         alt="{{ website('namaweb') }}"
         class="brand-image img-circle elevation-3"
         style="opacity: .8">
      <span class="brand-text font-weight-light">{{ substr(website('nama_singkat'),0,18) }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- DASHBOARD -->
          <li class="nav-item">
            <a href="{{ asset('admin/dasbor') }}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          
          <!-- Website Content -->
          <li class="batas"><hr> <span class="infoku"><i class="fa fa-certificate"></i> Berita, Artikel &amp; Agenda</span></li>
          <li class="batas"><hr></li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-newspaper"></i>
              <p>Berita &amp; Artikel<i class="fas fa-angle-left right"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item"><a href="{{ asset('admin/berita') }}" class="nav-link"><i class="fas fa-newspaper nav-icon"></i><p>Data Berita &amp; Artikel</p></a>
              </li>
              <li class="nav-item"><a href="{{ asset('admin/berita/tambah') }}" class="nav-link"><i class="fa fa-plus nav-icon"></i><p>Tambah Berita/Artikel</p></a>
              </li>
              <li class="nav-item"><a href="{{ asset('admin/kategori') }}" class="nav-link"><i class="fa fa-tags nav-icon"></i><p>Kategori</p></a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-calendar"></i>
              <p>Agenda<i class="fas fa-angle-left right"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item"><a href="{{ asset('admin/agenda') }}" class="nav-link"><i class="fas fa-newspaper nav-icon"></i><p>Data Agenda</p></a>
              </li>
              <li class="nav-item"><a href="{{ asset('admin/agenda/tambah') }}" class="nav-link"><i class="fa fa-plus nav-icon"></i><p>Tambah Agenda</p></a>
              </li>
              <li class="nav-item"><a href="{{ asset('admin/kategori_agenda') }}" class="nav-link"><i class="fa fa-tags nav-icon"></i><p>Kategori Agenda</p></a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-calendar"></i>
              <p>Donasi<i class="fas fa-angle-left right"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item"><a href="{{ asset('admin/donasi') }}" class="nav-link"><i class="fas fa-newspaper nav-icon"></i><p>Data Donasi</p></a>
              </li>
              <li class="nav-item"><a href="{{ asset('admin/donasi/tambah') }}" class="nav-link"><i class="fa fa-plus nav-icon"></i><p>Tambah Donasi</p></a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-calendar"></i>
              <p>Donatur<i class="fas fa-angle-left right"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item"><a href="{{ asset('admin/donatur') }}" class="nav-link"><i class="fas fa-newspaper nav-icon"></i><p>Data Donatur</p></a>
              </li>
              <li class="nav-item"><a href="{{ asset('admin/donatur/tambah') }}" class="nav-link"><i class="fa fa-plus nav-icon"></i><p>Tambah Donatur</p></a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-image"></i>
              <p>Galeri Prisma<i class="fas fa-angle-left right"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item"><a href="{{ asset('admin/galeri-prisma') }}" class="nav-link"><i class="fas fa-newspaper nav-icon"></i><p>Data Galeri</p></a>
              </li>
              <li class="nav-item"><a href="{{ asset('admin/galeri-prisma/tambah') }}" class="nav-link"><i class="fa fa-plus nav-icon"></i><p>Tambah Foto</p></a>
              </li>
              <li class="nav-item"><a href="{{ asset('admin/kategori_galeri') }}" class="nav-link"><i class="fa fa-tags nav-icon"></i><p>Album</p></a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-image"></i>
              <p>Galeri Foto<i class="fas fa-angle-left right"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item"><a href="{{ asset('admin/galeri') }}" class="nav-link"><i class="fas fa-newspaper nav-icon"></i><p>Data Galeri</p></a>
              </li>
              <li class="nav-item"><a href="{{ asset('admin/galeri/tambah') }}" class="nav-link"><i class="fa fa-plus nav-icon"></i><p>Tambah Galeri</p></a>
              </li>
              <li class="nav-item"><a href="{{ asset('admin/kategori_galeri') }}" class="nav-link"><i class="fa fa-tags nav-icon"></i><p>Kategori Galeri</p></a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="{{ asset('admin/video') }}" class="nav-link">
              <i class="nav-icon fas fa-film"></i>
              <p>Galeri Video</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-hand-holding-usd"></i>
              <p>Keuangan<i class="fas fa-angle-left right"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item"><a href="{{ asset('admin/pemasukan') }}" class="nav-link"><i class="fas fa-donate nav-icon"></i><p>Pemasukan Kas</p></a>
              </li>
              <li class="nav-item"><a href="{{ asset('admin/pengeluaran') }}" class="nav-link"><i class="fas fa-cash-register nav-icon"></i><p>Pengeluaran Kas</p></a>
              </li>
              <li class="nav-item"><a href="{{ asset('admin/keuangan') }}" class="nav-link"><i class="fas fa-wallet nav-icon"></i><p>Informasi Saldo</p></a>
              </li>
              <li class="nav-item"><a href="{{ asset('admin/kategori_kas') }}" class="nav-link"><i class="fa fa-tags nav-icon"></i><p>Kategori Kas</p></a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-utensils"></i>
              <p>ATM Beras<i class="fas fa-angle-left right"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item"><a href="{{ asset('admin/berasin') }}" class="nav-link"><i class="fas fa-arrow-alt-circle-down nav-icon"></i><p>Beras Masuk</p></a>
              </li>
              <li class="nav-item"><a href="{{ asset('admin/berasout') }}" class="nav-link"><i class="fas fa-arrow-alt-circle-up nav-icon"></i><p>Beras Keluar</p></a>
              </li>
              <li class="nav-item"><a href="{{ asset('admin/beras') }}" class="nav-link"><i class="fas fa-wallet nav-icon"></i><p>Informasi Saldo Beras</p></a>
            </ul>
          </li>

          <li class="nav-item">
            <a href="{{ asset('admin/qurban_entry') }}" class="nav-link">
              <i class="nav-icon fas fa-film"></i>
              <p>Qurban</p>
            </a>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-download"></i>
              <p>Download &amp; File<i class="fas fa-angle-left right"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item"><a href="{{ asset('admin/download') }}" class="nav-link"><i class="fas fa-newspaper nav-icon"></i><p>Data File</p></a>
              </li>
              <li class="nav-item"><a href="{{ asset('admin/download/tambah') }}" class="nav-link"><i class="fa fa-plus nav-icon"></i><p>Tambah File</p></a>
              </li>
              <li class="nav-item"><a href="{{ asset('admin/kategori_download') }}" class="nav-link"><i class="fa fa-tags nav-icon"></i><p>Kategori File</p></a>
              </li>
            </ul>
          </li>

          <!-- Website Content -->
          <li class="batas"><hr> <span class="infoku"><i class="fa fa-certificate"></i> Profil &amp; Program</span></li>
          <li class="batas"><hr></li>

          <li class="nav-item">
            <a href="{{ asset('admin/konfigurasi/profil') }}" class="nav-link">
              <i class="nav-icon fas fa-leaf"></i>
              <p>Update Profil</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ asset('admin/berita/jenis_berita/Layanan') }}" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>Program</p>
            </a>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>Board &amp; Team<i class="fas fa-angle-left right"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item"><a href="{{ asset('admin/staff') }}" class="nav-link"><i class="fas fa-newspaper nav-icon"></i><p>Data Board &amp; Team</p></a>
              </li>
              <li class="nav-item"><a href="{{ asset('admin/staff/tambah') }}" class="nav-link"><i class="fa fa-plus nav-icon"></i><p>Tambah Board &amp; Team</p></a>
              </li>
              <li class="nav-item"><a href="{{ asset('admin/kategori_staff') }}" class="nav-link"><i class="fa fa-tags nav-icon"></i><p>Kategori Board &amp; Team</p></a>
              </li>
            </ul>
          </li>

          <!-- Website Content -->
          <li class="batas"><hr> <span class="infoku"><i class="fa fa-certificate"></i> Website Setting</span></li>
          <li class="batas"><hr></li>
          <li class="nav-item">
            <a href="{{ asset('admin/user') }}" class="nav-link">
              <i class="nav-icon fas fa-lock"></i>
              <p>Pengguna Web</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ asset('admin/heading') }}" class="nav-link">
              <i class="nav-icon fas fa-image"></i>
              <p>Header Gambar</p>
            </a>
          </li>
          
          <!-- MENU -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                Konfigurasi
                <i class="fas fa-angle-left right"></i>
                
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item"><a href="{{ asset('admin/konfigurasi') }}" class="nav-link"><i class="fas fa-tools nav-icon"></i><p>Konfigurasi Umum</p></a>
              </li>
            
              <li class="nav-item"><a href="{{ asset('admin/konfigurasi/logo') }}" class="nav-link"><i class="fa fa-home nav-icon"></i><p>Ganti Logo</p></a>
              </li>
              <li class="nav-item"><a href="{{ asset('admin/konfigurasi/icon') }}" class="nav-link"><i class="fa fa-upload nav-icon"></i><p>Ganti Icon</p></a>
              </li>
              <li class="nav-item"><a href="{{ asset('admin/konfigurasi/email') }}" class="nav-link"><i class="fa fa-envelope nav-icon"></i><p>Email Setting</p></a>
              </li>
              <li class="nav-item"><a href="{{ asset('admin/rekening') }}" class="nav-link"><i class="fas fa-book nav-icon"></i><p>Rekening</p></a>
              </li>
            </ul>
          </li>

          
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row">
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <div class="row">
              <div class="col-md-12">
                 <h2 class="card-title"><?php echo $title ?></h2> 
              </div>
             
              
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
<div class="table-responsive konten">
