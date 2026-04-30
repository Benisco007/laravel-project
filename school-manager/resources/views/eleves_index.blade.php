<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Liste des Élèves Inscrits
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nom & Prénom</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Email</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Langue</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Niveau</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($eleves as $eleve)
                        <tr>
                            <td class="px-6 py-4">{{ $eleve->nom }} {{ $eleve->prenom }}</td>
                            <td class="px-6 py-4">{{ $eleve->email }}</td>
                            <td class="px-6 py-4">{{ $eleve->langue_souhaitee }}</td>
                            <td class="px-6 py-4">{{ $eleve->niveau }}</td>
                            <td class="px-6 py-4 flex items-center space-x-3">
                                <!-- Bouton Modifier (visuel pour le moment) -->
                                <button class="text-indigo-600 hover:text-indigo-900">Modifier</button>

                                <!-- LE VRAI FORMULAIRE DE SUPPRESSION -->
                                <form action="{{ route('admin.eleves.destroy', $eleve->id) }}" method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer cet étudiant ?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900 font-bold cursor-pointer">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</x-app-layout>