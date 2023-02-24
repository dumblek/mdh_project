<?php 
$bg   = DB::table('heading')->where('halaman','Berita')->orderBy('id_heading','DESC')->first();
$site_config = DB::table('konfigurasi')->first();
 ?>

<!-- Body Donasi -->
<div id="typ_section" class="section-box" style="background: url('https://lazismu.bmtumy.com/wp-content/plugins/donasiaja/assets/images/bg3.png') no-repeat, #fff;">
	<div class="title" style="margin-bottom: 30px;">
		<p class="typ_text">Terimakasih <b><?php echo $donatur->nama ?></b><br>atas Donasi yang akan anda berikan pada program :</p>
		<h2 style="text-align: center;font-size: 16px;"><?php echo $read->judul ?></h2>
		<br>
	</div>

								
	<div class="box-card no_rekening">
		<div class="box-img"><img src="https://lazismu.bmtumy.com/wp-content/plugins/donasiaja/assets/images/bank/bsi.png"></div>
		<ul>
			<li class="bank-name">9017305790</li>
			<li class="bank-number">A.n Masjid Darul Husna Warungboto</li>
			<li class="copy copy-rek" data-salin="9017305790"><img src="https://lazismu.bmtumy.com/wp-content/plugins/donasiaja/assets/icons/copy.png">Copy Rekening</li>
		</ul>
		<div class="box-copy"><span class="typ-rek-copy" data-salin="9017305790" style="background: transparent;color: #888095;"><img src="https://lazismu.bmtumy.com/wp-content/plugins/donasiaja/assets/icons/copy.png"> COPY</span></div>
	</div>

				
	<div class="box-card total_donasi">
		<div class="box-img"><img src="https://lazismu.bmtumy.com/wp-content/plugins/donasiaja/assets/icons/donation_love.png" style="width: 35px;margin-left: 15px;margin-right: 35px;"></div>
		<ul>
			<li class="bank-name" style="font-size: 21px;padding-top: 7px;"><?php  echo "Rp " . number_format($donatur->nominal,0,',','.') ?></span></li>
			<li class="copy copy-total" data-salin="<?php  echo $donatur->nominal ?>"><img src="https://lazismu.bmtumy.com/wp-content/plugins/donasiaja/assets/icons/copy.png">Copy Total</li>
		</ul>
		<div class="box-copy"><span class="typ-total-copy" data-salin="<?php  echo $donatur->nominal ?>" style="background: transparent;color: #888095;margin-top: 5px;"><img src="https://lazismu.bmtumy.com/wp-content/plugins/donasiaja/assets/icons/copy.png"> COPY</span></div>
	</div>
	
	<div class="box-card" style="background:#fff5e4;">
		<div class="box-img"><img src="https://lazismu.bmtumy.com/wp-content/plugins/donasiaja/assets/icons/timer.png" style="width: 35px;margin-left: 18px;margin-right: 32px;"></div>
		<ul>
			<li class="bank-number">Silahkan transfer sebelum :</li>
			<li class="bank-name"><?php echo $tgl_batas ?></li>
		</ul>
	</div>
	<br>
	
	<p class="typ_text" style="text-align: left;margin-bottom: 40px;font-size: 13px;">Setelah transfer harap konfirmasi ke nomor dibawah ini. Jazakumullah khairan katsiran...</p>
	
	<a href="https://api.whatsapp.com/send?phone={{ $site_config->telepon }}&text=Asalamualaikum Admin, saya telah berdonasi sebesar <?php  echo "Rp " . number_format($donatur->nominal,0,',','.') ?>. Untuk program {{ $read->judul }}">
		<div class="box-card no_rekening">
			<div class="box-img"><img src="{{ asset('assets/upload/image/PngItem_404856.png') }}"></div>
			<ul>
				<li class="bank-name">{{ $site_config->telepon }}</li>
				<li class="bank-number">Admin Masjid Darul Husna Warungboto</li>
				<!-- <li class="copy copy-rek" data-salin="1313999994"><img src="https://lazismu.bmtumy.com/wp-content/plugins/donasiaja/assets/icons/copy.png">Konfirmasi</li> -->
			</ul>
			<!-- <div class="box-copy"><span class="typ-rek-copy" data-salin="1313999994" style="background: transparent;color: #888095;"><img src="https://lazismu.bmtumy.com/wp-content/plugins/donasiaja/assets/icons/copy.png"> Konfirmasi</span></div> -->
		</div>
	</a>
				
	<div class="box-card2">
		<div class="accordion-container">
		<h3 style="text-align: center;margin-bottom: 20px;margin-top: 20px;">Instruksi Pembayaran</h3><div class="set">
			<a href="javascript:;" class="active">
				BSI Mobile
				<i class="fa fa-minus"></i>
			</a><ol class="content" style="display: block;"><li>Buka aplikasi BSI Mobile.</li><li>Pilih menu Transfer.</li><li>Pilih Transfer antar Rekening BSI.</li><li>Tap Pilih Rekening Debet.</li><li>Kemudian tap Pilih Tujuan Transfer, silahkan pilih ke rekening BSI sendiri atau BSI orang lain.</li><li>Masukan nomor rekening tujuan transfer.</li><li>Masukan jumlah uang atau nominal yang akan kamu transfer sesama BSI.</li><li>Tap Selanjutnya.</li><li>Masukan PIN BSI Mobile.</li><li>Jika transfer ke sesama BSI berhasil maka akan muncul bukti transfer BSI Mobile.</li></ol></div>					</div>
	</div>
								
</div>

<!-- End Body Donasi -->



