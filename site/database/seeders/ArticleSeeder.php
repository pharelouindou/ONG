<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ArticleSeeder extends Seeder
{
    public function run(): void
    {
        $articles = [
            [
                'title'        => 'Bilan des activités nutrition 2025',
                'label'        => 'Décembre 2025',
                'excerpt'      => '730 enfants dépistés, démonstrations culinaires et distribution de plants de moringa à Nikki et Sinendé.',
                'image_path'   => 'images/activites/depistage-malnutrition.jpg',
                'published_at' => '2025-12-01',
                'is_published' => true,
            ],
            [
                'title'        => 'Causerie IST/VIH/Hépatite à Sonsonré',
                'label'        => 'Octobre 2025',
                'excerpt'      => 'Causerie éducative sur les infections sexuellement transmissibles et la santé reproductive.',
                'image_path'   => 'images/activites/srhr-causerie.jpg',
                'published_at' => '2025-10-01',
                'is_published' => true,
            ],
            [
                'title'        => 'Subvention SRHR du Ministère de la Santé',
                'label'        => 'Septembre 2025',
                'excerpt'      => 'Mise en œuvre de l\'accord de subvention pour la sensibilisation communautaire en zone NKP.',
                'image_path'   => 'images/activites/srhr-communaute.jpg',
                'published_at' => '2025-09-01',
                'is_published' => true,
            ],
            [
                'title'        => 'Sensibilisation communautaire à Nikki',
                'label'        => 'Août 2024',
                'excerpt'      => 'Rencontre de sensibilisation avec les communautés locales du Borgou.',
                'image_path'   => 'images/activites/sensibilisation-nikki.jpg',
                'published_at' => '2024-08-01',
                'is_published' => true,
            ],
        ];

        foreach ($articles as $data) {
            $data['slug'] = Str::slug($data['title']);
            Article::updateOrCreate(['slug' => $data['slug']], $data);
        }
    }
}
