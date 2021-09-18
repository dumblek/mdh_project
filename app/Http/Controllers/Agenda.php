<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use App\Models\Agenda_model;
Paginator::useBootstrap();

class Agenda extends Controller
{
 
    // Agendapage
    public function index()
    {
        Paginator::useBootstrap();
    	$site 	= DB::table('konfigurasi')->first();
    	$model 	= new Agenda_model();
		$agenda = $model->listing();

        $data = array(  'title'     => 'Agenda',
                        'deskripsi' => 'Agenda',
                        'keywords'  => 'Agenda',
                        'site'		=> $site,
                        'agenda'	=> $agenda,
                        'agendas'    => $agenda,
                        'content'   => 'agenda/index'
                    );
        return view('layout/wrapper',$data);
    }

    // read
    public function read($slug_agenda)
    {
        Paginator::useBootstrap();
        $site   = DB::table('konfigurasi')->first();
        $slider = DB::table('galeri')->where('jenis_galeri','Agendapage')->orderBy('id_galeri', 'DESC')->first();
        // $berita = DB::table('berita')->where('status_berita','Publish')->orderBy('id_berita', 'DESC')->get();
        $model  = new Agenda_model();
        $read   = $model->read($slug_agenda);
        if(!$read)
        {
            return redirect('agenda');
        }

        $data = array(  'title'     => $read->judul_agenda,
                        'deskripsi' => $read->judul_agenda,
                        'keywords'  => $read->judul_agenda,
                        'slider'    => $slider,
                        'site'      => $site,
                        'read'      => $read,
                        'content'   => 'agenda/read'
                    );
        return view('layout/wrapper',$data);
    }
}