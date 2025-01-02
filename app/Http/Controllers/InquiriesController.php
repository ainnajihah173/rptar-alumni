<?php

namespace App\Http\Controllers;

use App\Models\Inquiries;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InquiriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
    
        if ($user->role === 'user') {
            // Get inquiries specific to the logged-in user
            $inquiries = Inquiries::where('user_id', $user->id)->paginate(10);
    
            $counts = [
                'Total' => $inquiries->count(),
                'Pending' => $inquiries->where('status', 'Pending')->count(),
                'In Progress' => $inquiries->where('status', 'In Progress')->count(),
                'Resolved' => $inquiries->where('status', 'Resolved')->count(),
            ];
        } else {
            // Get all inquiries for staff or admin
            $inquiries = Inquiries::paginate(10);
    
            $counts = [
                'Assign' => $inquiries->where('assign_id', auth()->user()->id)->count(),
                'Total' => $inquiries->count(),
                'Pending' => $inquiries->where('status', 'Pending')->count(),
                'In Progress' => $inquiries->where('status', 'In Progress')->count(),
                'Resolved' => $inquiries->where('status', 'Resolved')->count(),
            ];
        }
    
        return view('inquiries.index', compact('inquiries', 'counts'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::where('id', auth()->user()->id)->first();
        return view('inquiries.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation
        $validated = $request->validate([
            'category' => 'required|string',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image_path' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        // Create new inquiry
        $inquiry = new Inquiries();
        $inquiry->user_id = auth()->user()->id;
        $inquiry->category = $request->category;
        $inquiry->title = $request->title;
        $inquiry->description = $request->description;

        // Handle file upload if applicable
        if ($request->hasFile('image_path')) {
            $filePath = $request->file('image_path')->store('inquiries_images', 'public');
            $inquiry->image_path = $filePath;
        }

        // Save to the database
        $inquiry->save();

        // Redirect with success message
        return redirect()->route('inquiries.index')->with('success', 'Inquiry created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $inquiries = Inquiries::find($id);
        return view('inquiries.show', compact('inquiries'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $inquiries = Inquiries::find($id);
        return view('inquiries.update', compact('inquiries'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $inquiry = Inquiries::findOrFail($id);
    
        $request->validate([
            'category' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image_path' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);
    
        // Update inquiry fields
        $inquiry->category = $request->category;
        $inquiry->title = $request->title;
        $inquiry->description = $request->description;
    
        // Handle file upload if a new file is provided
        if ($request->hasFile('image_path')) {
            // Delete the old file if exists
            if ($inquiry->image_path && Storage::exists($inquiry->image_path)) {
                Storage::delete($inquiry->image_path);
            }
    
            // Store the new file
            $filePath = $request->file('image_path')->store('inquiries');
            $inquiry->image_path = $filePath;
        }
    
        $inquiry->save();
    
        return redirect()->route('inquiries.index')->with('success', 'Inquiry updated successfully!');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Inquiries::destroy($id);
        return redirect()->route('inquiries.index')
            ->with('success', "Inquiries Deleted Successfully!");
    }
}
