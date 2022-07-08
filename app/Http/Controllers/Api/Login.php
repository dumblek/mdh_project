<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User_model;
use App\Helpers\Website;

class Login extends Controller
{
    // login
    public function index(Request $request)
    {
        $username   = $request->username;
        $password   = $request->password;
        $model      = new User_model();
        $user       = $model->login($username,$password);
        if($user) {
            return response()->json(['response' => 'Berhasil login', 'data' => $user], 200);
        }else{
            return response()->json(['response' => 'Username dan password salah', 'data' => []], 200);
        }
    }

    // Homepage
    public function logout()
    {
        // Session()->forget('id_user');
        // Session()->forget('nama');
        // Session()->forget('username');
        // Session()->forget('akses_level');
        return response()->json(['sukses' => 'Anda berhasil logout'], 200);
    }

    // Forgot password
    public function fogot()
    {
    	$site = DB::table('konfigurasi')->first();
       	$data = array(  'title'     => 'Lupa Password',
    					'site'		=> $site);
        return response()->json($data, 200);
    }
}
