<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('commons_addresses', function (Blueprint $table) {
            $table->id();

            $table->string('street_name', 128)->nullable();
            $table->string('street_name_extended', 128)->nullable();

            $table->string('city', 64)->nullable();
            $table->string('state_code', 12)->nullable();
            $table->string('postal_code', 12)->nullable();

            $table->string('country_code', 12)->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('commons_addresses');
    }
};
