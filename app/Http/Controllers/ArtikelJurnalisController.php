<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Artikelstatus;
use App\Models\Artikelsubkategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArtikelJurnalisController extends Controller
{
    function newPublish(Request $request)
    {
        // dd($request->all());
        // $status = 1;
        // if (isset($request->draft)) {
        //     $status = 3;
        // }
        // if (isset($request->kirim)) {
        //     $status = 2;
        // }
        // $this->validate($request, [
        //     'judul' => 'required',
        //     'thumb' => 'required|file|mimes:jpeg,png,jpg,gif,svg',
        //     'isi' => 'required',
        // ]);

        $file_upload = $request->file('thumb');

        $fileName = time() . '.' . $file_upload->getClientOriginalExtension();

        $file_upload->move(public_path('uploads'), $fileName);

        $artikel = Artikel::create([
            'judul' => $request->judul,
            'thumb' =>  $fileName,
            'isi' => $request->isi,
            'id_user' => Auth::user()->id,
        ]);

        $artikelsubkategori = Artikelsubkategori::create([
            'id_artikel' => $artikel->id,
            'id_subkategori' => trim($request->id_subkategori),
        ]);

        $artikelstatus = Artikelstatus::create([
            'id_artikel' => $artikel->id,
            'id_status' => 1,
        ]);

        if ($artikel && $artikelsubkategori && $artikelstatus) {
            return redirect()->route('home')->with(['success' => 'Success']);
        } else {
            return redirect()->route('home')->with(['error' => 'Failed']);
        }
    }

    function newDraft(Request $request)
    {
        // dd($request->all());
        // $status = 1;
        // if (isset($request->draft)) {
        //     $status = 3;
        // }
        // if (isset($request->kirim)) {
        //     $status = 2;
        // }
        // $this->validate($request, [
        //     'judul' => 'required',
        //     'thumb' => 'required|file|mimes:jpeg,png,jpg,gif,svg',
        //     'isi' => 'required',
        // ]);

        $file_upload = $request->file('thumb');

        $fileName = time() . '.' . $file_upload->getClientOriginalExtension();

        $file_upload->move(public_path('uploads'), $fileName);

        $artikel = Artikel::create([
            'judul' => $request->judul,
            'thumb' =>  $fileName,
            'isi' => $request->isi,
            'id_user' => Auth::user()->id,
        ]);

        $artikelsubkategori = Artikelsubkategori::create([
            'id_artikel' => $artikel->id,
            'id_subkategori' => trim($request->id_subkategori),
        ]);

        $artikelstatus = Artikelstatus::create([
            'id_artikel' => $artikel->id,
            'id_status' => 3,
        ]);

        if ($artikel && $artikelsubkategori && $artikelstatus) {
            return redirect()->route('home')->with(['success' => 'Success']);
        } else {
            return redirect()->route('home')->with(['error' => 'Failed']);
        }
    }
}
