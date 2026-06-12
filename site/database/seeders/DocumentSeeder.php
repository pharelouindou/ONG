<?php

namespace Database\Seeders;

use App\Models\Document;
use Illuminate\Database\Seeder;

class DocumentSeeder extends Seeder
{
    public function run(): void
    {
        $documents = [
            [
                'title'        => 'Profilage institutionnel 2026',
                'doc_type'     => 'PDF',
                'description'  => 'Document de présentation de l\'organisation, de ses activités et de ses résultats.',
                'file_path'    => 'documents/profilage-adeprog-2026.pdf',
                'is_published' => true,
            ],
            [
                'title'        => 'Rapport annuel 2025',
                'doc_type'     => 'À venir',
                'description'  => 'Bilan complet des activités et résultats de l\'année 2025.',
                'file_path'    => null,
                'is_published' => true,
            ],
            [
                'title'        => 'Comptes rendus financiers',
                'doc_type'     => 'À venir',
                'description'  => 'Documents comptables validés par le Commissariat aux Comptes.',
                'file_path'    => null,
                'is_published' => true,
            ],
            [
                'title'        => 'Plan stratégique',
                'doc_type'     => 'À venir',
                'description'  => 'Orientations et priorités d\'intervention de l\'organisation.',
                'file_path'    => null,
                'is_published' => true,
            ],
        ];

        foreach ($documents as $data) {
            Document::updateOrCreate(['title' => $data['title']], $data);
        }
    }
}
