<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use illuminate\Support\Str;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        //? prima di fare una modifica tra tabelle relazionate dobbiamo disattivare relazione:
        Schema::disableForeignKeyConstraints();

        //? svuoto la tabella prima di popolarla, altro metodo per farlo oltre al  DB::table('types')->truncate();
        Type::truncate(); 

        $typologies = ['business to business', 'business to consumer', 'consumer to consumer', 'government', 'no profit'];

        foreach($typologies as $typology) {

            $type = new Type();

            $type->title = $typology;
            $type->slug = Str::of($typology)->slug();

            $type->save();
        }

        //? dopo aver fatto la modifica, riabilitiamo le relazioni fra tabelle:
        Schema::enableForeignKeyConstraints();

    }
}

