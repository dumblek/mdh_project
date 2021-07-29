<?php 
use Illuminate\Support\Facades\DB;
use App\Models\Nav_model;
$site_config = DB::table('konfigurasi')->first();
// Nav profil
$myprofil    = new Nav_model();
$nav_profil  = $myprofil->nav_profil();
$nav_layanan = $myprofil->nav_layanan();
$nav_berita  = $myprofil->nav_berita();
$nav_terjadi  = $myprofil->nav_terjadi();
$nav_materi  = $myprofil->nav_materi();
?>
<div class="row mt-2 mb-2">
   <div class="col-md-12">
      <nav class="navbar navbar-expand-lg" >
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <i class="fas fa-bars"></i> </button>
         <div class="collapse navbar-collapse" id="navbarSupportedContent">
         <div class="logo"><a href="{{ asset('/') }}"><img src="{{ asset('assets/upload/image/'.$site_config->logo) }}" alt="{{ $site_config->namaweb }}" style="max-height: 80px; width: auto;"></a></div>
            <ul class="navbar-nav mr-auto">
               <li class="nav-item"><a class="nav-link" href="{{ asset('/') }}">Beranda</a> </li>
               <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#"  role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Tentang <span class="pull-right"><i class="fas fa-caret-down"></i></span></a>
                  <ul class="dropdown-menu" >            
                     <li><a href="{{ asset('profil') }}"><i class="fa fa-angle-double-right" aria-hidden="true"></i>Profil</a></li>
                     <li><a href="{{ asset('saldo') }}"><i class="fa fa-angle-double-right" aria-hidden="true"></i>Informasi Saldo</a></li>
                  </ul>
               </li>
               <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#"  role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Berita &amp; Updates <span class="pull-right"><i class="fas fa-caret-down"></i></span></a>
                  <ul class="dropdown-menu">
                     <?php foreach($nav_berita as $nav_berita) { ?>
                     <li><a href="{{ asset('berita/kategori/'.$nav_berita->slug_kategori) }}"><i class="fa fa-angle-double-right" aria-hidden="true"></i> {{ Str::words($nav_berita->nama_kategori,4) }}</a></li>
                     <?php } ?>
                  </ul>
               </li>
               <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#"  role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Program <span class="pull-right"><i class="fas fa-caret-down"></i></span></a>
                  <ul class="dropdown-menu" >
                     <?php foreach($nav_layanan as $nav_layanan) { ?>
                     <li><a href="{{ asset('berita/layanan/'.$nav_layanan->slug_berita) }}"><i class="fa fa-angle-double-right" aria-hidden="true"></i> {{ Str::words($nav_layanan->judul_berita,6) }}</a></li>
                     <?php } ?>
                  </ul>
               </li>
               <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#"  role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Galeri <span class="pull-right"><i class="fas fa-caret-down"></i></span></a>
                  <ul class="dropdown-menu" >            
                     <li><a href="{{ asset('galeri') }}"><i class="fa fa-angle-double-right" aria-hidden="true"></i>Foto</a></li>
                     <li><a href="{{ asset('video') }}"><i class="fa fa-angle-double-right" aria-hidden="true"></i>Video</a></li>
                  </ul>
               </li>
               <li class="nav-item"> <a class="nav-link" href="{{ asset('kontak') }}">Kontak</a> </li>
            </ul>
         </div>
      </nav>
   </div>
</div>
</div>
</div>
</header>
<!--Header End-->    