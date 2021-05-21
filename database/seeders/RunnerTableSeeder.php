<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RunnerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->db->table('runners')->insert([
           'runner' => 'default_runner',
        ]);
    }
}
