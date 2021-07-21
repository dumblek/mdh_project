<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Keuangan_model;

class Pengeluaran extends Controller
{
    // Index
    public function index()
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $pengeluaran = Keuangan_model::where('type', 'out')->orderBy('tanggal', 'desc')->get();
        $kategori_kas    = DB::table('kategori_kas')->orderBy('nama','ASC')->get();
        
        $data = array(  'title'     => 'Daftar Pengeluaran',
                        'pengeluaran'  => $pengeluaran,
                        'kategori_kas'   => $kategori_kas,
                        'content'   => 'admin/pengeluaran/index'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // Edit
    public function edit($id)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $pengeluaran   = DB::table('keuangan')->where('id',$id)->first();

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
                            'keterangan' => 'required',
                            'tanggal'    => 'required',
                            'amount'     => 'required'
                            ]);
        // UPLOAD START       
        DB::table('keuangan')->insert([
            'kode'       => Keuangan_model::getNota('out', $request->id_kategori_kas),
            'type'       => 'out',
            'keterangan' => $request->keterangan,
            'tanggal'    => $request->tanggal,
            'amount'     => $request->amount,
            'kategori_id'=> $request->id_kategori_kas,
            'user_id'    => Session()->get('id_user'),
        ]);

        return redirect('admin/pengeluaran')->with(['sukses' => 'Data telah ditambah']);
    }

    // edit
    public function proses_edit(Request $request)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        
        request()->validate([
            'keterangan' => 'required',
            'tanggal'    => 'required',
            'amount'     => 'required'
            ]);
        
            // UPLOAD START
        DB::table('keuangan')->where('id',$request->id)->update([
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
        DB::table('keuangan')->where('id',$id)->delete();
        return redirect('admin/pengeluaran')->with(['sukses' => 'Data telah dihapus']);
    }
}
