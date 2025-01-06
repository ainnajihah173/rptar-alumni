<?php

namespace App\Http\Controllers;
use App\Models\Campaign;
use App\Models\Donation;
use App\Models\Inquiries;
use App\Models\Message;
use App\Models\User;
use App\Models\Events;
use App\Models\News;
use Illuminate\Support\Facades\Hash;
use App\Models\Profile;
use Illuminate\Http\Request;
use Carbon\Carbon;

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
    // Get the authenticated user
    $user = auth()->user();

    if ($user->role === 'admin') {
      // Admin-specific logic (if needed)
    } elseif ($user->role === 'staff') {
      // Staff-specific logic (if needed)
      // Get the authenticated user
      $user = auth()->user();

      // Fetch latest news (e.g., last 5 news articles)
      $latestNews = News::orderBy('published_date', 'desc')->take(3)->get();

      // Fetch upcoming events (e.g., events after today)
      $upcomingEvents = Events::where('start_date', '>=', Carbon::now())
        ->orderBy('start_date', 'asc')
        ->take(4)
        ->get();

      // Fetch total donations
      $donationSummary = Donation::sum('amount');

      // Fetch recent inquiries (e.g., last 5 inquiries)
      $recentInquiries = Inquiries::orderBy('created_at', 'desc')
        ->take(3)
        ->get();

      // Fetch donation history for the chart (last 6 months)
      $donationHistory = Donation::selectRaw('SUM(amount) as total, MONTH(created_at) as month')
        ->where('created_at', '>=', Carbon::now()->subMonths(6))
        ->groupBy('month')
        ->orderBy('month', 'asc')
        ->get();

      // Fetch event participation for the chart (last 6 months)
      $eventParticipation = Events::selectRaw('COUNT(*) as total, MONTH(start_date) as month')
        ->where('start_date', '>=', Carbon::now()->subMonths(6))
        ->groupBy('month')
        ->orderBy('month', 'asc')
        ->get();

      // Pass data to the view
      return view('dashboard', compact(
        'user',
        'latestNews',
        'upcomingEvents',
        'donationSummary',
        'recentInquiries',
        'donationHistory',
        'eventParticipation',
      ));

    } else {
      // Fetch latest news (e.g., last 3 news articles)
      $latestNews = News::orderBy('published_date', 'desc')->take(3)->get();

      // Fetch upcoming events that the user has registered for
      $upcomingEvents = Events::where('start_date', '>=', Carbon::now())
        ->orderBy('start_date', 'asc')
        ->whereHas('participants', function ($query) use ($user) {
          $query->where('user_id', $user->id); // Filter events where the user is a participant
        })
        ->get(); // Execute the query

      // Format events for FullCalendar
      // Format events for FullCalendar
      $formattedEvents = $upcomingEvents->map(function ($event) {
        return [
          'title' => $event->name,
          'start' => $event->start_date, // Start date
          'end' => Carbon::parse($event->end_date)->addDay()->toDateString(), // Add 1 day for all-day events
          'allDay' => true, // Mark as an all-day event
          'url' => route('events.show', $event->id), // Link to event details
        ];
      });

      // Fetch user's donation summary
      $donationSummary = Donation::where('user_id', $user->id)->sum('amount');

      // Fetch user's recent inquiries (e.g., last 5 inquiries)
      $recentInquiries = Inquiries::where('user_id', $user->id)
        ->orderBy('created_at', 'desc')
        ->take(5)
        ->get();

      // Fetch donation history for the chart (last 6 months)
      $donationHistory = Donation::where('user_id', $user->id)
        ->selectRaw('SUM(amount) as total, MONTH(created_at) as month')
        ->where('created_at', '>=', Carbon::now()->subMonths(6))
        ->groupBy('month')
        ->orderBy('month', 'asc')
        ->get();

      // Fetch event participation for the chart (last 6 months)
      $eventParticipation = Events::whereHas('participants', function ($query) use ($user) {
        $query->where('user_id', $user->id);
      })
        ->selectRaw('COUNT(*) as total, MONTH(start_date) as month')
        ->where('start_date', '>=', Carbon::now()->subMonths(6))
        ->groupBy('month')
        ->orderBy('month', 'asc')
        ->get();

      // Pass data to the view
      return view('dashboard', compact(
        'user',
        'latestNews',
        'upcomingEvents',
        'donationSummary',
        'recentInquiries',
        'donationHistory',
        'eventParticipation',
        'formattedEvents'
      ));
    }
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
