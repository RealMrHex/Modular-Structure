<?php

namespace Modules\Profile\Database\Seeders\V1\ProfileTableSeeder;

use Illuminate\Database\Eloquent\Model;
use Modules\Base\Database\Seeders\V1\BaseDatabaseSeeder\BaseDatabaseSeeder;

class ProfileTableSeeder extends BaseDatabaseSeeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Model::unguard();
    }
}
