<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('users', static function (Blueprint $table) {
            $table
                ->bigInteger('profile_id')
                ->unsigned()
                ->nullable()
                ->index()
                ->after('uid');

            $table->foreign('profile_id')
                ->references('id')
                ->on('commons_profiles')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
        });
        //
        Schema::table('commons_profiles', static function (Blueprint $table) {
            $table->foreign('email_address_id')
                ->references('id')
                ->on('commons_emails')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreign('primary_address_id')
                ->references('id')
                ->on('commons_addresses')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreign('secondary_address_id')
                ->references('id')
                ->on('commons_addresses')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreign('primary_phone_id')
                ->references('id')
                ->on('commons_phones')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreign('secondary_phone_id')
                ->references('id')
                ->on('commons_phones')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
        });
        //
        Schema::table('patients', static function (Blueprint $table) {
            $table
                ->bigInteger('profile_id')
                ->unsigned()
                ->nullable()
                ->index()
                ->after('pid');

            $table->foreign('profile_id')
                ->references('id')
                ->on('commons_profiles')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
        });
        //
        Schema::table('doctors', static function (Blueprint $table) {
            $table
                ->bigInteger('profile_id')
                ->unsigned()
                ->nullable()
                ->index()
                ->after('did');

            $table->foreign('profile_id')
                ->references('id')
                ->on('commons_profiles')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('doctors', static function (Blueprint $table) {
            $table->dropForeign('doctors_profile_id_foreign');
        });
        //
        Schema::table('patients', static function (Blueprint $table) {
            $table->dropForeign('patients_profile_id_foreign');
        });
        //
        Schema::table('commons_profiles', static function (Blueprint $table) {
            $table->dropForeign('commons_profiles_secondary_phone_id_foreign');
            $table->dropForeign('commons_profiles_primary_phone_id_foreign');
            $table->dropForeign('commons_profiles_secondary_address_id_foreign');
            $table->dropForeign('commons_profiles_primary_address_id_foreign');
            $table->dropForeign('commons_profiles_email_address_id_foreign');
        });
        //
        Schema::table('users', static function (Blueprint $table) {
            $table->dropForeign('users_profile_id_foreign');
        });
    }
};
