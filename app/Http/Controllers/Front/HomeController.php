<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomepageSection;
use App\Models\Category;
use App\Models\Product;
use App\Models\Event;

class HomeController extends Controller
{
    public function index()
    {
        $sections = HomepageSection::all()->keyBy('section_key');
        
        $hero = $sections->get('hero') ? $sections->get('hero')->content : [];
        $about = $sections->get('about') ? $sections->get('about')->content : [];
        $whyChooseUs = $sections->get('why_choose_us') ? $sections->get('why_choose_us')->content : [];
        $cta = $sections->get('cta') ? $sections->get('cta')->content : [];
        $contactInfo = $sections->get('contact_info') ? $sections->get('contact_info')->content : [];

        $featuredCategories = Category::take(6)->get(); // Adjust logic as needed
        $featuredProducts = Product::with('category')->where('is_featured', true)->take(8)->get();
        $topSellingProducts = Product::with('category')->where('is_top_selling', true)->take(8)->get();
        $upcomingEvents = Event::where('is_active', true)->whereDate('date', '>=', now())->orderBy('date')->take(3)->get();

        return view('welcome', compact(
            'hero', 
            'about', 
            'whyChooseUs', 
            'cta',
            'contactInfo', 
            'featuredCategories', 
            'featuredProducts', 
            'topSellingProducts', 
            'upcomingEvents'
        ));
    }
}
