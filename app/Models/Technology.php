<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Technology extends Model
{
    use HasFactory;

    //? mass update:
    protected $guarded = ['id'];

    //? creo relazione molti a molti con Project:
    public function projects() 
    {
        return $this->belongsToMany(Project::class);

    }
}
