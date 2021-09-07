<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Seeder;

class TasksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Task::firstOrCreate([
            'text' => 'Get some mangoes',
            'day' => 'Sep 24th 2021 at 9am',
            'reminder' => true,
        ]);
        
        Task::firstOrCreate([
            'text' => 'Get some bananas',
            'day' => 'Sep 25th 2021 at 11am',
            'reminder' => false,
        ]);
    }
}
