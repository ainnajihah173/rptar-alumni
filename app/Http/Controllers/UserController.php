<?php

namespace App\Http\Controllers;
use App\Models\Campaign;
use App\Models\User;
use App\Models\Events;
use App\Models\News;
use Illuminate\Support\Facades\Hash;
use App\Models\Profile;
use Illuminate\Http\Request;

class UserController extends Controller
{

  public function portal()
  {
    // Fetch data for each section
    $events = Events::where('is_active', true)->orderBy('start_date', 'asc')->take(3)->get();
    $news = News::orderBy('published_date', 'desc')->take(4)->get();
    $donations = Campaign::where('status', 'active') // ENUM value
      ->orderBy('created_at', 'desc')
      ->take(1)
      ->get();

    // Pass data to the view
    return view('welcome', compact('events', 'news', 'donations'));
  }

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
      'name' => 'required|string|max:255|unique:users,name',
      'email' => 'required|email|unique:users,email',
      'password' => 'required|min:8',
    ], [
      'name.unique' => 'The name has already been taken.',
      'email.unique' => 'The email address has already been registered.',
    ]);

    $user = User::create([
      'name' => $request->name,
      'email' => $request->email,
      'password' => Hash::make($request->password),
      'role' => $request->role,
    ]);

    Profile::create([
      'user_id' => $user->id,
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
