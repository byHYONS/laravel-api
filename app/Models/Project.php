<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Project extends Model
{
    use HasFactory;

    //? mass update:
    protected $guarded = ['id'];

    // protected $fillable = [''];

    //? appendiamo un nuovo campo per le immagini:
    protected $appends = ['image_frontend'];

    //? con mutators & casting creiamo un nuovo campo per le immagini:
    protected function imageFrontend(): Attribute
    {
        return new Attribute(
            get: fn() => env('APP_FRONTEND_IMG_URL', 'http.//localhost') . $this->image,
        );
    }


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
