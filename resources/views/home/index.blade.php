<!--Slider Start-->
         <section id="home-slider" class="owl-carousel owl-theme wf100">
            <?php foreach($slider as $slider) { ?>
            <div class="item">
               <img src="{{ asset('assets/upload/image/'.$slider->gambar) }}" alt=""> 
               <div class="mb-5 ml-3 pr-5 col-md-6" style="position: absolute; bottom: 8px; left: 16px;font-size: 18px;">
               <?php if($slider->status_text=="Ya") { ?>
                     <h1 style="color: white; text-shadow: 2px 2px 5px black;">{{ $slider->judul_galeri }}</h1>
                     <p style="color: white; text-align: left; text-shadow: 2px 2px 5px black;">{{ strip_tags($slider->isi) }}</p>
                     <a href="{{ $slider->website }}" class="btn btn-success">Lihat detail</a>
                     <?php } ?>
               </div>
            </div>
            <?php } ?>
         </section>
         <!--Slider End-->

         <section class="wf100 p10 about gallery">
            <!--About Txt Video Start-->
            <div class="about-video-section wf100">
               <div class="container">
                  <div class="row">
                     <div class="col-lg-7">
                        <div class="about-text">
                           <h5>TENTANG</h5>
                           <h2>{{ $site_config->nama_singkat }}</h2>
                           <?php echo $site_config->tentang ?>

                           <a href="{{ asset('kontak') }}" class="btn btn-info btn-lg">Kontak Kami</a> 
                        </div>
                     </div>
                     <div class="col-lg-5">
                        <div class="video-img"> <a href="https://youtu.be/{{ $video->video }}" data-rel="prettyPhoto" title="{{ $video->judul }}"><i class="fas fa-play"></i></a> <img src="{{ asset('assets/upload/image/'.$video->gambar) }}" alt=""> </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
            <!--About Txt Video End--> 

         <!--Blog Start-->
         <section class="h2-news wf100 p80 blog">
            <div class="blog-grid">
               <div class="container">
                  <div class="row">
                     <div class="col-md-6">
                        <div class="section-title-2">
                           <h5>Baca update kami</h5>
                           <h2>Berita & Updates</h2>
                        </div>
                     </div>
                     <div class="col-md-6"> <a href="{{ asset('berita') }}" class="view-more">Lihat berita lainnya</a> </div>
                     <div class="col-md-12">
                        <hr>
                     </div>
                  </div>
                  <div class="row" style="background-color: white; padding-top: 20px; padding-bottom: 20px; border-radius: 5px;">
                     <?php foreach($berita as $berita) { ?>
                     <!--Blog Small Post Start-->
                     <div class="col-md-3 col-sm-6" >
                        <div class="blog-post">
                           <div class="blog-thumb"> <a href="{{ asset('berita/read/'.$berita->slug_berita) }}"><i class="fas fa-link"></i></a> <img src="{{ asset('assets/upload/image/thumbs/'.$berita->gambar) }}" alt="><?php  echo $berita->judul_berita ?>"> </div>
                           <div class="post-txt">
                              <h5><a href="{{ asset('berita/read/'.$berita->slug_berita) }}"><?php  echo $berita->judul_berita ?></a></h5>
                              <ul class="post-meta">
                                 <li> <a href="{{ asset('berita/read/'.$berita->slug_berita) }}"><i class="fas fa-calendar-alt"></i> {{ tanggal('tanggal_id',$berita->tanggal_post)}}</a> </li>
                                 <li> <a href="{{ asset('berita/kategori/'.$berita->slug_berita) }}"><i class="fas fa-sitemap"></i> {{ $berita->nama_kategori }}</a> </li>
                              </ul>
                              <p><?php echo \Illuminate\Support\Str::limit(strip_tags($berita->isi), 100, $end='...') ?></p>
                              <a href="{{ asset('berita/read/'.$berita->slug_berita) }}" class="">Baca selengkapnya</a>
                           </div>
                        </div>
                     </div>
                     <!--Blog Small Post End--> 
                     <?php } ?>
                  </div>
                  
               </div>
            </div>
         </section>
         <!--Blog End--> 

         <!--Pengumuman-->
         <section class="testimonials-section bg-white wf100 p80">
            <div class="container">
               <div class="row">
                  <div class="col-md-12">
                     <div class="section-title-2 text-center">
                        <h2>Informasi dan Pengumuman</h2>
                     </div>
                     <div id="testimonials" class="owl-carousel owl-theme">
                        <?php
                        foreach($updates as $update) {
                        ?>
                        <!--testimonials box start-->
                        <div class="item">
                           <img src="{{ asset('assets/upload/image/thumbs/'.$update->gambar) }}" alt="{{ $update->judul_berita }}" class="img img-thumbnail img-fluid">      
                           <hr>
                           <h5><?php echo $update->judul_berita ?></h5>
                           <ul class="post-meta">
                              <li> <i class="fas fa-calendar-alt"></i> {{ tanggal('tanggal_id',$update->tanggal_post)}} </li>
                              <li> <i class="fas fa-sitemap"></i> {{ $update->nama_kategori }} </li>
                           </ul>
                           <?php echo \Illuminate\Support\Str::limit(strip_tags($update->keywords), 100, $end='...') ?>
                           <div class="tuser">
                              <a href="{{ asset('berita/read/'.$update->slug_berita) }}" class="btn btn-success"><i class="fa fa-laptop"></i> Lihat Detail</a>
                           </div>
                        </div>
                        <!--testimonials box End--> 
                        <?php } ?>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <!--Pengumuman--> 

         