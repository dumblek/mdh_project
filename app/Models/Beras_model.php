<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Beras_model extends Model
{
    use HasFactory;

    protected $table = 'beras';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id_user');
    }

    public function getSaldoAttribute()
    {
        $beras = Beras_model::get();
        //mencari total
        $total_pemasukan = 0;
        $total_pengeluaran = 0;
        foreach($beras as $b)
        {
            if ($b->type == 'in'){
                $total_pemasukan += $b->jumlah;
            } else {
                $total_pengeluaran += $b->jumlah;
            }
        } 
        $saldo_akhir = $total_pemasukan - $total_pengeluaran;
        return $saldo_akhir;
    }

    public static function getNota($type)
    {
        $lastorderId = DB::table('beras')
                        ->where('type', $type)
                        ->where('kode', 'like', '%'. date('ym') . '%')
                        ->orderBy('kode', 'desc')->first()->kode ?? 0;

        // Get last 3 digits of last order id
        $lastIncreament = substr($lastorderId, -3);

        // Make a new order id with appending last increment + 1
        $newOrderId = 'BRS.'. substr(strtoupper($type),0,3) . '/' . date('ym') . str_pad($lastIncreament + 1, 3, 0, STR_PAD_LEFT);

        return $newOrderId;
    }
}
