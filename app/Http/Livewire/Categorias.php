<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;

class Categorias extends Component
{
    public $categorias;
    public $title;
    public $descripcion;
    public $category_id;
    public $modal = false;


    public function render()
    {
        $this->categorias = Category::all();
        return view('livewire.categorias');
    }

    public function crearCategoria()
    {
        $this->limpiarInputs();
        $this->abrirModal();
    }

    public function abrirModal()
    {
        $this->modal = true;
    }

    public function cerrarModal()
    {
        $this->modal = false;
    }

    public function limpiarInputs()
    {
        $this->title = '';
        $this->descripcion = '';
    }

    public function editarCategoria($id)
    {
        $category = Category::findOrFail($id);
        $this->category_id = $id;
        $this->title = $category->title;
        $this->descripcion = $category->descripcion;
        $this->abrirModal();
    }

    public function eliminarCategoria($id)
    {
        Category::find($id)->delete();
        session()->flash('message', 'Categoría eliminada correctamente');
    }

    public function guardarCategoria()
    {
        Category::updateOrCreate(['id'=>$this->category_id],
            [
                'title' => $this->title,
                'descripcion' => $this->descripcion
            ]);

         session()->flash('message',
            $this->category_id ? '¡Actualización exitosa!' : 'Registro Exitoso!');

         $this->cerrarModal();
         $this->limpiarInputs();
    }
}
