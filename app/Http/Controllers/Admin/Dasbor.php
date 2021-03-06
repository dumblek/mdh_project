<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use App\Models\Konfigurasi_model;
use App\Models\Berita_model;
use App\Models\Keuangan_model;
use App\Models\Beras_model;
use Image;
use PDF;

class Dasbor extends Controller
{


    // Index
    public function index()
    {
        if(Session()->get('username')=="") {
            $last_page = url()->full();
            return redirect('login?redirect='.$last_page)->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
    	$mysite = new Konfigurasi_model();
		$site 	= $mysite->listing();
       
		$data = array(  'title'     => $site->namaweb.' - '.$site->tagline,
                        'content'   => 'admin/dasbor/index'
                    );
        return view('admin/layout/wrapper',$data);
    }

    public function slideshow()
    {
        if(Session()->get('username')=="") {
            $last_page = url()->full();
            return redirect('login?redirect='.$last_page)->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        $site_config   = DB::table('konfigurasi')->first();
    	$mysite = new Konfigurasi_model;
		$site 	= $mysite->listing();
        $model 	= new Berita_model;
		$program = $model->program();

        $data = array(  'title'          => 'Berita dan Update',
                        'deskripsi'      => 'Berita dan Update',
                        'keywords'       => 'Berita dan Update',
                        'site'		     => $site,
                        'program'	     => $program,
                        'site_config'    => $site_config,
                    );

        return view('admin/slideshow/index',$data);
    }

    public function saldo(){
        $keuangan = new Keuangan_model;
        $saldo_keuangan = $keuangan->saldo;
        $saldo_ramadhan = $keuangan->saldo_ramadhan;
        $beras = new Beras_model;
        $saldo_beras = $beras->saldo . ' Kg';
        $response = Http::get('https://api.pray.zone/v2/times/today.json?city=yogyakarta');
        $jadwal_solat = $response->json()["results"]["datetime"][0]["times"];
        $today = $response->json()["results"]["datetime"][0]["date"];
        $data = array(  'saldo_keuangan' => $saldo_keuangan,
                        'saldo_beras'    => $saldo_beras,
                        'jadwal_solat'   => $jadwal_solat,
                        'today'          => $today,
                        'saldo_ramadhan' => $saldo_ramadhan
                    );
        echo json_encode($data);
    }

    public function qurban()
    {
        // if(Session()->get('username')=="") {
        //     $last_page = url()->full();
        //     return redirect('login?redirect='.$last_page)->with(['warning' => 'Mohon maaf, Anda belum login']);
        // }
        $site_config   = DB::table('konfigurasi')->first();
    	$mysite = new Konfigurasi_model;
		$site 	= $mysite->listing();
        $model 	= new Berita_model;
		$program = $model->program();

        $data = array(  'title'          => 'Berita dan Update',
                        'deskripsi'      => 'Berita dan Update',
                        'keywords'       => 'Berita dan Update',
                        'site'		     => $site,
                        'program'	     => $program,
                        'site_config'    => $site_config,
                    );

        return view('admin/qurban/index',$data);
    }

    public function data_qurban(){
        $penyembelihan = DB::table('qurban')->where('kegiatan', 'penyembelihan')->get();
        $pengeletan = DB::table('qurban')->where('kegiatan', 'pengeletan')->get();
        $penimbangan = DB::table('qurban')->where('kegiatan', 'penimbangan')->get();
        $pembungkusan = DB::table('qurban')->where('kegiatan', 'pembungkusan')->get();
        $pembungkusan_umum = DB::table('qurban')->where('kegiatan', 'pembungkusan umum')->first();
        $distribusi_warga = DB::table('qurban')->where('kegiatan', 'distribusi warga')->first();
        $distribusi_luar = DB::table('qurban')->where('kegiatan', 'distribusi luar')->first();
        
        $data = array(  'penyembelihan' => $penyembelihan,
                        'pengeletan'    => $pengeletan,
                        'penimbangan' => $penimbangan,
                        'pembungkusan' => $pembungkusan,
                        'pembungkusan_umum' => $pembungkusan_umum,
                        'distribusi_warga' => $distribusi_warga,
                        'distribusi_luar' => $distribusi_luar
                    );
        echo json_encode($data);
    }
}
