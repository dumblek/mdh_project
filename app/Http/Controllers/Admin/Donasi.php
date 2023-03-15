<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Pagination\Paginator;
use Image;
use App\Models\Donasi_model;

class Donasi extends Controller
{
    // Main page
    public function index()
    {
    	if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        Paginator::useBootstrap();
    	$mydonasi 	= new Donasi_model();
		$donasi 	= $mydonasi->semua();

		$data = array(  'title'       => 'Data Donasi',
						'donasi'      => $donasi,
                        'content'     => 'admin/donasi/index'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // Add
    public function add()
    {
        $data = array(  'title'       => 'Data Donasi'
                    );
        return view('admin/donasi/add',$data);
    }

    // Cari
    public function cari(Request $request)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $mydonasi           = new Donasi_model();
        $keywords           = $request->keywords;
        $donasi             = $mydonasi->cari($keywords);
        $kategori_agenda    = DB::table('kategori_agenda')->orderBy('urutan','ASC')->get();

        $data = array(  'title'             => 'Data Agenda',
                        'agenda'            => $donasi,
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
        $mydonasi    = new Donasi_model();
        $donasi      = $mydonasi->status_agenda($status_agenda);
        $kategori_agenda    = DB::table('kategori_agenda')->orderBy('urutan','ASC')->get();

        $data = array(  'title'             => 'Status Agenda: '.$status_agenda,
                        'agenda'            => $donasi,
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
        $mydonasi    = new Donasi_model();
        $donasi      = $mydonasi->jenis_agenda($jenis_agenda);
        $kategori_agenda    = DB::table('kategori_agenda')->orderBy('urutan','ASC')->get();

        $data = array(  'title'             => 'Jenis Agenda: '.$jenis_agenda,
                        'agenda'            => $donasi,
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
        $mydonasi           = new Donasi_model();
        $donasi             = $mydonasi->author($id_user);
        $kategori_agenda    = DB::table('kategori_agenda')->orderBy('urutan','ASC')->get();
        $author    = DB::table('users')->where('id_user',$id_user)->orderBy('id_user','ASC')->first();

        $data = array(  'title'             => 'Data Agenda dengan Penulis: '.$author->nama,
                        'agenda'            => $donasi,
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
        $mydonasi    = new Donasi_model();
        $donasi      = $mydonasi->all_kategori_agenda($id_kategori_agenda);
        $kategori_agenda    = DB::table('kategori_agenda')->orderBy('urutan','ASC')->get();
        $detail      = DB::table('kategori_agenda')->where('id_kategori_agenda',$id_kategori_agenda)->first();
        $data = array(  'title'             => 'Kategori: '.$detail->nama_kategori_agenda,
                        'agenda'            => $donasi,
                        'kategori_agenda'   => $kategori_agenda,
                        'content'           => 'admin/agenda/index'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // Tambah
    public function tambah()
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        
        $data = array(  'title'             => 'Tambah Donasi',
                        'content'           => 'admin/donasi/tambah'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // edit
    public function edit($id)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $mydonasi           = new Donasi_model();
        $donasi             = $mydonasi->detail($id);

        $data = array(  'title'             => 'Edit Donasi',
                        'donasi'            => $donasi,
                        'content'           => 'admin/donasi/edit'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // tambah
    public function tambah_proses(Request $request)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        request()->validate([
                            'judul'  => 'required|unique:donasi',
                            'isi'           => 'required',
                            'gambar'        => 'file|image|mimes:jpeg,png,jpg|max:8024',
                            ]);
        // UPLOAD START
        $image                  = $request->file('gambar');
        if(!empty($image)) {
            $filenamewithextension  = $request->file('gambar')->getClientOriginalName();
            $filename               = pathinfo($filenamewithextension, PATHINFO_FILENAME);
            $input['nama_file']     = Str::slug($filename, '-').'-'.time().'.'.$image->getClientOriginalExtension();
            $destinationPath        = './assets/upload/image/thumbs/';
            $img = Image::make($image->getRealPath(),array(
                'width'     => 150,
                'height'    => 150,
                'grayscale' => false
            ));
            $img->save($destinationPath.'/'.$input['nama_file']);
            $destinationPath = './assets/upload/image/';
            $image->move($destinationPath, $input['nama_file']);
            // END UPLOAD
            $slug_donasi = Str::slug($request->judul, '-');
            DB::table('donasi')->insert([
                'user_id'           => Session()->get('id_user'),
                'slug_donasi'       => $slug_donasi,
                'judul'             => $request->judul,
                'keterangan'        => $request->isi,
                'status'            => 'open',
                'target'            => $request->target,
                'tanggal_mulai'     => tanggal('tanggal_input',$request->tanggal_mulai),
                'tanggal_selesai'   => tanggal('tanggal_input',$request->tanggal_selesai),
                'gambar'            => $input['nama_file'],
                'kode_uniq'         => $request->kode_uniq
            ]);
        }else{
            $slug_donasi = Str::slug($request->judul, '-');
            DB::table('donasi')->insert([
                'user_id'           => Session()->get('id_user'),
                'slug_donasi'       => $slug_donasi,
                'judul'             => $request->judul,
                'keterangan'        => $request->isi,
                'status'            => 'open',
                'target'            => $request->target,
                'tanggal_mulai'     => tanggal('tanggal_input',$request->tanggal_mulai),
                'tanggal_selesai'   => tanggal('tanggal_input',$request->tanggal_selesai),
                'kode_uniq'         => $request->kode_uniq
            ]);
        }
        return redirect('admin/donasi')->with(['sukses' => 'Data telah ditambah']);
    }

    // edit
    public function edit_proses(Request $request)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        request()->validate([
                            'judul'   => 'required',
                            'isi'           => 'required',
                            'gambar'        => 'file|image|mimes:jpeg,png,jpg|max:8024',
                            ]);
        // UPLOAD START
        $image                  = $request->file('gambar');
        if(!empty($image)) {
            $filenamewithextension  = $request->file('gambar')->getClientOriginalName();
            $filename               = pathinfo($filenamewithextension, PATHINFO_FILENAME);
            $input['nama_file']     = Str::slug($filename, '-').'-'.time().'.'.$image->getClientOriginalExtension();
            $destinationPath        = './assets/upload/image/thumbs/';
            $img = Image::make($image->getRealPath(),array(
                'width'     => 150,
                'height'    => 150,
                'grayscale' => false
            ));
            $img->save($destinationPath.'/'.$input['nama_file']);
            $destinationPath = './assets/upload/image/';
            $image->move($destinationPath, $input['nama_file']);
            // END UPLOAD
            $slug_donasi = Str::slug($request->judul, '-');
            DB::table('donasi')->where('id',$request->id)->update([
                'user_id'           => Session()->get('id_user'),
                'slug_donasi'       => $slug_donasi,
                'judul'             => $request->judul,
                'keterangan'        => $request->isi,
                'status'            => $request->status,
                'tanggal_mulai'     => tanggal('tanggal_input',$request->tanggal_mulai),
                'tanggal_selesai'   => tanggal('tanggal_input',$request->tanggal_selesai),
                'target'            => $request->target,
                'tercapai'          => $request->tercapai,
                'gambar'            => $input['nama_file'],
                'kode_uniq'         => $request->kode_uniq
            ]);
        }else{
            $slug_donasi = Str::slug($request->judul, '-');
            DB::table('donasi')->where('id',$request->id)->update([
                'user_id'           => Session()->get('id_user'),
                'slug_donasi'       => $slug_donasi,
                'judul'             => $request->judul,
                'keterangan'        => $request->isi,
                'status'            => $request->status,
                'tanggal_mulai'     => tanggal('tanggal_input',$request->tanggal_mulai),
                'tanggal_selesai'   => tanggal('tanggal_input',$request->tanggal_selesai),
                'target'            => $request->target,
                'tercapai'          => $request->tercapai,
                'kode_uniq'         => $request->kode_uniq
            ]);
        }
        return redirect('admin/donasi')->with(['sukses' => 'Data telah diedit']);
    }

    // Delete
    public function delete($id)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        DB::table('donasi')->where('id',$id)->delete();
        return redirect('admin/donasi')->with(['sukses' => 'Data telah dihapus']);
    }

    // Delete
    public function status($id, $status)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $mydonasi     = new Donasi_model();
        $donasi       = $mydonasi->where('id', $id)->first();
        if ($status == 'open'){
            $donasi->update([
                'status' => 'close'
            ]);
        };

        if ($status == 'close'){
            $donasi->update([
                'status' => 'open'
            ]);
        };
        return redirect('admin/donasi')->with(['sukses' => 'Status telah diupdate']);
    }
}
