<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Tarea;

class Tareas extends Component
{
    public $tareas;
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
        $this->tareas = Tarea::all();
        return view('livewire.tareas');
    }
}
