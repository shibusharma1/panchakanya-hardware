<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\ImageService;
use Illuminate\Http\Request;

use App\Models\SiteSetting;
use Illuminate\Support\Facades\Storage;

class SiteSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $settings = SiteSetting::all();
        return view('admin.site-settings.index', compact('settings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (auth()->user()->role !== 'super_admin') {
            abort(403, 'Only super admin can create settings.');
        }
        return view('admin.site-settings.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (auth()->user()->role !== 'super_admin') {
            abort(403, 'Only super admin can create settings.');
        }
        $request->validate([
            'key' => 'required|string|unique:site_settings,key',
            'value' => 'nullable',
            'image' => 'nullable|image|max:2048'
        ]);

        $value = $request->value;
        if ($request->hasFile('image')) {
            $value = ImageService::upload(
                $request->file('image'),
                'settings'
            );
        }

        SiteSetting::create([
            'key' => $request->key,
            'value' => $value
        ]);

        return redirect()->route('admin.site-settings.index')->with('success', 'Setting created successfully.');
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
    public function edit(SiteSetting $siteSetting)
    {
        return view('admin.site-settings.edit', compact('siteSetting'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SiteSetting $siteSetting)
    {
        $request->validate([
            'value' => 'nullable',
            'image' => 'nullable|image|max:2048'
        ]);

        $value = $request->value;

        // if ($request->hasFile('image')) {
        //     // If it's an image setting, delete old one
        //     if ($siteSetting->value && Storage::disk('public')->exists($siteSetting->value)) {
        //         Storage::disk('public')->delete($siteSetting->value);
        //     }
        //     $value = $request->file('image')->store('settings', 'public');
        // }

        if ($request->hasFile('image')) {
            // Delete old + upload new
            $value = ImageService::update(
                $request->file('image'),
                'settings',
                $siteSetting->value // old image path
            );
        }

        $siteSetting->update(['value' => $value]);

        return redirect()->route('admin.site-settings.index')->with('success', 'Setting updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SiteSetting $siteSetting)
    {
        if (auth()->user()->role !== 'super_admin') {
            abort(403, 'Only super admin can delete settings.');
        }
        // if ($siteSetting->value && Storage::disk('public')->exists($siteSetting->value)) {
        //     // Check if it looks like a file path
        //     if (strpos($siteSetting->value, '/') !== false) {
        //         Storage::disk('public')->delete($siteSetting->value);
        //     }
        // }
        ImageService::delete($siteSetting->value);
        $siteSetting->delete();
        return redirect()->route('admin.site-settings.index')->with('success', 'Setting deleted successfully.');
    }
}
