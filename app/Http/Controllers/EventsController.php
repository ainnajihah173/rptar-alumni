<?php

namespace App\Http\Controllers;

use App\Models\EventParticipant;
use App\Models\Events;
use App\Models\EventOrganizer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->role === 'user') {
            $events = Events::where('is_active', true)
                ->where('end_date', '>=', now()) // Ensure the event hasn't ended
                ->whereRaw('capacity > registered_count') // Ensure the event is not full
                ->paginate(6); // 6 events per page
        } else {
            $events = Events::paginate(10);
        }

        return view('events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'start_date' => 'required|date|after:today',
            'start_time' => 'required',
            'end_time' => 'required',
            'location' => 'required|string|max:255',
            'capacity' => 'required|integer|min:1',
            'organizer_name' => 'required|string|max:255',
            'organizer_contact' => 'required|string|max:20',
            'organizer_email' => 'required|email|max:255',
            'image_path' => 'nullable|image|max:2048',
        ]);

        $imagePath = null; // Default if no image is uploaded
        if ($request->hasFile('image_path')) {
            $image = $request->file('image_path');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $imagePath = $image->storeAs('event_images', $imageName, 'public'); // Stored in 'storage/app/public/event_images'
        }

        $organizer = EventOrganizer::create([
            'organizer_name' => $request->organizer_name,
            'organizer_contact' => $request->organizer_contact,
            'organizer_email' => $request->organizer_email,
        ]);

        Events::create([
            'organizer_id' => $organizer->id,
            'name' => $request->name,
            'description' => $request->description,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'location' => $request->location,
            'capacity' => $request->capacity,
            'image_path' => $imagePath,
            'created_by' => auth()->user()->id,
            'status' => 'pending',
            'is_active' => false,
            'registered_count' => 0,
        ]);

        return redirect()->route('events.index')->with('success', 'Events created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $events = Events::find($id);
        $participants = EventParticipant::where('event_id', $id)->get();
        return view('events.show', compact('events', 'participants'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $events = Events::find($id);
        return view('events.update', compact('events'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'start_date' => 'required|date|after:today',
            'start_time' => 'required',
            'end_time' => 'required',
            'location' => 'required|string|max:255',
            'capacity' => 'required|integer|min:1',
            'organizer_name' => 'required|string|max:255',
            'organizer_contact' => 'required|string|max:20',
            'organizer_email' => 'required|email|max:255',
            'image_path' => 'nullable|image|max:2048',
        ]);

        // Find the event by ID
        $event = Events::findOrFail($id);

        // Handle image upload if provided
        if ($request->hasFile('image_path')) {
            // Delete the old image if it exists
            if ($event->image_path) {
                Storage::disk('public')->delete($event->image_path);
            }

            // Store the new image
            $image = $request->file('image_path');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $imagePath = $image->storeAs('event_images', $imageName, 'public');
            $event->image_path = $imagePath; // Update the event image path
        }

        // Update event organizer
        $organizer = EventOrganizer::findOrFail($event->organizer_id);
        $organizer->update([
            'organizer_name' => $request->organizer_name,
            'organizer_contact' => $request->organizer_contact,
            'organizer_email' => $request->organizer_email,
        ]);

        // Update event details
        $event->update([
            'name' => $request->name,
            'description' => $request->description,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'location' => $request->location,
            'capacity' => $request->capacity,
            'status' => 'pending', // Default to the current status
            'is_active' => $request->has('is_active') ? (bool) $request->is_active : $event->is_active,
        ]);

        return redirect()->route('events.index')->with('success', 'Event updated successfully!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Find the event by its ID
        $event = Events::find($id);

        // Check if the event exists
        if (!$event) {
            return redirect()->route('events.index')->with('error', "Event not found.");
        }

        // Delete the image from storage
        if ($event->image_path && file_exists(public_path('events_image/' . $event->image_path))) {
            unlink(public_path('events_image/' . $event->image_path));
        }

        // Delete associated EventOrganizer if it exists
        if ($event->organizers) {
            $event->organizers->delete();
        }

        // Delete the event
        $event->delete();

        // Redirect with success message
        return redirect()->route('events.index')->with('success', "Event Deleted Successfully!");
    }

    public function approve($id)
    {
        $events = Events::find($id);
        $events->update(['status' => 'approved', 'is_active' => true]);
        return redirect()->route('events.index')->with('success', 'Event approved successfully!');
    }

    public function reject($id)
    {
        $events = Events::find($id);
        $events->update(['status' => 'rejected']);
        return redirect()->route('events.index')->with('success', 'Event rejected successfully!');
    }

    public function register(Request $request, $id)
    {
        $event = Events::findOrFail($id);

        // Check if the user is already registered for the event
        if ($event->participants->contains('user_id', auth()->id())) {
            return redirect()->back()->with('error', 'You are already registered for this event.');
        }

        if ($event->registered_count >= $event->capacity) {
            return redirect()->back()->with('error', 'Event is full.');
        }

        EventParticipant::create([
            'event_id' => $event->id,
            'user_id' => auth()->id(),
            'registration_date' => now(),
            'status' => 'Registered',
        ]);

        $event->increment('registered_count');

        return redirect()->back()->with('success', 'You have successfully registered for the event.');
    }



}
