<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Berita_model;
use App\Models\Keuangan_model;
use App\Models\Beras_model;
use App\Models\Agenda_model;
use App\Models\Donasi_model;
use PDF;

class Home extends Controller
{
    // Homepage
    public function index()
    {
    	$site_config   = DB::table('konfigurasi')->first();
        $video          = DB::table('video')->orderBy('id_video','DESC')->first();
    	$slider         = DB::table('galeri')->where('jenis_galeri','Homepage')->limit(5)->orderBy('id_galeri', 'DESC')->get();
        $layanan        = DB::table('berita')->where(array('jenis_berita'=>'Layanan','status_berita'=>'Publish'))->limit(5)->orderBy('urutan', 'ASC')->get();
        $news           = new Berita_model();
        $berita         = $news->home();
        $artikels        = $news->artikels();
        $event          = new Agenda_model();
        $agenda         = $event->semua();
        $donasi         = new Donasi_model();
        $donasi         = $donasi->listing();
        // dd($donasi);

        $data = array(  'title'         => $site_config->namaweb.' - '.$site_config->tagline,
                        'deskripsi'     => $site_config->namaweb.' - '.$site_config->tagline,
                        'keywords'      => $site_config->namaweb.' - '.$site_config->tagline,
                        'slider'        => $slider,
                        'site_config'   => $site_config,
                        'berita'        => $berita,
                        'artikels'      => $artikels,
                        'agenda'        => $agenda,
                        'donasi'        => $donasi,
                        'layanan'       => $layanan,
                        'video'         => $video,
                        'content'       => 'home/index'
                    );
        return view('layout/wrapper',$data);
    }

    // Profil
    public function profil()
    {
        $site_config   = DB::table('konfigurasi')->first();
        $news   = new Berita_model();
        $berita = $news->home();
        // Staff
        $kategori_staff  = DB::table('kategori_staff')->orderBy('urutan','ASC')->get();
        $layanan = DB::table('berita')->where(array('jenis_berita' => 'Layanan','status_berita' => 'Publish'))->orderBy('urutan', 'ASC')->get();

        $data = array(  'title'     => 'Tentang '.$site_config->namaweb,
                        'deskripsi' => 'Tentang '.$site_config->namaweb,
                        'keywords'  => 'Tentang '.$site_config->namaweb,
                        'site_config'      => $site_config,
                        'berita'    => $berita,
                        'layanan'   => $layanan,
                        'kategori_staff'     => $kategori_staff,
                        'content'   => 'home/aws'
                    );
        return view('layout/wrapper',$data);
    }

