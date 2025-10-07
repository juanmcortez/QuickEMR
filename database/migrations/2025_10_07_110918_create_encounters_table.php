<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('encounters', static function (Blueprint $table) {
            $table->id('enc');
            //
            $table->date('date_of_service_to')->nullable();
            $table->date('date_of_admission')->nullable();
            $table->date('date_of_discharge')->nullable();
            //
            $table->timestamp('date_of_service')->default(Carbon::now());
            $table->timestamp('date_of_entry')->default(Carbon::now());
            $table->timestamp('updated_at')->nullable();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('encounters');
    }
};
