<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomepageSection;
use App\Models\ContactMessage;
use App\Models\Event;
use App\Models\SiteSetting;

class PageController extends Controller
{
    public function about()
    {
        $aboutSection = HomepageSection::where('section_key', 'about')->first();
        $about = $aboutSection ? $aboutSection->content : [];

        $whyChooseUsSection = HomepageSection::where('section_key', 'why_choose_us')->first();
        $whyChooseUs = $whyChooseUsSection ? $whyChooseUsSection->content : [];

        return view('front.pages.about', compact('about', 'whyChooseUs'));
    }

    public function contact()
    {
        $section = HomepageSection::where('section_key', 'contact_info')->first();
        $contactInfo = $section ? $section->content : [];
        return view('front.pages.contact', compact('contactInfo'));
    }

    public function storeContact(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        ContactMessage::create($request->all());

        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }

    public function eventDetail($slug)
    {
        $event = Event::where('slug', $slug)->where('is_active', true)->firstOrFail();
        return view('front.pages.event', compact('event'));
    }

    public function events()
    {
        $events = Event::where('is_active', true)
            ->whereDate('date', '>=', now())
            ->orderBy('date')
            ->paginate(9);
            
        return view('front.pages.events', compact('events'));
    }
}
