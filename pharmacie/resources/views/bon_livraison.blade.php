<x-guest-layout>
    <br>
    <div class="row">
        <div>
            <div class="row">
                <div class="mb-3 col-md-6">
                    <!-- produit -->
                    <x-label for="produit_id" :value="__('Produit concerné')" />
                    <select name="produit_id" id="" class="form-control"><br>
                        <option value=""></option>
                        @foreach($produit as $p)
                        <option value="{{ $p->id }}">{{ $p->nom_commercial}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3 col-md-6">
                    <x-label for="num_livraison" :value="__('Numéro de livraison')" />
                    <x-input id="num_livraisonss" class="block mt-1 w-full" type="number" name="num_livraison" required autofocus />
                    <span class="text-danger">@error('num_livraison'){{$message}}@enderror</span>
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col-md-6">
                    <x-label for="qté_liv" :value="__('Quantité livrée')" />
                    <x-input id="qte_livs" class="block mt-1 w-full" type="number" name="qté_liv" onkeyup="total()" required autofocus />
                    <span class="text-danger">@error('qté_liv'){{$message}}@enderror</span>
                </div>
                <div class="mb-3 col-md-6">
                    <x-label for="prix_fournisseur" :value="__('Prix fixé')" />
                    <x-input id="prix_fournisseurss" class="block mt-1 w-full" type="number" name="prix_fournisseur" onkeyup="total()" required autofocus />
                    <span class="text-danger">@error('prix_fournisseur'){{$message}}@enderror</span>
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col-md-6">
                    <!-- fournisseur -->
                    <x-label for="fournisseur_id" :value="__('Fournisseur')" />
                    <select name="fournisseur_id" id="" class="form-control"><br>
                        <option value=""></option>
                        @foreach($fournisseur as $l)
                        <option value="{{ $l->id }}">{{ $l->nom}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3 col-md-6">
                    <x-label for="montant_initial" :value="__('Montant')" />
                    <x-input id="montant_initials" class="block mt-1 w-full" type="number" name="montant_initial" readonly="readonly" required autofocus />
                    <span class="text-danger">@error('montant_initial'){{$message}}@enderror</span>
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col-md-6">
                    <x-label for="date_liv" :value="__('Date de livraison')" />
                    <x-input id="date_liv" class="block mt-1 w-full" type="date" name="date_liv" required autofocus />
                    <span class="text-danger">@error('date_liv'){{$message}}@enderror</span>
                </div>
                <div class="mb-3 col-md-6">
                    <x-label for="heure_liv" :value="__('Heure de livraison')" />
                    <x-input id="heure_liv" class="block mt-1 w-full" type="time" name="heure_liv" required autofocus />
                    <span class="text-danger">@error('heure_liv'){{$message}}@enderror</span>
                </div>
            </div>
        </div>
        <script>
            function total() {
                var prix = document.getElementById('prix_fournisseurs').value;
                var quantites = document.getElementById('qte_livs').value;
                var totalIn = document.getElementById('montant_initials');
                var totalInitial = parseFloat(prix) * parseFloat(quantites);
                totalIn.value = isNaN(totalInitial) ? "0.00" : totalInitial.toFixed(2);
            }
        </script>
        <script>
            $('#prix_fournisseurss').on('change keyup', function() {
                //Remove invalid characters
                var sanitized = $(this).val().replace(/[^0-9]/g, '');
                //Update value
                $(this).val(sanitized);
            });
        </script>
        <script>
            $('#qte_livs').on('change keyup', function() {
                //Remove invalid characters
                var sanitized = $(this).val().replace(/[^0-9]/g, '');
                //Update value
                $(this).val(sanitized);
            });
        </script>
        <script>
            $('#num_livraisonss').on('change keyup', function() {
                //Remove invalid characters
                var sanitized = $(this).val().replace(/[^0-9]/g, '');
                //Update value
                $(this).val(sanitized);
            });
        </script>
    </div>
</x-guest-layout>