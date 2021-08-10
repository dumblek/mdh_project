<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use App\Models\Konfigurasi_model;
use App\Models\Berita_model;
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
    	$mysite = new Konfigurasi_model();
		$site 	= $mysite->listing();
        $model 	= new Berita_model();
		$berita = $model->updates();
        $response = Http::get('https://api.pray.zone/v2/times/today.json?city=yogyakarta');
        $jadwal_solat = $response->json()["results"]["datetime"][0]["times"];
        $today = $response->json()["results"]["datetime"][0]["date"];

        $data = array(  'title'       => 'Berita dan Update',
                        'deskripsi'   => 'Berita dan Update',
                        'keywords'    => 'Berita dan Update',
                        'site'		  => $site,
                        'updates'	  => $berita,
                        'site_config' => $site_config,
                        'jadwal_solat'=> $jadwal_solat,
                        'today'       => $today
                    );

        return view('admin/slideshow/index',$data);
    }
}
