<?php

namespace App\entity;

enum StatutEnum: string {
    case PAYE = 'paye';
    case IMPAYE = 'impaye';
}