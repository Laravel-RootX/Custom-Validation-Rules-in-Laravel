<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Rules\UpperCase;


class UserController extends Controller
{
    public function index()
    {
        $data['users'] = User::all();
        return view('users.index', $data);
    }


    public function create()
    {
        return view('users.create');
    }


    public function store(Request $request)
    {
        $validator = $request->validate([
            'name'      =>  ['required','max:255', new UpperCase],
            'email'     =>  'required|email|unique:users',
        ]);

        $name = $request->input('name');
        $email = $request->input('email');

        User::insert([
            'name' => $name,
            'email' => $email
            ]);

        session()->flash('message', 'User has been created successfully.');
        return redirect('/users');
    }
}
