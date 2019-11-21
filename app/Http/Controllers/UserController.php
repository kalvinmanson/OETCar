<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Car;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $users = User::orderBy('updated_at', 'desc')->paginate(10);
      $newUser = new User;
      return view('users.index', compact('users', 'newUser'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $validatedData = $request->validate([
        'email' => 'required|unique:users|max:255',
        'document' => 'required|max:255',
        'first_name' => 'required|max:255',
        'second_name' => 'required|max:255',
        'last_name' => 'required|max:255'
      ]);
      $user = new User;
      $user->email = $request->email;
      $user->password = rand(10000,99999);
      $user->document = $request->document;
      $user->first_name = $request->first_name;
      $user->second_name = $request->second_name;
      $user->last_name = $request->last_name;
      $user->address = $request->address;
      $user->phone = $request->phone;
      $user->city = $request->city;
      $user->save();

      flash('Registro guardado')->success();
      return redirect()->route('users.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $user = User::findOrFail($id);
      return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $user = User::findOrFail($id);
      $validatedData = $request->validate([
        'email' => 'required|unique:users,email,'.$user->id.'|max:255',
        'document' => 'required|max:255',
        'first_name' => 'required|max:255',
        'second_name' => 'required|max:255',
        'last_name' => 'required|max:255'
      ]);

      $user->email = $request->email;
      $user->document = $request->document;
      $user->first_name = $request->first_name;
      $user->second_name = $request->second_name;
      $user->last_name = $request->last_name;
      $user->address = $request->address;
      $user->phone = $request->phone;
      $user->city = $request->city;
      $user->save();

      flash('Registro actualizado')->success();
      return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $user = User::findOrFail($id);
      $user->delete();
      flash('Registro borrado')->success();
      return redirect()->route('users.index');
    }
}
