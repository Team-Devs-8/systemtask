
<x-slot name="header">
    <h2 class="text-white">Tareas</h2>
</x-slot>
<div class="py-12">
    <div class="max-w-7x1 mx-auto sm:px6 lg:px-8">
        <div class="b-white overflow-hidden shadow-x1 sm:rounded-lg px-4 py-4">
            <button wire:click="crearTarea()" class="bg-green-500 hover-green-600 text-white font-bold py-2 px-4">Crear tarea</button>
            @if($modal)
                @include('livewire.crearTarea')
            @endif
            <input type="text" wire:model="searchTerm" placeholder="Buscar..." />
            <table class="table-fixed w-full">
                <thead>
                    <tr class="bg-indigo-600 text-white">
                        <th class="px-4 py-2">ID</th>
                        <th class="px-4 py-2">Titulo</th>
                        <th class="px-4 py-2">Descripción</th>
                        <th class="px-4 py-2">Estado</th>
                        <th class="px-4 py-2">Prioridad</th>
                        <th class="px-4 py-2">Inicio</th>
                        <th class="px-4 py-2">Finalizada</th>
                        <th class="px-4 py-2">Categoria</th>
                        <th class="px-4 py-2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tareas as $tarea)
                        <tr>
                            <td class="border px-4 py-2 text-white">{{$tarea->id}}</td>
                            <td class="border px-4 py-2 text-white text-center">{{$tarea->titulo}}</td>
                            <td class="border px-4 py-2 text-white text-center">{{$tarea->descripcion}}</td>
                            <td class="border px-4 py-2 text-white text-center">{{$tarea->estado}}</td>
                            <td class="border px-4 py-2 text-white text-center">{{$tarea->prioridad}}</td>
                            <td class="border px-4 py-2 text-white text-center">{{$tarea->set_at}}</td>
                            <td class="border px-4 py-2 text-white text-center">{{$tarea->finish_at}}</td>
                            <td class="border px-4 py-2 text-white text-center">{{optional($tarea->categorias)->title}}</td>
                            <td class="border px-4 py-2 text-white text-center">
                                <button wire:click="editarTarea({{$tarea->id}})" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4">Editar</button>
                                <button wire:click="eliminarTarea({{$tarea->id}})" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4">Borrar</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{$tareas->links()}}
        </div>
    </div>
</div>
