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
                'title' => 'Kemudahan Baru untuk Rumah Penyayang Tun Abdul Razak',
                'slug' => Str::slug('Kemudahan Baru untuk Rumah Penyayang Tun Abdul Razak'),
                'content' => 'Kami dengan gembira mengumumkan siapnya kemudahan baru di Rumah Penyayang Tun Abdul Razak. Penambahbaikan ini adalah sebahagian daripada komitmen berterusan kami untuk meningkatkan kualiti hidup penghuni kami. Kemudahan baru ini termasuk dapur berteknologi tinggi yang dilengkapi dengan peralatan moden, dewan rekreasi yang luas untuk aktiviti berkumpulan, dan perpustakaan yang dilengkapi dengan buku dan sumber digital untuk tujuan pendidikan dan rekreasi. Penambahbaikan ini dapat dilaksanakan berkat sumbangan dermawan daripada penderma dan kerja keras sukarelawan kami yang berdedikasi. Kami percaya penambahan ini akan mewujudkan persekitaran yang lebih menyokong dan berfaedah untuk semua penghuni di sini.',
                'user_id' => 2,
                'image' => 'news_images/2.jpg',
                'is_active' => true,
                'views' => 125,
                'published_date' => '2024-10-13 00:00:00',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Acara Amal Tahunan Berjaya Besar',
                'slug' => Str::slug('Acara Amal Tahunan Berjaya Besar'),
                'content' => 'Acara amal tahunan untuk Rumah Penyayang Tun Abdul Razak telah mencapai kejayaan besar, menghimpunkan ahli komuniti untuk menyokong misi kami. Acara ini menampilkan persembahan, lelongan, dan persembahan istimewa oleh penghuni kami yang mempamerkan bakat dan rasa syukur mereka. Dengan sumbangan dermawan anda, kami berjaya mengumpul lebih daripada RM50,000, yang akan digunakan untuk membiayai program pendidikan, perbelanjaan perubatan, dan operasi harian. Kami mengucapkan terima kasih yang tidak terhingga kepada semua yang telah menyertai, menjadi sukarelawan, atau menyumbang dalam apa jua cara. Sokongan anda terus memberi inspirasi kepada kami untuk membuat perubahan dalam kehidupan mereka yang kami jaga.',
                'user_id' => 2,
                'image' => 'news_images/1.jpg',
                'is_active' => true,
                'views' => 200,
                'published_date' => '2024-11-23 00:00:00',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Kemaskini Program Sukarelawan',
                'slug' => Str::slug('Kemaskini Program Sukarelawan'),
                'content' => 'Program sukarelawan kami telah diperluas untuk menawarkan peluang baru dalam pembinaan kemahiran dan perkembangan peribadi. Sukarelawan kini mempunyai akses kepada bengkel latihan khusus, termasuk teknik penjagaan, kemahiran komunikasi, dan perancangan aktiviti. Inisiatif ini bertujuan untuk meningkatkan kualiti penjagaan yang diberikan kepada penghuni kami sambil memberi kuasa kepada sukarelawan dengan kemahiran hidup yang berharga. Kami sangat berbangga dengan komuniti sukarelawan kami yang semakin berkembang dan impak positif yang mereka bawa ke Rumah Penyayang Tun Abdul Razak. Jika anda berminat untuk menyertai, sila layari laman web kami untuk mengetahui lebih lanjut tentang sesi akan datang dan cara anda boleh menyumbang.',
                'user_id' => 2,
                'image' => 'news_images/3.jpeg',
                'is_active' => true,
                'views' => 95,
                'published_date' => '2025-01-02 00:00:00',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Kempen Kesedaran Akan Datang',
                'slug' => Str::slug('Kempen Kesedaran Akan Datang'),
                'content' => 'Kami teruja untuk melancarkan kempen kesedaran yang bertujuan untuk mengetengahkan keperluan dan sumbangan Rumah Penyayang Tun Abdul Razak. Melalui kempen ini, kami berharap dapat melibatkan lebih ramai orang dan memupuk pemahaman yang lebih mendalam tentang cabaran yang dihadapi oleh penghuni kami. Kempen ini akan merangkumi aktiviti luar media sosial, ceramah komuniti, dan bengkel interaktif. Dengan berkongsi kisah ketabahan dan kejayaan penghuni kami, kami berhasrat untuk memberi inspirasi dan mendidik orang ramai tentang kepentingan mewujudkan persekitaran yang inklusif dan menyokong untuk semua.',
                'user_id' => 2,
                'image' => 'news_images/5.jpeg',
                'is_active' => true,
                'views' => 80,
                'published_date' => '2025-01-03 00:00:00',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Meraikan Pencapaian Penghuni Kami',
                'slug' => Str::slug('Meraikan Pencapaian Penghuni Kami'),
                'content' => 'Di Rumah Penyayang Tun Abdul Razak, kami percaya dalam mengenali dan meraikan pencapaian penghuni kami. Tahun ini, beberapa penghuni kami telah cemerlang dalam pelbagai bidang, termasuk akademik, seni, dan sukan. Salah seorang penghuni termuda kami telah dianugerahkan biasiswa kerana prestasi akademik yang cemerlang, manakala seorang lagi telah mempamerkan bakat seni mereka dalam pertandingan kebangsaan. Pencapaian ini mengingatkan kami tentang potensi luar biasa yang ada dalam setiap individu. Kami komited untuk menyediakan sumber dan sokongan yang diperlukan untuk penghuni kami berkembang dan mencapai matlamat mereka.',
                'user_id' => 2,
                'image' => 'news_images/4.jpg',
                'is_active' => true,
                'views' => 150,
                'published_date' => '2024-11-12 00:00:00',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('news')->insert($news);
    }
}