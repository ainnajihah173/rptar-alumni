<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Events;

class EventsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Events::insert([
            [
                'organizer_id' => 1,
                'name' => 'Tech Innovations Summit 2025',
                'created_by' => 2,
                'image_path' => 'event_images/1.jpeg',
                'description' => 'Explore the latest in technology and innovation at our annual summit.',
                'start_date' => '2025-02-15',
                'end_date' => '2025-02-16',
                'start_time' => '09:00:00',
                'end_time' => '18:00:00',
                'location' => 'Kuala Lumpur Convention Center',
                'capacity' => 10,
                'registered_count' => 0,
                'is_active' => true,
                'status' => 'approved',
            ],
            [
                'organizer_id' => 2,
                'name' => 'Alumni Reunion Gala Dinner',
                'created_by' => 2,
                'image_path' => 'event_images/2.png',
                'description' => 'Reconnect with old friends at the annual alumni dinner.',
                'start_date' => '2025-03-10',
                'end_date' => '2025-03-10',
                'start_time' => '19:00:00',
                'end_time' => '23:00:00',
                'location' => 'Grand Hyatt Hotel',
                'capacity' => 20,
                'registered_count' => 0,
                'is_active' => false,
                'status' => 'pending',
            ],
            [
                'organizer_id' => 3,
                'name' => 'Career Networking Night',
                'created_by' => 2,
                'image_path' => 'event_images/3.jpeg',
                'description' => 'Expand your professional network at this exclusive event.',
                'start_date' => '2025-04-05',
                'end_date' => '2025-04-05',
                'start_time' => '18:00:00',
                'end_time' => '21:00:00',
                'location' => 'RPTAR Hall',
                'capacity' => 50,
                'registered_count' => 0,
                'is_active' => true,
                'status' => 'approved',
            ],
            [
                'organizer_id' => 4,
                'name' => 'Health & Wellness Workshop',
                'created_by' => 2,
                'image_path' => 'event_images/4.png',
                'description' => 'Learn from experts about maintaining a healthy lifestyle.',
                'start_date' => '2025-01-20',
                'end_date' => '2025-01-20',
                'start_time' => '10:00:00',
                'end_time' => '15:00:00',
                'location' => 'Community Center',
                'capacity' => 30,
                'registered_count' => 0,
                'is_active' => false,
                'status' => 'pending',
            ],
            [
                'organizer_id' => 5,
                'name' => 'Art & Music Festival',
                'created_by' => 2,
                'image_path' => 'event_images/5.jpeg',
                'description' => 'Experience the beauty of art and music in one place.',
                'start_date' => '2025-05-01',
                'end_date' => '2025-05-02',
                'start_time' => '10:00:00',
                'end_time' => '22:00:00',
                'location' => 'Open Park Arena',
                'capacity' => 30,
                'registered_count' => 0,
                'is_active' => true,
                'status' => 'approved',
            ],
            [
                'organizer_id' => 6,
                'name' => 'Volunteer Outreach Program',
                'created_by' => 2,
                'image_path' => 'event_images/6.jpg',
                'description' => 'Make a difference by volunteering for a noble cause.',
                'start_date' => '2025-01-05',
                'end_date' => '2025-01-06',
                'start_time' => '08:00:00',
                'end_time' => '17:00:00',
                'location' => 'RPTAR Grounds',
                'capacity' => 15,
                'registered_count' => 0,
                'is_active' => false,
                'status' => 'pending',
            ],
        ]);
    }
}
