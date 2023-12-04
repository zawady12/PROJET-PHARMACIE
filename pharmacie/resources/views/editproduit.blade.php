<x-guest-layout>
    <input type="hidden" name="id" value="{{$prod->id}}">
    <div class="container" style="width: 100%; height:500px">
        <br>
        <div class="row">
            <div class="mb-3 col-md-6">
                <x-label for="nom_commercial" :value="__('Nom commercial')" />
                <x-input type="text" id="nom_commercial" class="block mt-1 w-full" name="nom_commercial" required autofocus value="{{$prod['nom_commercial']}}" />
            </div>
            <div class="mb-3 col-md-6">
                <x-label for="dci" :value="__('DCI')" />
                <x-input type="text" class="block mt-1 w-full" id="dci" name="dci" required autofocus value="{{$prod['dci']}}" />
            </div>
        </div>
        <div class="row">
            <div class="mb-3 col-md-6">
                <x-label for="prix" :value="__('Prix')" />
                <x-input type="number" class="block mt-1 w-full" name="prix" id="prix" required autofocus value="{{$prod['prix']}}" />
            </div>
            <div class="mb-3 col-md-6">
                <x-label for="date_fabrication" :value="__('Date de fabrication')" />
                <x-input type="date" class="block mt-1 w-full" name="date_fabrication" id="date_fabrication" required autofocus value="{{$prod['date_fabrication']}}" />
            </div>
        </div>
        <div class="row">
            <div class="mb-3 col-md-6">
                <x-label for="date_peremption" :value="__('Date de peremption')" />
                <x-input type="date" class="block mt-1 w-full" name="date_peremption" id="date_peremption" required autofocus value="{{$prod['date_peremption']}}" />
            </div>
            <div class="mb-3 col-md-6">
                <x-label for="qnté_stockée" :value="__('Quantité stockée')" />
                <x-input type="number" class="block mt-1 w-full" name="qnté_stockée" id="qnté_stockée" required autofocus value="{{$prod['qnté_stockée']}}" />
            </div>
        </div>
        <div class="row">
            <div class="mb-3 col-md-6">
                <!-- categorie -->
                <x-label for="categorie_id" :value="__('Catégorie')" />
                <select name="categorie_id" id="" class="form-control" value="{{ $prod['categorie_id'] }}"><br>
                    <option value="{{ $prod->categorie_id}}">{{ $prod->categorie->type}}</option>
                    @foreach($categorie as $r)
                    <option value="{{ $r->id }}">{{ $r->type}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3 col-md-6">
                <x-label for="etagere" :value="__('Etagère')" />
                <x-input type="text" class="block mt-1 w-full" name="etagere" id="etagere" required autofocus value="{{$prod['etagere']}}" />
            </div>
        </div>
        <div class="row">
            <div class="mb-3 col-md-6">
                <x-label for="type" :value="__('Type')" />
                <x-input type="text" class="block mt-1 w-full" name="type" id="type" required autofocus value="{{$prod['type']}}" />
            </div>
        </div>
    </div>
    <script>
        $('#prix').on('change keyup', function() {
            //Remove invalid characters
            var sanitized = $(this).val().replace(/[^0-9]/g, '');
            //Update value
            $(this).val(sanitized);
        });
    </script>
    <script>
        $('#qnté_stockée').on('change keyup', function() {
            //Remove invalid characters
            var sanitized = $(this).val().replace(/[^0-9]/g, '');
            //Update value
            $(this).val(sanitized);
        });
    </script>
</x-guest-layout>