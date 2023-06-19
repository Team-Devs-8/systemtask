<x-slot name="header">
    <h2 class="text-white">Categorías</h2>
</x-slot>
<div class="py-12">
    <div class="max-w-7x1 mx-auto sm:px6 lg:px-8">
        <div class="b-white overflow-hidden shadow-x1 sm:rounded-lg px-4 py-4">
            @if(session()->has('message'))
            <div class="bg-teal-100 rounded-b text-teal-900 px-4 py-4 shadow-md my-3" role="alert">
                <div class="flex">
                    <div>
                        <h4>{{ session('message')}}</h4>
                    </div>
                </div>
            </div>
            @endif
            <button wire:click="crearCategoria()" class="bg-green-500 hover-green-600 text-white font-bold py-2 px-4">Crear categoría</button>
            @if($modal)
                @include('livewire.crearCategoria')
            @endif
            <table class="table-fixed w-full">
                <thead>
                    <tr class="bg-indigo-600 text-white">
                        <th class="px-4 py-2">ID</th>
                        <th class="px-4 py-2">Nombre</th>
                        <th class="px-4 py-2">Descripción</th>
                        <th class="px-4 py-2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categorias as $categoria)
                        <tr>
                            <td class="border px-4 py-2 text-white">{{$categoria->id}}</td>
                            <td class="border px-4 py-2 text-white text-center">{{$categoria->title}}</td>
                            <td class="border px-4 py-2 text-white text-center">{{$categoria->descripcion}}</td>
                            <td class="border px-4 py-2 text-white text-center">
                                <button wire:click="editarCategoria({{$categoria->id}})" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4">Editar</button>
                                <button wire:click="eliminarCategoria({{$categoria->id}})" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4">Borrar</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{$categorias->links()}}
        </div>
    </div>
</div>
