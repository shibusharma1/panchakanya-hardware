<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Product;
use App\Models\Event;
use App\Models\ContactMessage;

class DashboardController extends Controller
{
    public function index()
    {
        $productCount = Product::count();
        $categoryCount = Category::count();
        $eventCount = Event::count();
        $messageCount = ContactMessage::where('is_read', false)->count();

        return view('admin.dashboard', compact('productCount', 'categoryCount', 'eventCount', 'messageCount'));
    }
}
