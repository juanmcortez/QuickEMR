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
        //
        Schema::table('encounters', static function (Blueprint $table) {
            $table
                ->bigInteger('pid_enc')
                ->unsigned()
                ->nullable()
                ->index()
                ->after('enc');

            $table
                ->bigInteger('rendering_id')
                ->unsigned()
                ->nullable()
                ->index()
                ->after('pid_enc');

            $table
                ->bigInteger('referring_id')
                ->unsigned()
                ->nullable()
                ->index()
                ->after('rendering_id');

            $table
                ->bigInteger('ordering_id')
                ->unsigned()
                ->nullable()
                ->index()
                ->after('referring_id');

            $table
                ->bigInteger('supervising_id')
                ->unsigned()
                ->nullable()
                ->index()
                ->after('ordering_id');

            $table->foreign('pid_enc')
                ->references('pid')
                ->on('patients')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->foreign('rendering_id')
                ->references('did')
                ->on('doctors')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->foreign('referring_id')
                ->references('did')
                ->on('doctors')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->foreign('ordering_id')
                ->references('did')
                ->on('doctors')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->foreign('supervising_id')
                ->references('did')
                ->on('doctors')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
        });
        //
        Schema::table('encounters_items', static function (Blueprint $table) {
            $table
                ->bigInteger('enc_itm')
                ->unsigned()
                ->nullable()
                ->index()
                ->after('itm');

            $table->foreign('enc_itm')
                ->references('enc')
                ->on('encounters')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
        });
        //
        Schema::table('insurances_subscribers', static function (Blueprint $table) {
            $table
                ->bigInteger('icd_sub')
                ->unsigned()
                ->nullable()
                ->index()
                ->after('sub');
            $table
                ->bigInteger('pid_sub')
                ->unsigned()
                ->nullable()
                ->index()
                ->after('icd_sub');
            $table
                ->bigInteger('profile_id')
                ->unsigned()
                ->nullable()
                ->index()
                ->after('pid_sub');

            $table->foreign('icd_sub')
                ->references('icd')
                ->on('insurances_companies')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreign('pid_sub')
                ->references('pid')
                ->on('patients')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreign('profile_id')
                ->references('id')
                ->on('commons_profiles')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('insurances_subscribers', static function (Blueprint $table) {
            $table->dropForeign('insurances_subscribers_icd_sub_foreign');
            $table->dropForeign('insurances_subscribers_pid_sub_foreign');
            $table->dropForeign('insurances_subscribers_profile_id_foreign');
        });
        //
        Schema::table('encounters_items', static function (Blueprint $table) {
            $table->dropForeign('encounters_items_enc_itm_foreign');
        });
        //
        Schema::table('encounters', static function (Blueprint $table) {
            $table->dropForeign('encounters_pid_enc_foreign');
            $table->dropForeign('encounters_rendering_id_foreign');
            $table->dropForeign('encounters_referring_id_foreign');
            $table->dropForeign('encounters_ordering_id_foreign');
            $table->dropForeign('encounters_supervising_id_foreign');
        });
        //
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
