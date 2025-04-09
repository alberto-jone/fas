<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MembersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('members')->insert([
            [
                'member_id' => 1,
                'forename' => 'Ivy',
                'surname' => 'Stone',
                'email' => 'ivy@eg.link',
                'password' => '$2y$10$MAdTTCA0Mi0whewgCcBv4uv0HUgdcAkW1pnqslSi/P2Ca9u5rpZl.',
                'joined' => '2021-01-26 12:04:23',
                'picture' => 'ivy.jpg',
                'role' => 'admin',
            ],
            [
                'member_id' => 2,
                'forename' => 'Luke',
                'surname' => 'Wood',
                'email' => 'luke@eg.link',
                'password' => '$2y$10$MAdTTCA0Mi0whewgCcBv4uv0HUgdcAkW1pnqslSi/P2Ca9u5rpZl.',
                'joined' => '2018-02-01 21:48:25',
                'picture' => null,
                'role' => 'member',
            ],
            [
                'member_id' => 3,
                'forename' => 'Emiko',
                'surname' => 'Ito',
                'email' => 'emi@eg.link',
                'password' => '$2y$10$MAdTTCA0Mi0whewgCcBv4uv0HUgdcAkW1pnqslSi/P2Ca9u5rpZl.',
                'joined' => '2021-02-12 10:53:47',
                'picture' => 'emi.jpg',
                'role' => 'member',
            ],
            [
                'member_id' => 4,
                'forename' => 'Dot',
                'surname' => 'Clarke',
                'email' => 'dot@eg.link',
                'password' => '$2y$10$MAdTTCA0Mi0whewgCcBv4uv0HUgdcAkW1pnqslSi/P2Ca9u5rpZl.',
                'joined' => '2021-03-04 08:21:28',
                'picture' => 'dot.jpg',
                'role' => 'admin',
            ],
            [
                'member_id' => 5,
                'forename' => 'Henry',
                'surname' => 'Bell',
                'email' => 'henry@eg.link',
                'password' => '$2y$10$MAdTTCA0Mi0whewgCcBv4uv0HUgdcAkW1pnqslSi/P2Ca9u5rpZl.',
                'joined' => '2021-03-06 23:47:56',
                'picture' => 'henry.jpg',
                'role' => 'member',
            ],
            [
                'member_id' => 6,
                'forename' => 'Samira',
                'surname' => 'Mirza',
                'email' => 'samira@eg.link',
                'password' => '$2y$10$MAdTTCA0Mi0whewgCcBv4uv0HUgdcAkW1pnqslSi/P2Ca9u5rpZl.',
                'joined' => '2021-03-08 12:12:53',
                'picture' => 'samira.jpg',
                'role' => 'admin',
            ],
            [
                'member_id' => 7,
                'forename' => 'Eve',
                'surname' => 'Howard',
                'email' => 'eve@eg.link',
                'password' => '$2y$10$MAdTTCA0Mi0whewgCcBv4uv0HUgdcAkW1pnqslSi/P2Ca9u5rpZl.',
                'joined' => '2021-03-13 23:49:40',
                'picture' => 'eve.jpg',
                'role' => 'member',
            ],
            [
                'member_id' => 8,
                'forename' => 'Lily',
                'surname' => 'Morgan',
                'email' => 'lily@eg.link',
                'password' => '$2y$10$MAdTTCA0Mi0whewgCcBv4uv0HUgdcAkW1pnqslSi/P2Ca9u5rpZl.',
                'joined' => '2021-03-14 11:04:30',
                'picture' => 'lily.jpg',
                'role' => 'member',
            ],
            [
                'member_id' => 9,
                'forename' => 'Aiden',
                'surname' => 'Peterson',
                'email' => 'aiden@eg.link',
                'password' => '$2y$10$MAdTTCA0Mi0whewgCcBv4uv0HUgdcAkW1pnqslSi/P2Ca9u5rpZl.',
                'joined' => '2021-03-16 17:51:17',
                'picture' => 'aiden.jpg',
                'role' => 'member',
            ],
            [
                'member_id' => 10,
                'forename' => 'Hyun-tae',
                'surname' => 'Lee',
                'email' => 'hyun@eg.link',
                'password' => '$2y$10$MAdTTCA0Mi0whewgCcBv4uv0HUgdcAkW1pnqslSi/P2Ca9u5rpZl.',
                'joined' => '2021-03-16 21:32:27',
                'picture' => 'hyun.jpg',
                'role' => 'member',
            ],
            [
                'member_id' => 11,
                'forename' => 'Piper',
                'surname' => 'Gray',
                'email' => 'piper@eg.link',
                'password' => '$2y$10$MAdTTCA0Mi0whewgCcBv4uv0HUgdcAkW1pnqslSi/P2Ca9u5rpZl.',
                'joined' => '2021-03-18 08:18:23',
                'picture' => 'piper.jpg',
                'role' => 'member',
            ],
            [
                'member_id' => 12,
                'forename' => 'Grace',
                'surname' => 'Jackson',
                'email' => 'grace@eg.link',
                'password' => '$2y$10$MAdTTCA0Mi0whewgCcBv4uv0HUgdcAkW1pnqslSi/P2Ca9u5rpZl.',
                'joined' => '2021-03-18 12:55:09',
                'picture' => 'grace.jpg',
                'role' => 'member',
            ],
            [
                'member_id' => 13,
                'forename' => 'Noriko',
                'surname' => 'Saito',
                'email' => 'noriko@eg.link',
                'password' => '$2y$10$MAdTTCA0Mi0whewgCcBv4uv0HUgdcAkW1pnqslSi/P2Ca9u5rpZl.',
                'joined' => '2021-03-21 15:28:11',
                'picture' => 'noriko.jpg',
                'role' => 'member',
            ],
        ]);
    }
}