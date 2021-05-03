<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori::all();
        return view('admin.kategori', ['kategori' => $kategori]);
    }

    public function add()
    {
        return view('admin.kategori-add');
    }

    function new(Request $request)
    {
        $this->validate($request, [
            'kategories' => 'required',
        ]);

        $kategori = Kategori::create([
            'kategories' => trim($request->kategories),
        ]);

        if ($kategori) {
            return redirect()->route('kategori')->with(['success' => 'Success']);
        } else {
            return redirect()->route('kategori')->with(['error' => 'Failed']);
        }
    }

    public function edit($id)
    {
        $ska = Kategori::find($id);

        if (empty($ska)) {
            return redirect()->route('kategori');
        }
        // dd($ska);
        return view('admin.kategori-edit', ['ska' => $ska]);
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'kategories' => 'required',
        ]);

        $kategori = Kategori::find($id);

        if (empty($kategori)) {
            return redirect()->route('kategori');
        }

        $kategori->kategories = trim($request->kategories);
        $kategori->save();

        if ($kategori) {
            return redirect()->route('kategori')->with(['success' => 'Success']);
        } else {
            return redirect()->route('kategori')->with(['error' => 'Failed']);
        }
    }

    public function delete($id)
    {
        $kategori = Kategori::find($id);

        if (empty($kategori)) {
            return redirect()->route('kategori');
        }

        $kategori->delete();

        if ($kategori) {
            return redirect()->route('kategori')->with(['success' => 'Success']);
        } else {
            return redirect()->route('kategori')->with(['error' => 'Failed']);
        }
    }
}
