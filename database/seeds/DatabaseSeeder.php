<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        factory(\App\Hostel::class, 10)->create();
        factory(\App\People::class, 10)->create();
        factory(\App\Room::class, 10)->create();
    }
}
