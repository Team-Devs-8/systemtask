<?php

namespace App\Http\Livewire;

use Livewire\WithPagination;
use Livewire\Component;
use App\Models\Tarea;


class Tareas extends Component
{
    use WithPagination;
    //public $tareas;
    public $titulo;
    public $descripcion;
    public $estado;
    public $prioridades;
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
    }

    public function mount()
    {
        $this->prioridades = Tarea::getEnumValues('prioridad');
    }
}
