<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\Support\Enums\V1\Entities\Entities;
use Modules\User\Entities\V1\User\UserFields;
use Modules\User\Enums\V1\AccountStatus\AccountStatus;
use Modules\User\Enums\V1\AccountType\AccountType;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create(Entities::User->table(), function (Blueprint $table)
        {
            $table->id();
            $table->string(UserFields::MOBILE)->nullable()->unique();
            $table->string(UserFields::EMAIL)->nullable()->unique();
            $table->string(UserFields::USERNAME)->nullable()->unique();
            $table->string(UserFields::PASSWORD)->nullable();
            $table->tinyText(UserFields::MESSAGE)->nullable();
            $table->tinyInteger(UserFields::ACCOUNT_TYPE)->default(AccountType::User->value);
            $table->tinyInteger(UserFields::ACCOUNT_STATUS)->default(AccountStatus::Free->value);
            $table->timestamp(UserFields::LIMITATION_END_DATE)->nullable();
            $table->timestamp(UserFields::MOBILE_VERIFIED_AT)->nullable();
            $table->timestamp(UserFields::EMAIL_VERIFIED_AT)->nullable();
            $table->timestamp(UserFields::FIRST_LOGIN_AT)->nullable();
            $table->ipAddress(UserFields::FIRST_LOGIN_IP)->nullable();
            $table->timestamp(UserFields::LAST_LOGIN_AT)->nullable();
            $table->ipAddress(UserFields::LAST_LOGIN_IP)->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(Entities::User->table());
    }
};
