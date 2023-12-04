<x-guest-layout>
    <br>
    <div class="row">
        <div>
            <div class="row">
                
                <div class="mb-3 col-md-6">
                    <x-label for="num_vente" :value="__('Numéro de vente')" />
                    <x-input id="num_vente" class="block mt-1 w-full" type="number" name="num_vente" required autofocus />
                    <span class="text-danger">@error('num_vente'){{$message}}@enderror</span>
                </div>
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
            </div>
            <div class="row">
            <div class="mb-3 col-md-6">
                    <x-label for="prix_vente" :value="__('Prix vente')" />
                    <x-input id="prix_vente" class="block mt-1 w-full" type="number" name="prix_vente" onkeyup="total()" required autofocus />
                    <span class="text-danger">@error('prix_vente'){{$message}}@enderror</span>
                </div>
                <div class="mb-3 col-md-6">
                    <x-label for="qnté_vendu" :value="__('Quantité vendue')" />
                    <x-input id="qnté_vendu" class="block mt-1 w-full" type="number" name="qnté_vendu" onkeyup="total()" required autofocus />
                    <span class="text-danger">@error('qnté_vendu'){{$message}}@enderror</span>
                </div>   
            </div>
            <div class="row">
            <div class="mb-3 col-md-6">
                    <x-label for="montant" :value="__('Montant')" />
                    <x-input id="mont" class="block mt-1 w-full" type="number" name="montant"  readonly="readonly" required autofocus />
                    <span class="text-danger">@error('montant'){{$message}}@enderror</span>
                </div>
                <div class="mb-3 col-md-6">
                    <x-label for="date_vente" :value="__('Date de vente')" />
                    <x-input id="date_vente" class="block mt-1 w-full" type="date" name="date_vente" required autofocus />
                    <span class="text-danger">@error('date_vente'){{$message}}@enderror</span>
                </div>
            </div>
            <div class="row">
            <div class="mb-3 col-md-6">
                    <x-label for="libelle" :value="__('Description')" />
                    <x-input id="libelle" class="block mt-1 w-full" type="text" name="libelle" required autofocus />
                    <span class="text-danger">@error('libelle'){{$message}}@enderror</span>
                </div>
                <div class="mb-3 col-md-6">
                    <!-- user -->
                    <x-label for="user_id" :value="__('Transactionnaire')" />
                    <select name="user_id" id="" class="form-control"><br>
                        <option value=""></option>
                        @foreach($user as $l)
                        <option value="{{ $l->id }}">{{ $l->name}}</option>
                        @endforeach
                    </select>
                </div>
                
            </div>
        </div>
        <script>
            function total() {
                var prix = document.getElementById('prix_vente').value;
                var quantites = document.getElementById('qnté_vendu').value;
                console.log(prix)
                var totalIn = document.getElementById('mont');
                var totalInitial = parseFloat(prix) * parseFloat(quantites);
                totalIn.value = isNaN(totalInitial) ? "0.00" : totalInitial.toFixed(2);
            }
        </script>
         <script>
                $('#num_vente').on('change keyup', function() {
                    //Remove invalid characters
                    var sanitized = $(this).val().replace(/[^0-9]/g, '');
                    //Update value
                    $(this).val(sanitized);
                });
            </script>
            <script>
                $('#prix_vente').on('change keyup', function() {
                    //Remove invalid characters
                    var sanitized = $(this).val().replace(/[^0-9]/g, '');
                    //Update value
                    $(this).val(sanitized);
                });
            </script>
            <script>
                $('#qnté_vendu').on('change keyup', function() {
                    //Remove invalid characters
                    var sanitized = $(this).val().replace(/[^0-9]/g, '');
                    //Update value
                    $(this).val(sanitized);
                });
            </script>
    </div>
</x-guest-layout>