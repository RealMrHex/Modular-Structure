<?php

namespace Modules\Security\Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Modules\Security\Database\Seeders\V1\DefaultRolesTableSeeder\DefaultRolesTableSeeder;

class SecurityDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        Model::unguard();

        $this->call(
            [
                 DefaultRolesTableSeeder::class
            ]
        );
    }
}
