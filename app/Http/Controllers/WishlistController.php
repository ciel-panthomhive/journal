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
use App\Models\Video;
use Illuminate\Support\Facades\Cache;

class WishlistController extends Controller
{
    //
    public function index()
    {
        // artikel headline
        $art = Artikel::with(['artikelstatus', 'artikelheadline'])
            ->join('artikelstatus', 'artikelstatus.id_artikel', '=', 'artikel.id')
            ->where('id_status', 2)
            ->join('artikelheadline', 'artikelheadline.id_artikel', '=', 'artikel.id')
            ->where('id_headline', 1)->latest('artikel.id')->get();

        // list artikel
        $artikel = Artikel::with(['artikelstatus', 'artikelheadline'])
            ->join('artikelstatus', 'artikelstatus.id_artikel', '=', 'artikel.id')
            ->where('id_status', 2, 'AND')
            ->join('artikelheadline', 'artikelheadline.id_artikel', '=', 'artikel.id')
            ->where('id_headline', 2)->latest('artikel.id')
            ->take(4)->get();

        // kategori
        $subkategori = Subkategori::all();

        // user
        $users = User::get()->take(5);

        // video youtube
        $seconds = 3 * 60 * 60; // each 3 hours
        $youtube_cache = Cache::remember('youtube-vid', $seconds, function () {
            $queryParams = [
                'channelId' => 'UCsyREEwjN2Ohn41pLwreqyA',
                'maxResults' => 20,
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
        foreach($youtube_cache as $yutub){
            $check = Video::where
        }
        dd($youtube_cache); // aku ngetest dulu ya
        // dd($kategori);
        return view('start', [
            'art' => $art,
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
