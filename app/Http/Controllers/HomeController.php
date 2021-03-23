<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Artikelstatus;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $auth = Auth::user()->id;
        $status = Status::all();
        $artikel = Artikel::with(['user', 'artikelstatus.status'])
            ->where('id_user', $auth)->get();

        $artikelstatus = Artikelstatus::with(['artikel.user', 'status'])
            ->where('id_status', 1)->get();
        return view('home', ['artikelstatus' => $artikelstatus, 'artikel' => $artikel, 'status' => $status]);
    }
}
