<?php

namespace Modules\Profile\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Profile\Database\Seeders\V1\ProfileTableSeeder\ProfileTableSeeder;

class ProfileDatabaseSeeder extends Seeder
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
                ProfileTableSeeder::class
            ]
        );
    }
}
