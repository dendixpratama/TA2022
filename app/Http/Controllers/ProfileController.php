<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggan;

class ProfileController extends Controller
{

    public function edit(Request $request)
    {
        $pelanggans = Pelanggan::all();
        return view('profil_pelanggan', ['pelanggans' => $pelanggans]);
    }

    // public function edit($id)
    // {
    //     $pelanggans = DB::table('tb_pelanggan as a')
    //         ->where('a.id_pelanggan', '=', $id)
    //         ->first();

    //     return view('profil_pelanggan', ['pelanggans' => $pelanggans]);
    // }

    public function update(Request $request)
    {
        $request->user()->update(
            $request->all()
        );

        return redirect()->route('profile.edit');
    }
}
