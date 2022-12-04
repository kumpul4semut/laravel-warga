<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Warga;

class WargaController extends Controller
{
    public function index()
    {
        $data = array(
            'title' => 'Warga',
            'warga' => Warga::all()->sortByDesc('id')
        );
        return view('warga', $data);
    }

    public function store(Request $request)
    {
        // validasi input
        $this->validate($request,[
            'no_ktp' => 'required',
            'nama'   => 'required',
         ]);

        $warga = new Warga;
        $warga->no_ktp     = $request->no_ktp;
        $warga->nama       = $request->nama;
        $warga->agama      = $request->agama;
        $warga->t_lahir    = $request->t_lahir;
        $warga->tgl_lahir  = $request->tgl_lahir;
        $warga->j_kel      = $request->j_kel;
        $warga->gol_darah  = $request->gol_darah;
        $warga->w_negara   = $request->w_negara;
        $warga->pendidikan = $request->pendidikan;
        $warga->pekerjaan  = $request->pekerjaan;
        $warga->s_nikah    = $request->s_nikah;
        $warga->status     = 1;

        if (!$warga->save()) {
            $message = '<div class="alert alert-danger" role="alert">
                            Data warga gagal disimpan!
                        </div>';
            return redirect()->route('warga')->with([
                'message' => $message,
                'title' => 'warga'
            ]);
        }

        $message = '<div class="alert alert-success" role="alert">
                            Data warga berhasil disimpan!
                        </div>';
        return redirect()->route('warga')->with([
            'title' => 'Warga',
            'message' => $message
        ]);
    }

    public function drop(Request $request)
    {
         // validasi input
         $this->validate($request,[
            'id' => 'required'
         ]);

        Warga::destroy($request->id);

        $message = '<div class="alert alert-success" role="alert">
                            Data warga berhasil dihapus!
                        </div>';
        return redirect()->route('warga')->with([
            'title' => 'Warga',
            'message' => $message
        ]);
    }


    public function update(Request $request)
    {
        // validasi input
        $this->validate($request,[
            'id' => 'required',
            'no_ktp' => 'required',
            'nama'   => 'required',
         ]);

        $warga = Warga::find($request->id);
        $warga->no_ktp     = $request->no_ktp;
        $warga->nama       = $request->nama;
        $warga->agama      = $request->agama;
        $warga->t_lahir    = $request->t_lahir;
        $warga->tgl_lahir  = $request->tgl_lahir;
        $warga->j_kel      = $request->j_kel;
        $warga->gol_darah  = $request->gol_darah;
        $warga->w_negara   = $request->w_negara;
        $warga->pendidikan = $request->pendidikan;
        $warga->pekerjaan  = $request->pekerjaan;
        $warga->s_nikah    = $request->s_nikah;
        $warga->status     = 1;

        if (!$warga->save()) {
            $message = '<div class="alert alert-danger" role="alert">
                            Data warga gagal diubah!
                        </div>';
            return redirect()->route('warga')->with([
                'message' => $message,
                'title' => 'warga'
            ]);
        }

        $message = '<div class="alert alert-success" role="alert">
                            Data warga berhasil diubah!
                        </div>';
        return redirect()->route('warga')->with([
            'title' => 'Warga',
            'message' => $message
        ]);
    }
}
