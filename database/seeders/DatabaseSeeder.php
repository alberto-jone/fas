<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            MembersTableSeeder::class,     // 1. Members must exist first.
            CategoriesTableSeeder::class,  // 2. Categories must exist before articles.
            ImagesTableSeeder::class,      // 3. Images must exist before articles.
            ArticlesTableSeeder::class,    // 4. Articles depend on members, categories, and images.
            CommentsTableSeeder::class,    // 5. Comments depend on articles and members.
            LikesTableSeeder::class,       // 6. Likes depend on articles and members.
            TokensTableSeeder::class,      // 7. Tokens depend on members.
        ]);
    }
}