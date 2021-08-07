<?php 
$bg   = DB::table('heading')->where('halaman','AWS')->orderBy('id_heading','DESC')->first();
 ?>
<!--Inner Header Start-->
<section class="wf100 p80 inner-header" style="background-image: url('{{ asset('assets/upload/image/'.$bg->gambar) }}'); background-position: bottom center;">
   <div class="container">
      <h1>{{ $title }}</h1>
   </div>
</section>
<!--Inner Header End--> 
<!--About Start-->
<section class="wf100 about">
   <!--About Txt Video Start-->
   <div class="about-video-section wf100">
      <div class="container">
         <div class="row">
            <div class="col-lg-12">
               <div class="about-text">
                  <h6 class="text-left" style="padding-left:10%;">{{ 'Periode: ' . $default_start .' s/d '. $default_end }}</h6>
                  <div style="padding-left:10%; padding-right:10%">
                     <table class="table table-sm">
                        <thead>
                           <tr>
                              <th scope="col" colspan="4" class="text-left">A. Pemasukan</th>
                           </tr>
                        </thead>
                        <tbody>
                           <tr>
                              <th scope="row" style="width: 10%" class="text-right">1.</th>
                              <td>Saldo Awal</td>
                              <td>{{ $tanggal_saldo_awal }}</td>
                              <td class="text-right">{{ $saldo_awal }}</td>
                           </tr>
                           <?php 
                           $no = 2;
                           foreach($kategori_masuk as $kat_masuk){
                           ?>
                           <tr>
                              <th scope="row" style="width: 10%" class="text-right">{{ $no }}.</th>
                              <td colspan="3">{{ $kat_masuk->nama }}</td>
                           </tr>
                           <?php 
                              foreach($pemasukan as $masuk){
                                 if($kat_masuk->id == $masuk->kategori_id){
                           ?>
                           <tr>
                              <th scope="row" style="width: 10%" class="text-right"></th>
                              <td>a. {{ $masuk->keterangan}}</td>
                              <td>{{ $masuk->tanggal }}</td>
                              <td class="text-right">{{ $masuk->rupiah }}</td>
                           </tr>
                           <?php 
                                 }
                              };
                           ?>
                           <?php 
                           $no++;
                           };
                           ?>
                           <tr>
                              <th scope="row" style="width: 10%" class="text-left" colspan="3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Total Pemasukan</th>
                              <th class="text-right">{{ $total_pemasukan }}</th>
                           </tr>
                        </tbody>
                        <thead>
                           <tr>
                              <th scope="col" colspan="4" class="text-left">B. Pengeluaran</th>
                           </tr>
                        </thead>
                        <tbody>
                        <?php 
                           $no = 1;
                           foreach($kategori_keluar as $kat_keluar){
                           ?>
                           <tr>
                              <th scope="row" style="width: 10%" class="text-right">{{ $no }}.</th>
                              <td colspan="3">{{ $kat_keluar->nama }}</td>
                           </tr>
                           <?php 
                              foreach($pengeluaran as $keluar){
                                 if($kat_keluar->id == $keluar->kategori_id){
                           ?>
                           <tr>
                              <th scope="row" style="width: 10%" class="text-right"></th>
                              <td>a. {{ $keluar->keterangan}}</td>
                              <td>{{ $keluar->tanggal }}</td>
                              <td class="text-right">{{ $keluar->rupiah }}</td>
                           </tr>
                           <?php 
                                 }
                              };
                           ?>
                           <?php 
                           $no++;
                           };
                           ?>
                           <tr>
                              <th scope="row" style="width: 10%" class="text-left" colspan="3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Total Pengeluaran</th>
                              <th class="text-right">{{ $total_pengeluaran }}</th>
                           </tr>
                        </tbody>
                        <thead>
                           <tr>
                              <th scope="col" colspan="3" class="text-left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Total Saldo</th>
                              <th scope="col" class="text-right">{{ $saldo_akhir }}</th>
                           </tr>
                        </thead>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!--About Txt Video End--> 
<div class="clearfix"><br><br></div>
