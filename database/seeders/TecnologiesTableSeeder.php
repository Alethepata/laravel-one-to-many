<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Tecnology;
use Faker\Generator as Faker;

class TecnologiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i = 0; $i < 5; $i++){
            $new_tecnology = new Tecnology();
            $new_tecnology->name = $faker->words(2,true);
            $new_tecnology->slug = Tecnology::generateSlug($new_tecnology->name);
            $new_tecnology->save();
        }
    }
}
