<x-guest-layout>
    <br>
    <div class="row">
        <div>
            <div class="row">
            <div class="mb-3 col-md-6">
                <x-label for="num_commande" :value="__('Numero de commande')" />
                <x-input type="number" class="block mt-1 w-full" name="num_commande" id="num_commandes" required autofocus/>
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
                    <x-label for="qnté_commandée" :value="__('Quantité voulue')" />
                    <x-input id="qnte_commandée" class="block mt-1 w-full" type="number" name="qnté_commandée" required autofocus />
                    <span class="text-danger">@error('qnté_commandée'){{$message}}@enderror</span>
                </div>
                <div class="mb-3 col-md-6">
                    <x-label for="date_commande" :value="__('Date de commande')" />
                    <x-input id="date_commande" class="block mt-1 w-full" type="date" name="date_commande" required autofocus />
                    <span class="text-danger">@error('date_commande'){{$message}}@enderror</span>
                </div>
            </div>
            <div class="row">
            <div class="mb-3 col-md-6">
                <x-label for="description" :value="__('Description')" />
                <x-input type="text" class="block mt-1 w-full" name="description" id="description" required autofocus/>
            </div>
                <div class="mb-3 col-md-6">
                    <!-- user -->
                    <x-label for="user_id" :value="__('Transactionnaire')" />
                    <select name="user_id" id="" class="form-control"><br>
                        <option value=""></option>
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
                        <option value=""></option>
                        @foreach($fournisseur as $c)
                        <option value="{{ $c->id }}">{{ $c->nom}}</option>
                        @endforeach
                    </select>
                </div>
            </center>
            </div>
        </div>
    </div>
    <script>
                $('#num_commandes').on('change keyup', function() {
                    //Remove invalid characters
                    var sanitized = $(this).val().replace(/[^0-9]/g, '');
                    //Update value
                    $(this).val(sanitized);
                });
            </script>
             <script>
                $('#qnte_commandée').on('change keyup', function() {
                    //Remove invalid characters
                    var sanitized = $(this).val().replace(/[^0-9]/g, '');
                    //Update value
                    $(this).val(sanitized);
                });
            </script>
</x-guest-layout>