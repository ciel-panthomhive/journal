<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Artikelstatus;
use App\Models\Artikelsubkategori;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function publish()
    {
        $artikelstatus = Artikelstatus::with(['artikel.user', 'status'])
            ->where('id_status', 2)->latest()->get();
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
            ->where('id_status', 2)->latest('artikel.id')->get();

        return view('redaktur.publish', ['artikelstatus' => $artikelstatus]);
    }

    public function halaman($id_sub)
    {
        $artikelsubkategori = Artikelsubkategori::with(['artikel', 'subkategori'])
            ->where('id_subkategori', $id_sub)->get();
    }
}
