<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Donasi_model extends Model
{

	protected $table 		= "donasi";
	protected $primaryKey 	= 'id';

    protected $fillable = [
        'tercapai', 'status'
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id_user');
    }

     // listing
    public function semua()
    {
        $query = DB::table('donasi')
            ->join('users', 'users.id_user', '=', 'donasi.user_id','LEFT')
            ->select('donasi.*','users.nama')
            ->orderBy('id','DESC')
            ->paginate(25);
        return $query;
    }

    // author
    public function author($id_user)
    {
        $query = DB::table('donasi')
            ->join('users', 'users.id_user', '=', 'donasi.id_user','LEFT')
            ->select('donasi.*', 'kategori_donasi.slug_kategori_agenda', 'kategori_donasi.nama_kategori_agenda','users.nama')
            ->where('donasi.id_user',$id_user)
            ->orderBy('id_agenda','DESC')
            ->paginate(25);
        return $query;
    }

    // listing
    public function cari($keywords)
    {
        $query = DB::table('agenda')
            ->join('kategori_agenda', 'kategori_donasi.id_kategori_agenda', '=', 'donasi.id_kategori_agenda','LEFT')
            ->join('users', 'users.id_user', '=', 'donasi.id_user','LEFT')
            ->select('donasi.*', 'kategori_donasi.slug_kategori_agenda', 'kategori_donasi.nama_kategori_agenda','users.nama')
            ->where('donasi.judul_agenda', 'LIKE', "%{$keywords}%") 
            ->orWhere('donasi.isi', 'LIKE', "%{$keywords}%") 
            ->orderBy('id_agenda','DESC')
           ->paginate(25);
        return $query;
    }

    // kategori_agenda
    public function all_kategori_agenda($id_kategori_agenda)
    {
        $query = DB::table('agenda')
            ->join('kategori_agenda', 'kategori_donasi.id_kategori_agenda', '=', 'donasi.id_kategori_agenda','LEFT')
            ->join('users', 'users.id_user', '=', 'donasi.id_user','LEFT')
            ->select('donasi.*', 'kategori_donasi.slug_kategori_agenda', 'kategori_donasi.nama_kategori_agenda','users.nama')
            ->where(array(  'donasi.id_kategori_agenda'    => $id_kategori_agenda))
            ->orderBy('id_agenda','DESC')
            ->paginate(25);
        return $query;
    }

    // kategori_agenda
    public function status_agenda($status_agenda)
    {
        $query = DB::table('agenda')
             ->join('kategori_agenda', 'kategori_donasi.id_kategori_agenda', '=', 'donasi.id_kategori_agenda','LEFT')
            ->join('users', 'users.id_user', '=', 'donasi.id_user','LEFT')
            ->select('donasi.*', 'kategori_donasi.slug_kategori_agenda', 'kategori_donasi.nama_kategori_agenda','users.nama')
            ->where(array(  'donasi.status_agenda'         => $status_agenda))
            ->orderBy('id_agenda','DESC')
            ->paginate(25);
        return $query;
    }

    // kategori_agenda
    public function jenis_agenda($jenis_agenda)
    {
        $query = DB::table('agenda')
             ->join('kategori_agenda', 'kategori_donasi.id_kategori_agenda', '=', 'donasi.id_kategori_agenda','LEFT')
            ->join('users', 'users.id_user', '=', 'donasi.id_user','LEFT')
            ->select('donasi.*', 'kategori_donasi.slug_kategori_agenda', 'kategori_donasi.nama_kategori_agenda','users.nama')
            ->where(array(  'donasi.jenis_agenda'         => $jenis_agenda))
            ->orderBy('id_agenda','DESC')
            ->paginate(25);
        return $query;
    }

    // listing
    public function listing()
    {
    	$query = DB::table('donasi')
            ->join('users', 'users.id_user', '=', 'donasi.user_id','LEFT')
            ->select('donasi.*','users.nama')
            ->selectRaw('(donasi.tercapai/donasi.target)*100 as persen')
            ->where('status','open')
            ->orderBy('id','DESC')
            ->paginate(25);
        return $query;
    }

    // listing
    public function home()
    {
        $query = DB::table('agenda')
             ->join('kategori_agenda', 'kategori_donasi.id_kategori_agenda', '=', 'donasi.id_kategori_agenda','LEFT')
            ->join('users', 'users.id_user', '=', 'donasi.id_user','LEFT')
            ->select('donasi.*', 'kategori_donasi.slug_kategori_agenda', 'kategori_donasi.nama_kategori_agenda','users.nama')
            ->orderBy('id_agenda','DESC')
            ->limit(3)
            ->get();
        return $query;
    }

    // detail
    public function read($slug_donasi)
    {
        $query = DB::table('donasi')
            ->join('users', 'users.id_user', '=', 'donasi.user_id','LEFT')
            ->select('donasi.*','users.nama')
            ->selectRaw('(donasi.tercapai/donasi.target)*100 as persen')
            ->where('donasi.slug_donasi',$slug_donasi)
            ->orderBy('id','DESC')
            ->first();
        return $query;
    }

     // detail
    public function detail($id)
    {
        $query = DB::table('donasi')
            ->join('users', 'users.id_user', '=', 'donasi.user_id','LEFT')
            ->select('donasi.*','users.nama')
            ->where('donasi.id',$id)
            ->orderBy('id','DESC')
            ->first();
        return $query;
    }
}
