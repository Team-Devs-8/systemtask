<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    use HasFactory;
    protected $table= 'tareas';
    protected $fillable = ['titulo','descripcion','estado','prioridad','category_id','set_at','finish_at'];

    public function categorias(){
        return $this->belongsTo(Category::class, 'category_id');
    }

    protected $casts = [
        'prioridad' => Prioridad::class
    ];
}
