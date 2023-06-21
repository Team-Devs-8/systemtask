<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    use HasFactory;
    protected $table= 'categories';
    protected $fillable = ['titulo','descripcion','estado','prioridad','set_at','finish_at'];

    public function categorias(){
        return $this->belongsTo(Category::class, 'id');
    }
}
