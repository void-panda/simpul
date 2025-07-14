<?php

namespace Database\Seeders;

use App\Models\Community;
use App\Models\Contact;
use App\Models\Donation;
use App\Models\DonationAccount;
use App\Models\Event;
use App\Models\News;
use App\Models\Partner;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        News::factory()->count(15)->create();
        Event::factory()->count(10)->create();
        DonationAccount::factory(2)->create();
        Partner::factory()->count(5)->create();
        Donation::factory()->count(15)->create();
        Contact::factory()->count(4)->create();

        Community::updateOrCreate(['id' => 1], [
            'name' => 'Simpul Pemuda',
            'slug' => 'simpul-pemuda',
            'description' => 'Sebuah komunitas sosial yang berfokus pada pemberdayaan masyarakat melalui kegiatan positif dan edukatif. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos reprehenderit tempora excepturi. Ullam facilis sunt, incidunt eligendi similique suscipit ea molestias minima odit, fuga laborum? Neque facilis qui ex asperiores? Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore provident similique voluptatibus veniam. Inventore aliquid vel, eius ipsam placeat quidem accusamus dolorum alias! Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur ea molestias aliquid non, explicabo voluptatem porro expedita unde aspernatur eaque! Blanditiis quis officia distinctio officiis soluta delectus facilis excepturi.',
            'vision' => 'Menjadi wadah pemberdayaan yang berkelanjutan bagi masyarakat. Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur ea molestias aliquid non, explicabo voluptatem porro expedita unde aspernatur eaque! Blanditiis quis officia distinctio officiis soluta delectus facilis excepturi a. Lorem ipsum dolor sit amet consectetur adipisicing elit.',
            'mission' => 'Mengadakan pelatihan, edukasi, dan kegiatan sosial rutin untuk semua kalangan.
    Lorem ipsum dolor sit amet consectetur adipisicing elit. 
    Consequatur ea molestias aliquid non, explicabo voluptatem porro expedita unde aspernatur eaque! 
    Blanditiis quis officia distinctio officiis soluta delectus facilis excepturi.',
            'email' => 'info@harapankita.org',
            'phone' => '0812-3456-7890',
            'website' => 'simpul-pemuda.com',
            'address' => 'Jl. Bersama No. 1, Yogyakarta',
        ]);

    }
}
