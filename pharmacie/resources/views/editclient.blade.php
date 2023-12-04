<x-guest-layout>
  <input type="hidden" name="id" value="{{$c->id}}">
  <div class="container" style="width: 100%; height:300px">
    <br>
    <div class="row">
      <div class="mb-3 col-md-6">
        <x-label for="nom" :value="__('Nom')" />
        <x-input type="text" id="nom" class="block mt-1 w-full" name="nom" required autofocus value="{{$c['nom']}}" />
      </div>
      <div class="mb-3 col-md-6">
        <x-label for="prenom" :value="__('Prenom')" />
        <x-input type="text" class="block mt-1 w-full" id="prenom" name="prenom" required autofocus value="{{$c['prenom']}}"/>
      </div>
    </div>
    <div class="row">
      <div class="mb-3 col-md-6">
        <x-label for="tel" :value="__('Numéro de telephone')" />
        <x-input type="text" class="block mt-1 w-full" name="tel" id="tel" required autofocus value="{{$c['tel']}}"/>
      </div>
      <div class="mb-3 col-md-6">
        <x-label for="adresse" :value="__('Adresse')"/>
        <x-input type="text" class="block mt-1 w-full" name="adresse" id="adresse" required autofocus value="{{$c['adresse']}}"/>
      </div>
    </div>
  </div>
</x-guest-layout>