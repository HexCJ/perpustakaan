<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function show(){
        $users = User::all();
        return view('datauser',[
            'users' => $users
        ]);
    }

    public function store(Request $request){
        $data['name'] = $request->nama;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);
        $data['role'] = $request->role;

        if($user = User::create($data)){
            if($request->role === 'admin'){
                $user->assignRole('admin');
            }else if($request->role === 'penjaga'){
                $user->assignRole('penjaga');
            }
            return redirect()->route('datauser')->with('success', 'Data User berhasil ditambahkan');
        } else{
            return redirect()->route('datauser')->with('fail', 'Data User gagal ditambahkan');
        }
    }
}
