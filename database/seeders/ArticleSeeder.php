<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $articles = Array(
            [
                'title'  => 'Demon Slayer',
                'content' => 'Demon Slayer: Kimetsu no Yaiba is a Japanese manga series written and illustrated by Koyoharu Gotouge. It follows teenage Tanjiro Kamado, who strives to become a demon slayer after his family was slaughtered and his younger sister Nezuko turned into a demon.
                              It was serialized in Shueisha\'s shōnen manga magazine Weekly Shōnen Jump from February 2016 to May 2020, with its chapters collected in twenty-three tankōbon volumes.',
                'excerpt' => 'Demon Slayer: Kimetsu no Yaiba is a Japanese manga series written and illustrated by Koyoharu Gotouge.',
                'featured_image' => '/images/1.jpg',
            ],
            [
                'title'  => 'Jujutsu Kaisen',
                'content' => 'Jujutsu Kaisen is a Japanese manga series written and illustrated by Gege Akutami, serialized in Shueisha\'s Weekly Shōnen Jump since March 2018. The Jujutsu Kaisen chapters are collected and published by Shueisha, with seventeen tankōbon volumes released as of October 2021. The story follows high school student Yuji Itadori as he joins a secret organization of Jujutsu Sorcerers in order to kill a powerful Curse named Ryomen Sukuna, of whom Yuji becomes the host.',
                'excerpt' => 'Jujutsu Kaisen is a Japanese manga series written and illustrated by Gege Akutami',
                'featured_image' => '/images/2.jpg',
            ],
            [
                'title'  => 'Attack on Titans',
                'content' => 'Attack on Titan is a Japanese manga series written and illustrated by Hajime Isayama. It is set in a world where humanity lives inside cities surrounded by three enormous walls that protect them from the gigantic man-eating humanoids referred to as Titans; the story follows Eren Yeager, who vows to exterminate the Titans after a Titan brings about the destruction of his hometown and the death of his mother.',
                'excerpt' => 'Attack on Titan is a Japanese manga series written and illustrated by Hajime Isayama.',
                'featured_image' => '/images/3.jpg',
            ],
            [
                'title'  => 'Hunter x Hunter',
                'content' => 'Hunter × Hunter (pronounced "hunter hunter") is a Japanese manga series written and illustrated by Yoshihiro Togashi. It has been serialized in Shueisha\'s Weekly Shōnen Jump since March 1998, although the manga has frequently gone on extended hiatuses since 2006. Its chapters have been collected in 36 tankōbon volumes as of October 2018. The story focuses on a young boy named Gon Freecss who discovers that his father.',
                'excerpt' => 'Hunter × Hunter (pronounced "hunter hunter") is a Japanese manga series written and illustrated by Yoshihiro Togashi.',
                'featured_image' => '/images/4.jpg',
            ]
        );


        foreach ($articles as $article) {
            Article::create([
                'title'  => $article['title'],
                'slug'   => Str::slug($article['title']),
                'content' => $article['content'],
                'excerpt' => $article['excerpt'],
                'published_at' => now(),
                'featured_image' => $article['featured_image'],
            ]);
        }


    }
}
