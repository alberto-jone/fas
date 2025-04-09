<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TokensTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tokens')->insert([
            [
                'token_id' => 1,
                'token' => '0d9781153ed42ea7d72b4a4963dbd4f7fbc1d09bca10a8faae55d5dd66441521881a4e51eb17cd62596b156f11218d31436e5ae3381bcb50acbf31dd2c5cd197',
                'member_id' => 13,
                'expires' => '2021-09-09 15:47:04',
                'purpose' => 'password_reset',
            ],
        ]);
    }
}