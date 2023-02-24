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
<!-- <div class="section-image">
	<div class="img-box">
			<img src="{{ asset('assets/upload/image/'.$read->gambar) }} alt="Image">
			<div>Anda akan berdonasi dalam program:</div>
	<h1>Infak Peduli Gempa Turki</h1></div>
</div> -->
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
<!--Inner Header End--> 
<!-- Body Donasi -->
<form action="{{ asset('donasi/read/'.$read->slug_donasi.'/donasi-sekarang/invoice') }}" method="post" enctype="multipart/form-data" accept-charset="utf-8">
{{ csrf_field() }}

<div class="section-box">
	<div class="form-group" id="form-group">
		<div class="donasiaja-input" style="margin-top: 10px;">
			<label>Donasi Terbaik Anda</label><br>
			<div class="card-body card-group">
				<label class="card-radio-btn">
					<input type="radio" name="nominal_donasi" class="card-input-element" value="10000" data-label="Rp 10rb">
						<div class="card card-body">
							<div class="content_head no_desc">Rp 10rb</div>
							<div class="content_sub no_desc">&nbsp;</div>
							<div class="box-checklist no_desc"><div class="checklist"></div></div>
						</div>
				</label>
				<label class="card-radio-btn">
					<input type="radio" name="nominal_donasi" class="card-input-element" value="25000" data-label="Rp 25rb">
						<div class="card card-body">
							<div class="content_head no_desc">Rp 25rb</div>
							<div class="content_sub no_desc">&nbsp;</div>
							<div class="box-checklist no_desc"><div class="checklist"></div></div>
						</div>
				</label>
				<label class="card-radio-btn">
					<input type="radio" name="nominal_donasi" class="card-input-element" value="50000" data-label="Rp 50rb">
						<div class="card card-body">
							<div class="content_head no_desc">Rp 50rb</div>
							<div class="content_sub no_desc">&nbsp;</div>
							<div class="box-checklist"><div class="checklist"></div></div>
						</div>
				</label>
				<label class="card-radio-btn">
					<input type="radio" name="nominal_donasi" class="card-input-element" value="100000" data-label="Rp 100rb">
						<div class="card card-body">
							<div class="content_head no_desc">Rp 100rb</div>
							<div class="content_sub no_desc">&nbsp;</div>
							<div class="box-checklist no_desc"><div class="checklist"></div></div>
						</div>
				</label>
				<label id="other_nominal_radio" class="card-radio-btn other_nominal">
					<input type="radio" name="nominal_donasi" class="card-input-element" value="0" data-label="">
					<div class="card card-body">
						<div class="content_head">Nominal</div>
						<div class="content_sub">lainnya</div>
						<div class="box-checklist"><div class="checklist"></div></div>
					</div>
				</label>
			</div>
		</div>
		<div class="donasiaja-input other_nominal_value hide_input">
			<input placeholder="Masukkan Nominal" type="tel" class="form-control" name="nominal_lainnya" value="">
			<div class="currency">Rp</div>
		</div>
		<!-- <div class="donasiaja-input payment">
			<div class="box_img_payment">
				<img class="img_payment_selected" src="https://lazismu.bmtumy.com/wp-content/plugins/donasiaja/assets/images/bank/bank.png" alt="Image" data-paymentmethod="" data-paymentcode="" data-paymentnumber="" data-paymentaccount=""></div>
			<label class="title_payment selected">Metode pembayaran</label>
			<div id="choose_payment" class="choose_payment">Pilih ▾</div>
		</div> -->
		<div class="donasiaja-input fullname">
			<input id="name" placeholder="Nama Lengkap" type="text" maxlength="120" class="form-control" name="name" value="">
		</div>
		<div class="donasiaja-input anonim">
		<p style="font-size: medium;">Sembunyikan nama saya (Hamba Allah)</p>
			<input id="anonim" type="checkbox" class="toggle1" name="anonim">
		</div>
		<div class="donasiaja-input whatsapp">
			<input id="whatsapp" placeholder="No Whatsapp atau Handphone" type="number" maxlength="15" class="form-control wa" name="whatsapp" value="" onkeypress="allowNumbersOnly(event)">
		</div>
		<div class="donasiaja-input email">
			<input id="email" placeholder="Email (optional)" type="email" maxlength="60" class="form-control" name="email" value="">
		</div>		
		<div class="donasiaja-input comment">
			<textarea id="comment" placeholder="Tuliskan pesan atau doa disini (optional)" class="form-control" name="comment" rows="3"></textarea>
			<div class="box-char"><div id="charNum">&nbsp;</div></div>
			<input id="campaign_id" type="text" class="form-control" name="campaign_id" value="<?php echo $read->id ?>" style="display: none;">
			<br><br>
		</div>
	</div>
</div>

<div class="section-box">
	<span class="">
		<button type="submit" name="submit" class="donation_button_now" style="background:;border-color:">Donasi <span id="nominal_value">Rp 25rb</span> 
			<div class="donasi-loading loading-hide"></div>
		</button>
		<!-- <a href="{{ asset('donasi/read/'.$read->slug_donasi.'/donasi-sekarang/invoice') }}">
		</a> -->
	</span>
</div>

</form>

<!-- End Body Donasi -->



