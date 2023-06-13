<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subtarea extends Model
{
    use HasFactory;
    protected $fillable = ['titulo','descripcion','estado','prioridad','set_at','finish_at'];
}
