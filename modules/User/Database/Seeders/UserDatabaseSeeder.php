<?php

namespace Modules\User\Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Modules\User\Database\Seeders\V1\UserTableSeeder\UserTableSeeder;

class UserDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Model::unguard();

        $this->call(
            [
                UserTableSeeder::class,
            ]
        );
    }
}
