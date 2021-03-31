<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Artikelstatus;
use App\Models\Artikelsubkategori;
use App\Models\Status;
use App\Models\Subkategori;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ArtikelRedakturController extends Controller
{
    //add artikel
    public function add()
    {
        $subkategori = Subkategori::all();
        $status = Status::all();
        $user = User::all();
        return view('redaktur.artikel-add', ['subkategori' => $subkategori, 'status' => $status, 'user' => $user]);
    }

    function newDraft(Request $request)
    {
        $this->validate($request, [
            'judul' => 'required',
            'thumb' => 'required|file|mimes:jpeg,png,jpg,gif,svg',
            'isi' => 'required',
        ]);

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
            return redirect()->route('myartikel')->with(['success' => 'Success']);
        } else {
            return redirect()->route('myartikel')->with(['error' => 'Failed']);
        }
    }

    function newPublish(Request $request)
    {
        $this->validate($request, [
            'judul' => 'required',
            'thumb' => 'required|file|mimes:jpeg,png,jpg,gif,svg',
            'isi' => 'required',
        ]);

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
            'id_status' => 2,
        ]);

        if ($artikel && $artikelsubkategori && $artikelstatus) {
            return redirect()->route('myartikel')->with(['success' => 'Success']);
        } else {
            return redirect()->route('myartikel')->with(['error' => 'Failed']);
        }
    }


    //edit artikel
    public function edit($id)
    {
        $subkategori = Subkategori::all();
        $artikel = Artikel::find($id);
        $artikelsubkategori = Artikelsubkategori::with(['artikel', 'subkategori'])
            ->where('id_artikel', $id)->first();

        if (empty($artikel)) {
            return redirect()->route('artikel');
        }

        return view('redaktur.artikel-edit', [
            'artikel' => $artikel,
            'subkategori' => $subkategori,
            'artikelsubkategori' => $artikelsubkategori
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
            return redirect()->route('myartikel')->with(['success' => 'Success']);
        } else {
            return redirect()->route('myartikel')->with(['error' => 'Failed']);
        }
    }

    public function updateDraft($id, Request $request)
    {
        $this->validate($request, [
            'judul' => 'required',
            'thumb' => 'file|mimes:jpeg,png,jpg,gif,svg',
            'isi' => 'required',
        ]);

        $artikel = Artikel::find($id);

        if (empty($artikel)) {
            return redirect()->route('myartikel');
        }

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
        $artikelsubkategori->id_subkategori = $request->id_subkategori;

        $artikelstatus = Artikelstatus::with(['artikel', 'status'])
            ->where('id_artikel', $id)->first();
        $artikelstatus->id_artikel = $artikel->id;
        $artikelstatus->id_status = 3;

        $artikel->save();
        $artikelsubkategori->save();
        $artikelstatus->save();

        if ($artikel && $artikelsubkategori && $artikelstatus) {
            return redirect()->route('myartikel')->with(['success' => 'Success']);
        } else {
            return redirect()->route('myartikel')->with(['error' => 'Failed']);
        }
    }
}
