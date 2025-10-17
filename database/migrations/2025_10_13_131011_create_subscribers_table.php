<?php

use Carbon\Carbon;
use App\Enum\InsuranceType;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('insurances_subscribers', function (Blueprint $table) {
            $table->id('sub');
            //
            $table->enum('type', InsuranceType::values())->default(InsuranceType::Primary->value);
            $table->timestamp('effective_date')->default(Carbon::now());
            $table->timestamp('termination_date')->nullable();
            //
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('insurances_subscribers');
    }
};
