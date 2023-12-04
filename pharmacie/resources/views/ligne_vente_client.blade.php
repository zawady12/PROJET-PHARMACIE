<x-guest-layout>
<input type="hidden" name="id" value="{{$v->id}}">
    <br>
    <div class="row">
        <div>
            <div class="row">
                <div class="mb-3 col-md-6">
                    <x-label for="vente_id" :value="__('Numéro de vente')" />
                    <x-input id="vente_id" class="block mt-1 w-full" type="number" name="vente_id" readonly="readonly" required autofocus value="{{ $v['num_vente'] }}"/>
                    <span class="text-danger">@error('vente_id'){{$message}}@enderror</span>
                </div>
                <div class="mb-3 col-md-6">
                    <!-- client -->
                    <x-label for="client_id" :value="__('Client')" />
                    <select name="client_id" id="" class="form-control"><br>
                        <option value=""></option>
                        @foreach($client as $l)
                        <option value="{{ $l->id }}">{{ $l->nom}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <center>
                <div class="mb-3 col-md-6">
                    <x-label for="montant" :value="__('Montant')" />
                    <x-input id="montant" class="block mt-1 w-full" type="number" name="montant" readonly="readonly" required autofocus value="{{ $v['montant'] }}"/>
                    <span class="text-danger">@error('montant'){{$message}}@enderror</span>
                </div>
                </center>
            </div>
        </div>
    </div>
    <script>
                $('#vente_id').on('change keyup', function() {
                    //Remove invalid characters
                    var sanitized = $(this).val().replace(/[^0-9]/g, '');
                    //Update value
                    $(this).val(sanitized);
                });
            </script>
</x-guest-layout>