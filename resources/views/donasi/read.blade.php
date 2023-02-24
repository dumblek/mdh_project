<?php 
$bg   = DB::table('heading')->where('halaman','Berita')->orderBy('id_heading','DESC')->first();
 ?>
<!--Inner Header Start-->
<!-- <section class="wf100 p80 inner-header" style="background-image: url('{{ asset('assets/upload/image/'.$bg->gambar) }}'); background-position: bottom center;">
   <div class="container">
      <h1>{{ $title }}</h1>
   </div>
</section> -->
<div class="section-image" style="text-align: center">
   <img src="{{ asset('assets/upload/image/'.$read->gambar) }}" alt="{{ $title }}">
</div>
<!--Inner Header End--> 
<!-- Body Donasi -->
<div class="section-box">
   <div class="title"><h1><?php echo $read->judul ?></h1></div>
      <div class="donation_box2">
         <span class="d_total"><?php  echo "Rp " . number_format($read->tercapai,0,',','.') ?></span>
         <span class="d_target">
            <span class="d_target_text">terkumpul&nbsp;dari&nbsp;<b><?php  echo "Rp " . number_format($read->target,0,',','.') ?></b></span>
         </span>
         <div class="donation_progress">
         <div class="donation_progress_bar full_green" style="background:;width:<?php  echo $read->persen ?>%"></div>
         <span class="d_target_graph"><b><?php echo count($donatur) ?></b> Donasi</span>
         <!-- <span class="d_date"><span>12&nbsp;hari&nbsp;lagi</span></span> -->
      </div>
   </div>
   <div class="section-button">
      <a href="{{ asset('donasi/read/'.$read->slug_donasi.'/donasi-sekarang') }}">
         <button class="donation_button_now" style="background:#dc2f6a;border-color:#dc2f6a">Donasi Sekarang!</button>
      </a>
   </div>
</div>

<div class="section-box" id="tab-donasiaja">
   <div class="container--tabs" id="info-update">
      <section class="row">
         <ul class="nav nav-tabs">
            <li class="active"><a href="#tab-1">Keterangan</a></li>
            <li class=""><a href="#tab-3">Donatur (<?php echo count($donatur) ?>)</a></li>
         </ul>
         <div class="tab-content">
            <div id="tab-1" class="tab-pane active"> 
               <div class="col-md-10">
                  <div class="donasiaja-readmore" data-readmore="" aria-expanded="false" id="rmjs-1" style="max-height: none; height: 200px;">
                     <?php echo $read->keterangan ?>
                  </div>
                  <!-- <a href="#" class="readmore" data-readmore-toggle="rmjs-1" aria-controls="rmjs-1">Baca selengkapnya ▾</a> -->
               </div>
            </div> 
            <div id="tab-3" class="tab-pane">
               <div class="col-md-10">
                  <!-- donation -->
                  <?php foreach ($donatur as $donatur) { ?>
                  <div class="donation_box black" style="background: #ffffff;">
                        <div id="box_le35">
                           <div class="donation_inner_box" style="background:rgb(250, 252, 255);">
                              <div class="donation_name"><?php echo $donatur->nama ?><span class="donation_time"><span class="dashicons dashicons-clock"></span><?php echo $donatur->tanggal ?></span>
                              </div>
                              <div class="donation_total">Berdonasi sebesar <b><?php  echo "Rp " . number_format($donatur->nominal,0,',','.') ?></b></div>
                           </div>
                        </div>
                        <!-- <div id="box_btn_le35" class="donation_button">
                                                      <div class="loadmore_info"></div>
                           <button id="le35" class="load_data_donatur" data-id="djasxycg6h2" data-count="2" data-fullanonim="true" data-anonim="Orang Baik">Loadmore</button>
                                                   </div> -->
                  </div>
                  <?php }; ?>
                  <!-- end donation -->
               </div>
            </div>
         </div>
      </section>
   </div>
</div>

<!-- End Body Donasi -->



