<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Mon Espace Étudiant - ENEAM
            </h2>
            <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-xs font-bold uppercase">
                Session 2025-2026
            </span>
        </div>
    </x-slot>

    @if(session('success'))
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4">
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 shadow-sm" role="alert">
            {{ session('success') }}
        </div>
    </div>
    @endif

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Message de bienvenue -->
            <div class="mb-8">
                <h3 class="text-2xl font-bold text-gray-800">Bonjour, {{ Auth::user()->prenom }} ! 👋</h3>
                <p class="text-gray-600">Voici ton programme de cours et tes résultats.</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                <!-- SECTION : EMPLOI DU TEMPS (2/3 de l'écran) -->
                <div class="lg:col-span-2 space-y-4">
                    <h4 class="font-semibold text-gray-700 uppercase text-sm tracking-wider">Prochains Cours</h4>

                    @if($cours->isEmpty())
                    <div class="bg-white p-8 rounded-xl shadow-sm text-center border border-dashed border-gray-300">
                        <p class="text-gray-500">Aucun cours n'est programmé pour le moment. Profites-en pour réviser ! 📚</p>
                    </div>
                    @else
                    @foreach($cours as $c)
                    <div class="bg-white rounded-xl shadow-sm border-l-8 border-blue-600 p-6 flex justify-between items-center hover:shadow-md transition">
                        <div class="flex-1">
                            <span class="text-xs font-bold text-blue-600 uppercase">{{ \Carbon\Carbon::parse($c->date_debut)->translatedFormat('l d F') }}</span>
                            <h3 class="text-xl font-bold text-gray-900 mt-1">{{ $c->titre }}</h3>

                            <!-- CORRECTION : BOUTON DE TÉLÉCHARGEMENT ICI -->
                            <div class="mt-2 mb-3">
                                @if(isset($c->support_fichier) && $c->support_fichier)
                                <a href="{{ asset('supports/' . $c->support_fichier) }}" download class="inline-flex items-center text-xs font-bold text-green-600 hover:text-green-700 bg-green-50 px-2 py-1 rounded">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                                    </svg>
                                    Télécharger le support PDF
                                </a>
                                @else
                                <span class="text-xs text-gray-400 italic">Aucun support disponible</span>
                                @endif
                            </div>

                            <p class="text-gray-600 flex items-center mt-2">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                Professeur : <span class="font-medium ml-1 text-gray-800">{{ $c->professeur }}</span>
                            </p>

                            <!-- FORMULAIRE DE VOTE -->
                            <div class="mt-4 border-t pt-4">
                                <form action="{{ route('eleve.noter') }}" method="POST" class="flex items-center gap-2">
                                    @csrf
                                    <input type="hidden" name="professeur_nom" value="{{ $c->professeur }}">
                                    <label class="text-xs font-semibold text-gray-500">Noter :</label>
                                    <select name="note" class="text-xs border-gray-300 rounded shadow-sm py-1">
                                        <option value="5">5/5 - Excellent</option>
                                        <option value="4">4/5 - Très bien</option>
                                        <option value="3">3/5 - Bien</option>
                                        <option value="2">2/5 - Moyen</option>
                                        <option value="1">1/5 - Mauvais</option>
                                    </select>
                                    <button type="submit" class="bg-yellow-400 hover:bg-yellow-500 text-yellow-900 text-xs font-bold py-1 px-3 rounded shadow-sm transition">
                                        Voter
                                    </button>
                                </form>
                            </div>
                        </div>

                        <div class="text-right ml-4">
                            <div class="bg-gray-100 px-4 py-2 rounded-lg text-gray-800 font-mono font-bold text-lg">
                                {{ \Carbon\Carbon::parse($c->date_debut)->format('H:i') }}
                            </div>
                            <p class="text-sm text-gray-500 mt-2 font-medium">📍 {{ $c->salle }}</p>
                        </div>
                    </div>
                    @endforeach
                    @endif

                    <!-- SECTION : MES NOTES (Déplacée pour une meilleure visibilité) -->
                    <div class="mt-12 bg-white shadow-sm rounded-xl overflow-hidden border border-gray-100">
                        <div class="p-6 border-b border-gray-100 bg-gray-50">
                            <h3 class="font-bold text-gray-800 text-lg flex items-center">
                                <span class="mr-2">🎓</span> Mon Bulletin de Notes
                            </h3>
                        </div>

                        <div class="p-6">
                            @if($notes->isEmpty())
                            <p class="text-gray-500 italic text-center py-4">Aucune note enregistrée pour le moment.</p>
                            @else
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                @foreach($notes as $note)
                                <div class="border border-gray-200 rounded-lg p-4 shadow-sm hover:shadow-md transition">
                                    <div class="flex justify-between items-start mb-2">
                                        <h4 class="font-bold text-indigo-700">{{ $note->matiere }}</h4>
                                        <span class="bg-indigo-100 text-indigo-800 text-sm font-black px-2 py-1 rounded">
                                            {{ $note->valeur }} / 20
                                        </span>
                                    </div>
                                    @if($note->appreciation)
                                    <p class="text-xs text-gray-600 mt-2 bg-gray-50 p-2 rounded italic">
                                        "{{ $note->appreciation }}"
                                    </p>
                                    @endif
                                </div>
                                @endforeach
                            </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- SECTION : INFOS / ACTIONS (1/3 de l'écran) -->
                <div class="space-y-6">
                    <div class="bg-indigo-700 rounded-xl p-6 text-white shadow-lg">
                        <h4 class="font-bold text-lg mb-2">Ma progression</h4>
                        <p class="text-indigo-100 text-sm mb-4">Assiduité au semestre.</p>
                        <div class="w-full bg-indigo-900 rounded-full h-2.5">
                            <div class="bg-green-400 h-2.5 rounded-full" style="width: 85%"></div>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
                        <h4 class="font-bold text-gray-800 mb-4 text-sm uppercase tracking-wider">Liens Utiles</h4>
                        <ul class="space-y-3">
                            <li><a href="#" class="text-blue-600 hover:underline text-sm flex items-center"><span class="mr-2">📂</span> Règlement intérieur</a></li>
                            <li><a href="#" class="text-blue-600 hover:underline text-sm flex items-center font-bold"><span class="mr-2">⭐</span> Mes évaluations</a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>