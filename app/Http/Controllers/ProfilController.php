<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Rules\MatchOldPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfilController extends Controller
{
    public function edit($id)
    {
        $user = User::find($id);

        if (empty($user)) {
            return redirect()->route('home');
        }

        return view('layouts.profil', ['users' => $user]);
    }

    public function update($id, Request $request)
    {
        $user = User::find($id);

        if (empty($user)) {
            return redirect()->route('home');
        }

        // dd($request->all());
        // $status = 1;
        // if (isset($request->draft)) {
        //     $status = 3;
        // }
        // if (isset($request->kirim)) {
        //     $status = 2;
        // }
        $this->validate($request, [
            'name' => 'required',
            'foto' => 'file|mimes:jpeg,png,jpg,gif,svg',
            'email' => 'required',
        ]);

        $file_upload = $request->file('foto');

        if ($file_upload) {


            $fileName = time() . '.' . $file_upload->getClientOriginalExtension();

            $file_upload->move(public_path('uploads'), $fileName);

            $user->foto = $fileName;
        }

        $user->name = $request->name;
        $user->email = $request->email;

        $user->save();

        if ($user) {
            return redirect()->route('home')->with(['success' => 'Success']);
        } else {
            return redirect()->route('home')->with(['error' => 'Failed']);
        }
    }

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function change()
    {
        return view('auth.ubahpass');
    }

    public function changePass(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);

        $newpass = User::find(auth()->user()->id)->update(['password' => Hash::make($request->new_password)]);

        if ($newpass) {
            return redirect()->route('home')->with(['success' => 'Success']);
        } else {
            return redirect()->route('home')->with(['error' => 'Failed']);
        }
    }
}
