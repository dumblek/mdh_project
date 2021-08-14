<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Beras_model;

class Berasout extends Controller
{
    // Index
    public function index()
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $berasout = Beras_model::where('type', 'out')->orderBy('tanggal', 'desc')->get();
        
        $data = array(  'title'     => 'Daftar Beras Keluar',
                        'berasout'  => $berasout,
                        'content'   => 'admin/berasout/index'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // Edit
    public function edit($id)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $berasout   = DB::table('beras')->where('id',$id)->first();

        $data = array(  'title'     => 'Edit Data berasout',
                        'berasout' => $berasout,
                        'content'   => 'admin/berasout/edit'
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
            'kode'       => Beras_model::getNota('out'),
            'type'       => 'out',
            'keterangan' => $request->keterangan,
            'tanggal'    => $request->tanggal,
            'jumlah'     => $request->jumlah,
            'user_id'    => Session()->get('id_user'),
        ]);

        return redirect('admin/berasout')->with(['sukses' => 'Data telah ditambah']);
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
        return redirect('admin/berasout')->with(['sukses' => 'Data telah diupdate']);
    }

    // Delete
    public function delete($id)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        DB::table('beras')->where('id',$id)->delete();
        return redirect('admin/berasout')->with(['sukses' => 'Data telah dihapus']);
    }
}
