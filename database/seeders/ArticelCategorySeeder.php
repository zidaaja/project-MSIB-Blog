<?php

namespace Database\Seeders;

use App\Models\ArticelCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticelCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('articel_categories')->truncate();
        $data = [
            'Web Development', 'UI/UX Design', 'Graphic Design'
        ];

        foreach ($data as $d) {
            ArticelCategory::create([
                'slug' => str()->slug($d),
                'name' => $d,
            ]);
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
