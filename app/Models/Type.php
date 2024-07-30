<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    //? mass update:
    protected $guarded = ['id'];

    //? in Type creo relazione uno a molti con Projects:
    public function projects()
    {   
        return $this->hasMany(Project::class);
    }
}
