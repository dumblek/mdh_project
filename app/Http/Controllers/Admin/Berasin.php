<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Beras_model;

class Berasin extends Controller
{
    // Index
    public function index()
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $berasin = Beras_model::where('type', 'in')->orderBy('tanggal', 'desc')->get();
        
        $data = array(  'title'     => 'Daftar Beras Masuk',
                        'berasin'  => $berasin,
                        'content'   => 'admin/berasin/index'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // Edit
    public function edit($id)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $berasin   = DB::table('beras')->where('id',$id)->first();

        $data = array(  'title'     => 'Edit Data Beras Masuk',
                        'berasin' => $berasin,
                        'content'   => 'admin/berasin/edit'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // tambah
    public function tambah(Request $request)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        
        request()->validate([
                            'keterangan' => 'required',
                            'tanggal'    => 'required',
                            'jumlah'     => 'required'
                            ]);
        // UPLOAD START       
        DB::table('beras')->insert([
            'kode'       => Beras_model::getNota('in'),
            'type'       => 'in',  
            'keterangan' => $request->keterangan,
            'tanggal'    => $request->tanggal,
            'jumlah'     => $request->jumlah,  
            'user_id'    => Session()->get('id_user'),
        ]);

        return redirect('admin/berasin')->with(['sukses' => 'Data telah ditambah']);
    }

    // edit
    public function proses_edit(Request $request)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        
        request()->validate([
            'keterangan' => 'required',
            'tanggal'    => 'required',
            'jumlah'     => 'required'
            ]);
        
            // UPLOAD START
        DB::table('beras')->where('id',$request->id)->update([
            'keterangan' => $request->keterangan,
            'tanggal'    => $request->tanggal,
            'jumlah'     => $request->jumlah,
            'user_id'    => Session()->get('id_user'),
        ]);
        return redirect('admin/berasin')->with(['sukses' => 'Data telah diupdate']);
    }

    // Delete
    public function delete($id)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        DB::table('beras')->where('id',$id)->delete();
        return redirect('admin/berasin')->with(['sukses' => 'Data telah dihapus']);
    }
}