    // Saldo
    public function saldo()
    {
        $site_config   = DB::table('konfigurasi')->first();
        //default range tanggal sebulan sebelum hari ini
        date_default_timezone_set('Asia/Jakarta');
        $default_end = now()->format('Y-m-d');
        $default_start = date("Y-m-d", strtotime("$default_end -30 day"));
        //get data keuangan
        $kategori_kas = DB::table('kategori_kas')->orderBy('nama','ASC')->get();
        $keuangan_all = Keuangan_model::orderBy('tanggal', 'asc')->get();
        $keuangan = $keuangan_all->whereBetween('tanggal', [$default_start, $default_end]);
        $pemasukan = []; $kategori_masuk = []; 
        $pengeluaran = []; $kategori_keluar = [];
        foreach ($keuangan as $uang){
            if ($uang->type == 'in'){
                array_push($pemasukan, $uang);
                array_push($kategori_masuk, $uang->kategori_id);
            } else {
                array_push($pengeluaran, $uang);
                array_push($kategori_keluar, $uang->kategori_id);
            }
        }
        $kategori_masuk = array_unique($kategori_masuk);
        $kategori_masuk = $kategori_kas->whereIn('id', $kategori_masuk);
        $kategori_keluar = array_unique($kategori_keluar);
        $kategori_keluar = $kategori_kas->whereIn('id', $kategori_keluar);
        //mencari saldo awal
        $tanggal_saldo_awal = date("Y-m-d", strtotime("$default_start -1 day"));
        $data_saldo_awal = $keuangan_all->where('tanggal', '<=', $tanggal_saldo_awal);
        $saldo_awal = 0;
        foreach ($data_saldo_awal as $data){
            if ($data->type == 'in'){
                $saldo_awal += $data->amount;
            } else {
                $saldo_awal -= $data->amount;
            }
        };
        //mencari total
        $total_pemasukan = 0;
        $total_pengeluaran = 0;
        foreach($keuangan as $uang)
        {
            if ($uang->type == 'in'){
                $total_pemasukan += $uang->amount;
            } else {
                $total_pengeluaran += $uang->amount;
            }
        } 
        $saldo_akhir = $total_pemasukan - $total_pengeluaran + $saldo_awal;

        //get data beras
        $beras_all = Beras_model::orderBy('tanggal', 'asc')->get();
        $beras = $beras_all->whereBetween('tanggal', [$default_start, $default_end]);
        $beras_masuk = []; 
        $beras_keluar = [];
        foreach ($beras as $b){
            if ($b->type == 'in'){
                array_push($beras_masuk, $b);
            } else {
                array_push($beras_keluar, $b);
            }
        }
        //mencari saldo awal
        $beras_saldo_awal = $beras_all->where('tanggal', '<=', $tanggal_saldo_awal);
        $saldo_awal_beras = 0;
        foreach ($beras_saldo_awal as $data){
            if ($data->type == 'in'){
                $saldo_awal_beras += $data->jumlah;
            } else {
                $saldo_awal_beras -= $data->jumlah;
            }
        };
        //mencari total
        $total_beras_masuk = 0;
        $total_beras_keluar = 0;
        foreach($beras as $b)
        {
            if ($b->type == 'in'){
                $total_beras_masuk += $b->jumlah;
            } else {
                $total_beras_keluar += $b->jumlah;
            }
        } 
        $saldo_akhir_beras = $total_beras_masuk - $total_beras_keluar + $saldo_awal_beras;

        $data = array(  'title'             => 'Informasi Saldo Keuangan dan Beras',
                        'deskripsi'         => 'Tentang '.$site_config->namaweb,
                        'keywords'          => 'Tentang '.$site_config->namaweb,
                        'site_config'       => $site_config,
                        'pemasukan'         => $pemasukan,
                        'pengeluaran'       => $pengeluaran,
                        'kategori_masuk'    => $kategori_masuk,
                        'kategori_keluar'   => $kategori_keluar,
                        'total_pemasukan'   => self::rupiah($total_pemasukan),
                        'total_pengeluaran' => self::rupiah($total_pengeluaran),
                        'saldo_akhir'       => self::rupiah($saldo_akhir),
                        'tanggal_saldo_awal'=> $tanggal_saldo_awal,
                        'saldo_awal'        => self::rupiah($saldo_awal),
                        'beras_masuk'       => $beras_masuk,
                        'beras_keluar'      => $beras_keluar,
                        'total_beras_masuk' => $total_beras_masuk,
                        'total_beras_keluar'=> $total_beras_keluar,
                        'saldo_akhir_beras' => $saldo_akhir_beras,
                        'saldo_awal_beras'  => $saldo_awal_beras,
                        'default_start'     => $default_start,
                        'default_end'       => $default_end,
                        'content'           => 'home/saldo'
                    );
        return view('layout/wrapper',$data);
    }

    // kontak
    public function kontak()
    {
        $site_config   = DB::table('konfigurasi')->first();

        $data = array(  'title'     => 'Menghubungi '.$site_config->namaweb,
                        'deskripsi' => 'Kontak '.$site_config->namaweb,
                        'keywords'  => 'Kontak '.$site_config->namaweb,
                        'site_config'      => $site_config,
                        'content'   => 'home/kontak'
                    );
        return view('layout/wrapper',$data);
    }

    function rupiah($angka){
        $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
        return $hasil_rupiah;
    }

}
