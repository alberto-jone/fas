<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->insert([
            [
                'comment_id' => 1,
                'comment' => 'Love this, totally makes me want to visit Japan again. Really clean design, with an organised format for the information and great picture pages.',
                'posted' => '2021-03-14 17:45:13',
                'article_id' => 24,
                'member_id' => 3,
            ],
            [
                'comment_id' => 2,
                'comment' => 'I bought one of these guides for NYC last year and the design really made an impact on me. Its a beautiful product and lovely design. Well done!',
                'posted' => '2021-03-14 17:45:15',
                'article_id' => 24,
                'member_id' => 6,
            ],
            [
                'comment_id' => 3,
                'comment' => 'Another great piece of work Ivy, thanks for sharing it with us.',
                'posted' => '2021-03-14 17:53:52',
                'article_id' => 24,
                'member_id' => 7,
            ],
            [
                'comment_id' => 4,
                'comment' => 'Oooh! So nice! Putting it on my book list now.',
                'posted' => '2021-03-14 17:53:54',
                'article_id' => 24,
                'member_id' => 9,
            ],
            [
                'comment_id' => 5,
                'comment' => 'Wow! Really like the lighting for this shot.',
                'posted' => '2021-04-03 21:22:53',
                'article_id' => 23,
                'member_id' => 4,
            ],
            [
                'comment_id' => 6,
                'comment' => 'Another great piece of design, Ivy!',
                'posted' => '2021-04-04 20:15:12',
                'article_id' => 24,
                'member_id' => 4,
            ],
            [
                'comment_id' => 7,
                'comment' => 'Those green chairs are beautiful.',
                'posted' => '2021-06-30 17:45:43',
                'article_id' => 23,
                'member_id' => 1,
            ],
            [
                'comment_id' => 8,
                'comment' => 'Lovely box ',
                'posted' => '2021-07-03 11:21:13',
                'article_id' => 20,
                'member_id' => 1,
            ],
            [
                'comment_id' => 9,
                'comment' => 'This is beautiful work!',
                'posted' => '2021-08-03 23:14:49',
                'article_id' => 28,
                'member_id' => 6,
            ],
            [
                'comment_id' => 10,
                'comment' => 'This is super inspiring! I like the typographic treatment on the homepage especially.',
                'posted' => '2021-08-09 21:35:16',
                'article_id' => 31,
                'member_id' => 1,
            ],
            [
                'comment_id' => 11,
                'comment' => 'What typeface did you use for the title?',
                'posted' => '2021-08-09 21:36:31',
                'article_id' => 28,
                'member_id' => 12,
            ],
            [
                'comment_id' => 12,
                'comment' => 'Thanks so much, everybody!',
                'posted' => '2021-08-10 11:08:37',
                'article_id' => 24,
                'member_id' => 1,
            ],
            [
                'comment_id' => 13,
                'comment' => 'I love the illustration on the cover. It reminds me of children\'s books I grew up with. And the type goes really well with it.',
                'posted' => '2021-08-15 13:40:59',
                'article_id' => 26,
                'member_id' => 1,
            ],
            [
                'comment_id' => 14,
                'comment' => 'The collage style on this is so cute.',
                'posted' => '2021-08-18 08:14:08',
                'article_id' => 17,
                'member_id' => 7,
            ],
            [
                'comment_id' => 15,
                'comment' => 'This is such an amazing building - really like how you captured it.',
                'posted' => '2021-08-21 15:34:37',
                'article_id' => 30,
                'member_id' => 7,
            ],
            [
                'comment_id' => 16,
                'comment' => 'I bet this looks amazing big, you\'d really see the hand drawn element of it.',
                'posted' => '2021-08-22 11:17:50',
                'article_id' => 10,
                'member_id' => 5,
            ],
            [
                'comment_id' => 17,
                'comment' => 'I\'m so into the full-bleed photography and gentle colors of this.',
                'posted' => '2021-08-27 21:49:29',
                'article_id' => 31,
                'member_id' => 6,
            ],
            [
                'comment_id' => 18,
                'comment' => 'This is a great photo, Emiko! Love it.',
                'posted' => '2021-09-03 01:15:30',
                'article_id' => 23,
                'member_id' => 6,
            ],
            [
                'comment_id' => 19,
                'comment' => 'Absolutely. Not what you expect to find in Rome, and love the light in this shot.',
                'posted' => '2021-09-05 17:22:35',
                'article_id' => 30,
                'member_id' => 11,
            ],
            [
                'comment_id' => 20,
                'comment' => 'Great choices of colors. And the simple type is lovely.',
                'posted' => '2021-09-07 08:53:11',
                'article_id' => 22,
                'member_id' => 11,
            ],
            [
                'comment_id' => 21,
                'comment' => 'The duotone-look is fab!',
                'posted' => '2021-09-07 09:01:32',
                'article_id' => 9,
                'member_id' => 11,
            ],
            [
                'comment_id' => 22,
                'comment' => 'Bet this would look awesome printed on a Risograph.',
                'posted' => '2021-09-11 22:21:54',
                'article_id' => 9,
                'member_id' => 9,
            ],
            [
                'comment_id' => 23,
                'comment' => 'Yeah! And its so nice the way it gets more realistic towards the back.',
                'posted' => '2021-09-13 14:00:42',
                'article_id' => 17,
                'member_id' => 12,
            ],
            [
                'comment_id' => 24,
                'comment' => 'This is really clever. Great work.',
                'posted' => '2021-09-13 16:56:36',
                'article_id' => 17,
                'member_id' => 10,
            ],
            [
                'comment_id' => 25,
                'comment' => 'The album cover for this in the print section is great, too.',
                'posted' => '2021-09-15 12:42:07',
                'article_id' => 9,
                'member_id' => 3,
            ],
            [
                'comment_id' => 26,
                'comment' => 'Nice work, Luke!',
                'posted' => '2021-09-18 20:18:10',
                'article_id' => 13,
                'member_id' => 3,
            ],
            [
                'comment_id' => 27,
                'comment' => 'The series of these are all really nice. The photo and the album cover work really well, too.',
                'posted' => '2021-09-21 11:16:28',
                'article_id' => 7,
                'member_id' => 3,
            ],
        ]);
    }
}