<x-guest-layout>
  <div class="row">
    <div class="container" style="width: 400px; height:200px">
      <br>
      <div class="mb-3">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <x-label for="type" :value="__('Type')" />
        <x-input id="type_" class="block mt-1 w-full" type="text" name="type" required autofocus  />
        <span class="text-danger">@error('type'){{$message}}@enderror</span>
      </div>
    </div>
  </div>
 
</x-guest-layout>
<!-- <script>
    let valeurElts = document.getElementById("type_");
    valeurElts.addEventListener('input', function (evt) {
    let type = valeurElts.value;
    if (type.length > 0) {
        const numValeur = type[type.length - 1];
        if (/[a-zA-Z-']/.test(numValeur) == false) {
            valeurElts.value = type.slice(0,-1);
        }
    }
});
</script> -->