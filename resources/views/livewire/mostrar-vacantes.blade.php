<div>
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            @forelse ($vacantes as $vacante)
            <div class="p-6 bg-white border-b border-gray-200 md:flex md:justify-between md:items-center">
                <div class="space-y-3">
                    <a href="{{route('vacantes.show', $vacante->id)}}" class="text-xl font-bold">{{$vacante->titulo}}</a>
                    <p class="text-sm text-gray-500 font-bold">{{$vacante->empresa}}</p>
                    <p class="text-sm text-gray-500">Ultimo Dia: {{$vacante->ultimo_dia->format('d/m/Y')}}</p>
                </div>

                <div class="flex flex-col md:flex-row items-stretch gap-3 mt-5 md:mt-0">
                    <a href="{{route('candidatos.index', $vacante)}}" class="bg-slate-800 hover:bg-slate-700 py-2 px-4 rounded-lg text-white text-sm font-bold uppercase text-center">
                        {{$vacante->candidatos->count()}}
                        Candidatos
                    </a>

                    <a href="{{route('vacantes.edit', $vacante->id)}}" class="bg-blue-800 hover:bg-blue-700 py-2 px-4 rounded-lg text-white text-sm font-bold uppercase text-center">
                        Editar
                    </a>

                    <button wire:click="$emit('mostrarAlerta', {{$vacante->id}})" class="bg-red-600 hover:bg-red-500 py-2 px-4 rounded-lg text-white text-sm font-bold uppercase text-center">
                        Eliminar
                    </button>
                </div>
            </div>

            @empty
                <p class="p-3 text-center text-gray-600 text-sm">No hay vacantes que mostrar</p>
            @endforelse
    </div>

    <div class="mt-10">
        {{ $vacantes->links() }}
    </div>
</div>

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    livewire.on('mostrarAlerta', vacanteId => {
        Swal.fire({
            title: '¿Eliminar Vacante?',
            text: "Una vacante eliminada no se puede recuperar",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, ¡eliminar!',
            cancelButtonText: 'Cancelar',
        }).then((result) => {
            if (result.isConfirmed) {
                livewire.emit('eliminarVacante', vacanteId);
                Swal.fire(
                    'Se elmino la vacante',
                    'Elimiando correctamente',
                    'success'
                )
            }
        })
    })
</script>
@endpush
