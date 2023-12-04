<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <center> <h4>INSCRIPTION</h4></center>

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="noms" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>
            <!-- Prenom -->
            <div>
                <br>
                <x-label for="prenom" :value="__('Prenom')" />

                <x-input id="prenoms" class="block mt-1 w-full" type="text" name="prenom" :value="old('prenom')" required autofocus />
            </div>
            <br>
            <!-- Tel -->
            <div>
                <x-label for="tel" :value="__('Téléphone')" />

                <x-input id="tel" class="block mt-1 w-full" type="text" name="tel" :value="old('tel')" required autofocus />
            </div>
            <br>
            <!-- Adresse -->
            <div>
                <x-label for="adresse" :value="__('Adresse')" />

                <x-input id="adresse" class="block mt-1 w-full" type="text" name="adresse" :value="old('adresse')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>


            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>
             <!-- Role -->
             <div class="mt-4">
             <x-label for="role_id" :value="__('Statut')" />
                <select name="role_id" id="" class="block mt-1 w-full" required ><br>
                <option value=""></option>
            @foreach($role as $r)
            <option value="{{ $r->id }}">{{ $r->libelle}}</option>
            @endforeach
        </select>
            </div>


            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                   
                </a>

                <x-button class="ml-4">
                    {{ __('Inscrire') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
<script>
    let valeurElt = document.getElementById("noms");
    valeurElt.addEventListener('input', function (evt) {
    let nom = valeurElt.value;
    if (nom.length > 0) {
        const numVal = nom[nom.length - 1];
        if (/[a-zA-Z-']/.test(numVal) == false) {
            valeurElt.value = nom.slice(0,-1);
        }
    }
});
</script>
    <script>
    let valeurElts = document.getElementById("prenoms");
    valeurElts.addEventListener('input', function (evt) {
    let prenom = valeurElts.value;
    if (prenom.length > 0) {
        const numValeur = prenom[prenom.length - 1];
        if (/[a-zA-Z-']/.test(numValeur) == false) {
            valeurElts.value = prenom.slice(0,-1);
        }
    }
});
</script>
