<?php

namespace Modules\Base\Database\Seeders\V1\BaseDatabaseSeeder;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class BaseDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Model::unguard();
    }
}
