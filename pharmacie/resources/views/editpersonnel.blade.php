<x-guest-layout>
    <input type="hidden" name="id" value="{{$p->id}}">
    <div class="container" style="width: 100%; height:400px">
        <br>
        <div class="row">
            <div class="mb-3 col-md-6">
                <x-label for="name" :value="__('Nom')" />
                <x-input type="text" id="nomx" class="block mt-1 w-full" name="name" required autofocus value="{{$p['name']}}" />
            </div>
            <div class="mb-3 col-md-6">
                <x-label for="prenom" :value="__('Prenom')" />
                <x-input type="text" class="block mt-1 w-full" id="prenomx" name="prenom" required autofocus value="{{$p['prenom']}}" />
            </div>
        </div>
        <div class="row">
            <div class="mb-3 col-md-6">
                <x-label for="tel" :value="__('Numéro de telephone')" />
                <x-input type="text" class="block mt-1 w-full" name="tel" id="tel" required autofocus value="{{$p['tel']}}" />
            </div>
            <div class="mb-3 col-md-6">
                <x-label for="adresse" :value="__('Adresse')" />
                <x-input type="text" class="block mt-1 w-full" name="adresse" id="adresse" required autofocus value="{{$p['adresse']}}" />
            </div>
        </div>
        <div class="row">
            <div class="mb-3 col-md-6">
                <x-label for="email" :value="__('Email')" />
                <x-input type="email" class="block mt-1 w-full" name="email" id="email" required autofocus value="{{$p['email']}}" />
            </div>
            <div class="mb-3 col-md-6">
                <!-- Role -->
                <x-label for="role_id" :value="__('Statut')" />
                <select name="role_id" id="" class="form-control" value="{{ $p['role_id'] }}"><br>
                    <option value="{{ $p->role_id}}">{{ $p->role->libelle}}</option>
                    @foreach($role as $r)
                    <option value="{{ $r->id }}">{{ $r->libelle}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
</x-guest-layout>
<script>
    let valeurElt = document.getElementById("nomx");
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
    let valeurElts = document.getElementById("prenomx");
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