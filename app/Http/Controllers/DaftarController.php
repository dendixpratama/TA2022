<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;
use DB;

class DaftarController extends Controller
{
    public function index()
    {
        return view('register');
    }

    public function register(Request $request)
    {

        //dd($request);
        $count = DB::table('tb_pelanggan')->count();

        // simpan ke data peserta
        $pelanggan = new Pelanggan();
        $pelanggan->nama_pelanggan    = $request->nama_pelanggan;
        $pelanggan->telepon           = $request->telepon;
        $pelanggan->email             = $request->email;
        $pelanggan->username          = $request->username;
        $pelanggan->password          = $request->password;
        $pelanggan->status            = 'Aktif';
        $pelanggan->keterangan        = '-';
        $pelanggan->save();

        return redirect('/login')->with('success', 'Pendaftaran pelanggan Berhasil.');
    }
}
