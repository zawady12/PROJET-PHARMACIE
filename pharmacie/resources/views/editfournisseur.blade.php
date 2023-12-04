<x-guest-layout>
  <input type="hidden" name="id" value="{{$f->id}}">
  <div class="container" style="width: 100%; height:300px">
    <br>
    <br>
    <div class="row">
      <div class="mb-3 col-md-6">
        <x-label for="nom" :value="__('Nom')" />
        <x-input type="text" id="nom" class="block mt-1 w-full" name="nom" required autofocus value="{{$f['nom']}}" />
      </div>
      <div class="mb-3 col-md-6">
        <x-label for="prenom" :value="__('Prenom')" />
        <x-input type="text" class="block mt-1 w-full" id="prenom" name="prenom" required autofocus value="{{$f['prenom']}}"/>
      </div>
    </div>
    <div class="row">
      <div class="mb-3 col-md-6">
        <x-label for="tel" :value="__('Numéro de telephone')" />
        <x-input type="text" class="block mt-1 w-full" name="tel" id="tel" required autofocus value="{{$f['tel']}}"/>
      </div>
      <div class="mb-3 col-md-6">
        <x-label for="adresse" :value="__('Adresse')"/>
        <x-input type="text" class="block mt-1 w-full" name="adresse" id="adresse" required autofocus value="{{$f['adresse']}}"/>
      </div>
    </div>
  </div>
</x-guest-layout>