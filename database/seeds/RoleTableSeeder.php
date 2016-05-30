<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'id' => 1,
            'name' => 'owner',
            'display_name' => 'Propriétaire',
            'description' => null,
        ]);

        DB::table('roles')->insert([
            'id' => 2,
            'name' => 'admin',
            'display_name' => 'Administrateur',
            'description' => null,
        ]);

         DB::table('roles')->insert([
            'id' => 3,
            'name' => 'moderator',
            'display_name' => 'Moderateur',
            'description' => null,
        ]);

         DB::table('roles')->insert([
            'id' => 4,
            'name' => 'user',
            'display_name' => 'Utilisateur',
            'description' => null,
        ]);
    }
}
