<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    
    public function edit($id)
    {
        $id = Auth::user()->id;
        $user = User::findOrFail($id);
        return view('auth.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $id = Auth::user()->id;
        $user = User::findOrFail($id);
        $request['password'] = Hash::make($request->password);
        $user->update($request->all());
        return redirect('product');
    }
}
