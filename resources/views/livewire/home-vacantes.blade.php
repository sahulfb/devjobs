<div>

    <livewire:filtrar-vacantes/>

    <div class="py-12">
        <div class="max-w-7xl mx-auto">
            <h3 class="font-extrabold mb-12 text-3xl text-gray-700">Nuestras Vacantes Disponibles</h3>
            <div class="bg-white shadow-sm rounded-lg p-6 divide-y divide-gray-200">
                @forelse ($vacantes as $vacante)
                    <div class="md:flex md:justify-between md:items-center py-5">
                        <div class="md:flex-1">
                            <a href="{{route('vacantes.show', $vacante->id)}}" class="font-extrabold text-2xl text-gray-600">
                                {{$vacante->titulo}}
                            </a>
                            <p class="text-base text-gray-600 mb-1">{{$vacante->empresa}}</p>
                            <p class="text-base text-gray-600 mb-1">{{$vacante->categoria->categoria}}</p>
                            <p class="text-base text-gray-600 mb-1">{{$vacante->salario->salario}}</p>
                            <p class="font-bold text-xs text-gray-600">Ultimo dia para postularse: <span class="font-normal">{{$vacante->ultimo_dia->format('d/m/Y')}}</span></p>
                        </div>

                        <div class="mt-5 md:mt-0">
                            <a href="{{route('vacantes.show', $vacante->id)}}" class="bg-indigo-500 p-3 text-sm font-bold text-white uppercase rounded-lg hover:bg-indigo-600 block text-center">
                                Ver Vacante</a>
                        </div>
                    </div>
                @empty
                    <p class="p-3 text-center text-gray-600 text-sm">No hay vacantes aun</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
