<?php

namespace Database\Seeders;

use App\Models\Profession;

use Illuminate\Database\Seeder;


class ProfessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Trabar con Constructor Consultas
        /*DB::table('professions')->insert([
            'title' => 'Desarrollador back-end',
        ]);
        DB::table('professions')->insert([
            'title' => 'Desarrollador front-end',
        ]);
        DB::table('professions')->insert([
            'title' => 'Diseñador web',
        ]);*/

        // 2. Trabajar con Eloquent ORM
        Profession::create(['title' => 'Desarrollador back-end']);
        Profession::create(['title' => 'Desarrollador front-end']);
        Profession::create(['title' => 'Diseñador web']);

        Profession::factory(10)->create();
    }
}
