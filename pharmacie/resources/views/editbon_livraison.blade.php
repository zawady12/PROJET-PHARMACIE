<x-guest-layout>
    <input type="hidden" name="id" value="{{$p->id}}">
    <div class="container" style="width: 100%; height:400px">
        <br>
        <div class="row">
            <div class="mb-3 col-md-6">
                <!-- produit -->
                <x-label for="produit_id" :value="__('Produit')" />
                <select name="produit_id" id="" class="form-control" value="{{ $p['produit_id'] }}"><br>
                    <option value="{{$p->produit_id}}">{{ $p->produit->nom_commercial}}</option>
                    @foreach($produit as $r)
                    <option value="{{ $r->id }}">{{ $r->nom_commercial}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3 col-md-6">
                <x-label for="num_livraison" :value="__('Numéro de livraison')" />
                <x-input type="number" class="block mt-1 w-full" name="num_livraison" id="num_livraison" required autofocus value="{{$p['num_livraison']}}" />
            </div>
        </div>
        <div class="row">
            <div class="mb-3 col-md-6">
                <x-label for="qté_liv" :value="__('Quantité livrée')" />
                <x-input type="number" class="block mt-1 w-full" name="qté_liv" id="qte_liv" onkeyup="total()" required autofocus value="{{$p['qté_liv']}}" />
            </div>
            <div class="mb-3 col-md-6">
                <x-label for="prix_fournisseur" :value="__('Prix fixé')" />
                <x-input id="prix_fournisseur" class="block mt-1 w-full" type="number" name="prix_fournisseur" onkeyup="total()" required autofocus value="{{$p['prix_fournisseur']}}"/>
                <span class="text-danger">@error('prix_fournisseur'){{$message}}@enderror</span>
            </div>
        </div>
        <div class="row">
            <div class="mb-3 col-md-6">
                <x-label for="montant_initial" :value="__('Montant Initial')" />
                <x-input id="montant_initial" class="block mt-1 w-full" type="number" name="montant_initial" readonly="readonly" required autofocus value="{{$p['montant_initial']}}" />
                <span class="text-danger">@error('montant_initial'){{$message}}@enderror</span>
            </div>
            <div class="mb-3 col-md-6">
                <!-- fournisseur -->
                <x-label for="fournisseur_id" :value="__('Fournisseur')" />
                <select name="fournisseur_id" id="" class="form-control" value="{{ $p['fournisseur_id'] }}"><br>
                    <option value="{{ $p->fournisseur_id}}">{{ $p->fournisseur->nom}}</option>
                    @foreach($fournisseur as $c)
                    <option value="{{ $c->id }}">{{ $c->nom}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row">
            <div class="mb-3 col-md-6">
                <x-label for="date_liv" :value="__('Date de fournisseur')" />
                <x-input type="date" class="block mt-1 w-full" name="date_liv" id="date_liv" required autofocus value="{{$p['date_liv']}}" />
            </div>
            <div class="mb-3 col-md-6">
                <x-label for="heure_liv" :value="__('Heure de fournisseur')" />
                <x-input type="datetime" class="block mt-1 w-full" name="heure_liv" id="heure_liv" required autofocus value="{{$p['heure_liv']}}" />
            </div>
        </div>
    </div>
    <script>
            function total() {
                var prix = document.getElementById('prix_fournisseur').value;
                var quantites = document.getElementById('qte_liv').value;
                var totalIn = document.getElementById('montant_initial');
                var totalInitial = parseFloat(prix) * parseFloat(quantites);
                totalIn.value = isNaN(totalInitial) ? "0.00" : totalInitial.toFixed(2);
            }
        </script>
    <script>
                $('#num_livraison').on('change keyup', function() {
                    //Remove invalid characters
                    var sanitized = $(this).val().replace(/[^0-9]/g, '');
                    //Update value
                    $(this).val(sanitized);
                });
            </script>
            <script>
                $('#prix_fournisseur').on('change keyup', function() {
                    //Remove invalid characters
                    var sanitized = $(this).val().replace(/[^0-9]/g, '');
                    //Update value
                    $(this).val(sanitized);
                });
            </script>
            <script>
                $('#qté_liv').on('change keyup', function() {
                    //Remove invalid characters
                    var sanitized = $(this).val().replace(/[^0-9]/g, '');
                    //Update value
                    $(this).val(sanitized);
                });
            </script>
</x-guest-layout>