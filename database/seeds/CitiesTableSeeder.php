<?php

use Illuminate\Database\Seeder;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// Commune de la CASUD
        DB::table('cities')->insert([
            'code' => 97430,
            'name' => 'Le Tampon',
            'slug' => 'le-tampon',
        ]);

        DB::table('cities')->insert([
            'code' => 97414,
            'name' => 'Entre-Deux',
            'slug' => 'entre-deux',
        ]);

        DB::table('cities')->insert([
            'code' => 97480,
            'name' => 'Saint-Joseph',
            'slug' => 'saint-joseph',
        ]);

        DB::table('cities')->insert([
            'code' => 97442,
            'name' => 'Saint-Philippe',
            'slug' => 'saint-philippe',
        ]);

        // Commune de la CIVIS
        DB::table('cities')->insert([
            'code' => 97410,
            'name' => 'Saint-Pierre',
            'slug' => 'saint-pierre',
        ]);

        DB::table('cities')->insert([
            'code' => 97425,
            'name' => 'Les Avirons',
            'slug' => 'les avirons',
        ]);

        DB::table('cities')->insert([
            'code' => 97413,
            'name' => 'Cilaos',
            'slug' => 'cilaos',
        ]);

        DB::table('cities')->insert([
            'code' => 97427,
            'name' => 'L\'Étang-Salé',
            'slug' => 'etang-sale',
        ]);

        DB::table('cities')->insert([
            'code' => 97429,
            'name' => 'Petite-Île',
            'slug' => 'petite-ile',
        ]);

        DB::table('cities')->insert([
            'code' => 97450,
            'name' => 'Saint-Louis',
            'slug' => 'saint-louis',
        ]);
    }
}
