<?php

namespace Modules\User\Database\Factories\V1\UserFactory;

use Modules\Base\Database\Factory\V1\BaseFactory\BaseFactory;

class UserFactory extends BaseFactory
{
    /**
     * Get the target model
     */
    public function model(): string
    {
        return v1_user()->model();
    }

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [];
    }
}
