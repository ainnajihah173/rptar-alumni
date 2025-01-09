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
                'description' => 'Terokai teknologi dan inovasi terkini di persidangan tahunan kami.',
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
                'name' => 'Majlis Makan Malam Alumni',
                'created_by' => 2,
                'image_path' => 'event_images/2.png',
                'description' => 'Berhubung semula dengan rakan lama di majlis makan malam alumni tahunan.',
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
                'name' => 'Malam Jaringan Kerjaya',
                'created_by' => 2,
                'image_path' => 'event_images/3.jpeg',
                'description' => 'Luaskan rangkaian profesional anda di acara eksklusif ini.',
                'start_date' => '2025-04-05',
                'end_date' => '2025-04-05',
                'start_time' => '18:00:00',
                'end_time' => '21:00:00',
                'location' => 'Dewan RPTAR',
                'capacity' => 50,
                'registered_count' => 0,
                'is_active' => true,
                'status' => 'approved',
            ],
            [
                'organizer_id' => 4,
                'name' => 'Bengkel Kesihatan & Kesejahteraan',
                'created_by' => 2,
                'image_path' => 'event_images/4.png',
                'description' => 'Belajar daripada pakar tentang mengekalkan gaya hidup sihat.',
                'start_date' => '2025-01-20',
                'end_date' => '2025-01-20',
                'start_time' => '10:00:00',
                'end_time' => '15:00:00',
                'location' => 'Pusat Komuniti',
                'capacity' => 30,
                'registered_count' => 0,
                'is_active' => false,
                'status' => 'pending',
            ],
            [
                'organizer_id' => 5,
                'name' => 'Festival Seni & Muzik',
                'created_by' => 2,
                'image_path' => 'event_images/5.jpeg',
                'description' => 'Nikmati keindahan seni dan muzik di satu tempat.',
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
                'name' => 'Program Sukarelawan Outreach',
                'created_by' => 2,
                'image_path' => 'event_images/6.jpg',
                'description' => 'Buat perubahan dengan menjadi sukarelawan untuk tujuan yang mulia.',
                'start_date' => '2025-01-05',
                'end_date' => '2025-01-06',
                'start_time' => '08:00:00',
                'end_time' => '17:00:00',
                'location' => 'Kawasan RPTAR',
                'capacity' => 15,
                'registered_count' => 0,
                'is_active' => false,
                'status' => 'pending',
            ],
        ]);
    }
}