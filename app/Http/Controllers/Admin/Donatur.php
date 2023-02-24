<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Pagination\Paginator;
use Image;
use App\Models\Donatur_model;

class Donatur extends Controller
{
    // Main page
    public function index()
    {
    	if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        Paginator::useBootstrap();
    	$mydonatur 	= new Donatur_model();
		$donatur 	= $mydonatur->semua();

		$data = array(  'title'       => 'Data donatur',
						'donatur'      => $donatur,
                        'content'     => 'admin/donatur/index'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // Add
    public function add()
    {
        $data = array(  'title'       => 'Data donatur'
                    );
        return view('admin/donatur/add',$data);
    }

    // Cari
    public function cari(Request $request)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $mydonatur           = new Donatur_model();
        $keywords           = $request->keywords;
        $donatur             = $mydonatur->cari($keywords);
        $kategori_agenda    = DB::table('kategori_agenda')->orderBy('urutan','ASC')->get();

        $data = array(  'title'             => 'Data Agenda',
                        'agenda'            => $donatur,
                        'kategori_agenda'   => $kategori_agenda,
                        'content'           => 'admin/agenda/index'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // Proses
    public function proses(Request $request)
    {
        $site           = DB::table('konfigurasi')->first();
        $pengalihan     = $request->pengalihan;
        // PROSES HAPUS MULTIPLE
        if(isset($_POST['hapus'])) {
            $idnya       = $request->id;
            for($i=0; $i < sizeof($idnya);$i++) {
                DB::table('agenda')->where('id',$idnya[$i])->delete();
            }
            return redirect($pengalihan)->with(['sukses' => 'Data telah dihapus']);
        // PROSES SETTING DRAFT
        }elseif(isset($_POST['draft'])) {
            $idnya       = $request->id;
            for($i=0; $i < sizeof($idnya);$i++) {
                DB::table('agenda')->where('id',$idnya[$i])->update([
                        'id_user'       => Session()->get('id_user'),
                        'status_agenda' => 'Draft'
                    ]);
            }
            return redirect($pengalihan)->with(['sukses' => 'Data telah diubah menjadi Draft']);
        // PROSES SETTING PUBLISH
        }elseif(isset($_POST['publish'])) {
            $idnya       = $request->id;
            for($i=0; $i < sizeof($idnya);$i++) {
                DB::table('agenda')->where('id',$idnya[$i])->update([
                        'id_user'       => Session()->get('id_user'),
                        'status_agenda' => 'Publish'
                    ]);
            }
            return redirect($pengalihan)->with(['sukses' => 'Data telah diubah menjadi Publish']);
        }elseif(isset($_POST['update'])) {
            $idnya       = $request->id;
            for($i=0; $i < sizeof($idnya);$i++) {
                DB::table('agenda')->where('id',$idnya[$i])->update([
                        'id_user'        => Session()->get('id_user'),
                        'id_kategori_agenda'    => $request->id_kategori_agenda
                    ]);
            }
            return redirect($pengalihan)->with(['sukses' => 'Data kategori_agenda telah diubah']);
        }
    }

    //Status
    public function status_agenda($status_agenda)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        Paginator::useBootstrap();
        $mydonatur    = new Donatur_model();
        $donatur      = $mydonatur->status_agenda($status_agenda);
        $kategori_agenda    = DB::table('kategori_agenda')->orderBy('urutan','ASC')->get();

        $data = array(  'title'             => 'Status Agenda: '.$status_agenda,
                        'agenda'            => $donatur,
                        'kategori_agenda'   => $kategori_agenda,
                        'content'           => 'admin/agenda/index'
                    );
        return view('admin/layout/wrapper',$data);
    }

    //Status
    public function jenis_agenda($jenis_agenda)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        Paginator::useBootstrap();
        $mydonatur    = new Donatur_model();
        $donatur      = $mydonatur->jenis_agenda($jenis_agenda);
        $kategori_agenda    = DB::table('kategori_agenda')->orderBy('urutan','ASC')->get();

        $data = array(  'title'             => 'Jenis Agenda: '.$jenis_agenda,
                        'agenda'            => $donatur,
                        'kategori_agenda'   => $kategori_agenda,
                        'content'           => 'admin/agenda/index'
                    );
        return view('admin/layout/wrapper',$data);
    }

    //Status
    public function author($id_user)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        Paginator::useBootstrap();
        $mydonatur           = new Donatur_model();
        $donatur             = $mydonatur->author($id_user);
        $kategori_agenda    = DB::table('kategori_agenda')->orderBy('urutan','ASC')->get();
        $author    = DB::table('users')->where('id_user',$id_user)->orderBy('id_user','ASC')->first();

        $data = array(  'title'             => 'Data Agenda dengan Penulis: '.$author->nama,
                        'agenda'            => $donatur,
                        'kategori_agenda'   => $kategori_agenda,
                        'content'           => 'admin/agenda/index'
                    );
        return view('admin/layout/wrapper',$data);
    }

