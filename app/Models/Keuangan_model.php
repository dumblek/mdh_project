<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Keuangan_model extends Model
{
    use HasFactory;

    protected $table = 'keuangan';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id_user');
    }

    public function getRupiahAttribute()
    {
        $hasil_rupiah = "Rp " . number_format($this->amount,2,',','.');
        return $hasil_rupiah;
    }

    public function getSaldoAttribute()
    {
        $keuangan = Keuangan_model::get();
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
        $saldo_akhir = $total_pemasukan - $total_pengeluaran;
        $hasil_rupiah = "Rp " . number_format($saldo_akhir,2,',','.');
        return $hasil_rupiah;
    }

    public static function getNota($type, $kategori)
    {
        $kode_kategori = DB::table('kategori_kas')->find($kategori)->kode;
        
        $lastorderId = DB::table('keuangan')
                        ->where('type', $type)
                        ->where('kategori_id', $kategori)
                        ->where('kode', 'like', '%'. date('ym') . '%')
                        ->orderBy('kode', 'desc')->first()->kode ?? 0;

        // Get last 3 digits of last order id
        $lastIncreament = substr($lastorderId, -3);

        // Make a new order id with appending last increment + 1
        $newOrderId = substr(strtoupper($type),0,1) . $kode_kategori . '/' . date('ym') . str_pad($lastIncreament + 1, 3, 0, STR_PAD_LEFT);

        return $newOrderId;
    }
}
