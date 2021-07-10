<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Pengeluaran_model;

class Pengeluaran extends Controller
{
    // Index
    public function index()
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $pengeluaran = Pengeluaran_model::get();
        
        $data = array(  'title'     => 'Daftar Pengeluaran',
                        'pengeluaran'  => $pengeluaran,
                        'content'   => 'admin/pengeluaran/index'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // Edit
    public function edit($id)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $pengeluaran   = DB::table('pengeluaran')->where('id',$id)->first();

        $data = array(  'title'     => 'Edit Data Pengeluaran',
                        'pengeluaran' => $pengeluaran,
                        'content'   => 'admin/pengeluaran/edit'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // tambah
    public function tambah(Request $request)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        
        request()->validate([
                            'kode'       => 'required|unique:pengeluaran',
                            'keterangan' => 'required',
                            'tanggal'    => 'required',
                            'amount'     => 'required'
                            ]);
        
        // UPLOAD START       
        DB::table('pengeluaran')->insert([
            'kode'       => $request->kode,
            'keterangan' => $request->keterangan,
            'tanggal'    => $request->tanggal,
            'amount'     => $request->amount,
            'user_id'    => Session()->get('id_user'),
        ]);

        return redirect('admin/pengeluaran')->with(['sukses' => 'Data telah ditambah']);
    }

    // edit
    public function proses_edit(Request $request)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        
        request()->validate([
            'kode'       => 'required',
            'keterangan' => 'required',
            'tanggal'    => 'required',
            'amount'     => 'required'
            ]);
        
            // UPLOAD START
        DB::table('pengeluaran')->where('id',$request->id)->update([
            'kode'       => $request->kode,
            'keterangan' => $request->keterangan,
            'tanggal'    => $request->tanggal,
            'amount'     => $request->amount,
            'user_id'    => Session()->get('id_user'),
        ]);
        return redirect('admin/pengeluaran')->with(['sukses' => 'Data telah diupdate']);
    }

    // Delete
    public function delete($id)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        DB::table('pengeluaran')->where('id',$id)->delete();
        return redirect('admin/pengeluaran')->with(['sukses' => 'Data telah dihapus']);
    }
}
