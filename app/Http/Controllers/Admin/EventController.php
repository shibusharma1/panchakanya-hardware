<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\ImageService;
use Illuminate\Http\Request;

use App\Models\Event;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::latest()->paginate(10);
        return view('admin.events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.events.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Log::info('Event store request data:', $request->all());
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'date' => 'required|date',
            'location' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'is_active' => 'nullable|boolean',
        ]);

        $data = $request->except('image');
        $data['slug'] = $this->createUniqueSlug($request->title);
        $data['is_active'] = $request->has('is_active');

        // if ($request->hasFile('image')) {
        //     Log::info('Image file found in store request');
        //     $data['image'] = $request->file('image')->store('events', 'public');
        // } else {
        //     Log::info('No image file in store request');
        // }

        if ($request->hasFile('image')) {

            Log::info('Image file found in store request');

            $data['image'] = ImageService::upload(
                $request->file('image'),
                'events'
            );

            Log::info('Image uploaded successfully', [
                'path' => $data['image']
            ]);
        } else {

            Log::info('No image file in store request');
        }

        Event::create($data);

        return redirect()->route('admin.events.index')->with('success', 'Event created successfully.');
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
    public function edit(Event $event)
    {
        return view('admin.events.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        Log::info('Event update request data:', $request->all());
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'date' => 'required|date',
            'location' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'is_active' => 'nullable|boolean',
        ]);

        $data = $request->except('image');
        $data['slug'] = $this->createUniqueSlug($request->title, $event->id);
        $data['is_active'] = $request->has('is_active');

        // if ($request->hasFile('image')) {
        //     Log::info('Image file found in update request');
        //     if ($event->image) {
        //         Storage::disk('public')->delete($event->image);
        //     }
        //     $data['image'] = $request->file('image')->store('events', 'public');
        // } else {
        //     Log::info('No image file in update request');
        // }


        if ($request->hasFile('image')) {

            Log::info('Image file found in update request');

            $data['image'] = ImageService::update(
                $request->file('image'),
                'events',
                $event->image   // old image path
            );

            Log::info('Image updated successfully', [
                'path' => $data['image']
            ]);
        } else {

            Log::info('No image file in update request');
        }

        $event->update($data);

        return redirect()->route('admin.events.index')->with('success', 'Event updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        // if ($event->image) {
        //     Storage::disk('public')->delete($event->image);
        // }
        
        if ($event->image) {
            ImageService::delete($event->image);

            Log::info('Event image deleted', [
                'path' => $event->image
            ]);
        }

        $event->delete();
        return redirect()->route('admin.events.index')->with('success', 'Event deleted successfully.');
    }

    private function createUniqueSlug($title, $id = 0)
    {
        $slug = Str::slug($title);
        $originalSlug = $slug;
        $count = 1;

        while (Event::where('slug', $slug)->where('id', '!=', $id)->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }

        return $slug;
    }
}
