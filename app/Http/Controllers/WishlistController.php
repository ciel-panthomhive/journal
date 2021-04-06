<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artikel;
use App\Models\Artikelstatus;
use App\Models\Artikelsubkategori;
use App\Models\Status;
use App\Models\Kategori;
use App\Models\Subkategori;
use App\Models\User;

class WishlistController extends Controller
{
    //
    public function index()
    {
        // $artikel = Artikel::all();
        $artikel = Artikel::get()->take(4);
        $kategori = Kategori::with('subkategori')->get();
        // $subkategori = Subkategori::all();
        $jurnalis = User::get()->take(5);
        // video youtube
        $queryParams = [
            'channelId' => 'UCsyREEwjN2Ohn41pLwreqyA',
            'maxResults' => 6,
            'order' => 'date',
            'key' => 'AIzaSyBume1XA2B3j5l4zOQr23CyuKh0txGrEzs'
        ];
        $apiUrl = "https://youtube.googleapis.com/youtube/v3/search?part=snippet";
        foreach ($queryParams as $param => $value) {
            $apiUrl .= "&" . $param . "=" . $value;
        }
        $request = json_decode(file_get_contents($apiUrl));
        $youtube = collect($request->items);
        // dd($kategori);
        return view('start', compact('artikel', 'kategori', 'youtube', 'jurnalis'));
    }

    public function kategori()
    {
    }

    public function halaman_artikel($id)
    {
        $artikel = Artikel::find($id);

        return view('post', compact('artikel'));
    }
}
