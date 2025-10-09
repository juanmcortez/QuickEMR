<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('insurances_companies', static function (Blueprint $table) {
            $table->id('icd');
            //
            $table->string('name');
            $table->string('attention')->nullable();
            $table->timestamp('effective_date')->nullable();
            $table->timestamp('termination_date')->nullable();
            //
            $table->boolean('participating')->nullable()->default(false);
            $table->boolean('self_pay')->nullable()->default(false);
            $table->boolean('do_not_bill')->nullable()->default(false);
            $table->boolean('do_not_import')->nullable()->default(false);
            //
            $table->string('payer_id')->nullable();
            $table->string('payer_id_eligibility')->nullable();
            //
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('insurances_companies');
    }
};
