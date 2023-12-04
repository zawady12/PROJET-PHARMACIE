<x-guest-layout>
    <input type="hidden" name="id" value="{{$p->id}}">
    <div class="container" style="width: 100%; height:490px">
        <br>
        <div class="row">
            <div>
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <x-label for="num_livraison" :value="__('Numéro de livraison')" />
                        <x-input type="number" class="block mt-1 w-full" name="num_livraison" readonly id="num_livraisons" required autofocus value="{{$p['num_livraison']}}" />
                    </div>
                    <div class="mb-3 col-md-6">
                        <x-label for="qté_liv" :value="__('Quantité livrée')" />
                        <x-input type="number" class="block mt-1 w-full" name="qté_liv" readonly id="qte_liv" required autofocus value="{{$p['qté_liv']}}" />
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <x-label for="montant_initial" :value="__('Montant Initial')" />
                        <x-input type="number" class="block mt-1 w-full" name="montant_initial" id="montant_initiale" readonly required autofocus value="{{$p['montant_initial']}}" />
                    </div>
                    <div class="mb-3 col-md-6">
                        <x-label for="qté_retour" :value="__('Quantité retournée')" />
                        <x-input id="qtes_retour" class="block mt-1 w-full" type="number" name="qté_retour" onkeyup="total1()" required autofocus />
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <x-label for="montant_retour" :value="__('Montant Final')" />
                        <x-input id="montant_retours" class="block mt-1 w-full" type="number" name="montant_retour" readonly required autofocus />
                    </div>
                    <div class="mb-3 col-md-6">
                        <x-label for="prix_fournisseur" :value="__('Prix fixé')" />
                        <x-input id="prix_fournisseurs" class="block mt-1 w-full" type="number" name="prix_fournisseur" readonly required autofocus value="{{$p['prix_fournisseur']}}" />
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <!-- fournisseur -->
                        <x-label for="fournisseur_id" :value="__('Fournisseur')" />
                        <select name="fournisseur_id" id="" class="form-control" value="{{ $p['fournisseur_id'] }}"><br>
                            <option value="{{ $p->fournisseur_id }}">{{ $p->fournisseur->nom}}</option>
                            @foreach($fournisseur as $c)
                            <option value="{{ $c->id }}">{{ $c->nom}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3 col-md-6">
                        <x-label for="date_liv" :value="__('Date de fournisseur')" />
                        <x-input type="date" class="block mt-1 w-full" name="date_liv" id="date_liv" readonly required autofocus value="{{$p['date_liv']}}" />
                    </div>
                </div>
                <div class="row">
                    <center>
                        <div class="mb-3 col-md-7">
                            <x-label for="motif" :value="__('Motif de retour')" />
                            <x-input type="text" class="block mt-1 w-full" name="motif" id="motif" required autofocus />
                        </div>
                    </center>
                </div>
            </div>
            <script>
                function total1() {
                    var prix = document.getElementById('prix_fournisseurs').value;
                    var quantites = document.getElementById('qtes_retour').value;
                    var totalIn = document.getElementById('montant_retours');
                    console.log(prix)
                    var totalInitial = parseFloat(prix) * parseFloat(quantites);
                    totalIn.value = isNaN(totalInitial) ? "0.00" : totalInitial.toFixed(2);
                }
            </script>
            <script>
                $('#num_livraisons').on('change keyup', function() {
                    //Remove invalid characters
                    var sanitized = $(this).val().replace(/[^0-9]/g, '');
                    //Update value
                    $(this).val(sanitized);
                });
            </script>
            <script>
                $('#qte_liv').on('change keyup', function() {
                    //Remove invalid characters
                    var sanitized = $(this).val().replace(/[^0-9]/g, '');
                    //Update value
                    $(this).val(sanitized);
                });
            </script>
            <script>
                $('#qtes_retour').on('change keyup', function() {
                    //Remove invalid characters
                    var sanitized = $(this).val().replace(/[^0-9]/g, '');
                    //Update value
                    $(this).val(sanitized);
                });
            </script>
            <script>
                $('#prix_fournisseurs').on('change keyup', function() {
                    //Remove invalid characters
                    var sanitized = $(this).val().replace(/[^0-9]/g, '');
                    //Update value
                    $(this).val(sanitized);
                });
            </script>
        </div>
    </div>
</x-guest-layout>