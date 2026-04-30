<x-app-layout>
    @if(session('success'))
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4">
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 shadow-sm" role="alert">
            {{ session('success') }}
        </div>
    </div>
    @endif
    <div class="py-12 bg-gray-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- TITRE ET BOUTON D'ACTION RAPIDE -->
            <div class="flex justify-between items-center mb-8">
                <h1 class="text-2xl font-bold text-gray-800">Console d'Administration</h1>
                <!-- Cherche le bouton et assure-toi qu'il n'est pas "disabled" ou avec des classes de grisage -->
                <a href="{{ route('admin.professeur.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded shadow">
                    Ajouter un Professeur
                </a>
            </div>

            <!-- GRILLE DE GESTION -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                <!-- MODULE : ÉLÈVES -->
                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200 hover:shadow-lg transition">
                    <div class="flex items-center mb-4 text-blue-600">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                        </svg>
                        <h2 class="ml-3 font-semibold text-lg">Gestion des Élèves</h2>
                    </div>
                    <p class="text-sm text-gray-600 mb-4">Consulter la liste, valider les inscriptions et voir les niveaux.</p>
                    <a href="{{ route('admin.eleves.index') }}" class="text-blue-500 font-medium hover:underline">Accéder au répertoire →</a>
                </div>

                <!-- MODULE : PROGRAMMATION -->

                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200 hover:shadow-lg transition">
                    <div class="flex items-center mb-4 text-green-600">
                        <!-- L'ICÔNE CALENDRIER REVIENT ICI -->
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        <h2 class="ml-3 font-semibold text-lg">Programmation des Cours</h2>
                    </div>
                    <p class="text-sm text-gray-600 mb-4">Gérer l'emploi du temps et l'affectation des salles.</p>

                    <div class="flex flex-col gap-2">
                        <a href="{{ route('admin.programmation') }}" class="text-green-500 font-medium hover:underline text-sm">
                            Voir le calendrier complet →
                        </a>
                        <a href="{{ route('admin.cours.create') }}" class="inline-block bg-green-100 text-green-700 px-3 py-1 rounded-md text-xs font-bold hover:bg-green-200 w-fit">
                            + Programmer un cours
                        </a>
                    </div>
                </div>

                <!-- MODULE : ÉVALUATION PROFS -->
                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200 hover:shadow-lg transition">
                    <div class="flex items-center mb-4 text-yellow-600">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.382-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                        </svg>
                        <h2 class="ml-3 font-semibold text-lg">Notes des Professeurs</h2>
                    </div>
                    <p class="text-sm text-gray-600 mb-4">Visualiser les avis des élèves et les notes de performance.</p>

                    <!-- BARRE DE PROGRESSION DYNAMIQUE -->
                    <div class="w-full bg-gray-200 rounded-full h-2">
                        <div class="bg-yellow-400 h-2 rounded-full transition-all duration-500" style="width: {{ $pourcentage }}%"></div>
                    </div>

                    <!-- NOTE DYNAMIQUE -->
                    <p class="text-xs text-gray-500 mt-2">Moyenne générale : <strong>{{ $noteSurVingt }}/20</strong></p>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>