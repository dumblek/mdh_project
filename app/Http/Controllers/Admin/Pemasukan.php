<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Pemasukan_model;

class Pemasukan extends Controller
{
    // Index
    public function index()
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $pemasukan = Pemasukan_model::get();
        
        $data = array(  'title'     => 'Daftar Pemasukan',
                        'pemasukan'  => $pemasukan,
                        'content'   => 'admin/pemasukan/index'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // Edit
    public function edit($id)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $pemasukan   = DB::table('pemasukan')->where('id',$id)->first();

        $data = array(  'title'     => 'Edit Data Pemasukan',
                        'pemasukan' => $pemasukan,
                        'content'   => 'admin/pemasukan/edit'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // tambah
    public function tambah(Request $request)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        
        request()->validate([
                            'kode'       => 'required|unique:pemasukan',
                            'keterangan' => 'required',
                            'tanggal'    => 'required',
                            'amount'     => 'required'
                            ]);
        
        // UPLOAD START       
        DB::table('pemasukan')->insert([
            'kode'       => $request->kode,
            'keterangan' => $request->keterangan,
            'tanggal'    => $request->tanggal,
            'amount'     => $request->amount,
            'user_id'    => Session()->get('id_user'),
        ]);

        return redirect('admin/pemasukan')->with(['sukses' => 'Data telah ditambah']);
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
        DB::table('pemasukan')->where('id',$request->id)->update([
            'kode'       => $request->kode,
            'keterangan' => $request->keterangan,
            'tanggal'    => $request->tanggal,
            'amount'     => $request->amount,
            'user_id'    => Session()->get('id_user'),
        ]);
        return redirect('admin/pemasukan')->with(['sukses' => 'Data telah diupdate']);
    }

    // Delete
    public function delete($id)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        DB::table('pemasukan')->where('id',$id)->delete();
        return redirect('admin/pemasukan')->with(['sukses' => 'Data telah dihapus']);
    }
}
