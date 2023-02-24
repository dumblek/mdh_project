<?php 
$bg   = DB::table('heading')->where('halaman','Berita')->orderBy('id_heading','DESC')->first();
 ?>
<!--Inner Header Start-->
<!-- <section class="wf100 p80 inner-header" style="background-image: url('{{ asset('assets/upload/image/'.$bg->gambar) }}'); background-position: bottom center;">
   <div class="container">
      <h1>{{ $title }}</h1>
   </div>
</section> -->
<!--Inner Header End--> 
<!--Blog Start-->
<section class="wf100 blog" style="padding: 30px 0;">
   <div class="blog-grid">
      <div class="container">
         <div class="row">
            <ul id="section_dsnf2ckek" class="cards__campaign cards__list">
               <?php foreach($donasi as $donasi) { ?>
               <li class="cards__item">
                  <a href="{{ asset('donasi/read/'.$donasi->slug_donasi) }}">
                     <div class="card__">
                     <div class="card__image"><img decoding="async" src="{{ asset('assets/upload/image/thumbs/'.$donasi->gambar) }}" alt="{{ $donasi->judul }}"></div>
                     <div class="card__content content_1">
                        <div class="card__title"><?php  echo $donasi->judul ?></div>
                     </div>
                     <div class="card__content content_2">
                        <div class="card__text campaigner_name">Masjid Darul Husna<div class="verified_checklist"><img decoding="async" alt="Image" src="https://lazismu.bmtumy.com/wp-content/plugins/donasiaja/assets/images/check.png"></div></div>
                        <div class="card__text donation_collected" style="color:#009F61"><?php  echo "Rp " . number_format($donasi->tercapai,0,',','.') ?><span class="donation_collected_text">terkumpul</span></div>
                        <div style="height:4px; width:100%;background:#eaeaea;border-radius:4px;"><div style="height:4px; width:<?php  echo $donasi->persen ?>%;background:#009F61;border-radius:4px;" title="2.3406%"></div>
                     </div>
                     <div class="u_campaign u_donasi">
                        <div class="u_photo">
                           <span class="u_image u_inisial" style="background:#009F61"> E </span><span class="u_image u_inisial" style="background:#009F61"> M </span><span class="u_image u_inisial" style="background:#009F61"> D </span>
                           <span class="u_image u_inisial" style="background:#009F61">2+</span>
                        </div>
                        <!-- <div class="campaign_days" style="margin-top:5px;font-size:11px;">17&nbsp;hari&nbsp;lagi</div> -->
                        </div>
                     </div>
                     </div>
                  </a>
               </li>
               <?php } ?>
            </ul>
         </div>
      </div>
   </div>
</section>
<!--Blog End--> 