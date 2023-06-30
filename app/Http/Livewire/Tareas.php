<?php

namespace App\Http\Livewire;

use Livewire\WithPagination;
use Livewire\Component;
use App\Models\Tarea;


class Tareas extends Component
{
    use WithPagination;
    public $categoria_id;
    public $titulo;
    public $descripcion;
    public $estado;
    public $prioridad;
    public $selectedPrioridad;
    public $set_at;
    public $finish_at;
    public $tarea_id;
    public $modal = false;
    public $searchTerm = '';

    public function render()
    {
        $results = Tarea::where('titulo', 'like', '%'.$this->searchTerm.'%')
            ->orWhere('descripcion', 'like', '%'.$this->searchTerm.'%')
            ->paginate(5);
        return view('livewire.tareas',['tareas' => $results]);
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
        $this->titulo = '';
        $this->descripcion = '';
        $this->estado = '';
        $this->prioridad = '';
        $this->set_at = '';
        $this->finish_at = '';
    }

    public function crearTarea(){
        $this->limpiarInputs();
        $this->abrirModal();
    }

    public function guardarTarea()
    {
        Tarea::updateOrCreate(['id'=>$this->tarea_id],
            [
                'title' => $this->title,
                'descripcion' => $this->descripcion,
                'estado' => $this->estado,
                'prioridad' => $this->prioridad,
                'set_at' => $this->set_at,
                'finish_at' => $this->finish_at,
            ]);

         session()->flash('message',
            $this->category_id ? '¡Actualización exitosa!' : 'Registro Exitoso!');

         $this->cerrarModal();
         $this->limpiarInputs();
    }

    /* public function mount()
    {
        $this->prioridad = Tarea::getEnumValues('prioridad');
    } */
}
