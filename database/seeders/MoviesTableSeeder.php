<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DateTime;
use App\Models\Movie;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class MoviesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $email = 'admin@admin.com';
        $currentDate = new DateTime();
        $currentDate->modify('+2 days'); // KAD NEREIKETU UPCOMING RANKINIU BUDU DETI LAIKO UZPILDAU AUTOMATISKAI UPCOMING :) PRATESTAVIMUI :) JEIGU NEAISKU UZDUOTYJE BUVO PARASYTA UPCOMING SARASAS FILMU. TAI JIS TAM IR NAUDOJAMAS NE KAZKOKIEM TIMESTAMPAMS.
        $newDate = $currentDate->format('Y-m-d');
      
        $movies = [
            [
                'email' => $email,
                'title' => 'The Shawshank Redemption',
                'description' => 'Two imprisoned men bond over a number of years, finding solace and eventual redemption through acts of common decency.',
                'url' => 'https://www.imdb.com/title/tt0111161/',
                'img' => 'demo_cropped_1.jpg',
                'seen' => 'no',
                'watch_soon' => $newDate,
            ],
            [
                'email' => $email,
                'title' => 'The Godfather',
                'description' => 'The aging patriarch of an organized crime dynasty transfers control of his clandestine empire to his reluctant son.',
                'url' => 'https://www.imdb.com/title/tt0068646/',
                'img' => 'demo_cropped.jpg',
                'seen' => 'yes',
                'watch_soon' => '',
            ],
            [
                'email' => $email,
                'title' => 'The Dark Knight',
                'description' => 'When the menace known as the Joker wreaks havoc and chaos on the people of Gotham, Batman must accept one of the greatest psychological and physical tests of his ability to fight injustice.',
                'url' => 'https://www.imdb.com/title/tt0468569/',
                'img' => 'demo_cropped_1.jpg',
                'seen' => 'yes',
                'watch_soon' => $newDate,
            ],
            [
                'email' => $email,
                'title' => 'The Shawshank Redemption',
                'description' => 'Two imprisoned men bond over a number of years, finding solace and eventual redemption through acts of common decency.',
                'url' => 'https://www.imdb.com/title/tt0111161/',
                'img' => 'demo_cropped.jpg',
                'seen' => 'yes',
                'watch_soon' => '',
            ],
            [
                'email' => $email,
                'title' => 'The Godfather',
                'description' => 'The aging patriarch of an organized crime dynasty transfers control of his clandestine empire to his reluctant son.',
                'url' => 'https://www.imdb.com/title/tt0068646/',
                'img' => 'demo_cropped.jpg',
                'seen' => 'no',
                'watch_soon' => '',
            ],
            [
                'email' => $email,
                'title' => 'The Dark Knight',
                'description' => 'When the menace known as the Joker wreaks havoc and chaos on the people of Gotham, Batman must accept one of the greatest psychological and physical tests of his ability to fight injustice.',
                'url' => 'https://www.imdb.com/title/tt0468569/',
                'img' => 'demo_cropped.jpg',
                'seen' => 'yes',
                'watch_soon' => $newDate,
            ],
            [
                'email' => $email,
                'title' => 'The Godfather: Part II',
                'description' => 'The early life and career of Vito Corleone in 1920s New York City is portrayed, while his son, Michael, expands and tightens his grip on the family crime syndicate.',
                'url' => 'https://www.imdb.com/title/tt0071562/',
                'img' => 'demo_cropped.jpg',
                'seen' => 'yes',
                'watch_soon' => '',
            ],
            [
                'email' => $email,
                'title' => 'The Lord of the Rings: The Return of the King',
                'description' => 'Gandalf and Aragorn lead the World of Men against Sauron\'s army to draw his gaze from Frodo and Sam as they approach Mount Doom with the One Ring.',
                'url' => 'https://www.imdb.com/title/tt0167260/',
                'img' => 'demo_cropped.jpg',
                'seen' => 'no',
                'watch_soon' => '',
            ],
            [
                'email' => $email,
                'title' => 'Pulp Fiction',
                'description' => 'The lives of two mob hitmen, a boxer, a gangster and his wife, and a pair of diner bandits intertwine in four tales of violence and redemption.',
                'url' => 'https://www.imdb.com/title/tt0110912/',
                'img' => 'demo_cropped.jpg',
                'seen' => 'yes',
                'watch_soon' => '',
            ],
            [
                'email' => $email,
                'title' => 'The Lord of the Rings: The Fellowship of the Ring',
                'description' => 'A meek hobbit of the Shire and eight companions set out on a journey to Mount Doom to destroy the One Ring and the dark lord Sauron.',
                'url' => 'https://www.imdb.com/title/tt0120737/',
                'img' => 'demo_cropped.jpg',
                'seen' => 'yes',
                'watch_soon' => '',
            ],
            [
                'email' => $email,
                'title' => 'Forrest Gump',
                'description' => 'The presidencies of Kennedy and Johnson, the events of Vietnam, Watergate and other historical events unfold through the perspective of an Alabama man with an IQ of 75, whose only desire is to be reunited with his childhood sweetheart.',
                'url' => 'https://www.imdb.com/title/tt0109830/',
                'img' => 'demo_cropped.jpg',
                'seen' => 'yes',
                'watch_soon' => $newDate,
            ],

            [
                'email' => $email,
                'title' => 'The Shawshank Redemption',
                'description' => 'Two imprisoned men bond over a number of years, finding solace and eventual redemption through acts of common decency.',
                'url' => 'https://www.imdb.com/title/tt0111161/',
                'img' => 'demo_cropped_1.jpg',
                'seen' => 'no',
                'watch_soon' => '',
            ],
            [
                'email' => $email,
                'title' => 'The Godfather',
                'description' => 'The aging patriarch of an organized crime dynasty transfers control of his clandestine empire to his reluctant son.',
                'url' => 'https://www.imdb.com/title/tt0068646/',
                'img' => 'demo_cropped.jpg',
                'seen' => 'yes',
                'watch_soon' => '',
            ],
            [
                'email' => $email,
                'title' => 'The Dark Knight',
                'description' => 'When the menace known as the Joker wreaks havoc and chaos on the people of Gotham, Batman must accept one of the greatest psychological and physical tests of his ability to fight injustice.',
                'url' => 'https://www.imdb.com/title/tt0468569/',
                'img' => 'demo_cropped_1.jpg',
                'seen' => 'no',
                'watch_soon' => $newDate,
            ],
            [
                'email' => $email,
                'title' => 'The Shawshank Redemption',
                'description' => 'Two imprisoned men bond over a number of years, finding solace and eventual redemption through acts of common decency.',
                'url' => 'https://www.imdb.com/title/tt0111161/',
                'img' => 'demo_cropped.jpg',
                'seen' => 'yes',
                'watch_soon' => '',
            ],
            [
                'email' => $email,
                'title' => 'The Godfather',
                'description' => 'The aging patriarch of an organized crime dynasty transfers control of his clandestine empire to his reluctant son.',
                'url' => 'https://www.imdb.com/title/tt0068646/',
                'img' => 'demo_cropped.jpg',
                'seen' => 'yes',
                'watch_soon' => '',
            ],
            [
                'email' => $email,
                'title' => 'The Dark Knight',
                'description' => 'When the menace known as the Joker wreaks havoc and chaos on the people of Gotham, Batman must accept one of the greatest psychological and physical tests of his ability to fight injustice.',
                'url' => 'https://www.imdb.com/title/tt0468569/',
                'img' => 'demo_cropped.jpg',
                'seen' => 'yes',
                'watch_soon' => $newDate,
            ],
            [
                'email' => $email,
                'title' => 'The Godfather: Part II',
                'description' => 'The early life and career of Vito Corleone in 1920s New York City is portrayed, while his son, Michael, expands and tightens his grip on the family crime syndicate.',
                'url' => 'https://www.imdb.com/title/tt0071562/',
                'img' => 'demo_cropped.jpg',
                'seen' => 'no',
                'watch_soon' => '',
            ],
            [
                'email' => $email,
                'title' => 'The Lord of the Rings: The Return of the King',
                'description' => 'Gandalf and Aragorn lead the World of Men against Sauron\'s army to draw his gaze from Frodo and Sam as they approach Mount Doom with the One Ring.',
                'url' => 'https://www.imdb.com/title/tt0167260/',
                'img' => 'demo_cropped.jpg',
                'seen' => 'yes',
                'watch_soon' => '',
            ],
            [
                'email' => $email,
                'title' => 'Pulp Fiction',
                'description' => 'The lives of two mob hitmen, a boxer, a gangster and his wife, and a pair of diner bandits intertwine in four tales of violence and redemption.',
                'url' => 'https://www.imdb.com/title/tt0110912/',
                'img' => 'demo_cropped.jpg',
                'seen' => 'no',
                'watch_soon' => '',
            ],
            [
                'email' => $email,
                'title' => 'The Lord of the Rings: The Fellowship of the Ring',
                'description' => 'A meek hobbit of the Shire and eight companions set out on a journey to Mount Doom to destroy the One Ring and the dark lord Sauron.',
                'url' => 'https://www.imdb.com/title/tt0120737/',
                'img' => 'demo_cropped.jpg',
                'seen' => 'yes',
                'watch_soon' => $newDate,
            ],
            [
                'email' => $email,
                'title' => 'Forrest Gump',
                'description' => 'The presidencies of Kennedy and Johnson, the events of Vietnam, Watergate and other historical events unfold through the perspective of an Alabama man with an IQ of 75, whose only desire is to be reunited with his childhood sweetheart.',
                'url' => 'https://www.imdb.com/title/tt0109830/',
                'img' => 'demo_cropped.jpg',
                'seen' => 'no',
                'watch_soon' => $newDate,
            ],
        ];

       
        foreach ($movies as $data) {
            $movie = new Movie();
            $movie->email = $data['email'];
            $movie->title = $data['title'];
            $movie->description = $data['description'];
            $movie->url = $data['url'];
            
            $movie->seen = $data['seen'];
            $movie->watch_soon = $data['watch_soon'];

            
            $file = base_path("demo_images/" . $data['img']);
           
            $image = Image::make($file);
            
            $image->fit(400, 500);
            $image->save(storage_path("app/public/" . $data['img']));
    
            $movie->img = $data['img'];

            $movie->save();

        }
    }
}
