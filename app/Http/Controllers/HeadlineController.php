<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Artikelheadline;
use App\Models\Headline;
use Illuminate\Http\Request;

class HeadlineController extends Controller
{
    public function index()
    {
        $artikelheadline = Artikelheadline::with(['headline', 'artikel', 'artikel.publish'])->get();
        return view('redaktur.artikelheadline', ['artikelheadline' => $artikelheadline]);
    }

    public function edit($id, Request $request)
    {
        $headline = Headline::all();
        $artikel = Artikel::all();
        $artikelheadline = Artikelheadline::find($id);

        // if (empty($artikelheadline)) {
        //     return redirect()->route('headline');
        // }

        // $this->validate($request, [
        //     'id_artikel' => 'required',
        //     'id_headline' => 'required',
        // ]);

        // $artikelheadline = Artikelheadline::find($id);

        if (empty($artikelheadline)) {
            return redirect()->route('artikel');
        } else {
            if ('id_headline' == 2) {
                $artikelheadline->id_headline = trim(1);
            } else if ('id_headline' == 1) {
                $artikelheadline->id_headline = trim(2);
            }
            $artikelheadline->save();
        }

        if ($artikelheadline) {
            return redirect()->route('artikel')->with(['success' => 'Success']);
        } else {
            return redirect()->route('artikel')->with(['error' => 'Failed']);
        }

        return view('redaktur.headline-edit', ['artikel' => $artikel, 'headline' => $headline, 'artikelheadline' => $artikelheadline]);
    }

    // public function update($id, Request $request)
    // {
    //     $this->validate($request, [
    //         'id_artikel' => 'required',
    //         'id_headline' => 'required',
    //     ]);

    //     $artikelheadline = Artikelheadline::find($id);

    //     if (empty($artikelheadline)) {
    //         return redirect()->route('artikel');
    //     }

    //     $artikelheadline->id_artikel = trim($request->id_artikel);
    //     $artikelheadline->id_headline = trim($request->id_headline);
    //     $artikelheadline->save();

    //     if ($artikelheadline) {
    //         return redirect()->route('artikel')->with(['success' => 'Success']);
    //     } else {
    //         return redirect()->route('artikel')->with(['error' => 'Failed']);
    //     }
    // }
}
