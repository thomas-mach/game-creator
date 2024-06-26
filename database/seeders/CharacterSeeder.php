<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Character;
use App\Models\User;
use App\Models\Item;

use Faker\Generator as Faker; 

class CharacterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        // DB::table('characters')->truncate();
        $items_ids = Item::all()->pluck('id')->all();

        for ($i = 0; $i < 20; $i++){
            
            $new_character = new Character();
            $new_character->name = $faker->name();
            $new_character->description = $faker->text();
            $new_character->type_id = $faker->numerify('#####');
            $new_character->attack = $faker->numberBetween(1,100);
            $new_character->defence = $faker->numberBetween(1,100);
            $new_character->speed = $faker->numberBetween(1,100);
            $new_character->life = $faker->numberBetween(1,100);
            $new_character->user_id = User::inRandomOrder()->first()->id;

            $new_character->save();

            $new_character->items()->attach($faker->randomElements($items_ids,null));
          
        };
    }
}
