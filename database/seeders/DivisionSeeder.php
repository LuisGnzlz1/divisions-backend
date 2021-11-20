<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $divisions = [
            ['name' => 'Direccion General', 'parent_division_id' => 0, 'level' => 10, 'collaborators' => 8, 'ambassador' => 'Terry Grimes'],
            ['name' => 'Producto', 'parent_division_id' => 0, 'level' => 3, 'collaborators' => 3, 'ambassador' => 'Luke Andrew'],
            ['name' => 'Operaciones', 'parent_division_id' => 0, 'level' => 1, 'collaborators' => 1, 'ambassador' => 'Arnold Craig'],
            ['name' => 'CEO', 'parent_division_id' => 1, 'level' => 5, 'collaborators' => 2, 'ambassador' => ''],
            ['name' => 'Strategy', 'parent_division_id' => 3, 'level' => 5, 'collaborators' => 7, 'ambassador' => 'Frank Mont'],
            ['name' => 'Growth', 'parent_division_id' => 3, 'level' => 4, 'collaborators' => 3, 'ambassador' => ''],
        ];
        foreach ($divisions as $division) {
            \App\Models\Division::create($division);
        }
    }
}
