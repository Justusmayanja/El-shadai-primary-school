<?php

namespace Database\Seeders;

use App\Models\NewsItem;
use Illuminate\Database\Seeder;

class NewsItemSeeder extends Seeder
{
    public function run(): void
    {
        if (NewsItem::query()->exists()) {
            return;
        }

        $items = [
            [
                'title' => 'Sports Day 2025',
                'excerpt' => 'Join us for our annual sports day. All parents are welcome to cheer on our pupils.',
                'body' => 'Our annual sports day brings the whole school community together. Pupils compete in track and field, team games, and fun races. Parents are welcome to attend and support their children.',
                'image' => 'https://picsum.photos/seed/rqjsnews1/600/375',
                'published_at' => now()->subMonths(2)->startOfMonth(),
                'is_published' => true,
                'sort_order' => 1,
            ],
            [
                'title' => 'Open Day & Admissions',
                'excerpt' => 'Visit our campus, meet the team, and learn about admissions for 2025.',
                'body' => 'We invite prospective families to our open day. Tour the campus, meet teachers, and ask questions about our curriculum and admissions process.',
                'image' => 'https://picsum.photos/seed/rqjsnews2/600/375',
                'published_at' => now()->subMonths(3)->startOfMonth(),
                'is_published' => true,
                'sort_order' => 2,
            ],
            [
                'title' => 'Music & Arts Showcase',
                'excerpt' => 'An evening of performances by our talented pupils. Save the date!',
                'body' => 'Celebrate creativity at our music and arts showcase. Pupils perform music, drama, and display artwork from the term.',
                'image' => 'https://picsum.photos/seed/rqjsnews3/600/375',
                'published_at' => now()->subMonth()->startOfMonth(),
                'is_published' => true,
                'sort_order' => 3,
            ],
        ];

        foreach ($items as $row) {
            NewsItem::query()->create($row);
        }
    }
}
