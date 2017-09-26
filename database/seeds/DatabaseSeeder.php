<?php

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(PositionsTableSeeder::class);
        $this->call(CountriesTableSeeder::class);
        $this->call(RegionsTableSeeder::class);
        $this->call(CitiesTableSeeder::class);
        $this->call(TestsTableSeeder::class);
    }
}
