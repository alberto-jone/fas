<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('images')->insert([
            [
                'image_id' => 1,
                'file' => 'systemic-brochure.jpg',
                'alt' => 'Brochure for Systemic science festival',
            ],
            [
                'image_id' => 2,
                'file' => 'polite-society-posters.jpg',
                'alt' => 'Posters for Polite Society',
            ],
            [
                'image_id' => 3,
                'file' => 'swimming-pool.jpg',
                'alt' => 'Photograph of swimming pool',
            ],
            [
                'image_id' => 4,
                'file' => 'birds.jpg',
                'alt' => 'Collage of two birds',
            ],
            [
                'image_id' => 5,
                'file' => 'sisters.jpg',
                'alt' => 'Illustration of two sisters',
            ],
            [
                'image_id' => 6,
                'file' => 'micro-dunes.jpg',
                'alt' => 'Photograph of tiny sand dunes',
            ],
            [
                'image_id' => 7,
                'file' => 'milk-beach.jpg',
                'alt' => 'Website for Milk Beach',
            ],
            [
                'image_id' => 8,
                'file' => 'wellness.jpg',
                'alt' => 'Yoga timetable for Wellness',
            ],
            [
                'image_id' => 9,
                'file' => 'milk-beach-skyline.jpg',
                'alt' => 'Photograph of Sydney Harbour from Milk Beach',
            ],
            [
                'image_id' => 10,
                'file' => 'polite-society-mural.jpg',
                'alt' => 'Mural for Polite Society',
            ],
            [
                'image_id' => 11,
                'file' => 'stargazer.jpg',
                'alt' => 'Line-up for Stargazer website',
            ],
            [
                'image_id' => 12,
                'file' => 'the-ice-palace.jpg',
                'alt' => 'The Ice Palace book cover',
            ],
            [
                'image_id' => 13,
                'file' => 'chimney.jpg',
                'alt' => 'Website for Chimney Press',
            ],
            [
                'image_id' => 14,
                'file' => 'milk-beach-album.jpg',
                'alt' => 'Vinyl LP cover for Milk Beach',
            ],
            [
                'image_id' => 15,
                'file' => 'seascape.jpg',
                'alt' => 'The sea taken at Margate Beach',
            ],
            [
                'image_id' => 16,
                'file' => 'polite-society.jpg',
                'alt' => 'Website for Polite Society',
            ],
            [
                'image_id' => 17,
                'file' => 'snow-search.jpg',
                'alt' => 'Illustration of boy in snow',
            ],
            [
                'image_id' => 18,
                'file' => 'floral.jpg',
                'alt' => 'Floral Website',
            ],
            [
                'image_id' => 19,
                'file' => 'forecast.jpg',
                'alt' => 'Illustration of handbags',
            ],
            [
                'image_id' => 20,
                'file' => 'chimney-cards.jpg',
                'alt' => 'Business cards for Chimney Press',
            ],
            [
                'image_id' => 21,
                'file' => 'abandoned.jpg',
                'alt' => 'Photograph of disused cranes',
            ],
            [
                'image_id' => 22,
                'file' => 'golden-brown.jpg',
                'alt' => 'Photograph of the interior of a cafe',
            ],
            [
                'image_id' => 23,
                'file' => 'stargazer-mascot.jpg',
                'alt' => 'Illustration of girl looking at the sky',
            ],
            [
                'image_id' => 24,
                'file' => 'featherview.jpg',
                'alt' => 'Internal pages from travel book',
            ],
            [
                'image_id' => 25,
                'file' => 'buddha.jpg',
                'alt' => 'Buddha statue in a pond',
            ],
            [
                'image_id' => 26,
                'file' => 'faces.jpg',
                'alt' => 'Cover of Faces in the Water by Janet Frame',
            ],
            [
                'image_id' => 27,
                'file' => 'salmon.jpg',
                'alt' => 'Salmon with zucchini ribbons',
            ],
            [
                'image_id' => 28,
                'file' => 'quiet.jpg',
                'alt' => 'Cover of Quiet - A Silent Film History',
            ],
            [
                'image_id' => 29,
                'file' => 'quiet-invite.jpg',
                'alt' => 'Invitation for film premiere',
            ],
            [
                'image_id' => 30,
                'file' => 'museum.jpg',
                'alt' => 'Facade of the MAXII museum in Rome',
            ],
            [
                'image_id' => 31,
                'file' => 'new-forest.jpg',
                'alt' => 'New Forest Retreat website on iPad Pro',
            ],
        ]);
    }
}