    //Kategori
    public function kategori_agenda($id_kategori_agenda)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        Paginator::useBootstrap();
        $mydonatur    = new Donatur_model();
        $donatur      = $mydonatur->all_kategori_agenda($id_kategori_agenda);
        $kategori_agenda    = DB::table('kategori_agenda')->orderBy('urutan','ASC')->get();
        $detail      = DB::table('kategori_agenda')->where('id_kategori_agenda',$id_kategori_agenda)->first();
        $data = array(  'title'             => 'Kategori: '.$detail->nama_kategori_agenda,
                        'agenda'            => $donatur,
                        'kategori_agenda'   => $kategori_agenda,
                        'content'           => 'admin/agenda/index'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // Tambah
    public function tambah()
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $donasi    = DB::table('donasi')->orderBy('judul','ASC')->get();
        
        $data = array(  'title'             => 'Tambah donatur',
                        'donasi'            => $donasi,
                        'content'           => 'admin/donatur/tambah'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // edit
    public function edit($id)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $mydonatur           = new Donatur_model();
        $donatur             = $mydonatur->where('id', $id)->first();
        $donasi    = DB::table('donasi')->orderBy('judul','ASC')->get();
        $data = array(  'title'             => 'Edit donatur',
                        'donatur'           => $donatur,
                        'donasi'            => $donasi,
                        'content'           => 'admin/donatur/edit'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // tambah
    public function tambah_proses(Request $request)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        request()->validate([
                            'nama'  => 'required|unique:donatur',
                            'phone' => 'required',
                            'tanggal' => 'required',
                            ]);
        // UPLOAD START
        DB::table('donatur')->insert([
            'tanggal'    => $request->tanggal,
            'nama'       => $request->nama,
            'email'      => $request->email,
            'phone'      => $request->phone,
            'pesan'      => $request->pesan,
            'status'     => $request->status,
            'nominal'     => $request->nominal,
            'donasi_id'  => $request->donasi_id
        ]);
        
        return redirect('admin/donatur')->with(['sukses' => 'Data telah ditambah']);
    }

    // edit
    public function edit_proses(Request $request)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        request()->validate([
            'nama'  => 'required',
            'phone' => 'required',
            'tanggal' => 'required',
            ]);
            
            // UPLOAD START
            DB::table('donatur')->where('id',$request->id)->update([
                'tanggal'    => tanggal('tanggal_input',$request->tanggal),
                'nama'       => $request->nama,
                'email'      => $request->email,
                'phone'      => $request->phone,
                'pesan'      => $request->pesan,
                'status'     => $request->status,
                'nominal'     => $request->nominal,
                'donasi_id'  => $request->donasi_id
            ]);

            return redirect('admin/donatur')->with(['sukses' => 'Data telah diedit']);
        }

    // Delete
    public function delete($id)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        DB::table('donatur')->where('id',$id)->delete();
        return redirect('admin/donatur')->with(['sukses' => 'Data telah dihapus']);
    }

    // Status
    public function status($id, $status)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        
        $mydonatur      = new Donatur_model();
        $donatur        = $mydonatur->where('id', $id)->first();
        $donasi         = $donatur->donasi;
        $tercapai       = $donasi->tercapai;
        
        if ($status == 'Pending'){
            $tercapai += $donatur->nominal;
            $donasi->update([
                'tercapai' => $tercapai
            ]);
            $donatur->update([
                'status' => 'Diterima'
            ]);
        };

        if ($status == 'Diterima'){
            $tercapai -= $donatur->nominal;
            $donasi->update([
                'tercapai' => $tercapai
            ]);
            $donatur->update([
                'status' => 'Tidak Diterima'
            ]);
        };

        if ($status == 'Tidak Diterima'){
            $donatur->update([
                'status' => 'Pending'
            ]);
        };

        return redirect('admin/donatur')->with(['sukses' => 'Status telah diupdate']);
    }
}
