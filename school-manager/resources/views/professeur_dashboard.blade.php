<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Espace Enseignant - ENEAM
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- SECTION STATS -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                <div class="bg-white p-6 rounded-xl shadow-sm border-t-4 border-green-500">
                    <h3 class="text-gray-500 text-sm font-bold uppercase">Ma Note Moyenne</h3>
                    <p class="text-3xl font-black text-gray-800">{{ number_format($stats['moyenne'], 1) }} / 5</p>
                    <p class="text-xs text-gray-400 mt-1">Basé sur {{ $stats['total_votes'] }} avis étudiants</p>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-sm border-t-4 border-blue-500">
                    <h3 class="text-gray-500 text-sm font-bold uppercase">Cours à venir</h3>
                    <p class="text-3xl font-black text-gray-800">{{ $cours->count() }}</p>
                    <p class="text-xs text-gray-400 mt-1">Séances programmées ce semestre</p>
                </div>
            </div>

            <!-- LISTE DES COURS -->
            <div class="bg-white shadow-sm rounded-xl overflow-hidden">
                <div class="p-6 border-b border-gray-100">
                    <h3 class="font-bold text-gray-700">Mon Emploi du Temps</h3>
                </div>
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-50 text-gray-600 text-xs uppercase">
                            <th class="p-4 font-bold">Matière</th>
                            <th class="p-4 font-bold">Date & Heure</th>
                            <th class="p-4 font-bold">Salle</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse($cours as $c)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="p-4 font-semibold text-gray-900">{{ $c->titre }}</td>
                            <td class="p-4 text-gray-600">
                                {{ \Carbon\Carbon::parse($c->date_debut)->translatedFormat('l d F') }}
                                <span class="text-blue-600 font-bold ml-2">
                                    {{ \Carbon\Carbon::parse($c->date_debut)->format('H:i') }}
                                </span>
                            </td>
                            <td class="p-4">
                                <span class="bg-gray-100 px-2 py-1 rounded text-sm">📍 {{ $c->salle }}</span>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="p-8 text-center text-gray-400 italic">Aucun cours n'est assigné à votre nom.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>