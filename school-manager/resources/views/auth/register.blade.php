<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Nom -->
        <div class="mt-4">
            <x-input-label for="nom" :value="__('Nom')" />
            <x-text-input id="nom" class="block mt-1 w-full" type="text" name="nom" :value="old('nom')" required autofocus />
        </div>

        <!-- Prénom -->
        <div class="mt-4">
            <x-input-label for="prenom" :value="__('Prénom')" />
            <x-text-input id="prenom" class="block mt-1 w-full" type="text" name="prenom" :value="old('prenom')" required />
        </div>
        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                type="password"
                name="password"
                required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                type="password"
                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Langue Souhaitée -->
        <div class="mt-4">
            <x-input-label for="langue_souhaitee" :value="__('Langue Souhaitée')" />
            <select id="langue_souhaitee" name="langue_souhaitee" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
                <option value="Anglais">Anglais</option>
                <option value="Français">Français</option>
                <option value="Allemand">Allemand</option>
            </select>
            <x-input-error :messages="$errors->get('langue_souhaitee')" class="mt-2" />
        </div>

        <!-- Durée de la formation -->
        <div class="mt-4">
            <x-input-label for="duree_formation" :value="__('Durée de la formation')" />
            <x-text-input id="duree_formation" class="block mt-1 w-full" type="text" name="duree_formation" :value="old('duree_formation')" required placeholder="ex: 6 mois" />
            <x-input-error :messages="$errors->get('duree_formation')" class="mt-2" />
        </div>

        <!-- Niveau -->
        <div class="mt-4">
            <x-input-label for="niveau" :value="__('Niveau actuel')" />
            <select id="niveau" name="niveau" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
                <option value="Débutant">Débutant</option>
                <option value="Intermédiaire">Intermédiaire</option>
                <option value="Avancé">Avancé</option>
            </select>
            <x-input-error :messages="$errors->get('niveau')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>