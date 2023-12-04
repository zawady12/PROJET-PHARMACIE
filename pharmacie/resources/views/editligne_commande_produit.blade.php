<x-guest-layout>
    <input type="hidden" name="id" value="{{$prod->id}}">
    <div class="container" style="width: 100%; height:390px">
        <br>
        <div class="row">
            <div class="mb-3 col-md-6">
                <x-label for="num_commande" :value="__('Numero de commande')" />
                <x-input type="number" class="block mt-1 w-full" name="num_commande" id="num_commande" required autofocus value="{{$prod['num_commande']}}" />
            </div>
            <div class="mb-3 col-md-6">
                <!-- produit -->
                <x-label for="produit_id" :value="__('Produit')" />
                <select name="produit_id" id="" class="form-control" value="{{ $prod['produit_id'] }}"><br>
                    <option value="{{ $prod->produit_id}}">{{ $prod->produit->nom_commercial}}</option>
                    @foreach($produit as $r)
                    <option value="{{ $r->id }}">{{ $r->nom_commercial}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row">
            <div class="mb-3 col-md-6">
                <x-label for="qnté_commandée" :value="__('Quantité commandée')" />
                <x-input type="number" class="block mt-1 w-full" name="qnté_commandée" id="qnté_commandée" required autofocus value="{{$prod['qnté_commandée']}}" />
            </div>
            <div class="mb-3 col-md-6">
                <x-label for="date_commande" :value="__('Date de commande')" />
                <x-input type="date" class="block mt-1 w-full" name="date_commande" id="date_commande" required autofocus value="{{$prod['date_commande']}}" />
            </div>
        </div>
        <div class="row">
        <div class="mb-3 col-md-6">
                <x-label for="description" :value="__('Description')" />
                <x-input type="text" class="block mt-1 w-full" name="description" id="description" required autofocus value="{{$prod['description']}}" />
          </div>
            <div class="mb-3 col-md-6">
                <!-- user -->
                <x-label for="user_id" :value="__('Transactionnaire')" />
                <select name="user_id" id="" class="form-control" value="{{ $prod['user_id'] }}"><br>
                    <option value="{{ $prod->user_id}}">{{ $prod->user->name}}</option>
                    @foreach($user as $c)
                    <option value="{{ $c->id }}">{{ $c->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row">
            <center>
                <div class="mb-3 col-md-7">
                    <!-- user -->
                    <x-label for="fournisseur_id" :value="__('Fournisseur')" />
                    <select name="fournisseur_id" id="" class="form-control"><br>
                        <option value="{{ $prod->fournisseur_id}}">{{ $prod->fournisseur->nom}}</option>
                        @foreach($fournisseur as $c)
                        <option value="{{ $c->id }}">{{ $c->nom}}</option>
                        @endforeach
                    </select>
                </div>
            </center>
            </div>
    </div>
    <script>
                $('#num_commande').on('change keyup', function() {
                    //Remove invalid characters
                    var sanitized = $(this).val().replace(/[^0-9]/g, '');
                    //Update value
                    $(this).val(sanitized);
                });
            </script>
             <script>
                $('#qnté_commandée').on('change keyup', function() {
                    //Remove invalid characters
                    var sanitized = $(this).val().replace(/[^0-9]/g, '');
                    //Update value
                    $(this).val(sanitized);
                });
            </script>
</x-guest-layout>