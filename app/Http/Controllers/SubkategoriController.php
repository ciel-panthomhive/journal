<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Subkategori;
use Illuminate\Http\Request;

class SubkategoriController extends Controller
{
    public function index()
    {
        $subkategori = Subkategori::with(['kategori'])->get();
        return view('admin.subkategori', ['subkategori' => $subkategori]);
    }

    public function add()
    {
        $subkategori = Subkategori::all();
        $kategori = Kategori::all();
        return view('admin.subkategori-add', ['subkategori' => $subkategori, 'kategori' => $kategori]);
    }

    function new(Request $request)
    {
        $this->validate($request, [
            'subkategories' => 'required',
        ]);

        $subkategori = Subkategori::create([
            'subkategories' => trim($request->subkategories),
            'id_kategori' => $request->id_kategori != "" ? $request->id_kategori : null,
        ]);

        if ($subkategori) {
            return redirect()->route('subkategori')->with(['success' => 'Success']);
        } else {
            return redirect()->route('subkategori')->with(['error' => 'Failed']);
        }
    }

    public function edit($id)
    {
        $kategori = Kategori::all();
        $subkategori = Subkategori::find($id);

        if (empty($subkategori)) {
            return redirect()->route('subkategori');
        }

        return view('admin.subkategori-edit', ['subkategori' => $subkategori, 'kategori' => $kategori]);
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'subkategories' => 'required',
        ]);

        $subkategori = Subkategori::find($id);

        if (empty($subkategori)) {
            return redirect()->route('subkategori');
        }

        $subkategori->subkategories = trim($request->subkategories);
        $subkategori->id_kategori = $request->id_kategori != "" ? $request->id_kategori : null;
        $subkategori->save();

        if ($subkategori) {
            return redirect()->route('subkategori')->with(['success' => 'Success']);
        } else {
            return redirect()->route('subkategori')->with(['error' => 'Failed']);
        }
    }

    public function delete($id)
    {
        $subkategori = Subkategori::find($id);

        if (empty($subkategori)) {
            return redirect()->route('subkategori');
        }

        $subkategori->delete();

        if ($subkategori) {
            return redirect()->route('subkategori')->with(['success' => 'Success']);
        } else {
            return redirect()->route('subkategori')->with(['error' => 'Failed']);
        }
    }
}
