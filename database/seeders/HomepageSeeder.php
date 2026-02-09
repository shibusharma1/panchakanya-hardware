<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\HomepageSection;

class HomepageSeeder extends Seeder
{
    public function run(): void
    {
        $sections = [
            'hero' => [
                'title' => 'Build Your Dream',
                'subtitle' => 'with Panchakanya Hardware',
                'description' => 'Experience the perfect blend of strength and aesthetics with Panchakanya\'s premium hardware solutions.',
                'image' => 'https://images.unsplash.com/photo-1541888946425-d81bb19240f5?ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80',
                'button_text' => 'Explore Catalog',
                'button_link' => '/products',
            ],
            'about' => [
                'title' => 'Who <span class="text-red-600">We</span> Are',
                'subtitle' => 'About Us',
                'description' => 'Panchakanya Hardware is a leading provider of high-quality construction materials and hardware solutions.',
                'image_1' => 'https://images.unsplash.com/photo-1541888946425-d81bb19240f5?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80',
                'image_2' => 'https://images.unsplash.com/photo-1504307651254-35680f356dfd?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80',
                'image_3' => 'https://images.unsplash.com/photo-1503387762-592deb58ef4e?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80',
                'image_4' => 'https://images.unsplash.com/photo-1581092918056-0c4c3acd3789?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80',
                'active_customers_count' => 5000,
            ],
            'why_choose_us' => [
                'title' => 'Why Choose Panchakanya Hardware?',
                'card_1_title' => 'Quality Assurance',
                'card_1_description' => 'We source our products from trusted manufacturers to ensure durability and reliability.',
                'card_1_icon' => 'fa-solid fa-check-circle',
                'card_2_title' => 'Competitive Pricing',
                'card_2_description' => 'Get the best value for your money with our competitive pricing on all hardware.',
                'card_2_icon' => 'fa-solid fa-tags',
                'card_3_title' => 'Fast Delivery',
                'card_3_description' => 'We understand the importance of time in construction. Count on us for timely delivery.',
                'card_3_icon' => 'fa-solid fa-truck',
                'card_4_title' => 'Expert Support',
                'card_4_description' => 'Our team of experts is always ready to assist you with your queries and selection.',
                'card_4_icon' => 'fa-solid fa-headset',
            ],
            'cta' => [
                'title' => 'Building Your Dream Project?',
                'subtitle' => 'Get in Touch',
                'description' => 'We are here to help you find the best materials for your construction needs. Contact us today.',
                'button_text' => 'Contact Us Now',
                'button_link' => '/contact',
            ],
            'contact_info' => [
                'hero_title' => 'Get in <span class="text-red-600">Touch</span>',
                'hero_description' => 'Have questions? We\'re here to help. Send us a message or reach out directly.',
                'phone' => '+977-1234567890',
                'email' => 'info@panchakanya.com',
                'address' => 'Kathmandu, Nepal',
            ],
            'footer' => [
                'about_text' => 'Panchakanya Hardware provides top-quality construction materials and hardware solutions.',
                'copyright' => '© 2024 Panchakanya Hardware. All rights reserved.',
            ],
        ];

        foreach ($sections as $key => $content) {
            HomepageSection::updateOrCreate(
                ['section_key' => $key],
                ['content' => $content, 'is_active' => true]
            );
        }
    }
}
