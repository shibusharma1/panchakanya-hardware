<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SiteSetting;

class SiteSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            'site_name' => 'Panchakanya Hardware',
            'site_email' => 'info@panchakanya.com',
            'site_phone' => '+977-01-4123456',
            'site_address' => 'Balaju Industrial District, Kathmandu, Nepal',
            'facebook_url' => 'https://facebook.com/panchakanya',
            'twitter_url' => 'https://twitter.com/panchakanya',
            'instagram_url' => 'https://instagram.com/panchakanya',
            'linkedin_url' => 'https://linkedin.com/company/panchakanya',
            'footer_description' => 'Your trusted partner for quality construction materials since 1990.',
            'working_hours' => 'Sun - Fri: 9:00 AM - 6:00 PM',
        ];

        foreach ($settings as $key => $value) {
            SiteSetting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }
    }
}
