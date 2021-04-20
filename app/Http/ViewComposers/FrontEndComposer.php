<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;

use App\Models\Kategori;
use App\Models\Subkategori;

class FrontEndComposer
{
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $kategori = Kategori::with('subkategori')->get();
        // $sub_kategori = Subkategori::all();
        $view->with('kategori', $kategori);
        // $view->with('sub_kategori', $sub_kategori);
    }
}
