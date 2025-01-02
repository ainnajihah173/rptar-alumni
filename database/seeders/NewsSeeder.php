<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $news = [
            [
                'title' => 'New Facilities for Rumah Penyayang Tun Abdul Razak',
                'slug' => Str::slug('New Facilities for Rumah Penyayang Tun Abdul Razak'),
                'content' => 'We are thrilled to announce the completion of new facilities at Rumah Penyayang Tun Abdul Razak. These enhancements are part of our ongoing commitment to improving the quality of life for our residents. The new facilities include a state-of-the-art kitchen equipped with modern appliances, a spacious recreational hall designed for group activities, and a library stocked with books and digital resources for educational and leisure purposes. These upgrades were made possible through the generous contributions of our donors and the hard work of our dedicated volunteers. We believe these additions will create a more supportive and enriching environment for everyone at the home.',
                'user_id' => 2,
                'image' => 'news_images/2.jpg',
                'is_active' => true,
                'views' => 125,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Annual Charity Event a Huge Success',
                'slug' => Str::slug('Annual Charity Event a Huge Success'),
                'content' => 'The annual charity event for Rumah Penyayang Tun Abdul Razak was a resounding success, bringing together members of the community to support our mission. The event featured performances, auctions, and a heartfelt presentation by our residents, showcasing their talents and gratitude. With your generous donations, we raised over RM50,000, which will go towards funding educational programs, medical expenses, and daily operations. We extend our deepest thanks to everyone who participated, volunteered, or contributed in any way. Your support continues to inspire us to make a difference in the lives of those we care for.',
                'user_id' => 2,
                'image' => 'news_images/1.jpg',
                'is_active' => true,
                'views' => 200,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Volunteer Program Update',
                'slug' => Str::slug('Volunteer Program Update'),
                'content' => 'Our volunteer program has expanded to offer new opportunities for skill-building and personal growth. Volunteers now have access to specialized training workshops, including caregiving techniques, communication skills, and activity planning. These initiatives aim to enhance the quality of care provided to our residents while also empowering our volunteers with valuable life skills. We are immensely proud of our growing volunteer community and the positive impact they bring to Rumah Penyayang Tun Abdul Razak. If you’re interested in joining, please visit our website to learn more about upcoming sessions and how you can contribute.',
                'user_id' => 2,
                'image' => 'news_images/3.jpeg',
                'is_active' => true,
                'views' => 95,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Upcoming Awareness Campaign',
                'slug' => Str::slug('Upcoming Awareness Campaign'),
                'content' => 'We are excited to launch an awareness campaign aimed at highlighting the needs and contributions of Rumah Penyayang Tun Abdul Razak. Through this campaign, we hope to engage with a wider audience and foster greater understanding of the challenges faced by our residents. The campaign will include social media outreach, community talks, and interactive workshops. By sharing stories of resilience and achievements from our residents, we aim to inspire and educate the public about the importance of creating inclusive and supportive environments for all.',
                'user_id' => 2,
                'image' => 'news_images/5.jpeg',
                'is_active' => true,
                'views' => 80,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Celebrating Our Residents’ Achievements',
                'slug' => Str::slug('Celebrating Our Residents’ Achievements'),
                'content' => 'At Rumah Penyayang Tun Abdul Razak, we believe in recognizing and celebrating the accomplishments of our residents. This year, several of our residents have excelled in various fields, including academics, arts, and sports. One of our youngest residents was awarded a scholarship for outstanding academic performance, while another showcased their artistic talent in a national competition. These milestones remind us of the incredible potential within each individual. We are committed to providing the resources and support needed for our residents to thrive and reach their goals.',
                'user_id' => 2,
                'image' => 'news_images/4.jpg',
                'is_active' => true,
                'views' => 150,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('news')->insert($news);
    }
}
