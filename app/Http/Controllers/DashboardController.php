<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Artikelstatus;
use App\Models\Artikelsubkategori;
use App\Models\Kategori;
use App\Models\Status;
use App\Models\Subkategori;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function publish()
    {
        $artikelstatus = Artikelstatus::with(['artikel.user', 'status'])
            ->where('id_status', 2)->latest('updated_at')->get();
        return view('redaktur.publish', ['artikelstatus' => $artikelstatus]);
    }

    public function myArtikel()
    {
        $auth = Auth::user()->id;
        $status = Status::all();
        $artikel = Artikel::with(['user', 'artikelstatus.status'])
            ->where('id_user', $auth)->latest()->get();
        return view('redaktur.myartikel', ['artikel' => $artikel, 'status' => $status]);
    }

    public function publishJurnalis()
    {
        $auth = Auth::user()->id;
        $artikelstatus = Artikelstatus::with(['artikel.user', 'status'])
            ->join('artikel', 'artikel.id', '=', 'artikelstatus.id_artikel')
            ->where('id_user', $auth, 'AND')
            ->where('id_status', 2)->latest('artikelstatus.updated_at')->get();

        return view('redaktur.publish', ['artikelstatus' => $artikelstatus]);
    }

    public function halaman($id)
    {
        $subkategori = Subkategori::find($id);
        $artikel = Artikel::with(['artikelstatus', 'artikelsubkategori.subkategori', 'user'])
            ->join('artikelsubkategori', 'artikel.id', '=', 'artikelsubkategori.id_artikel')
            ->where('id_subkategori', $id, 'AND')
            ->join('artikelstatus', 'artikel.id', '=', 'artikelstatus.id_artikel')
            ->where('id_status', 2)->latest('artikelstatus.updated_at')->get();

        // dd($artikel);
        return view('halaman', ['subkategori' => $subkategori, 'artikel' => $artikel]);
    }

    public function halaman_sub($id_kat)
    {
        $kat = Kategori::find($id_kat);

        $subkate = Subkategori::with(['Kategori'])
            ->where('subkategories', $kat->kategories)
            ->get();

        $artikel = Artikel::with(['artikelstatus', 'artikelsubkategori.subkategori.kategori', 'user'])
            ->join('artikelsubkategori', 'artikel.id', '=', 'artikelsubkategori.id_artikel')
            ->where('id_subkategori', $subkate[0]->id, 'AND')
            ->join('artikelstatus', 'artikel.id', '=', 'artikelstatus.id_artikel')
            ->where('id_status', 2)->get();

        return view('halaman', ['kat' => $kat, 'subkate' => $subkate, 'artikel' => $artikel]);
    }
}
