<div class="py-12">
    <div class="max-w-7x1 mx-auto sm:px6 lg:px-8">
        <div class="b-white overflow-hidden shadow-x1 sm:rounded-lg px-4 py-4">
            <h1>Smart Task</h1>
            <p>Contenido del PDF generado con Livewire y Laravel.</p>

            <table class="table-fixed w-full">
                <thead>
                    <tr class="bg-indigo-600 text-white">
                        <th class="px-4 py-2">ID</th>
                        <th class="px-4 py-2">Nombre</th>
                        <th class="px-4 py-2">Descripción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categorias as $categoria)
                        <tr>
                            <td class="border px-4 py-2 text-white">{{ $categoria->id }}</td>
                            <td class="border px-4 py-2 text-white text-center">{{ $categoria->title }}</td>
                            <td class="border px-4 py-2 text-white text-center">{{ $categoria->descripcion }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>


        </div>
    </div>
</div>
