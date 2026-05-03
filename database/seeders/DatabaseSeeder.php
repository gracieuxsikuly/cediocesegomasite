<?php

namespace Database\Seeders;

use App\Models\Slider;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $users = [
            ['name' => 'Administrateur', 'email' => 'admin@example.com', 'role' => User::ROLE_ADMIN],
            ['name' => 'Charge Activites et Ressources', 'email' => 'activites@example.com', 'role' => User::ROLE_ACTIVITES_RESSOURCES],
            ['name' => 'Charge Radio Maria', 'email' => 'radio@example.com', 'role' => User::ROLE_RADIO_MARIA],
            ['name' => 'Gestionnaire Donnees', 'email' => 'donnees@example.com', 'role' => User::ROLE_MANAGER_DONNEES],
            ['name' => 'Secretariat', 'email' => 'secretariat@example.com', 'role' => User::ROLE_SECRETARIAT],
            ['name' => 'Zelateur', 'email' => 'zelateur@example.com', 'role' => User::ROLE_ZELATEUR],
            ['name' => 'Tresorerie', 'email' => 'tresorerie@example.com', 'role' => User::ROLE_TRESORERIE],
        ];

        foreach ($users as $user) {
            User::query()->updateOrCreate(
                ['email' => $user['email']],
                [
                    'name' => $user['name'],
                    'role' => $user['role'],
                    'email_verified_at' => now(),
                    'password' => Hash::make('password'),
                ]
            );
        }

        $sliderDirectory = storage_path('app/public/sliders');
        File::ensureDirectoryExists($sliderDirectory);

        $sliders = [
            [
                'source' => public_path('asset_frontend/images/hero-bg-3.jpg'),
                'target' => 'sliders/seed-hero-bg-3.jpg',
                'sous_titre' => "L'adoration",
                'titre' => 'Notre devise',
                'description' => 'Prie, communie, sacrifie-toi, sois apotre',
                'ordre' => 1,
            ],
            [
                'source' => public_path('asset_frontend/images/hero-bg-4.jpg'),
                'target' => 'sliders/seed-hero-bg-4.jpg',
                'sous_titre' => 'Avec le Christ!!!',
                'titre' => "Rien n'est impossible",
                'description' => 'Une journee sans messe est une journee sans soleil',
                'ordre' => 2,
            ],
        ];

        foreach ($sliders as $slider) {
            if (File::exists($slider['source'])) {
                File::copy($slider['source'], storage_path('app/public/'.$slider['target']));
            }

            Slider::query()->updateOrCreate(
                ['ordre' => $slider['ordre']],
                [
                    'titre' => $slider['titre'],
                    'sous_titre' => $slider['sous_titre'],
                    'description' => $slider['description'],
                    'image' => $slider['target'],
                    'bouton_texte' => 'Ressources',
                    'bouton_lien' => '/nos-ressources',
                    'bouton_secondaire_texte' => 'Rejoindre la croisade eucharistique',
                    'bouton_secondaire_lien' => '/contact',
                    'statut' => 'actif',
                ]
            );
        }
    }
}
