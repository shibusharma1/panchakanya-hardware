<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;
use Illuminate\Support\Str;
use Carbon\Carbon;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $events = [
            [
                'title' => 'Grand Opening Ceremony',
                'description' => 'Join us for the grand opening of our new showroom in Kathmandu. Experience the latest in construction technology and meet industry experts.',
                'image' => 'https://images.unsplash.com/photo-1540575467063-178a50c2df87?ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80',
                'date' => Carbon::now()->addDays(15),
                'location' => 'Kathmandu Showroom',
                'is_active' => true,
            ],
            [
                'title' => 'Sustainable Construction Workshop',
                'description' => 'Learn about eco-friendly building materials and sustainable construction practices. Free entry for all contractors and engineers.',
                'image' => 'https://images.unsplash.com/photo-1531403009284-440f080d1e12?ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80',
                'date' => Carbon::now()->addDays(25),
                'location' => 'Panchakanya Conference Hall',
                'is_active' => true,
            ],
            [
                'title' => 'Annual Hardware Expo 2026',
                'description' => 'The biggest hardware exhibition in Nepal. Discover new products, network with suppliers, and get exclusive discounts.',
                'image' => 'https://images.unsplash.com/photo-1581094794329-c8112a89af12?ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80',
                'date' => Carbon::now()->addMonths(2),
                'location' => 'Bhrikutimandap Exhibition Center',
                'is_active' => true,
            ],
        ];

        foreach ($events as $event) {
            Event::updateOrCreate(
                ['slug' => Str::slug($event['title'])],
                [
                    'title' => $event['title'],
                    'description' => $event['description'],
                    'image' => $event['image'],
                    'date' => $event['date'],
                    'location' => $event['location'],
                    'is_active' => $event['is_active'],
                ]
            );
        }
    }
}
