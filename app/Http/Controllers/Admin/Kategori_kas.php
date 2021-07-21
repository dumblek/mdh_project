<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Kategori_kas extends Controller
{
    // Index
    public function index()
    {
    	if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
		$kategori_kas 	= DB::table('kategori_kas')->orderBy('nama','ASC')->get();

		$data = array(  'title'         => 'Kategori Kas',
						'kategori_kas'	=> $kategori_kas,
                        'content'       => 'admin/kategori_kas/index'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // tambah
    public function tambah(Request $request)
    {
    	if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
    	request()->validate([
					        'nama' => 'required|unique:kategori_kas',
					        'kode' => 'required|unique:kategori_kas',
					        ]);
    	
        DB::table('kategori_kas')->insert([
            'nama'   => $request->nama,
            'kode'   => $request->kode,
        ]);
        return redirect('admin/kategori_kas')->with(['sukses' => 'Data telah ditambah']);
    }

    // edit
    public function edit(Request $request)
    {
    	if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
    	request()->validate([
					        'nama' => 'required',
					        'kode' => 'required',
					        ]);

    	DB::table('kategori_kas')->where('id',$request->id)->update([
            'nama'   => $request->nama,
            'kode'   => $request->kode,
        ]);
        return redirect('admin/kategori_kas')->with(['sukses' => 'Data telah diupdate']);
    }

    // Delete
    public function delete($id)
    {
    	if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
    	DB::table('kategori_kas')->where('id',$id)->delete();
    	return redirect('admin/kategori_kas')->with(['sukses' => 'Data telah dihapus']);
    }
}
