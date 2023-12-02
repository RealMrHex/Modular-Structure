<?php

namespace Modules\Security\Database\Seeders\V1\DefaultRolesTableSeeder;

use Illuminate\Database\Eloquent\Model;
use Modules\Base\Database\Seeders\V1\BaseDatabaseSeeder\BaseDatabaseSeeder;
use Modules\Security\Entities\V1\Permission\RoleFields;

class DefaultRolesTableSeeder extends BaseDatabaseSeeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Model::unguard();

        $this
            ->sudo()
            ->manager()
            ->user()
        ;
    }

    /**
     * Create sudo roles
     *
     * @return self
     */
    private function sudo(): self
    {
        v1_role()->create(
            [
                RoleFields::NAME         => 'sudo',
                RoleFields::DISPLAY_NAME => __('Sudo Access'),
                RoleFields::GUARD_NAME   => 'web',
            ]
        );

        v1_user()->find(1)->assignRole('sudo');
        v1_user()->find(2)->assignRole('sudo');

        return $this;
    }

    /**
     * Create manager roles
     *
     * @return self
     */
    private function manager(): self
    {
        v1_role()->create(
            [
                RoleFields::NAME         => 'manager',
                RoleFields::DISPLAY_NAME => __('Manager Access'),
                RoleFields::GUARD_NAME   => 'web',
            ]
        );

        v1_user()->find(3)->assignRole('manager');

        return $this;
    }

    /**
     * Create User roles
     *
     * @return void
     */
    private function user(): void
    {
        v1_role()->create(
            [
                RoleFields::NAME         => 'user',
                RoleFields::DISPLAY_NAME => __('User Access'),
                RoleFields::GUARD_NAME   => 'web',
            ]
        );
    }
}
