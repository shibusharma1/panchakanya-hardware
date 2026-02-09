<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\HomepageSection;
use Illuminate\Support\Facades\Storage;

class HomepageSectionController extends Controller
{
    /**
     * Show the form for editing the About Us section specifically.
     */
    public function editAbout()
    {
        $homepageSection = HomepageSection::where('section_key', 'about')->firstOrFail();
        return view('admin.homepage-sections.edit', compact('homepageSection'));
    }

    /**
     * Update the About Us section specifically.
     */
    public function updateAbout(Request $request)
    {
        $homepageSection = HomepageSection::where('section_key', 'about')->firstOrFail();
        
        $this->performUpdate($request, $homepageSection);

        return redirect()->route('admin.about.edit')->with('success', 'About Us page updated successfully.');
    }

    /**
     * Show the form for editing the Contact Us section specifically.
     */
    public function editContact()
    {
        $homepageSection = HomepageSection::where('section_key', 'contact_info')->firstOrFail();
        return view('admin.homepage-sections.edit', compact('homepageSection'));
    }

    /**
     * Update the Contact Us section specifically.
     */
    public function updateContact(Request $request)
    {
        $homepageSection = HomepageSection::where('section_key', 'contact_info')->firstOrFail();
        
        $this->performUpdate($request, $homepageSection);

        return redirect()->route('admin.contact.edit')->with('success', 'Contact Us page updated successfully.');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sections = HomepageSection::all();
        return view('admin.homepage-sections.index', compact('sections'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Not allowing creation from UI for now, seeding is preferred
        return redirect()->route('admin.homepage-sections.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(HomepageSection $homepageSection)
    {
        return view('admin.homepage-sections.edit', compact('homepageSection'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HomepageSection $homepageSection)
    {
        $this->performUpdate($request, $homepageSection);

        return redirect()->route('admin.homepage-sections.index')->with('success', 'Section updated successfully.');
    }

    private function performUpdate(Request $request, HomepageSection $homepageSection)
    {
        $data = $request->except(['_token', '_method', 'image', 'image_1', 'image_2', 'image_3', 'image_4']);
        $content = $homepageSection->content ?? [];

        // Handle Image Uploads
        $imageFields = ['image', 'image_1', 'image_2', 'image_3', 'image_4'];
        
        foreach ($imageFields as $field) {
            if ($request->hasFile($field)) {
                // Delete old image if exists
                if (isset($content[$field]) && $content[$field]) {
                    Storage::disk('public')->delete($content[$field]);
                }
                $imagePath = $request->file($field)->store('homepage', 'public');
                $content[$field] = $imagePath;
            }
        }
        
        // Merge other fields
        foreach ($data as $key => $value) {
            $content[$key] = $value;
        }

        $homepageSection->update(['content' => $content]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
