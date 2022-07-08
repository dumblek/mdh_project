<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Keuangan_model;

class Pemasukan extends Controller
{
    // Index
    public function index()
    {
        $pemasukan = Keuangan_model::where('type', 'in')->orderBy('tanggal', 'desc')->get();
        $kategori_kas    = DB::table('kategori_kas')->orderBy('nama','ASC')->get();
        
        $data = array(  'title'     => 'Daftar Pemasukan',
                        'pemasukan'  => $pemasukan,
                        'kategori_kas'   => $kategori_kas,
                    );
        return response()->json($data, 200);
    }

    // Edit
    public function show($id)
    {
        $pemasukan   = DB::table('keuangan')->where('id',$id)->first();

        $data = array(  'title'     => 'Edit Data Pemasukan',
                        'pemasukan' => $pemasukan,
                    );
        return response()->json($data, 200);
    }

    // tambah
    public function tambah(Request $request)
    {
        // dd($request);
        request()->validate([
                            'keterangan' => 'required',
                            'tanggal'    => 'required',
                            'amount'     => 'required'
                            ]);
        // UPLOAD START       
        DB::table('keuangan')->insert([
            'kode'       => Keuangan_model::getNota('in', $request->id_kategori_kas),
            'type'       => 'in',  
            'keterangan' => $request->keterangan,
            'tanggal'    => $request->tanggal,
            'amount'     => $request->amount,
            'kategori_id'=> $request->id_kategori_kas,   
            'user_id'    => 4,//Session()->get('id_user'),
        ]);
        
        return response()->json(['sukses' => 'Data telah ditambah'], 200);
    }

    // edit
    public function proses_edit(Request $request, $id)
    {
        // if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        
        request()->validate([
            'keterangan' => 'required',
            'tanggal'    => 'required',
            'amount'     => 'required'
            ]);
        
            // UPLOAD START
        DB::table('keuangan')->where('id',$id)->update([
            'keterangan' => $request->keterangan,
            'tanggal'    => $request->tanggal,
            'amount'     => $request->amount,
            'user_id'    => 4,//Session()->get('id_user'),
        ]);

        return response()->json(['sukses' => 'Data berhasil diupdate'], 200);
    }

    // Delete
    public function delete($id)
    {
        // if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        DB::table('keuangan')->where('id',$id)->delete();
        return response()->json(['sukses' => 'Data telah dihapus'], 200);
    }
}
