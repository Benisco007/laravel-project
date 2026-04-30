<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Programmer un nouveau cours</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-sm sm:rounded-lg">
                <form action="{{ route('admin.cours.store') }}" method="POST">
                    @csrf
                    <div class="grid grid-cols-1 gap-6">
                        <div>
                            <label class="block font-medium text-sm text-gray-700">Titre du cours</label>
                            <input type="text" name="titre" class="w-full border-gray-300 rounded-md shadow-sm" required>
                        </div>
                        <!-- Remplace l'ancien input "professeur" par ceci -->
                        <div>
                            <label class="block font-medium text-sm text-gray-700">Sélectionner le Professeur</label>
                            <select name="professeur" class="w-full border-gray-300 rounded-md shadow-sm" required>
                                <option value="">-- Choisir un professeur --</option>
                                @foreach($professeurs as $prof)
                                <option value="{{ $prof->nom }} {{ $prof->prenom }}">
                                    {{ $prof->nom }} {{ $prof->prenom }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block font-medium text-sm text-gray-700">Salle</label>
                                <input type="text" name="salle" placeholder="Ex: Amphi A" class="w-full border-gray-300 rounded-md shadow-sm" required>
                            </div>
                            <div>
                                <label class="block font-medium text-sm text-gray-700">Début</label>
                                <input type="datetime-local" name="date_debut" class="w-full border-gray-300 rounded-md shadow-sm" required>
                            </div>
                            <div class="col-start-2">
                                <label class="block font-medium text-sm text-gray-700">Fin</label>
                                <input type="datetime-local" name="date_fin" class="w-full border-gray-300 rounded-md shadow-sm" required>
                            </div>
                        </div>
                        <div class="flex justify-end mt-4">
                            <button type="submit" class="w-full sm:w-auto bg-blue-700 hover:bg-blue-800 text-white font-bold py-3 px-8 rounded-lg shadow-lg cursor-pointer transition duration-200">
                                Enregistrer le cours
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>