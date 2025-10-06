<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('commons_profiles', function (Blueprint $table) {
            $table->id();
            //
            $table->string('first_name', 64);
            $table->string('middle_name', 64)->nullable();
            $table->string('last_name', 64);
            //
            $table->date('birthdate')->default(Carbon::now()->format('Y-m-d'));
            //
            $table
                ->bigInteger('email_address_id')
                ->unsigned()
                ->nullable()
                ->index();
            //
            $table
                ->bigInteger('primary_address_id')
                ->unsigned()
                ->nullable()
                ->index();
            $table
                ->bigInteger('secondary_address_id')
                ->unsigned()
                ->nullable()
                ->index();
            //
            $table
                ->bigInteger('primary_phone_id')
                ->unsigned()
                ->nullable()
                ->index();
            $table
                ->bigInteger('secondary_phone_id')
                ->unsigned()
                ->nullable()
                ->index();
            //
            $table->timestamp('registration_date')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('commons_profiles');
    }
};
