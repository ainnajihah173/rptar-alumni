<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use App\Models\Campaign;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;

class DonationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $campaigns = Campaign::paginate(10);
        return view('donations.index', compact('campaigns'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('donations.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'target_amount' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle profile picture upload
        $imagePath = null; // Default if no image is uploaded
        if ($request->hasFile('image_path')) {
            $image = $request->file('image_path');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $imagePath = $image->storeAs('donation_images', $imageName, 'public'); // Stored in 'storage/app/public/donation_images'
        }

        // Create the campaign
        Campaign::create([
            'created_by' => auth()->user()->id,
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'target_amount' => $request->input('target_amount'),
            'start_date' => $request->input('start_date') ?? null,
            'end_date' => $request->input('end_date') ?? null,
            'image_path' => $imagePath,
        ]);

        return redirect()->route('donations.index')->with('success', 'Campaign created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Donation $donation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $campaigns = Campaign::find($id);
        $users = User::find(auth()->user()->id);
        return view('donations.update', compact('campaigns', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Donation $donation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Donation $donation)
    {
        //
    }
}
