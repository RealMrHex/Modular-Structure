<?php

namespace Modules\User\Database\Seeders\V1\UserTableSeeder;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Modules\User\Entities\V1\User\UserFields;
use Modules\User\Enums\V1\AccountStatus\AccountStatus;
use Modules\User\Enums\V1\AccountType\AccountType;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Model::unguard();

        $this
            ->system()
            ->sudo()
            ->manager()
        ;
    }

    /**
     * Get domain for emails
     *
     * @return string
     */
    protected function domain(): string
    {
        return str(config('app.name'))->replace(' ', '')->trim()->lower()->toString();
    }

    /**
     * Get tld for emails
     *
     * @return string
     */
    protected function tld(): string
    {
        return '.dev';
    }

    /**
     * Get the app name
     *
     * @return string
     */
    protected function name(): string
    {
        return str(config('app.name'))->ucfirst();
    }

    /**
     * Create System User
     */
    private function system(): self
    {
        v1_user()->create(
            [
                UserFields::EMAIL          => 'system@' . $this->domain() . $this->tld(),
                UserFields::USERNAME       => 'system',
                UserFields::ACCOUNT_TYPE   => AccountType::System,
                UserFields::ACCOUNT_STATUS => AccountStatus::Classified,
            ],
        );

        return $this;
    }

    /**
     * Create Sudo User
     */
    private function sudo(): self
    {
        v1_user()->create(
            [
                UserFields::EMAIL          => 'sudo@' . $this->domain() . $this->tld(),
                UserFields::USERNAME       => 'sudo',
                UserFields::ACCOUNT_TYPE   => AccountType::Sudo,
                UserFields::ACCOUNT_STATUS => AccountStatus::Classified,
            ],
        );

        return $this;
    }

    /**
     * Create Manager User
     */
    private function manager(): void
    {
        v1_user()->create(
            [
                UserFields::EMAIL              => 'manager@' . $this->domain() . $this->tld(),
                UserFields::MOBILE             => '09123456789',
                UserFields::USERNAME           => 'manager',
                UserFields::PASSWORD           => bcrypt('password'),
                UserFields::ACCOUNT_TYPE       => AccountType::Manager,
                UserFields::ACCOUNT_STATUS     => AccountStatus::Free,
                UserFields::MOBILE_VERIFIED_AT => Carbon::now(),
                UserFields::EMAIL_VERIFIED_AT  => Carbon::now(),
            ],
        );

    }
}
