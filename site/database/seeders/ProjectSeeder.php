<?php

namespace Database\Seeders;

use App\Models\AdminProject;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $projects = [
            [
                'tag'         => 'Nutrition',
                'title'       => 'Sensibilisation alimentation & nutrition',
                'image_path'  => 'images/activites/nutrition-sensibilisation.jpg',
                'alt_text'    => 'Séance de sensibilisation nutritionnelle avec les communautés',
                'year'        => '2024–2025',
                'zone'        => 'Nikki, Sinendé, Kalalé',
                'description' => 'Campagnes de sensibilisation sur la nutrition infantile et maternelle dans les communautés rurales du Borgou.',
                'details'     => 'Les sessions ont mobilisé agents de santé communautaire, mères et leaders locaux autour de l\'allaitement maternel exclusif, de la diversification alimentaire et de la lutte contre les carences en micronutriments.',
                'stats'       => [
                    ['value' => '1 200+', 'label' => 'Femmes sensibilisées'],
                    ['value' => '18',     'label' => 'Villages ciblés'],
                    ['value' => '36',     'label' => 'Sessions organisées'],
                ],
                'gallery'     => [
                    'images/activites/demonstration-culinaire.jpg',
                    'images/activites/depistage-malnutrition.jpg',
                    'images/activites/groupe-beneficiaires.jpg',
                ],
            ],
            [
                'tag'         => 'Nutrition',
                'title'       => 'Dépistage de la malnutrition',
                'image_path'  => 'images/activites/depistage-malnutrition.jpg',
                'alt_text'    => 'Dépistage anthropométrique d\'un enfant',
                'year'        => '2024–2025',
                'zone'        => 'Nikki, Sinendé',
                'description' => 'Dépistage précoce de la malnutrition aiguë et chronique chez les enfants de moins de 5 ans dans le département du Borgou.',
                'details'     => 'Les équipes ADéProG ont mené des mesures anthropométriques (poids, taille, périmètre brachial) sur plus de 730 enfants, permettant un référencement rapide des cas sévères vers les centres de santé.',
                'stats'       => [
                    ['value' => '730+', 'label' => 'Enfants dépistés'],
                    ['value' => '12',   'label' => 'Équipes de terrain'],
                    ['value' => '95%',  'label' => 'Taux de couverture'],
                ],
                'gallery'     => [
                    'images/activites/nutrition-sensibilisation.jpg',
                    'images/activites/demonstration-culinaire.jpg',
                ],
            ],
            [
                'tag'         => 'Nutrition',
                'title'       => 'Démonstrations culinaires',
                'image_path'  => 'images/activites/demonstration-culinaire.jpg',
                'alt_text'    => 'Démonstration culinaire communautaire',
                'year'        => '2024–2025',
                'zone'        => 'NKP (Nikki, Kalalé, Pèrèrè)',
                'description' => 'Ateliers pratiques de cuisine nutritive avec des recettes locales enrichies, destinées aux mères et gardiennes d\'enfants.',
                'details'     => 'Ces démonstrations valorisent les aliments locaux disponibles (moringa, légumineuses, céréales) pour composer des repas équilibrés et accessibles, réduisant la malnutrition infantile par l\'éducation alimentaire.',
                'stats'       => [
                    ['value' => '420', 'label' => 'Mères participantes'],
                    ['value' => '24',  'label' => 'Ateliers organisés'],
                    ['value' => '8',   'label' => 'Recettes développées'],
                ],
                'gallery'     => [
                    'images/activites/nutrition-sensibilisation.jpg',
                    'images/activites/pepiniere-moringa.jpg',
                ],
            ],
            [
                'tag'         => 'Agroécologie',
                'title'       => 'Pépinière de moringa',
                'image_path'  => 'images/activites/pepiniere-moringa.jpg',
                'alt_text'    => 'Plantation de moringa avec les bénéficiaires',
                'year'        => '2024–2025',
                'zone'        => 'Nikki, Sinendé',
                'description' => 'Production et distribution de plants de moringa pour renforcer la sécurité alimentaire et la diversité nutritionnelle des ménages.',
                'details'     => 'Le moringa, arbre aux vertus nutritives exceptionnelles, est cultivé en pépinière communautaire avant d\'être distribué aux familles. Ses feuilles riches en protéines et vitamines contribuent à la lutte contre la malnutrition.',
                'stats'       => [
                    ['value' => '5 000+', 'label' => 'Plants distribués'],
                    ['value' => '200',    'label' => 'Familles bénéficiaires'],
                    ['value' => '3',      'label' => 'Pépinières créées'],
                ],
                'gallery'     => [
                    'images/activites/arrosage-semis.jpg',
                    'images/activites/demonstration-culinaire.jpg',
                    'images/activites/nutrition-sensibilisation.jpg',
                ],
            ],
            [
                'tag'         => 'Agroécologie',
                'title'       => 'Entretien des semis',
                'image_path'  => 'images/activites/arrosage-semis.jpg',
                'alt_text'    => 'Arrosage des plants en pépinière',
                'year'        => '2024–2025',
                'zone'        => 'Nikki, Sinendé',
                'description' => 'Formation et accompagnement des communautés dans les techniques d\'entretien des semis et cultures maraîchères.',
                'details'     => 'Les bénéficiaires reçoivent une formation pratique sur les techniques d\'arrosage, de fertilisation naturelle et de lutte biologique contre les nuisibles, favorisant une agriculture durable.',
                'stats'       => [
                    ['value' => '150', 'label' => 'Agriculteurs formés'],
                    ['value' => '6',   'label' => 'Mois d\'accompagnement'],
                    ['value' => '85%', 'label' => 'Taux de survie des plants'],
                ],
                'gallery'     => [
                    'images/activites/pepiniere-moringa.jpg',
                    'images/activites/groupe-beneficiaires.jpg',
                ],
            ],
            [
                'tag'         => 'Santé SR',
                'title'       => 'Causeries éducatives SRHR',
                'image_path'  => 'images/activites/srhr-causerie.jpg',
                'alt_text'    => 'Causerie éducative sur la santé sexuelle et reproductive',
                'year'        => '2025',
                'zone'        => 'Sinendé, Sonsonré',
                'description' => 'Sessions éducatives sur la santé sexuelle et reproductive, les IST, le VIH/SIDA et l\'hépatite dans les communautés rurales.',
                'details'     => 'Ces causeries, menées dans le cadre de l\'accord N°5608/STBF-MS-BENIN, visent à renforcer les connaissances des populations et à réduire les comportements à risque en matière de santé reproductive.',
                'stats'       => [
                    ['value' => '800+', 'label' => 'Personnes sensibilisées'],
                    ['value' => '15',   'label' => 'Sessions organisées'],
                    ['value' => '100%', 'label' => 'Villages ciblés couverts'],
                ],
                'gallery'     => [
                    'images/activites/srhr-communaute.jpg',
                    'images/activites/sensibilisation-nikki.jpg',
                ],
            ],
            [
                'tag'         => 'Santé SR',
                'title'       => 'Sensibilisation communautaire',
                'image_path'  => 'images/activites/srhr-communaute.jpg',
                'alt_text'    => 'Groupe de bénéficiaires lors d\'une activité de sensibilisation',
                'year'        => '2025',
                'zone'        => 'Zone NKP',
                'description' => 'Sensibilisation des communautés sur la santé sexuelle et reproductive avec implication des leaders locaux et des agents de santé.',
                'details'     => 'Ces activités impliquent chefs de villages, agents de santé communautaire et associations de femmes pour diffuser les messages de santé et assurer une adoption durable des bonnes pratiques.',
                'stats'       => [
                    ['value' => '40',    'label' => 'Communautés impliquées'],
                    ['value' => '60',    'label' => 'Leaders mobilisés'],
                    ['value' => '3 500+','label' => 'Bénéficiaires directs'],
                ],
                'gallery'     => [
                    'images/activites/srhr-causerie.jpg',
                    'images/activites/groupe-beneficiaires.jpg',
                ],
            ],
            [
                'tag'         => 'Communauté',
                'title'       => 'Engagement à Nikki',
                'image_path'  => 'images/activites/sensibilisation-nikki.jpg',
                'alt_text'    => 'Sensibilisation communautaire à Nikki, août 2024',
                'year'        => '2024',
                'zone'        => 'Nikki (Borgou)',
                'description' => 'Renforcement de l\'engagement communautaire à Nikki à travers des activités de sensibilisation multidomaines.',
                'details'     => 'Cette intervention transversale a renforcé la cohésion sociale et l\'appropriation des programmes en combinant santé, nutrition et agroécologie dans une approche intégrée.',
                'stats'       => [
                    ['value' => '2 000+', 'label' => 'Bénéficiaires touchés'],
                    ['value' => '8',      'label' => 'Quartiers couverts'],
                    ['value' => '3',      'label' => 'Domaines d\'intervention'],
                ],
                'gallery'     => [
                    'images/activites/srhr-communaute.jpg',
                    'images/activites/groupe-beneficiaires.jpg',
                    'images/activites/nutrition-sensibilisation.jpg',
                ],
            ],
        ];

        foreach ($projects as $data) {
            $data['slug'] = Str::slug($data['title']);
            $data['is_published'] = true;
            AdminProject::updateOrCreate(['slug' => $data['slug']], $data);
        }
    }
}
