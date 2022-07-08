<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Keuangan_model;

class Keuangan extends Controller
{
    // Index
    public function index()
    {
        //default range tanggal seminggu sebelum hari ini
        date_default_timezone_set('Asia/Jakarta');
        $default_end = now()->format('Y-m-d');
        $default_start = date("Y-m-d", strtotime("$default_end -14 day"));
        //get data
        $keuangan_all = Keuangan_model::orderBy('tanggal', 'asc')->get();
        $keuangan = $keuangan_all->whereBetween('tanggal', [$default_start, $default_end]);
        $kategori_kas    = DB::table('kategori_kas')->orderBy('nama','ASC')->get();
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
        $data = array(  'title'             => 'Informasi Saldo',
                        'keuangan'          => $keuangan,
                        'kategori_kas'      => $kategori_kas,
                        'total_pemasukan'   => self::rupiah($total_pemasukan),
                        'total_pengeluaran' => self::rupiah($total_pengeluaran),
                        'saldo_akhir'       => self::rupiah($saldo_akhir),
                        'tanggal_saldo_awal'=> $tanggal_saldo_awal,
                        'saldo_awal'        => self::rupiah($saldo_awal),
                        'default_start'     => $default_start,
                        'default_end'       => $default_end,
                    );
        return response()->json($data, 200);
    }

    // Edit
    public function cari(Request $request)
    {
        $tanggal_saldo_awal = date("Y-m-d", strtotime("$request->start -1 day"));
        $keuangan_all = Keuangan_model::orderBy('tanggal', 'asc')->get();

        if($request->id_kategori == "all"){
            $keuangan = $keuangan_all->whereBetween('tanggal', [$request->start, $request->end]);
            $data_saldo_awal = $keuangan_all->where('tanggal', '<=', $tanggal_saldo_awal); 
        } else {
            $keuangan = $keuangan_all->where('kategori_id', $request->id_kategori)
                                     ->whereBetween('tanggal', [$request->start, $request->end]);
            $data_saldo_awal = $keuangan_all->where('kategori_id', $request->id_kategori)
                                            ->where('tanggal', '<=', $tanggal_saldo_awal);
        }
        $kategori_kas    = DB::table('kategori_kas')->orderBy('nama','ASC')->get();
        //mencari saldo awal
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
        $data = array(  'title'             => 'Informasi Saldo',
                        'keuangan'          => $keuangan,
                        'kategori_kas'      => $kategori_kas,
                        'total_pemasukan'   => self::rupiah($total_pemasukan),
                        'total_pengeluaran' => self::rupiah($total_pengeluaran),
                        'saldo_akhir'       => self::rupiah($saldo_akhir),
                        'tanggal_saldo_awal'=> $tanggal_saldo_awal,
                        'saldo_awal'        => self::rupiah($saldo_awal),
                        'request'           => $request,
                    );
        
        return response()->json($data, 200);
    }

    function rupiah($angka){
        $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
        return $hasil_rupiah;
    }

}
