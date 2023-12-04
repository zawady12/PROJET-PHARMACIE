<x-guest-layout>
    <div class="row">
        <div>
            <br>
            <div class="row">
                <div class="mb-3 col-md-6">
                    <!-- Name -->
                    <x-label for="name" :value="__('Nom')" />
                    <x-input id="nomss" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                </div>
                <div class="mb-3 col-md-6">
                    <!-- Prenom -->
                    <x-label for="prenom" :value="__('Prenom')" />

                    <x-input id="prenomss" class="block mt-1 w-full" type="text" name="prenom" :value="old('prenom')" required autofocus />
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col-md-6">
                    <!-- Tel -->
                    <x-label for="tel" :value="__('Téléphone')" />

                    <x-input id="tel" class="block mt-1 w-full" type="text" name="tel" :value="old('tel')" required autofocus />
                </div>
                <div class="mb-3 col-md-6">
                    <!-- Adresse -->
                    <x-label for="adresse" :value="__('Adresse')" />

                    <x-input id="adresse" class="block mt-1 w-full" type="text" name="adresse" :value="old('adresse')" required autofocus />
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col-md-6">
                    <!-- Email Address -->
                    <x-label for="email" :value="__('Email')" />

                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                </div>
                <div class="mb-3 col-md-6">
                    <!-- Password -->
                    <x-label for="password" :value="__('Password')" />

                    <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col-md-6">
                    <!-- Confirm Password -->
                    <x-label for="password_confirmation" :value="__('Confirm Password')" />

                    <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required  />
                </div>
                <div class="mb-3 col-md-6">
                    <!-- Role -->
                    <x-label for="role_id" :value="__('Statut')" />
                    <select name="role_id" id="" class="form-control"><br>
                        <option value="">Selectionner</option>
                        @foreach($role as $r)
                        <option value="{{ $r->id }}">{{ $r->libelle}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            
        </div>
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
    </div>  
</x-guest-layout>
