<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;
use PDF;

class Categorias extends Component
{
    use WithPagination;


    //public $categorias;
    public $title;
    public $descripcion;
    public $category_id;
    public $modal = false;


    public function render()
    {

        return view('livewire.categorias',['categorias' => Category::paginate(5)]);
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

    public function generatePdf()
    {
        $categorias = Category::all();
        $pdf = PDF::loadView('livewire.pdfview', ['categorias' => $categorias])->output();
        return response()->streamDownload(
            fn () => print($pdf),
            "archivo.pdf"
       );
    }
}
