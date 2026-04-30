<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Enregistrer un Nouveau Professeur</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-sm sm:rounded-lg">
                <form action="{{ route('admin.professeur.store') }}" method="POST">
                    @csrf
                    <div class="grid grid-cols-1 gap-4">
                        <div>
                            <label class="block font-medium text-sm text-gray-700">Nom</label>
                            <input type="text" name="nom" class="w-full border-gray-300 rounded-md shadow-sm" required>
                        </div>
                        <div>
                            <label class="block font-medium text-sm text-gray-700">Prénom</label>
                            <input type="text" name="prenom" class="w-full border-gray-300 rounded-md shadow-sm" required>
                        </div>
                        <div>
                            <label class="block font-medium text-sm text-gray-700">Email Professionnel</label>
                            <input type="email" name="email" class="w-full border-gray-300 rounded-md shadow-sm" required>
                        </div>
                        <div>
                            <label class="block font-medium text-sm text-gray-700">Mot de passe provisoire</label>
                            <input type="password" name="password" class="w-full border-gray-300 rounded-md shadow-sm" required>
                            <p class="text-xs text-gray-500 mt-1">Le professeur pourra le modifier lors de sa première connexion.</p>
                        </div>

                        <div class="flex justify-end mt-4">
                            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded shadow hover:bg-blue-700">
                                Créer le compte Professeur
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>