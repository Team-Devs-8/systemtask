<?php

namespace App\Enums;

enum PrioridadTarea: string {
    case BAJA = 'baja';
    case MEDIA = 'media';
    case ALTA = 'alta';
    case URGENTE = 'urgente';
}

