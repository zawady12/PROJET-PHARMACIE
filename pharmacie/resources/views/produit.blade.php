<script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/webrtc-adapter/3.3.3/adapter.min.js"></script>
<x-guest-layout>
    <div class="container" style="width: 4000px; height:600px">
        <div class="row">
            <div class="col-xl-3 col-md-5 mb-4">
                <video id="preview" width="100%"></video>
                <br>
                <center><span>Veuillez scanner le QR Code <i class="bi bi-qr-code-scan"></i></span></center>
            </div>
            <div class="col-xl-3 col-md-5 mb-4">
                <div class="" style="width: 700px;">
                    <div class="container" style="width: 70%; height:700px">
                        <br>
                        <br>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <x-label for="nom_commercial" :value="__('Nom commercial')" />
                                <x-input id="nom_commer" class="block mt-1 w-full" type="text" name="nom_commercial" required autofocus />
                                <span class="text-danger">@error('nom_commercial'){{$message}}@enderror</span>
                            </div>
                            <div class="mb-3 col-md-6">
                                <x-label for="dci" :value="__('DCI')" />
                                <x-input id="dcis" class="block mt-1 w-full" type="text" name="dci" required autofocus />
                                <span class="text-danger">@error('dci'){{$message}}@enderror</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <x-label for="prix" :value="__('Prix')" />
                                <x-input id="prix_" class="block mt-1 w-full" type="number" name="prix" required autofocus />
                                <span class="text-danger">@error('prix'){{$message}}@enderror</span>
                            </div>
                            <div class="mb-3 col-md-6">
                                <x-label for="date_fabrication" :value="__('Date de fabrication')" />
                                <x-input id="date_fabrications" class="block mt-1 w-full" type="date" name="date_fabrication" required autofocus />
                                <span class="text-danger">@error('date_fabrication'){{$message}}@enderror</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <x-label for="date_peremption" :value="__('Date de peremption')" />
                                <x-input id="date_peremptions" class="block mt-1 w-full" type="date" name="date_peremption" required autofocus />
                                <span class="text-danger">@error('date_peremption'){{$message}}@enderror</span>
                            </div>
                            <div class="mb-3 col-md-6">
                                <x-label for="qnté_stockée" :value="__('Quantité')" />
                                <x-input id="qnte_stockée" class="block mt-1 w-full" type="number" name="qnté_stockée" required />
                                <span class="text-danger">@error('qnté_stockée'){{$message}}@enderror</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <x-label for="categorie_id" :value="__('Categorie')" />
                                <select name="categorie_id" id="" class="form-control"><br>
                                    <option value=""></option>
                                    @foreach($categorie as $c)
                                    <option value="{{ $c->id }}">{{ $c->type}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3 col-md-6">
                                <x-label for="etagere" :value="__('Etagère')" />
                                <x-input id="etagere" class="block mt-1 w-full" type="text" name="etagere" required autofocus />
                                <span class="text-danger">@error('etagere'){{$message}}@enderror</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <x-label for="type" :value="__('Type')" />
                                <x-input id="types" class="block mt-1 w-full" type="text" name="type" required autofocus />
                                <span class="text-danger">@error('type'){{$message}}@enderror</span>
                            </div>
                        </div>
                    <div class="d-grid gap-2">
                        <button class="btn btn-primary">Sauvegarder</button>
                    </div>

                </div>
            </div>
        </div>

        <script>
            let scanner = new Instascan.Scanner({
                video: document.getElementById('preview')
            });
            Instascan.Camera.getCameras().then(function(cameras) {
                if (cameras.length > 0) {
                    scanner.start(cameras[0]);
                } else {
                    alert('Aucune caméras détéctée')
                }
            }).catch(function(e) {
                console.error(e);
            });
            scanner.addListener('scan', function(c) {
                const values = c.split(";");
                const nom_commercial = values[0];
                const dci = values[1];
                const prix = values[2];
                const date_fabrication = values[3];
                const date_peremption = values[4];
                const type = values[5];

                document.getElementById('nom_commer').value = nom_commercial;
                document.getElementById('dcis').value = dci;
                document.getElementById('prix_').value = prix;
                document.getElementById('date_fabrications').value = date_fabrication;
                document.getElementById('date_peremptions').value = date_peremption;
                document.getElementById('types').value = type;
            });
        </script>

        <script>
            $('#prix_').on('change keyup', function() {
                //Remove invalid characters
                var sanitized = $(this).val().replace(/[^0-9]/g, '');
                //Update value
                $(this).val(sanitized);
            });
        </script>

        <script>
            $('#qnte_stockée').on('change keyup', function() {
                //Remove invalid characters
                var sanitized = $(this).val().replace(/[^0-9]/g, '');
                //Update value
                $(this).val(sanitized);
            });
        </script>
    </div>
    </div>
</x-guest-layout>