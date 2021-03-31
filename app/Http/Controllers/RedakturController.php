<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Artikelstatus;
use App\Models\Artikelsubkategori;
use App\Models\Status;
use App\Models\Subkategori;
use App\Models\User;
use Illuminate\Http\Request;

class RedakturController extends Controller
{
    public function view($id)
    {
        $artikel = Artikel::find($id);
        $user = User::all();
        $artikelstatus = Artikelstatus::all();
        $status = Status::all();
        $artikelsubkategori = Artikelsubkategori::all();
        $subkategori = Subkategori::all();
        // dd($artikel);


        if (empty($artikel)) {
            return redirect()->route('artikel');
        }
        // else{
        //     $artikel = Artikel::with(['user', 'artikelstatus.status'])->get();
        // }
        return view('redaktur.viewartikel', [
            'artikel' => $artikel,
            'user' => $user,
            'artikelstatus' => $artikelstatus,
            'status' => $status,
            'artikelsubkategori' => $artikelsubkategori,
            'subkategori' => $subkategori
        ]);
    }

    public function edit($id)
    {
        $artikel = Artikel::find($id);
        $subkategori = Subkategori::all();
        $artikelsubkategori = Artikelsubkategori::with(['artikel', 'subkategori'])
            ->where('id_artikel', $id)->first();
        // $status = Status::all();
        // $user = User::all();

        if (empty($artikel)) {
            return redirect()->route('home');
        }

        return view('redaktur.verifikasiedit', [
            'artikel' => $artikel,
            'subkategori' => $subkategori,
            'artikelsubkategori' => $artikelsubkategori,
            // 'status' => $status,
            // 'users' => $user
        ]);
    }

    public function update($id, Request $request)
    {
        $artikel = Artikel::find($id);

        if (empty($artikel)) {
            return redirect()->route('myartikel');
        }

        // dd($request->all());
        // $status = 1;
        // if (isset($request->draft)) {
        //     $status = 3;
        // }
        // if (isset($request->kirim)) {
        //     $status = 2;
        // }
        $this->validate($request, [
            'judul' => 'required',
            'thumb' => 'file|mimes:jpeg,png,jpg,gif,svg',
            'isi' => 'required',
        ]);

        $file_upload = $request->file('thumb');

        if ($file_upload) {


            $fileName = time() . '.' . $file_upload->getClientOriginalExtension();

            $file_upload->move(public_path('uploads'), $fileName);

            $artikel->thumb = $fileName;
        }

        $artikel->judul = $request->judul;
        $artikel->isi = $request->isi;

        $artikelsubkategori = Artikelsubkategori::with(['artikel', 'subkategori'])
            ->where('id_artikel', $id)->first();
        $artikelsubkategori->id_artikel = $artikel->id;
        $artikelsubkategori->id_subkategori = trim($request->id_subkategori);

        $artikelstatus = Artikelstatus::with(['artikel', 'status'])
            ->where('id_artikel', $id)->first();
        $artikelstatus->id_artikel = $artikel->id;
        $artikelstatus->id_status = 2;

        $artikel->save();
        $artikelsubkategori->save();
        $artikelstatus->save();

        if ($artikel && $artikelsubkategori && $artikelstatus) {
            return redirect()->route('publish')->with(['success' => 'Success']);
        } else {
            return redirect()->route('publish')->with(['error' => 'Failed']);
        }
    }

    public function tolak($id)
    {
        $artikel = Artikel::find($id);

        if (empty($artikel)) {
            return redirect()->route('home');
        }

        return view('redaktur.alasan', ['artikel' => $artikel]);
    }

    public function alasan($id, Request $request)
    {
        $artikel = Artikel::find($id);

        if (empty($artikel)) {
            return redirect()->route('home');
        }
        $this->validate($request, [
            'keterangan' => 'required',
        ]);

        $artikel->keterangan = $request->keterangan;

        $artikelstatus = Artikelstatus::with(['artikel', 'status'])
            ->where('id_artikel', $id)->first();
        $artikelstatus->id_artikel = $artikel->id;
        $artikelstatus->id_status = 4;

        $artikel->save();
        $artikelstatus->save();

        if ($artikel && $artikelstatus) {
            return redirect()->route('home')->with(['success' => 'Success']);
        } else {
            return redirect()->route('home')->with(['error' => 'Failed']);
        }
    }

    public function publish($id)
    {
        $artikel = Artikel::find($id);

        if (empty($artikel)) {
            return redirect()->route('home');
        }

        $artikelstatus = Artikelstatus::with(['artikel', 'status'])
            ->where('id_artikel', $id)->first();
        $artikelstatus->id_artikel = $artikel->id;
        $artikelstatus->id_status = 2;

        $artikelstatus->save();

        if ($artikelstatus) {
            return redirect()->route('publish')->with(['success' => 'Success']);
        } else {
            return redirect()->route('publish')->with(['error' => 'Failed']);
        }
    }
}
