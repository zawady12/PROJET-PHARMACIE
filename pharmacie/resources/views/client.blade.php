<x-guest-layout>
  <br>
  <div class="row">
    <div class="row">
      <div class="mb-3 col-md-6">
        <x-label for="nom" :value="__('Nom')" />
        <x-input id="nom_" class="block mt-1 w-full" type="text" name="nom" required />
        <span class="text-danger">@error('nom'){{$message}}@enderror</span>
      </div>
      <div class="mb-3 col-md-6">
        <x-label for="prenom" :value="__('Prenom')" />
        <x-input id="prenom_" class="block mt-1 w-full" type="text" name="prenom" required autofocus />
        <span class="text-danger">@error('prenom'){{$message}}@enderror</span>
      </div>
    </div>
    <div class="row">
      <div class="mb-3 col-md-6">
        <x-label for="tel" :value="__('Numero de telephone')" />
        <x-input id="tel" class="block mt-1 w-full" type="text" name="tel" required autofocus />
        <span class="text-danger">@error('tel'){{$message}}@enderror</span>
      </div>
      <div class="mb-3 col-md-6">
        <x-label for="adresse" :value="__('Adresse')" />
        <x-input id="adresse" class="block mt-1 w-full" type="text" name="adresse" required autofocus /> <span class="text-danger">@error('adresse'){{$message}}@enderror</span>
      </div>
    </div>
  </div>
  <script>
    let valeurElt = document.getElementById("nom_");
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
    let valeurElts = document.getElementById("prenom_");
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
</x-guest-layout>