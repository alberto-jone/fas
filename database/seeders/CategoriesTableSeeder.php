<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'category_id' => 1,
                'name' => 'Print',
                'description' => 'Inspiring graphic design and visual communication for print and packaging',
                'navigation' => 1,
                'seo_name' => 'print',
            ],
            [
                'category_id' => 2,
                'name' => 'Digital',
                'description' => 'Websites and apps that push digital design to its limits on all devices',
                'navigation' => 1,
                'seo_name' => 'digital',
            ],
            [
                'category_id' => 3,
                'name' => 'Illustration',
                'description' => 'Visual storytellers specialising in hand drawn and vector illustrations',
                'navigation' => 1,
                'seo_name' => 'illustration',
            ],
            [
                'category_id' => 4,
                'name' => 'Photography',
                'description' => 'Capturing images that transport the viewer to the moment they were taken',
                'navigation' => 1,
                'seo_name' => 'Photography',
            ],
        ]);
    }
}