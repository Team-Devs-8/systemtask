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
    public $prioridad;
    public $set_at;
    public $finish_at;
    public $tarea_id;
    public $modal = false;

    public function render()
    {
        //$this->tareas = Tarea::all();
        return view('livewire.tareas',['tareas' => Tarea::paginate(5)]);
        //return view('livewire.tareas');
    }
}
