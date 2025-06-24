<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'G.M. Zesan',
            'email' => 'gmzesan7767@gmail.com',
            'password' => bcrypt('12345678aA'),
        ]);
        $this->call([
            ProductSeeder::class,
            SaleSeeder::class,
        ]);
    }
}
