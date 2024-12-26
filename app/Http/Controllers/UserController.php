<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class UserController extends Controller
{
  public function dashboard()
  {
    return view('dashboard');
  }

  public function index()
  {
    $users = User::paginate(10);
    return view('user.index', compact('users'));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $request->validate([
      'name' => 'required|string|max:255',
      'email' => 'required|email|unique:users,email',
      'password' => 'required|min:8',
    ]);

    $user = User::create([
      'name' => $request->name,
      'email' => $request->email,
      'password' => Hash::make($request->password),
      'role' => $request->role,
    ]);

    // Return to user list with success message
    return redirect()->route('user.index')
    ->with('success', 'User created successfully.')
    ->with('modal', '<strong>Email:</strong> ' . $user->email . '<br><br><strong>Password:</strong> ' . $request->password);
  }

  /**
   * Display the specified resource.
   */
  public function show($id)
  {

  }


  public function update(Request $request, $id)
  {

  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy($id)
  {
    User::destroy($id);
    return redirect()->route('user.index')
        ->with('success', "User Deleted Successfully!");

  }


}
