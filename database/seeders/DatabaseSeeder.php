<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Event;
use App\Models\TicketType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Jorge Admin',
            'email' => 'admin@eventnexus.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);

        User::factory()->create([
          'name' => 'Cliente Feliz',
          'email' => 'cliente@gmail.com',
          'password' => bcrypt('password'),
          'role' => 'user',
        ]);

        Event::factory(20)
            ->has(TicketType::factory()->count(3))
            ->create();
    }
}
