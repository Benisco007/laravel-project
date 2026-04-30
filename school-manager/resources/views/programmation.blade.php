<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Emploi du Temps Global</h2>
            <a href="{{ route('admin.cours.create') }}" class="bg-green-600 text-white px-4 py-2 rounded text-sm">
                + Programmer un cours
            </a>
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
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                @if($cours->isEmpty())
                <p class="text-center text-gray-500">Aucun cours programmé pour le moment.</p>
                @else
                <div class="space-y-4">
                    @foreach($cours as $c)
                    <div class="border-l-4 border-indigo-500 bg-gray-50 p-4 flex justify-between items-center">
                        <div>
                            <h3 class="font-bold text-lg">{{ $c->titre }}</h3>
                            <p class="text-sm text-gray-600">Prof: {{ $c->professeur }} | Salle: {{ $c->salle }}</p>
                        </div>
                        <div class="text-right">
                            <p class="font-semibold">{{ \Carbon\Carbon::parse($c->date_debut)->format('d/m/Y') }}</p>
                            <p class="text-sm text-gray-500">{{ \Carbon\Carbon::parse($c->date_debut)->format('H:i') }} - {{ \Carbon\Carbon::parse($c->date_fin)->format('H:i') }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>