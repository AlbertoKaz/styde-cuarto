<?php

namespace Database\Seeders;

use App\Models\Skill;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Skill::create(['name' => 'HTML']);
        Skill::create(['name' => 'CSS']);
        Skill::create(['name' => 'JS']);
        Skill::create(['name' => 'PHP']);
        Skill::create(['name' => 'SQL']);
        Skill::create(['name' => 'OOP']);
        Skill::create(['name' => 'TDD']);
    }
}
