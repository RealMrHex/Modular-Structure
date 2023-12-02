<?php

namespace Modules\Profile\Database\Factories\V1\ProfileFactory;

use Modules\Base\Database\Factory\V1\BaseFactory\BaseFactory;

class ProfileFactory extends BaseFactory
{
    /**
     * Get the target model
     */
    public function model(): string
    {
        return v1_profile()->model();
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
