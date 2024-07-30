<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    //? mass update:
    protected $guarded = ['id'];

    // protected $fillable = [''];


    //? in Projects creo relazione molti a uno con Type:
    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    //? creo relazione molti a molti con Technology:
    public function technologies()
    {
        return $this->belongsToMany(Technology::class);
    }
}
