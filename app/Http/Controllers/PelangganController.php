<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Pelanggan;

class PelangganController extends Controller
{
    public function index()
    {
        $pelanggans = Pelanggan::all();
        return view('admin.pelanggan.index', ['pelanggans' => $pelanggans]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pelanggan' => 'required',
            'telepon'        => 'required',
            'email'          => 'required',
            'username'       => 'required',
            'password'       => 'required',
        ]);

        $pelanggan = new Pelanggan();
        $pelanggan->nama_pelanggan  = $request->nama_pelanggan;
        $pelanggan->telepon         = $request->telepon;
        $pelanggan->email           = $request->email;
        $pelanggan->username        = $request->username;
        $pelanggan->password        = $request->password;
        $pelanggan->status          = $request->status;
        $pelanggan->keterangan      = $request->keterangan;
        $pelanggan->save();

        return redirect()->route('pelanggans.index')->with('pesan', 'Simpan Data pelanggan Berhasil.');
    }

    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'nama_pelanggan'    => 'required|max:50',
            'email'             => 'required',
            'password'          => 'required',
        ]);

        DB::table('tb_pelanggan')
            ->where('id_pelanggan', $id)
            ->update(
                [
                    'nama_pelanggan' => $request->nama_pelanggan,
                    'telepon'        => $request->telepon,
                    'email'          => $request->email,
                    'username'       => $request->username,
                    'password'       => $request->password,
                    'status'         => $request->status,
                    'keterangan'     => $request->keterangan
                ]
            );

        return redirect()->route('pelanggans.index')->with('pesan', "Update data berhasil");
    }

    public function destroy($id)
    {
        DB::table('tb_pelanggan')->where('id_pelanggan', '=', $id)->delete();

        return redirect()->route('pelanggans.index')->with('pesan', "Hapus data berhasil");
    }

    // public function profilPelanggan()
    // {
    //     // $pelanggans = DB::table('tb_pelanggan as a')
    //     //     ->where('a.id_pelanggan', '=', $id)
    //     //     ->first();

    //     $pelanggans = Pelanggan::all();
    //     return view('profil_pelanggan', ['pelanggans' => $pelanggans]);
    // }
}
