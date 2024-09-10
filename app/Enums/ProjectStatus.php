<?php

namespace App\Enums;

enum ProjectStatus: string
{
    case OPEN = 'open';
    case IN_PROGRESS = 'in progress';
    case BLOCKED = 'blocked';
    case CANCELLED = 'cancelled';
    case COMPLETED = 'completed';
}
