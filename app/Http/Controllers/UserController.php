<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if(Auth::check()){
            return redirect(route('user.cabinet'));
        }
        $validateFields = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'name'=> 'required'
        ]);
        $user = User::create($validateFields);
        if ($user) {
            Auth::login($user);
            return redirect(route('cabinet'));
        }
        else {}
        return back()->withErrors( ['formError'=>'Ошибка регистрации']);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
