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
use Illuminate\Support\Facades\Cache;

class WishlistController extends Controller
{
    //
    public function index()
    {
        // artikel headline
        $artikelstatus = Artikelstatus::with(['artikel'])
            ->where('id_status', 2)->latest('id')->limit(3)->get();

        // list artikel
        $artikel = Artikel::with(['artikelstatus', 'artikelsubkategori.subkategori'])
            ->join('artikelstatus', 'id_artikel', '=', 'artikel.id')
            ->where('id_status', 2)->latest('artikel.id')
            ->skip(3)->take(4)->get();

        // kategori
        $subkategori = Subkategori::all();

        // user
        $users = User::get()->take(5);

        // video youtube
        $seconds = 12 * 60 * 60; // half day
        $youtube_cache = Cache::remember('youtube-cache', $seconds, function () {
            $queryParams = [
                'channelId' => 'UCsyREEwjN2Ohn41pLwreqyA',
                'maxResults' => 6,
                'order' => 'date',
                'key' => 'AIzaSyBcLi2lzsRLbhTL8a0qxkw8HwEGm8zjxIE'
            ];
            $apiUrl = "https://youtube.googleapis.com/youtube/v3/search?part=snippet";
            foreach ($queryParams as $param => $value) {
                $apiUrl .= "&" . $param . "=" . $value;
            }
            $request = json_decode(file_get_contents($apiUrl));
            $youtube = collect($request->items);
            return $youtube;
        });
        // dd($kategori);
        return view('start', [
            'artikelstatus' => $artikelstatus,
            'artikel' => $artikel,
            'subkategori' => $subkategori,
            'users' => $users,
            'youtube' => $youtube_cache,
        ]);
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
