<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use App\Models\Donasi_model;
use App\Models\Donatur_model;
Paginator::useBootstrap();

class Donasi extends Controller
{
 
    // Agendapage
    public function index()
    {
        Paginator::useBootstrap();
    	$site 	= DB::table('konfigurasi')->first();
    	$model 	= new Donasi_model();
		$donasi = $model->listing();

        $data = array(  'title'     => 'Donasi',
                        'deskripsi' => 'Donasi',
                        'keywords'  => 'Donasi',
                        'site'		=> $site,
                        'donasi'	=> $donasi,
                        'content'   => 'donasi/index'
                    );
        return view('layout/wrapper',$data);
    }

    // read
    public function read($slug_donasi)
    {
        Paginator::useBootstrap();
        $site   = DB::table('konfigurasi')->first();
        $model  = new Donasi_model();
        $read   = $model->read($slug_donasi);
        $donatur  = new Donatur_model();
        $donatur = $donatur
                    ->where('donasi_id', $read->id)
                    ->where('status', 'Diterima')
                    ->get();
        if(!$read)
        {
            return redirect('donasi');
        }

        $data = array(  'title'     => $read->judul,
                        'deskripsi' => $read->keterangan,
                        'keywords'  => $read->slug_donasi,
                        'site'      => $site,
                        'read'      => $read,
                        'donatur'   => $donatur,
                        'content'   => 'donasi/read'
                    );
        return view('layout/wrapper',$data);
    }

    // donasi
    public function donasi($slug_donasi)
    {
        Paginator::useBootstrap();
        $site   = DB::table('konfigurasi')->first();
        $model  = new Donasi_model();
        $read   = $model->read($slug_donasi);
        $donatur  = new Donatur_model();
        $donatur = $donatur
                    ->where('donasi_id', $read->id)
                    ->where('status', 'Diterima')
                    ->get();
        if(!$read)
        {
            return redirect('donasi');
        }

        $data = array(  'title'     => $read->judul,
                        'deskripsi' => $read->keterangan,
                        'keywords'  => $read->slug_donasi,
                        'site'      => $site,
                        'read'      => $read,
                        'donatur'   => $donatur,
                        'content'   => 'donasi/donate'
                    );
        return view('layout/wrapper',$data);
    }

    // invoice
    public function tambah_invoice(Request $request, $slug_donasi)
    {
        Paginator::useBootstrap();
        $site   = DB::table('konfigurasi')->first();
        $model  = new Donasi_model();
        $read   = $model->read($slug_donasi);
        if(!$read)
        {
            return redirect('donasi');
        }
        // dd($request->nominal_donasi);
        request()->validate([
            'name'  => 'required',
            'whatsapp' => 'required',
            ]);
        // UPLOAD START
        // dd($request->anonim);
        date_default_timezone_set('Asia/Jakarta');
        $date = now()->format('Y-m-d H:i:s');
        $nominal = $request->nominal_lainnya > 0 ? str_replace('.','',$request->nominal_lainnya) : $request->nominal_donasi;
        $nominal = $read->kode_uniq ? $nominal + $read->kode_uniq : $nominal;
        
        $model_donatur = new Donatur_model();
        $new_donatur = $model_donatur->create([
        'tanggal'    => $date,
        'nama'       => $request->anonim == 'on' ? 'Hamba Allah' : $request->name,
        'email'      => $request->email,
        'phone'      => $request->whatsapp,
        'pesan'      => $request->comment,
        'status'     => 'Pending',
        'nominal'     => (int)$nominal,
        'donasi_id'  => $request->campaign_id
        ]);

        return redirect('donasi/invoice/'.$new_donatur->id);
    }

    // read invoice
    public function invoice($id)
    {
        Paginator::useBootstrap();
        $site   = DB::table('konfigurasi')->first();
        $model  = new Donatur_model();
        $donatur   = $model->where('id', $id)->first();
        $read = $donatur->donasi;
        if(!$donatur)
        {
            return redirect('donasi');
        }

        $data = array(  'title'     => $read->judul,
                        'deskripsi' => $read->slug_donasi,
                        'keywords'  => $read->slug_donasi,
                        'tgl_batas' => now()->modify('+1 day')->format('Y-m-d H:i:s'),
                        'site'      => $site,
                        'read'      => $read,
                        'donatur'   => $donatur,
                        'content'   => 'donasi/invoice'
                    );
        return view('layout/wrapper',$data);
    }
}