<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $user = User::all();
        return view('admin.user', ['user' => $user]);
    }

    public function add()
    {
        return view('admin.user-add');
    }

    function new(Request $request)
    {


        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'jk' => 'required',
            'alamat' => 'required',
            'ktp' => 'required|file|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $file_upload = $request->file('ktp');

        $fileName = time() . '.' . $file_upload->getClientOriginalExtension();

        $file_upload->move(public_path('uploads'), $fileName);

        $user = User::create([
            'foto' => '',
            'name' => trim($request->name),
            'email' => trim($request->email),
            'jk' => trim($request->jk),
            'alamat' => trim($request->alamat),
            'ktp' => $fileName,
            'password' => bcrypt(12345678),
        ]);
        $user->assignRole('redaktur');

        if ($user) {
            return redirect()->route('user')->with(['success' => 'Success']);
        } else {
            return redirect()->route('user')->with(['error' => 'Failed']);
        }
    }

    public function delete($id)
    {
        $user = User::find($id);

        if (empty($user)) {
            return redirect()->route('user');
        }

        $user->delete();

        if ($user) {
            return redirect()->route('user')->with(['success' => 'Success']);
        } else {
            return redirect()->route('user')->with(['error' => 'Failed']);
        }
    }

    public function detail($id)
    {
        $us = User::find($id);

        if (empty($us)) {
            return redirect()->route('user');
        }

        return view('admin.detail-user', ['us' => $us]);
    }
}
