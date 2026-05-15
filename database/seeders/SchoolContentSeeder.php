<?php

namespace Database\Seeders;

use App\Models\Facility;
use App\Models\GalleryPhoto;
use App\Models\TeamMember;
use Illuminate\Database\Seeder;

class SchoolContentSeeder extends Seeder
{
    public function run(): void
    {
        if (TeamMember::query()->exists()) {
            return;
        }

        $team = [
            ['name' => 'Mrs. Jane Nakato', 'role' => 'Headteacher', 'bio' => 'With over 15 years in primary education, Mrs. Nakato leads Real Quality Junior School with a focus on excellence, wellbeing, and strong community ties.', 'image' => 'https://picsum.photos/seed/team1/400/400', 'sort_order' => 1],
            ['name' => 'Mr. David Ssebunya', 'role' => 'Deputy Headteacher', 'bio' => 'Mr. Ssebunya oversees curriculum and day-to-day operations, ensuring every pupil receives the support they need to succeed.', 'image' => 'https://picsum.photos/seed/team2/400/400', 'sort_order' => 2],
            ['name' => 'Ms. Grace Namukasa', 'role' => 'Nursery Coordinator', 'bio' => 'Ms. Namukasa brings warmth and expertise to our youngest learners, creating a foundation of curiosity and confidence.', 'image' => 'https://picsum.photos/seed/team3/400/400', 'sort_order' => 3],
        ];
        foreach ($team as $row) {
            TeamMember::query()->create($row);
        }

        $facilities = [
            ['title' => 'Spacious Classrooms', 'icon' => '', 'description' => 'Well-ventilated, well-lit classrooms with age-appropriate furniture and learning materials to support focused, comfortable learning.', 'image' => 'https://picsum.photos/seed/acad1/600/375', 'sort_order' => 1],
            ['title' => 'Playground & Sports', 'icon' => '', 'description' => 'Safe outdoor play areas and space for sports so children can run, play, and develop physical skills and teamwork.', 'image' => 'https://picsum.photos/seed/acad2/600/375', 'sort_order' => 2],
            ['title' => 'Library', 'icon' => '', 'description' => 'A well-stocked library to encourage reading for pleasure and support research and independent learning.', 'image' => 'https://picsum.photos/seed/acad3/600/375', 'sort_order' => 3],
            ['title' => 'Arts & Activity Spaces', 'icon' => '', 'description' => 'Dedicated areas for art, music, and drama so every child can explore creativity and performance.', 'image' => 'https://picsum.photos/seed/acad4/600/375', 'sort_order' => 4],
        ];
        foreach ($facilities as $row) {
            Facility::query()->create($row);
        }

        $gallery = [
            ['alt' => 'Children in classroom learning together', 'image' => 'https://picsum.photos/seed/immaculateg1/600/450', 'sort_order' => 1],
            ['alt' => 'School building in Kasubi', 'image' => 'https://picsum.photos/seed/immaculateg2/600/450', 'sort_order' => 2],
            ['alt' => 'Children playing in school playground', 'image' => 'https://picsum.photos/seed/immaculateg3/600/450', 'sort_order' => 3],
            ['alt' => 'Students in library reading', 'image' => 'https://picsum.photos/seed/immaculateg4/600/450', 'sort_order' => 4],
            ['alt' => 'African children in classroom', 'image' => 'https://picsum.photos/seed/immaculateg5/600/450', 'sort_order' => 5],
            ['alt' => 'School campus building', 'image' => 'https://picsum.photos/seed/immaculateg6/600/450', 'sort_order' => 6],
            ['alt' => 'Modern school exterior', 'image' => 'https://picsum.photos/seed/immaculateg7/600/450', 'sort_order' => 7],
            ['alt' => 'Sports day at school', 'image' => 'https://picsum.photos/seed/immaculateg8/600/450', 'sort_order' => 8],
            ['alt' => 'Open day and admissions', 'image' => 'https://picsum.photos/seed/immaculateg9/600/450', 'sort_order' => 9],
            ['alt' => 'Music and arts at school', 'image' => 'https://picsum.photos/seed/immaculateg10/600/450', 'sort_order' => 10],
            ['alt' => 'School corridor and lockers', 'image' => 'https://picsum.photos/seed/immaculateg11/600/450', 'sort_order' => 11],
            ['alt' => 'Real Quality Junior School campus view', 'image' => 'https://picsum.photos/seed/immaculateg12/600/450', 'sort_order' => 12],
        ];
        foreach ($gallery as $row) {
            GalleryPhoto::query()->create($row);
        }
    }
}
