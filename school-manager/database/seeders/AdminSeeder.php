<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'nom' => 'Directeur',
            'prenom' => 'Admin',
            'email' => 'admin@school.com',
            'password' => Hash::make('password123'), // Mot de passe par défaut
            'role' => 'admin', // Le rôle est forcé ici !
            'langue_souhaitee' => 'Français', // On remplit pour éviter les erreurs
            'duree_formation' => 'N/A',
            'niveau' => 'N/A',
        ]);
    }
}
