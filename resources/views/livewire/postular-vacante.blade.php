<div class="bg-gray-100 p-5 mt-10 flex flex-col justify-center items-center">
    <h3 class="text-center text-2xl font-bold my-4">Postularme a esta vacante</h3>

@if ($this->vacante->candidatos()->where('user_id', auth()->user()->id)->count() > 0 && !session()->has('mensaje'))
<p class="border border-red-500 bg-red-100 text-red-700 font-bold uppercase p-2 my-5 rounded-lg">
    ya te postulaste anteriormente
</p>
@else
    @if (session()->has('mensaje'))
        <p class="uppercase text-green-600 border border-green-600 bg-green-100 font-bold p-2 my-5 rounded-lg">
            {{session('mensaje')}}
        </p>
        
    @else
        <form class="w-96 mt-5" wire:submit.prevent="postularme">
            <div class="mb-4">
                <x-input-label for="cv" :value="__('Curriculum o Hoja de Vida (PDF)')" />
                <x-text-input id="cv" class="block mt-1 w-full" type="file" wire:model="cv" accept=".pdf" />
            </div>

            @error('cv')
                <livewire:mostrar-alerta :message="$message" />
            @enderror

            <x-primary-button class="w-full justify-center my-5">
                {{ __('Postularme') }}
            </x-primary-button>
        </form>
    @endif
@endif

</div>
