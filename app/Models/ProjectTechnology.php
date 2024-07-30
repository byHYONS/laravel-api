<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectTechnology extends Model
{
    use HasFactory;

    //? diciamo a Laravel di popolare la tabella e per trovare la tabella deve trascurare la regola del prorale 'S':
    protected $table = 'project_technology';
}
