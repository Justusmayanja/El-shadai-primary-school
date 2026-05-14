<?php

namespace Database\Seeders;

use App\Models\SchoolSetting;
use Illuminate\Database\Seeder;

class SchoolSettingSeeder extends Seeder
{
    public function run(): void
    {
        if (SchoolSetting::query()->exists()) {
            return;
        }

        SchoolSetting::query()->create(SchoolSetting::defaultAttributes());
    }
}
