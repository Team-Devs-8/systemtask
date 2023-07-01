<?php

namespace App\Enums;

enum Prioridad:string{
    case BAJA = 'baja';
    case MEDIA = 'media';
    case ALTA = 'alta';
    case URGENTE = 'urgente';
}
