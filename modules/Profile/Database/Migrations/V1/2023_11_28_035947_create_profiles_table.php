<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\Profile\Entities\V1\Profile\ProfileFields;
use Modules\Support\Enums\V1\Entities\Entities;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create(Entities::Profile->table(), function (Blueprint $table)
        {
            $table->id();
            $table->foreignId(ProfileFields::USER_ID)->constrained(Entities::User->table())->cascadeOnUpdate()->cascadeOnDelete();
            $table->string(ProfileFields::AVATAR)->nullable();
            $table->string(ProfileFields::FIRST_NAME)->nullable();
            $table->string(ProfileFields::LAST_NAME)->nullable();
            $table->string(ProfileFields::FULL_NAME)->virtualAs('concat(' . ProfileFields::FIRST_NAME . ", ' ', " . ProfileFields::LAST_NAME . ')');
            $table->string(ProfileFields::FATHER_NAME)->nullable();
            $table->tinyInteger(ProfileFields::GENDER)->nullable();
            $table->timestamp(ProfileFields::BIRTH_DATE)->nullable();
            $table->string(ProfileFields::NATIONAL_CODE)->nullable();
            $table->string(ProfileFields::IDENTIFY_NUMBER)->nullable();
            $table->tinyText(ProfileFields::ADDRESS)->nullable();
            $table->string(ProfileFields::PHONE)->nullable();
            $table->string(ProfileFields::POSTAL_CODE)->nullable();
            $table->string(ProfileFields::PROVINCE)->nullable();
            $table->string(ProfileFields::CITY)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists(Entities::Profile->table());
    }
};
