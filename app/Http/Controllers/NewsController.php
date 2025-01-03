<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->role === 'staff')
            $news = News::paginate('10');
        else
            $news = News::whereNotNull('published_date')->orderByDesc('published_date')->get();
        return view('news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::where('id', auth()->user()->id)->first();
        return view('news.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1. Validate incoming request
        // Validate the incoming request
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:news,slug,',
            'is_active' => 'required|in:0,1', // 0 = Draft, 1 = Publish
            'image' => 'nullable|mimes:jpg,jpeg,png|max:2048', // Optional image
            'content' => 'required|string',
        ]);

        // 2. Store uploaded file (if any)
        $imagePath = null; // Default if no image is uploaded
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $imagePath = $image->storeAs('news_images', $imageName, 'public'); // Stored in 'storage/app/public/news_images'
        }

        // 3. Save the news record in the database
        $news = new News(); // Assuming you have a `News` model
        $news->title = $request->input('title');
        $news->slug = $request->input('slug');
        $news->user_id = auth()->user()->id; // Using the currently authenticated user
        $news->is_active = $request->input('is_active');
        $news->published_date = $news->is_active === '1' ? now() : null;
        $news->content = strip_tags($request->input('content'), '<a><strong><em><i>');
        $news->views = 0;
        $news->image = $imagePath; // Save the path to the image
        $news->save();

        // 4. Redirect or return a response
        return redirect()->route('news.index')->with('success', 'News created successfully!');

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $news = News::find($id);
        return view('news.show', compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $news = News::find($id);
        return view('news.update', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate the incoming request
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:news,slug,' . $id,
            'is_active' => 'required|in:0,1', // 0 = Draft, 1 = Publish
            'image' => 'nullable|mimes:jpg,jpeg,png|max:2048', // Optional image
            'content' => 'required|string',
        ]);

        // Find the news record
        $news = News::findOrFail($id);

        // Store the uploaded file (if any)
        if ($request->hasFile('image')) {
            // Delete the old image if a new one is uploaded
            if ($news->image) {
                Storage::delete('public/' . $news->image);
            }

            // Store the new image
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $imagePath = $image->storeAs('news_images', $imageName, 'public');

            $news->image = $imagePath; // Update the image path
        }

        // Update the news data
        $news->title = $request->input('title');
        $news->slug = $request->input('slug');
        $news->is_active = $request->input('is_active');
        $news->published_date = $news->is_active === '1' ? now() : null;
        $news->content = $request->input('content');
        $news->save();

        // Redirect back with a success message
        return redirect()->route('news.index')
            ->with('success', 'News updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $news = News::findOrFail($id);
        if ($news->image) {
            Storage::delete('public/' . $news->image);
        }
        News::destroy($id);
        return redirect()->route('news.index')
            ->with('success', "News Deleted Successfully!");
    }
}
