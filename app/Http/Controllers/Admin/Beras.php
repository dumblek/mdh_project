<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Beras_model;

class Beras extends Controller
{
    // Index
    public function index()
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        //default range tanggal seminggu sebelum hari ini
        $default_end = now()->format('Y-m-d');
        $default_start = date("Y-m-d", strtotime("$default_end -7 day"));
        //get data
        $beras_all = Beras_model::orderBy('tanggal', 'asc')->get();
        $beras = $beras_all->whereBetween('tanggal', [$default_start, $default_end]);
        //mencari saldo awal
        $tanggal_saldo_awal = date("Y-m-d", strtotime("$default_start -1 day"));
        $data_saldo_awal = $beras_all->where('tanggal', '<=', $tanggal_saldo_awal);
        $saldo_awal = 0;
        foreach ($data_saldo_awal as $data){
            if ($data->type == 'in'){
                $saldo_awal += $data->jumlah;
            } else {
                $saldo_awal -= $data->jumlah;
            }
        };
        //mencari total
        $total_pemasukan = 0;
        $total_pengeluaran = 0;
        foreach($beras as $uang)
        {
            if ($uang->type == 'in'){
                $total_pemasukan += $uang->jumlah;
            } else {
                $total_pengeluaran += $uang->jumlah;
            }
        } 
        $saldo_akhir = $total_pemasukan - $total_pengeluaran + $saldo_awal;
        $data = array(  'title'             => 'Informasi Saldo Beras',
                        'beras'             => $beras,
                        'total_pemasukan'   => $total_pemasukan,
                        'total_pengeluaran' => $total_pengeluaran,
                        'saldo_akhir'       => $saldo_akhir,
                        'tanggal_saldo_awal'=> $tanggal_saldo_awal,
                        'saldo_awal'        => $saldo_awal,
                        'default_start'     => $default_start,
                        'default_end'       => $default_end,
                        'content'           => 'admin/beras/index'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // Edit
    public function cari(Request $request)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        
        $tanggal_saldo_awal = date("Y-m-d", strtotime("$request->start -1 day"));
        $beras_all = Beras_model::orderBy('tanggal', 'asc')->get();

        if($request->id_kategori == "all"){
            $beras = $beras_all->whereBetween('tanggal', [$request->start, $request->end]);
            $data_saldo_awal = $beras_all->where('tanggal', '<=', $tanggal_saldo_awal); 
        } else {
            $beras = $beras_all->where('kategori_id', $request->id_kategori)
                                     ->whereBetween('tanggal', [$request->start, $request->end]);
            $data_saldo_awal = $beras_all->where('kategori_id', $request->id_kategori)
                                            ->where('tanggal', '<=', $tanggal_saldo_awal);
        }
        //mencari saldo awal
        $saldo_awal = 0;
        foreach ($data_saldo_awal as $data){
            if ($data->type == 'in'){
                $saldo_awal += $data->jumlah;
            } else {
                $saldo_awal -= $data->jumlah;
            }
        };
        //mencari total
        $total_pemasukan = 0;
        $total_pengeluaran = 0;
        foreach($beras as $uang)
        {
            if ($uang->type == 'in'){
                $total_pemasukan += $uang->jumlah;
            } else {
                $total_pengeluaran += $uang->jumlah;
            }
        } 
        $saldo_akhir = $total_pemasukan - $total_pengeluaran + $saldo_awal;
        $data = array(  'title'             => 'Informasi Saldo',
                        'beras'             => $beras,
                        'total_pemasukan'   => $total_pemasukan,
                        'total_pengeluaran' => $total_pengeluaran,
                        'saldo_akhir'       => $saldo_akhir,
                        'tanggal_saldo_awal'=> $tanggal_saldo_awal,
                        'saldo_awal'        => $saldo_awal,
                        'request'           => $request,
                        'content'           => 'admin/beras/index'
                    );
        
        return view('admin/layout/wrapper',$data);
    }
}
