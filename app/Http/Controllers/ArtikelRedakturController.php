<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\User;
use Illuminate\Http\Request;

class ArtikelRedakturController extends Controller
{
    public function publish()
    {
        $artikel = Artikel::with(['user', 'artikelstatus.status', 'publish'])
            ->where(function ($query) {
                $query->select('id_status')
                    ->from('artikelstatus')
                    ->where('artikelstatus.id_status', '=', 2)->get();
            });
        return view('redaktur.publish', ['artikel' => $artikel]);
    }

    public function myArtikel()
    {
        $artikel = Artikel::with(['user', 'publish'])->get();
        return view('redaktur.myartikel', ['artikel' => $artikel]);
    }

    public function add()
    {
        return view('redaktur.artikel-add');
    }

    function new(Request $request)
    {
        $this->validate($request, [
            'kategories' => 'required',
        ]);

        $artikel = Artikel::create([
            'kategories' => trim($request->kategories),
        ]);

        if ($artikel) {
            return redirect()->route('artikel')->with(['success' => 'Success']);
        } else {
            return redirect()->route('artikel')->with(['error' => 'Failed']);
        }
    }

    public function edit($id)
    {
        $artikel = Artikel::find($id);

        if (empty($artikel)) {
            return redirect()->route('artikel');
        }

        return view('redaktur.artikel-edit', ['artikel' => $artikel]);
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'kategories' => 'required',
        ]);

        $artikel = Artikel::find($id);

        if (empty($artikel)) {
            return redirect()->route('artikel');
        }

        $artikel->kategories = trim($request->kategories);
        $artikel->save();

        if ($artikel) {
            return redirect()->route('artikel')->with(['success' => 'Success']);
        } else {
            return redirect()->route('artikel')->with(['error' => 'Failed']);
        }
    }

    public function delete($id)
    {
        $artikel = Artikel::find($id);

        if (empty($artikel)) {
            return redirect()->route('artikel');
        }

        $artikel->delete();

        if ($artikel) {
            return redirect()->route('artikel')->with(['success' => 'Success']);
        } else {
            return redirect()->route('artikel')->with(['error' => 'Failed']);
        }
    }
}
