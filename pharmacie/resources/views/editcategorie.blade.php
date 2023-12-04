<x-guest-layout>
    <input type="hidden" name="id" value="{{$cat->id}}">
    <div class="container" style="width: 100%; height:200px">
        <br>
        <br>
        <div class="mb-5">
            <x-label for="type" :value="__('Type')" />
            <x-input id="type" class="block mt-1 w-full" type="text" name="type" required autofocus value="{{$cat['type']}}" />
        </div>
    </div>
</x-guest-layout>