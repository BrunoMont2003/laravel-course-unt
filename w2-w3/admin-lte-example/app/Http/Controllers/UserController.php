<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }
    public function verifyLogin(Request $request)
    {
        // dd($request->all());
        $data = $request->validate(
            [
                'name' => 'required',
                'password' => 'required',
            ],
            [
                'name.required' => 'Enter User',
                'password.required' => 'Enter Password'
            ]
        );

        if (Auth::attempt($data)) {

            $con = 'OK';
        }

        $name = $request->get('name');
        $query = User::where('name', $name)->get();
        if ($query->count() != 0) {
            $hashp = $query[0]->password;
            $password = $request->get('password');
            dd(password_verify($hashp, $password));
            if (password_verify($hashp, $password)) {
                return redirect()->route('home');
            } else {
                return back()->withErrors(['password' => 'Invalid password'])->withInput(request(['name', 'password']));
            }
        } else {
            return back()->withErrors(['name' => 'Invalid username'])->withInput(request(['name']));
        }
    }
}