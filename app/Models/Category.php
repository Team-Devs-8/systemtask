<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table= 'categories';
    protected $fillable = ['title','descripcion'];

    public function tareas(){
        return $this->hasMany(Tarea::class, 'id');
    }
}
